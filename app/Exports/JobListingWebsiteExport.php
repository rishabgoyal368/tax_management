<?php

namespace App\Exports;

use App\JobListingWebsite;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JobListingWebsiteExport implements FromCollection, WithHeadings
{

    protected $arr = [];


    public function __construct(array $arr)
    {
        $this->arr[] = $arr;
    }

    public function collection()
    {
        return collect($this->arr);
    }

    public function headings(): array
    {
        return [
            'name',
            'website',
            'email',
            'status',
            'Password'
        ];
    }
}
