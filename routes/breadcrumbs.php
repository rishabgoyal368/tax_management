<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Home > About
Breadcrumbs::for('department', function ($trail) {
    $trail->parent('home');
    $trail->push('Department', route('department'));
});

// Home > Blog
Breadcrumbs::for('Job-listing-websites', function ($trail) {
    $trail->parent('home');
    $trail->push('Job-listing-websites', route('Job-listing-websites'));
});

// Home > Blog > [Category]
Breadcrumbs::for('Add-job-listing-websites', function ($trail) {
    $trail->parent('Job-listing-websites');

    $trail->push('Add-job-listing-websites', url('Add-job-listing-websites'));
});

Breadcrumbs::for('Edit-job-listing-websites', function ($trail) {
    $trail->parent('Job-listing-websites');

    $trail->push('Add-job-listing-websites', url('Add-job-listing-websites'));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});