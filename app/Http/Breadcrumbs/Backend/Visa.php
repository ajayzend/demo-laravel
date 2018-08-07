<?php

Breadcrumbs::register('admin.visas.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.visas.management'), route('admin.visas.index'));
});

Breadcrumbs::register('admin.visas.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.visas.index');
    $breadcrumbs->push(trans('menus.backend.visas.create'), route('admin.visas.create'));
});

Breadcrumbs::register('admin.visas.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.visas.index');
    $breadcrumbs->push(trans('menus.backend.visas.edit'), route('admin.visas.edit', $id));
});
