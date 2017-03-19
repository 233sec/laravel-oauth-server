<?php

return [

    /*
    | ------------------------------------------------- -------------------------
    | 验证语言行
    | ------------------------------------------------- -------------------------
    |
    | 以下语言行包含使用的默认错误消息
    | 验证器类。其中一些规则有多个版本
    | 作为大小规则。请随时在这里调整每个消息。
    |
    */

    'accepted'=>'属性必须被接受。',
    'active_url'=>' :attribute 不是有效的URL。',
    'after'=>':attribute 必须是一个在 :date 之后的日期。',
    'alpha'=>' :attribute 只能包含字母。',
    'alpha_dash'=>' :attribute 只能包含字母,数字和破折号。',
    'alpha_num'=>' :attribute 只能包含字母和数字。',
    'array'=>' :attribute 必须是数组。',
    'before'=>':attribute 必须是在 :date 之前的日期。',
    'between'=> [
        'numeric'=>' :attribute 必须介于 :min 和 :max 之间。',
        'file'=>' :attribute 必须介于 :min 和 :max KB 之间。',
        'string'=>' :attribute 必须介于 :min 和 :max 字数。',
        'array'=>' :attribute 必须介于 :min 和 :max 项目数。',
    ],
    'boolean'=>' :attribute 字段必须为true或false。',
    'confirmed'=>' :attribute 确认不匹配。',
    'date'=>' :attribute 不是有效的日期',
    'date_format'=>' :attribute 不匹配格式 :format。',
    'different'=>' :attribute 和 :other 必须不同。',
    'digits'=>' :attribute 必须是 :digits digits。',
    'digits_between'=>':attribute 必须介于 :min和 :max 位数。',
    'dimensions'=>' :attribute 具有无效的图片尺寸。',
    'distinct'=>' :attribute 字段有一个重复的值。',
    'email'=>' :attribute 必须是有效的电子邮件地址。',
    'exists'=>'所选 :attribute 无效。',
    'file'=>' :attribute 必须是一个文件。',
    'filled'=>' :attribute 字段是必需的',
    'image'=>' :attribute 必须是图片。',
    'in'=>'所选 :attribute 无效。',
    'in_array'=>' :attribute 字段不存在于 :other。',
    'integer'=>' :attribute 必须是整数。',
    'ip'=>' :attribute 必须是有效的IP地址。',
    'json'=>' :attribute 必须是有效的JSON字符串。',
    'max'=> [
        'numeric'=>':attribute 不能大于 :max。',
        'file'=>' :attribute 不能大于 :max kilobytes。',
        'string'=>' :attribute 不能大于 :max characters。',
        'array'=>' :attribute 不能超过 :max items。',
    ],
    'mimes'=>' :attribute 必须是一个类型为 :values 的文件。',
    'min'=> [
        'numeric'=>' :attribute 必须至少为 :min。',
        'file'=>' :attribute 必须至少为 :min kilobytes。',
        'string'=>' :attribute 必须至少为 :min个字符。',
        'array'=>' :attribute 必须至少有 :min项。',
    ],
    'not_in'=>'所选 :attribute 无效。',
    'numeric'=>' :attribute 必须是数字。',
    'present'=>' :attribute 字段必须存在。',
    'regex'=>' :attribute 格式无效。',
    'required'=>' :attribute 字段是必需的。',
    'required_if'=>' :attribute 字段是必需的 :other is :value。',
    'required_unless'=>' :attribute 字段是必需的,除非 :other在 :values。',
    'required_with'=>'当存在时,需要 :attribute 字段。',
    'required_with_all'=>' :attribute 字段是必需的 :values 存在。',
    'required_without'=>' :attribute 字段是必需的 :values 不存在。',
    'required_without_all'=>'当没有任何值时,需要 :attribute 字段。',
    'same'=>' :attribute 和 :other 必须匹配。',
    'size'=> [
        'numeric'=>' :attribute 必须是 :size。',
        'file'=>' :attribute 必须是 :size KB。',
        'string'=>' :attribute 必须是 :size 字符。',
        'array'=>' :attribute 必须包含 :size 项数。',
    ],
    'string'=>' :attribute 必须是字符串。',
    'timezone'=>' :attribute 必须是有效的区域。',
    'unique'=>' :属性已经被采用。',
    'url'=>' :属性格式无效。',

    /*
    | ------------------------------------------------- -------------------------
    | 自定义验证语言行
    | ------------------------------------------------- -------------------------
    | 
    | 在这里您可以使用指定属性的自定义验证消息
    | 约定“attribute.rule”命名行。这使它很快
    | 为给定的属性规则指定特定的自定义语言行。
    | 
    */

    'custom'=> [
        'attribute-name'=> [
            'rule-name'=>'custom-message',
        ],
    ],

    /*
    | ------------------------------------------------- -------------------------
    | 自定义验证属性
    | ------------------------------------------------- -------------------------
    | 
    | 以下语言行用于交换属性占位符
    | 与更友好的阅读器,如电子邮件地址
    | 的“电子邮件”。这只是帮助我们使消息更清洁。
    |
    */

    'attributes'=> [

        'backend'=> [
            'access'=> [
                'permissions'=> [
                    'associated_roles'=>'相关角色',
                    'dependencies'=>'依赖关系',
                    'display_name'=>'显示名称',
                    'group'=>'群组',
                    'group_sort'=>'组排序',

                    'groups'=> [
                        'name'=>'组名称',
                    ],

                    'name'=>'名称',
                    'system'=>'系统？',
                ],

                'roles'=> [
                    'associated_permissions'=>'相关权限',
                    'name'=>'名称',
                    'sort'=>'排序',
                ],

                'users'=> [
                    'active'=>'活动',
                    'associated_roles'=>'相关角色',
                    'confirmed'=>'确认',
                    'email'=>'电子邮件地址',
                    'name'=>'名称',
                    'other_permissions'=>'其他权限',
                    'password'=>'密码',
                    'password_confirmation'=>'密码确认',
                    'send_confirmation_email'=>'发送确认电子邮件',
                ],
            ],
        ],

        'frontend'=> [
            'username'=>'用户名',
            'email'=>'邮箱',
            'name'=>'名称',
            'password'=>'密码',
            'password_confirmation'=>'确认',
            'old_password'=>'旧密码',
            'new_password'=>'新密码',
            'new_password_confirmation'=>'确认',
        ],
    ],

];
