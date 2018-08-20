<?php
Breadcrumbs::for('napcham', function ($trail) {
    $trail->parent('home');
    $trail->push('Nạp chậm', route('frontend.page.napchamindex'));
});