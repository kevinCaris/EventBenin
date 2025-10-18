<?php
namespace App\Enums;

enum StatusAvailabilityEnum:string {

    case AVAILABLE = 'disponible';
    case RESERVED = 'réservé';
    case CLOSED = 'fermé';

}
