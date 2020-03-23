<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > Department
Breadcrumbs::for('designation', function ($trail) {
    $trail->parent('home');
    $trail->push('Designation', route('designation'));
});

// Home > Department > add-department 
Breadcrumbs::for('add-designation', function ($trail) {
    $trail->parent('designation');
    $trail->push('Add designation', url('add-designation'));
});

Breadcrumbs::for('edit-designation', function ($trail) {
    $trail->parent('designation');
    $trail->push('Edit designation', url('edit-designation'));
});

Breadcrumbs::for('view-designation', function ($trail) {
    $trail->parent('designation');
    $trail->push('View designation', url('view-designation'));
});

// Home > Job-listing-websites
Breadcrumbs::for('Job-listing-websites', function ($trail) {
    $trail->parent('home');
    $trail->push('Job listing websites', route('Job-listing-websites'));
});

// Home > Blog > [Category]
Breadcrumbs::for('Add-job-listing-websites', function ($trail) {
    $trail->parent('Job-listing-websites');

    $trail->push('Add job listing websites', url('Add-job-listing-websites'));
});

Breadcrumbs::for('Edit-job-listing-websites', function ($trail) {
    $trail->parent('Job-listing-websites');

    $trail->push('Edit job listing websites', url('edit-job-listing-websites'));
});

Breadcrumbs::for('Show-job-listing-websites', function ($trail) {
    $trail->parent('Job-listing-websites');

    $trail->push('Show job listing websites', url('show-job-listing-websites'));
});

// Home > job-opening
Breadcrumbs::for('job-opening', function ($trail) {
    $trail->parent('home');
    $trail->push('Job opening', url('job-opening'));
});

// job-opening > Add job-opening
Breadcrumbs::for('add-job-opening', function ($trail) {
    $trail->parent('job-opening');
    $trail->push('Add job opening', url('add-job-opening'));
});

// job-opening > Edit job-opening
Breadcrumbs::for('edit-job-opening', function ($trail) {
    $trail->parent('job-opening');
    $trail->push('Edit job opening', url('edit-job-opening'));
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