<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // Constantes
    const PUBLISHED = 1;
    const PENDING   = 2;
    const REJECTED  = 3;
}
