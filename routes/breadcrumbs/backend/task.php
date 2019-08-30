<?php

Breadcrumbs::for('admin.task.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push(__('Tasks Management'), route('admin.task.index'));
});

Breadcrumbs::for('admin.task.show', function ($trail, $task) {
    $trail->parent('admin.task.index');
    $trail->push(__('Tasks Management'), route('admin.task.show', $task));
});

Breadcrumbs::for('admin.task.create', function ($trail) {
    $trail->parent('admin.task.index');
    $trail->push(__('Create Task'), route('admin.task.create'));
});

Breadcrumbs::for('admin.task.edit', function ($trail, $task) {
    $trail->parent('admin.task.index');
    $trail->push(__('Edit Task'), route('admin.task.edit', $task));
});