<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitCount extends Model
{
    use HasFactory;

    public $table = 'visit_counts';

    public $fillable = [
        'page',
        'session_id'
    ];
}
