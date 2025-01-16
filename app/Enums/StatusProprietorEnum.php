<?php

namespace App\Enums;

enum StatusProprietorEnum: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
