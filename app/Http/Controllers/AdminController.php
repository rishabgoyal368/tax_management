<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Admin;
use App\AppSetting;
use App\Tax;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    protected $userLabel = '';

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(Request $request)
    {

        // $admin = new Admin();
        // $admin->email = $request->input('email');
        // $admin->password = bcrypt($request->input('password'));
        // $admin->save();
        // return 'true';
        return view('index');
    }
    //----------------------------------update adminprofile------------------------------------------

    public function update(Request $request)
    {
        // return ($request->all());
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('admin.adminprofile');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $validator =  Validator::make($data, [
                'name' =>  'required',
                'email' => 'required|email',
                'phone_number' => 'required|numeric',
                'image' => $data['id'] ? 'nullable' : 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
            if ($request->image) {
                $fileName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $fileName);
                $data['profile_pic'] = $fileName;
            } else {
                $fileName = Admin::where('id', $request->id)->value('profile_pic');
                $data['profile_pic'] = $fileName;
            }
            // return $data;
            Admin::Updates($data);
            return redirect('/')->with(['success' => 'profile updated  successfully']);
        }
    }


    public function updatepassword(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return view('admin.adminpassword');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $validator =  Validator::make($data, [
                'current_password' => 'required',
                'new_password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }

            if (Hash::check($request->current_password, Auth::user()->password) == false) {
                $message = 'Current Passsword is not match';
                return redirect()->back()->with(['error' => $message]);
            } else {
                Admin::Updatepassword($data);
                return redirect()->back()->with(['success' => 'profile updated  successfully']);
            }
        }
    }

    public function appSetting(Request $request)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $AppSetting = AppSetting::latest()->first();
            return view('admin.appSetting', compact('AppSetting'));
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $request->all();
            $AppSetting = AppSetting::where('id', $request->id)->first();

            if ($request->logo) {
                $fileName = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('uploads'), $fileName);
                $data['logo'] = $fileName;
                $AppSetting->logo = $fileName;
            }
            $AppSetting->app_version = $data['app_version'];
            $AppSetting->save();

            return redirect()->back()->with(['success' => 'profile updated  successfully']);
        }
    }


    public function adminList(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $admin->role = $admin['role'] == null ? 0 : $admin['role'];
        $admin->status = $admin['status'] == null ? 'Active' : $admin['status'];
        $admin->save();
        $label = '';
        switch ($admin['role']) {
            case '0':
                # finanical manager
                $label = 'Manager';
                break;
            case '1':
                # officer
                $label = 'Officer';
                break;
        }
        $id = Admin::where('id', Auth::guard('admin')->user()->id)->orwhere('role', 0)->pluck('id');
        $admins = Admin::whereNotIn('id', $id)->paginate(10);
        return view('admin.list', compact('admins', 'label'));
    }

    public function addAdmin(Request $request, $id = null)
    {
        $admin = Auth::guard('admin')->user();
        $officer = Tax::get();
        switch ($admin['role']) {
            case 0:
                # finanical manager
                $role = 1;
                $job = $request['job'];
                $userLabel = 'Manager';
                break;
            case 1:
                # officer
                $role = 2;
                $job = 'Officer';
                $userLabel = 'Officer';
                break;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if ($id) {
                #Update
                $user = Admin::find($id);
                $label = 'Edit ' . $userLabel;
                return view('admin.add_edit', compact('user', 'label','officer'));
            } else {
                #Insert
                $label = 'Add ' . $userLabel;
                $user['id'] = '';
                return view('admin.add_edit', compact('label', 'user','officer'));
            }
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // return $request->all();

            $this->validate($request, [
                'name' =>  'required',
                'email' => $request['id'] ? 'required|unique:admins,email,' . $request['id'] . ',id,deleted_at,NULL' : 'required|unique:admins,email',
                'phone_number' => 'required',
                'password' => $request['id'] ? 'nullable' : 'required|confirmed',
                'status' => 'required',
            ]);
            $oldAdmin = Admin::where('id', @$request['id'])->first();
            if ($request->id) {
                $request['profile_pic'] = $oldAdmin['profile_pic'];
                $request['created_by'] = $oldAdmin['created_by'];
                $msz = ' Updated';
            } else {
                $request['created_by'] = $admin['id'];
                $request['profile_pic'] = 'profile.png';
                $msz = ' Add';
            }

            $request['role'] = $role;
            $request['job'] = $job;
            $request['password'] = $request['id'] ? $oldAdmin['password'] : Hash::make($request['password']);
             $user =  Admin::addEdit($request);
            return redirect('/manage-admin')->with(['success' => $userLabel . $msz . ' successfully']);
        }
    }

    public function deleteAdmin(Request $request)
    {
        $data = $request->all();
        $validator =  Validator::make($data, [
            'id'  => 'required|exists:admins,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()]);
        } else {
            $admin = Auth::guard('admin')->user();
            switch ($admin['role']) {
                case '0':
                    # finanical manager
                    $label = 'Manager';
                    break;
                case '1':
                    # officer
                    $label = 'Officer';
                    break;
            }
            Admin::where('id', $request->id)->delete();
            return response()->json(['success' => $label . ' deleted successfully.']);
        }
    }
}
