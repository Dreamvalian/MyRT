<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;

    protected $table = 'report';
    protected $primaryKey = 'report_id';
    protected $keyType = 'string';
    protected $fillable = [
        'report_id','type_report', 'title','description', 'date_start','date_end', 'picture', 'user_id','status'
    ];
}
