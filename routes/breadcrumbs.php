<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > User
Breadcrumbs::for('manage-user', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('manage-user'));
});

Breadcrumbs::for('add-user', function ($trail) {
    $trail->parent('manage-user');
    $trail->push('Add User', route('manage-user'));
});

Breadcrumbs::for('edit-user', function ($trail) {
    $trail->parent('manage-user');
    $trail->push('Edit User', route('manage-user'));
});

// Home > Department
Breadcrumbs::for('manage-content', function ($trail) {
    $trail->parent('home');
    $trail->push('Content', route('manage-content'));
});

Breadcrumbs::for('add-content', function ($trail) {
    $trail->parent('manage-content');
    $trail->push('Add User', route('manage-content'));
});

Breadcrumbs::for('edit-content', function ($trail) {
    $trail->parent('manage-content');
    $trail->push('Edit User', route('manage-content'));
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