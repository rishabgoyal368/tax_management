<?php
function status($status)
{
    switch ($status) {
        case '1':
            echo 'Active';
            break;
        case '2':
            echo 'Deactivated';
            break;
        case '3':
            echo 'Deleted';
            break;
        case '4':
            echo 'Archive';
            break;
    }
}

function statusClass($status)
{
    switch ($status) {
        case 'Active':
            echo 'badge badge-success';
            break;
        case 'Deleted':
            echo 'badge badge-warning';
            break;
        case 'Deactivated':
            echo 'badge badge-danger';
            break;
        case 'Archive':
            echo 'badge badge-primary';
            break;
    }
}


?>