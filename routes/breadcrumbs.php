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

