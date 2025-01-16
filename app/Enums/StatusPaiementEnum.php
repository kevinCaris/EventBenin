<?php

namespace App\Enums;

enum StatusPaiementEnum: string
{
   case PENDING = "pending";
   case COMPLETED= "completed";
   case FAILED = "failed";
   case REFUNDED= "refunded";
   case Canceled = "canceled";
   case SUSPENDED = "suspended";
   case EXPIRED = "expired";

}
