<?php

namespace App\Helpers;

class Helper
{
    public static function status($status)
    {
        switch ($status) {
            case '1':
                return 'Active';
                break;
            case '2':
                return 'Deactivated';
                break;
            case '3':
                return 'Deleted';
                break;
            case '4':
                return 'Archive';
                break;
        }
    }

    public static function statusClass($status)
    {
        switch ($status) {
            case '1':
                return 'badge badge-success';
                break;
            case '2':
                return 'badge badge-warning';
                break;
            case '3':
                return 'badge badge-danger';
                break;
            case '4':
                return 'badge badge-primary';
                break;
        }
    }
}
