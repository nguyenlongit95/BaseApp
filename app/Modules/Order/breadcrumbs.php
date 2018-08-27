<?php
Breadcrumbs::for('napnhanh', function ($trail) {
    $trail->parent('home');
    $trail->push('Nạp nhanh', route('frontend.page.napnhanhindex'));
});
