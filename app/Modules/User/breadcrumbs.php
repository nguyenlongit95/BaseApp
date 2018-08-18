<?php

Breadcrumbs::for('userpanel', function ($trail) {
    $trail->parent('home');
    $trail->push('Bảng điều khiển', route('user.profile'));
});

Breadcrumbs::for('wallet', function ($trail) {
    $trail->parent('userpanel');
    $trail->push('Ví điện tử', route('user.wallet'));
});

Breadcrumbs::for('wtransaction', function ($trail) {
    $trail->parent('userpanel');
    $trail->push('Lịch sử ví', route('wallet.transaction'));
});

Breadcrumbs::for('changepass', function ($trail) {
    $trail->parent('userpanel');
    $trail->push('Đổi mật khẩu', route('user.changepassword'));
});

Breadcrumbs::for('localbank', function ($trail) {
    $trail->parent('userpanel');
    $trail->push('Tài khoản ngân hàng', route('user.localbank'));
});