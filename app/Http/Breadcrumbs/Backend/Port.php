<?php

Breadcrumbs::register('admin.ports.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.ports.management'), route('admin.ports.index'));
});

Breadcrumbs::register('admin.ports.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.ports.index');
    $breadcrumbs->push(trans('menus.backend.ports.create'), route('admin.ports.create'));
});

Breadcrumbs::register('admin.ports.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.ports.index');
    $breadcrumbs->push(trans('menus.backend.ports.edit'), route('admin.ports.edit', $id));
});
