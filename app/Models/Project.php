<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    const STATUS_PLANNED = 0;
    const STATUS_RUNNING = 1;
    const STATUS_ON_HOLD = 2;
    const STATUS_FINISHED = 3;
    const STATUS_CANCEL = 4;
}
