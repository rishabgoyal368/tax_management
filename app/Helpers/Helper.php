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
        case '1':
            echo 'badge badge-success';
            break;
        case '2':
            echo 'badge badge-warning';
            break;
        case '3':
            echo 'badge badge-danger';
            break;
        case '4':
            echo 'badge badge-primary';
            break;
    }
}


?>