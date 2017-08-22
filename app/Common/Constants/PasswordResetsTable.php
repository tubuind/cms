<?php

namespace App\Common\Constants;

class PasswordResetsTable{
    const TABLE_NAME = 'password_resets';
    const FLD_EMAIL = 'email';
    const FLD_TOKEN = 'token';
    const FLD_CREATED_AT = 'created_at';
}