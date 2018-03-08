<?php

Breadcrumbs::register('admin.dashboard', function ($breadcrumbs) {
    $breadcrumbs->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

//Category
Breadcrumbs::register('backend.category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.category.management'), route('backend.category.index'));
});

Breadcrumbs::register('backend.category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.category.create'), route('backend.category.create'));
});

Breadcrumbs::register('backend.category.edit', function ($breadcrumbs, $slug) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.category.edit'), route('backend.category.edit', $slug));
});

//Breadcrumbs::register('backend.category.destroy', function ($breadcrumbs, $slug) {
//    $breadcrumbs->parent('admin.dashboard');
//    $breadcrumbs->push(__('menus.backend.access.category.delete'), route('backend.category.destroy', $slug));
//});

//Post

Breadcrumbs::register('backend.post.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.post.edit'), route('backend.post.index'));
});

Breadcrumbs::register('backend.post.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.post.create'), route('backend.post.create'));
});

Breadcrumbs::register('backend.post.edit', function ($breadcrumbs, $slug) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(__('menus.backend.access.post.edit'), route('backend.post.edit', $slug));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';
