<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', route('home'));
});

