<?php

namespace App\Models;

use App\Auth\PostSave;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerTitle extends Model
{
    use HasFactory;
    use PostSave;

    protected $fillable = ['id','amount','title_id','player_id'];

    protected $table = 'players_titles';
    protected $primaryKey = 'id';

    function title()
    {
        return $this->belongsTo(Title::class, 'title_id');
    }
}
