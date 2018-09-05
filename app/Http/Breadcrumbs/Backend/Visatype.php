<?php

Breadcrumbs::register('admin.visatypes.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.visatypes.management'), route('admin.visatypes.index'));
});

Breadcrumbs::register('admin.visatypes.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.visatypes.index');
    $breadcrumbs->push(trans('menus.backend.visatypes.create'), route('admin.visatypes.create'));
});

Breadcrumbs::register('admin.visatypes.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.visatypes.index');
    $breadcrumbs->push(trans('menus.backend.visatypes.edit'), route('admin.visatypes.edit', $id));
});
