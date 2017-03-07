<?php

return [

    /*
    | ------------------------------------------------- -------------------------
    |异常语言行
    | ------------------------------------------------- -------------------------
    |
    |在整个系统中抛出的异常中使用以下语言行。
    |无论放在哪里,都可以在这里列出一个按钮,这样很容易
    |发现在一个直观的方式。
    |
    */

    'backend'=> [
        'access'=> [
            'roles'=> [
                'already_exists'=>'该角色已存在。请选择其他名称。',
                'cant_delete_admin'=>'您不能删除管理员角色。',
                'create_error'=>'创建此角色时出现问题。请再试一次。',
                'delete_error'=>'删除此角色时出现问题。请再试一次。',
                'has_users'=>'您无法删除与关联用户的角色。',
                'needs_permission'=>'您必须为此角色至少选择一个权限。',
                'not_found'=>'该角色不存在。',
                'update_error'=>'更新此角色时出现问题。请再试一次。',
            ],

            'users'=> [
                'cant_deactivate_self'=>'你不能这样做自己。',
                'cant_delete_self'=>'你不能删除自己。',
                'create_error'=>'创建此用户时出现问题。请再试一次。',
                'delete_error'=>'删除此用户时出现问题。请再试一次。',
                'email_error'=>'该电子邮件地址属于不同的用户。',
                'mark_error'=>'更新此用户时出现问题。请再试一次。',
                'not_found'=>'该用户不存在。',
                'restore_error'=>'还原此用户时出现问题。请再试一次。',
                'role_needed_create'=>'您必须至少选择一个角色。用户已创建但已停用。',
                'role_needed'=>'您必须至少选择一个角色。',
                'update_error'=>'更新此用户时出现问题。请再试一次。',
                'update_password_error'=>'更改此用户密码时出现问题。请再试一次。',
            ],
        ],
    ],

    'frontend'=> [
        'auth'=> [
            'confirmation'=> [
                'already_confirmed'=>'您的帐户已确认。',
                'confirm'=>'确认您的帐户！',
                'created_confirm'=>'您的帐户已成功创建。我们已向您发送电子邮件以确认您的帐户。',
                'mismatch'=>'您的确认码不匹配。',
                'not_found'=>'该确认码不存在。',
                'resend'=>'您的帐户未确认。请点击您的电子邮件中的确认链接,或<a href="'. route('account.confirm.resend',':user_id')。'">点击此处</a>重新发送确认电子邮件,邮件。',
                'success'=>'您的帐户已成功确认！',
                'resent'=>'新的确认电子邮件已发送到文件上的地址',
            ],

            'deactivated'=>'您的帐户已被停用。',
            'email_taken'=>'该电子邮件地址已被占用',

            'password'=> [
                'change_mismatch'=>'这不是你的旧密码。',
            ],
        ],
    ],
];