<?php

Breadcrumbs::for('autocharging', function ($trail) {
    $trail->parent('home');
    $trail->push('Tẩy thẻ nhanh', route('frontend.pages.taythenhanh'));
});
