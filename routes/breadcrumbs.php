<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

// Role Management
Breadcrumbs::for('role', function ($trail) {
    $trail->parent('home');
    $trail->push('Role Management', route('role'));
});

// User Management
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('home');
    $trail->push('User Management', route('user'));
});