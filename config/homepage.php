<?php

return [
    [
        'style_type' => 'slider',
        'key' => 'group_id',
        'value' => 1
    ],
    [
        'style_type' => 'user_action',
        'icon' => 'tasks',
        'icon_url' => '/storage/upload/icons/checklist.png',
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
        'style_type' => 'banner',
        'key' => 'id',
        'value' => 2,
        'title' => 'فیتامین',
        'action_type' => 'fitamin',
        'action' => '/fitamin/landing'
    ],
    [
        'style_type' => 'product_category',
        'category_id' => 3,
        'product_ids' => [3, 4],
        'action_type' => 'link',
        'action' => 'shop/category'
    ],
];
