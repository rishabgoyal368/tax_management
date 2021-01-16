<?php

namespace App\Imports;

use App\JobListingWebsite;
use Illuminate\Support\Collection;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JobListingWebsiteImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return User|null
     */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            
            $data = [];
            if (JobListingWebsite::withTrashed()->where(['name' => $row['name'], 'email' => $row['email'], 'password' => $row['password']])->count() == 0) {
                $data['id'] = '';
                $data['name'] = $row['name'];
                $data['websiteLink'] = $row['website'];
                $data['email'] = $row['email'];
                $data['password'] = $row['password'];
                $data['status'] = $row['status'];
                JobListingWebsite::addorUpdate($data);
            }
        }
    }
}
