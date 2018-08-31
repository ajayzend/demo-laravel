<?php

Breadcrumbs::register('admin.education.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.education.management'), route('admin.education.index'));
});

Breadcrumbs::register('admin.education.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.education.index');
    $breadcrumbs->push(trans('menus.backend.education.create'), route('admin.education.create'));
});

Breadcrumbs::register('admin.education.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.education.index');
    $breadcrumbs->push(trans('menus.backend.education.edit'), route('admin.education.edit', $id));
});
