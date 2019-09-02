<?php

Breadcrumbs::register('admin.contactuses.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.contactuses.management'), route('admin.contactuses.index'));
});

Breadcrumbs::register('admin.contactuses.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.contactuses.index');
    $breadcrumbs->push(trans('menus.backend.contactuses.create'), route('admin.contactuses.create'));
});

Breadcrumbs::register('admin.contactuses.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.contactuses.index');
    $breadcrumbs->push(trans('menus.backend.contactuses.edit'), route('admin.contactuses.edit', $id));
});
