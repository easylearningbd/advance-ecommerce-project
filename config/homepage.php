<?php

return [
    [
        'style_type' => 'slider',
        'key' => 'group_id',
        'value' => 1
    ],
    [
        'style_type' => 'user_action',
        'title' => 'سفارشات من',
        'action_type' => 'link',
        'action' => 'shop/myorders'
    ],
    [
        'style_type' => 'product_category',
        'category_id' => 1,
        'product_ids' => [1, 2],
        'action_type' => 'link',
        'action' => 'shop/category'
    ],
    [
        'style_type' => 'slider',
        'key' => 'group_id',
        'value' => 2,
        'title' => 'فیتامین',
        'action_type' => 'fitamin',
        'action' => '/fitamin/landing'
    ],
];
