<?php

Breadcrumbs::register('admin.evisacountries.index', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.dashboard');
    $breadcrumbs->push(trans('menus.backend.evisacountries.management'), route('admin.evisacountries.index'));
});

Breadcrumbs::register('admin.evisacountries.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.evisacountries.index');
    $breadcrumbs->push(trans('menus.backend.evisacountries.create'), route('admin.evisacountries.create'));
});

Breadcrumbs::register('admin.evisacountries.edit', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.evisacountries.index');
    $breadcrumbs->push(trans('menus.backend.evisacountries.edit'), route('admin.evisacountries.edit', $id));
});
