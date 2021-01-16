<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Department
Breadcrumbs::for('manage-user', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('manage-user'));
});
Breadcrumbs::for('add-user', function ($trail) {
    $trail->parent('manage-user');
    $trail->push('Add User', route('manage-user'));
});





Breadcrumbs::for('AdminProfile', function ($trail) {
    $trail->parent('home');
    $trail->push('AdminProfile', url('AdminProfile'));
});

Breadcrumbs::for('updateprofile', function ($trail) {
    $trail->parent('home');

    $trail->push('updateprofile', url('updateprofile'));
});

Breadcrumbs::for('updatepassword', function ($trail) {
    $trail->parent('home');

    $trail->push('updateprofile', url('updateprofile'));
});