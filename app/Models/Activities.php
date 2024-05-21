<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    protected $primaryKey = 'activity_id';
    protected $fillable = [
        'title', 'description', 'date_start', 'date_end', 'picture',
    ];
}
