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


Breadcrumbs::for('manage-admin', function ($trail) {
    $trail->parent('home');
    $trail->push('Manage Admins', url('manage-admin'));
});

Breadcrumbs::for('add-admin', function ($trail) {
    $trail->parent('manage-admin');
    $trail->push('Add Admins', url('manage-admin'));
});

Breadcrumbs::for('edit-admin', function ($trail) {
    $trail->parent('manage-admin');
    $trail->push('Edit Admins', url('manage-admin'));
});


Breadcrumbs::for('AdminProfile', function ($trail) {
    $trail->parent('home');
    $trail->push('AdminProfile', url('AdminProfile'));
});

Breadcrumbs::for('updateprofile', function ($trail) {
    $trail->parent('home');

    $trail->push('Update Profile', url('updateprofile'));
});

Breadcrumbs::for('updatepassword', function ($trail) {
    $trail->parent('home');
    $trail->push('updateprofile', url('updateprofile'));
});

Breadcrumbs::for('app-setting', function ($trail) {
    $trail->parent('home');
    $trail->push('App Setting', url('app-setting'));
});

// Home > User
Breadcrumbs::for('task-list', function ($trail) {
    $trail->parent('home');
    $trail->push('Tasks', route('task-list'));
});

Breadcrumbs::for('add-task', function ($trail) {
    $trail->parent('task-list');
    $trail->push('Add Task', route('task-list'));
});

Breadcrumbs::for('edit-task', function ($trail) {
    $trail->parent('task-list');
    $trail->push('Edit Task', route('task-list'));
});