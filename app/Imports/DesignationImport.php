<?php

namespace App\Imports;

use App\Department;
use App\Designation;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class DesignationImport implements ToCollection,WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $department = Department::checkOrCreate($row['department']);
            $data['title'] = $row['designation'];
            $data['department_id'] = $department;
            $data['status'] = $row['status'] ?: 'Active';            
            if (Designation::where(['title' => $data['title'], 'department_id' => $data['department_id']])->count() == 0) {
                Designation::create([
                    'title'     => $data['title'],
                    'department_id' => $data['department_id'],
                    'status'    => $data['status'],
                ]);
            }
            else{
                continue;
            }
        }
    }
}
