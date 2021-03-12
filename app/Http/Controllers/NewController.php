<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DummyOne, App\DummySecond, App\DummyThird, App\DummyForth;
use Helper;

class NewController extends Controller
{
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function first_dummy(Request $request){
    	$first_dummy = DummyOne::with('user')->latest()->paginate(env('PAGINATE'));
        return view('FirstDummy.list',compact('first_dummy'));

    }

    public function second_dummy(Request $request){
        $second_dummy = DummySecond::with('user')->latest()->paginate(env('PAGINATE'));
        return view('SecondDummy.list',compact('second_dummy'));
    }

    public function third_dummy(Request $request){
        $third_dummy = DummyThird::with('user')->latest()->paginate(env('PAGINATE'));
        return view('ThirdDummy.list',compact('third_dummy'));
    }

    public function forth_dummy(Request $request){
        $forth_dummy = DummyForth::with('user')->latest()->paginate(env('PAGINATE'));
        return view('ForthDummy.list',compact('forth_dummy'));
    }    
}
