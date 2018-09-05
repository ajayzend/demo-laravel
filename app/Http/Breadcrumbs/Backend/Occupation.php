<?php

Breadcrumbs::register('admin.occupations.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.occupations.management'), route('admin.occupations.index'));
});

Breadcrumbs::register('admin.occupations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.occupations.index');
    $breadcrumbs->push(trans('menus.backend.occupations.create'), route('admin.occupations.create'));
});

Breadcrumbs::register('admin.occupations.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.occupations.index');
    $breadcrumbs->push(trans('menus.backend.occupations.edit'), route('admin.occupations.edit', $id));
});
