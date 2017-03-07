<?php

return [

    /*
    | ------------------------------------------------- -------------------------
    |字符串语言行
    | ------------------------------------------------- -------------------------
    |
    |在整个系统的字符串中使用以下语言行。
    |无论放在哪里,都可以在这里列出一个字符串,这样很容易
    |发现在一个直观的方式。
    |
    */

    'backend'=> [
        'access'=> [
            'users'=> [
                'delete_user_confirm'=>'您确定要永久删除这位使用者吗？引用此用户ID的应用程序中的任何地方都很可能是错误。继续需要您自担风险。这不能被撤消。',
                'if_confirmed_off'=>'（如果确认已关闭）',
                'restore_user_confirm'=>'将此用户恢复到其原始状态？',
            ],
        ],

        'dashboard'=> [
            'title'=>'管理仪表板',
            'welcome'=>'欢迎',
        ],

        'general'=> [
            'all_rights_reserved'=>'保留所有权利。',
            'are_you_sure'=>'你确定吗？',
            'boilerplate_link'=>'Laravel 5 Boilerplate',
            'continue'=>'继续',
            'member_since'=>'会员自',
            'minutes'=>'分钟',
            'search_placeholder'=>'搜索...',
            'timeout'=>'您因为没有活动而被自动注销为了安全原因',

            'see_all'=> [
                'messages'=>'查看所有邮件',
                'notifications'=>'查看全部',
                'tasks'=>'查看所有任务',
            ],

            'status'=> [
                'online'=>'在线',
                'offline'=>'离线',
            ],

            'you_have'=> [
                'messages'=>'{0}您没有消息| {1}您有1个消息| [2,Inf]您有:number 条消息',
                'notifications'=>'{0}您没有通知| {1}您有1个通知| [2,Inf]您有:number 个通知',
                'tasks'=>'{0}你没有任务| {1}你有1个任务| [2,Inf]你有:number 个任务',
            ],
        ],
    ],

    'emails'=> [
        'auth'=> [
            'password_reset_subject'=>'您的密码重置链接',
            'reset_password'=>'点击这里重置密码',
        ],
    ],

    'frontend'=> [
        'email'=> [
            'confirm_account'=>'点击此处确认您的帐户:',
        ],

        'test'=>'测试',

        'tests'=> [
            'based_on'=> [
                'permission'=>'基于权限 - ',
                'role'=>'基于角色 - ',
            ],

            'js_injected_from_controller'=>'从控制器注入Javascript',

            'using_blade_extensions'=>'使用刀片式扩展',

            'use_access_helper'=> [
                'array_permissions'=>'使用访问助手与数组的权限名称或ID 用户必须拥有所有。',
                'array_permissions_not'=>'使用访问助手与数组的权限名称或ID 用户不必拥有所有。',
                'array_roles'=>'使用访问助手与角色名称或ID的数组,用户必须拥有所有。',
                'array_roles_not'=>'使用访问助手与角色名称或ID的数组,用户不必拥有所有。',
                'permission_id'=>'使用具有权限ID的访问助手',
                'permission_name'=>'使用访问助手与权限名称',
                'role_id'=>'使用具有角色ID的访问助手',
                'role_name'=>'使用访问助手与角色名称',
            ],

            'view_console_it_works'=>'查看控制台,你应该看到它工作！这是来自FrontendController@index',
            'you_can_see_because'=>'你可以看到这个,因为你有角色 :role！',
            'you_can_see_because_permission'=>'您可以看到这一点,因为您有 :permission ！的权限',
        ],

        'user'=> [
            'profile_updated'=>'个人资料已成功更新。',
            'password_updated'=>'密码已成功更新。',
        ],

        'welcome_to'=>'欢迎来到 :place ',
    ],
];