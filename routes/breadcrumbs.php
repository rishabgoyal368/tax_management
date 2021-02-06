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

// Home > Content
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


// Home > Lipi
Breadcrumbs::for('manage-lipi', function ($trail) {
    $trail->parent('home');
    $trail->push('Lipi', route('manage-lipi'));
});

Breadcrumbs::for('add-lipi', function ($trail) {
    $trail->parent('manage-lipi');
    $trail->push('Add Lipi', route('manage-lipi'));
});

Breadcrumbs::for('edit-lipi', function ($trail) {
    $trail->parent('manage-lipi');
    $trail->push('Edit Lipi', route('manage-lipi'));
});

// Home > khani
Breadcrumbs::for('manage-khani', function ($trail) {
    $trail->parent('home');
    $trail->push('khani', route('manage-khani'));
});

Breadcrumbs::for('add-khani', function ($trail) {
    $trail->parent('manage-khani');
    $trail->push('Add khani', route('manage-khani'));
});

Breadcrumbs::for('edit-khani', function ($trail) {
    $trail->parent('manage-khani');
    $trail->push('Edit khani', route('manage-khani'));
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