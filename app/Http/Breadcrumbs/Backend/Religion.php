<?php

Breadcrumbs::register('admin.religions.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.religions.management'), route('admin.religions.index'));
});

Breadcrumbs::register('admin.religions.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.religions.index');
    $breadcrumbs->push(trans('menus.backend.religions.create'), route('admin.religions.create'));
});

Breadcrumbs::register('admin.religions.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.religions.index');
    $breadcrumbs->push(trans('menus.backend.religions.edit'), route('admin.religions.edit', $id));
});
