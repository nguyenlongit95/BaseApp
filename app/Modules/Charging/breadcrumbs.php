<?php

Breadcrumbs::for('taythecham', function ($trail) {
    $trail->parent('home');
    $trail->push('Tẩy thẻ chậm', route('frontend.pages.taythecham'));
});