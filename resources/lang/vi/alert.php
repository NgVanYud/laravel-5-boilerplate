<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Alert Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain alert messages for various scenarios
    | during CRUD operations. You are free to modify these language lines
    | according to your application's requirements.
    |
    */

    'backend' => [
        'roles' => [
            'created' => 'Tạo thành công role',
            'deleted' => 'Xóa thành công role',
            'updated' => 'Chỉnh sửa role thành công',
        ],

        'users' => [
            'cant_resend_confirmation' => 'Ứng dụng hiện tại đang thiết lập phê duyệt user bằng tay.',
            'confirmation_email'  => 'Một email xác thực sẽ được gửi tới địa chỉ trong file',
            'confirmed'              => 'Xác thực người dùng thành công.',
            'created'             => 'Tạo user thành công.',
            'deleted'             => 'Xóa user thành công',
            'deleted_permanently' => 'Xóa vĩnh viễn người dùng.',
            'restored'            => 'The user was successfully restored.',
            'session_cleared'      => "The user's session was successfully cleared.",
            'social_deleted' => 'Social Account Successfully Removed',
            'unconfirmed' => 'The user was successfully un-confirmed',
            'updated'             => 'The user was successfully updated.',
            'updated_password'    => "The user's password was successfully updated.",
        ],
    ],

    'frontend' => [
        'contact' => [
            'sent' => 'Your information was successfully sent. We will respond back to the e-mail provided as soon as we can.',
        ],
    ],
];
