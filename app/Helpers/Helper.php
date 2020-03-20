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
            case 'Active':
                echo 'badge badge-success';
                break;
            case 'Deleted':
                echo 'badge badge-danger';
                break;
            case 'Deactivated':
                echo 'badge badge-warning';
                break;
            case 'Archive':
                echo 'badge badge-primary';
                break;
        }
    }
}
