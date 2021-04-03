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

// Home > tax
Breadcrumbs::for('manage-tax', function ($trail) {
    $trail->parent('home');
    $trail->push('Users', route('manage-tax'));
});

Breadcrumbs::for('add-tax', function ($trail) {
    $trail->parent('manage-tax');
    $trail->push('Add tax', route('manage-tax'));
});

Breadcrumbs::for('edit-tax', function ($trail) {
    $trail->parent('manage-tax');
    $trail->push('Edit tax', route('manage-tax'));
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

// Home > Supplier-Data
Breadcrumbs::for('supplier-data', function ($trail) {
    $trail->parent('home');
    $trail->push('Supplier Data', route('supplier-data'));
});

Breadcrumbs::for('view-supplier-data', function ($trail) {
    $trail->parent('supplier-data');
    $trail->push('view-supplier-data', route('supplier-data'));
});

// Home > Buy- Invoice
Breadcrumbs::for('buy-invoice', function ($trail) {
    $trail->parent('home');
    $trail->push('Buy Invoice', route('buy-invoice'));
});

Breadcrumbs::for('view-buy-invoice', function ($trail) {
    $trail->parent('buy-invoice');
    $trail->push('View Buy Invoice', route('buy-invoice'));
});



// First-Dummy
Breadcrumbs::for('first-dummy', function ($trail) {
    $trail->parent('home');
    $trail->push('First Dummy', route('first-dummy'));
});

// Second-Dummy
Breadcrumbs::for('second-dummy', function ($trail) {
    $trail->parent('home');
    $trail->push('Second Dummy', route('second-dummy'));
});


// Third-Dummy
Breadcrumbs::for('third-dummy', function ($trail) {
    $trail->parent('home');
    $trail->push('Third Dummy', route('third-dummy'));
});

// Forth-Dummy
Breadcrumbs::for('forth-dummy', function ($trail) {
    $trail->parent('home');
    $trail->push('Forth Dummy', route('forth-dummy'));
});

// Content
Breadcrumbs::for('content', function ($trail) {
    $trail->parent('home');
    $trail->push('content', url('content'));
});

// Add Content
Breadcrumbs::for('add-content', function ($trail) {
    $trail->parent('content');
    $trail->push('Add content', url('add-content'));
});
Breadcrumbs::for('edit-content', function ($trail) {
    $trail->parent('content');
    $trail->push('Edit content', url('add-content'));
});



// Invoice -list
Breadcrumbs::for('invoice-list', function ($trail) {
    $trail->parent('home');
    $trail->push('Invoice List', url('invoice-list'));
});

