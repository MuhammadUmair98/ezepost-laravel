<?php

namespace App\Enums;

class UserType
{
    const TYPE_ADMIN = 'admin';

    const TYPE_CUSTOMER = 'customer';

    const ALL = [self::TYPE_ADMIN, self::TYPE_CUSTOMER];
}
