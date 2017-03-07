<?php

return [

    /*
    | ------------------------------------------------- -------------------------
    |标签语言行
    | ------------------------------------------------- -------------------------
    |
    |在整个系统的标签中使用以下语言行。
    |无论放置在哪里,都可以在这里列出一个标签,这样很容易
    |发现在一个直观的方式。
    |
    */

    'general'=> [
        'all'=>'全部',
        'yes'=>'是',
        'no'=>'否',
        'custom'=>'自定义',
        'actions'=>'动作',
        'buttons'=> [
            'save'=>'保存',
            'update'=>'更新',
        ],
        'hide'=>'隐藏',
        'none'=>'无',
        'show'=>'显示',
        'toggle_navigation'=>'切换导航',
    ],

    'backend'=> [
        'access'=> [
            'roles'=> [
                'create'=>'创建角色',
                'edit'=>'编辑角色',
                'management'=>'角色管理',

                'table'=> [
                    'number_of_users'=>'用户数',
                    'permissions'=>'权限',
                    'role'=>'角色',
                    'sort'=>'排序',
                    'total'=>'角色总数|角色总数',
                ],
            ],

            'users'=> [
                'active'=>'活动用户',
                'all_permissions'=>'所有权限',
                'change_password'=>'更改密码',
                'change_password_for'=>'更改密码for：user',
                'create'=>'创建用户',
                'deactivated'=>'已停用的用户',
                'deleted'=>'已删除的用户',
                'edit'=>'编辑用户',
                'management'=>'用户管理',
                'no_permissions'=>'无权限',
                'no_roles'=>'无要设置的角色。',
                'permissions'=>'权限',

                'table'=> [
                    'confirmed'=>'确认',
                    'created'=>'创建',
                    'email'=>'电子邮件',
                    'id'=>'ID',
                    'last_updated'=>'最后更新',
                    'name'=>'名称',
                    'no_deactivated'=>'没有停用的用户',
                    'no_deleted'=>'未删除用户',
                    'roles'=>'角色',
                    'total'=>'用户总计| users total',
                ],
            ],
        ],
    ],

    'frontend'=> [

        'auth'=> [
            'login_box_title'=>'登录',
            'login_button'=>'登录',
            'login_with'=>'登录：social_media',
            'register_box_title'=>'注册',
            'register_button'=>'注册',
            'remember_me'=>'记住我',
        ],

        'passwords'=> [
            'forgot_password'=>'忘记密码？',
            'reset_password_box_title'=>'重置密码',
            'reset_password_button'=>'重置密码',
            'send_password_reset_link_button'=>'发送密码重置链接',
        ],

        'macros'=> [
            'country'=> [
                'alpha'=>'国家/地区Alpha代码',
                'alpha2'=>'国家Alpha 2代码',
                'alpha3'=>'国家Alpha 3代码',
                'numeric'=>'国家数字代码',
            ],

            'macro_examples'=>'宏示例',

            'state'=> [
                'mexico'=>'墨西哥州名单',
                'us'=> [
                    'us'=>'美国',
                    'outlying'=>'美国偏远地区',
                    'armed'=>'美国武装部队',
                ],
            ],

            'territories'=> [
                'canada'=>'加拿大省和地区名单',
            ],

            'timezone'=>'时区',
        ],

        'user'=> [
            'passwords'=> [
                'change'=>'更改密码',
            ],

            'profile'=> [
                'avatar'=>'头像',
                'created_at'=>'创建于',
                'edit_information'=>'编辑信息',
                'email'=>'电子邮件',
                'last_updated'=>'最后更新',
                'name'=>'名称',
                'update_information'=>'更新信息',
            ],
        ],

    ],
];