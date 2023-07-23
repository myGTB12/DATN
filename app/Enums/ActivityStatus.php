<?php

namespace App\Enums;

enum ActivityStatus: int
{
    case REGISTER = 2;
    case ACTIVE = 1;
    case INACTIVE = 0;
}
