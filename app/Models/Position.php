<?php

namespace App\Models;

use App\Auth\PostSave;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * @SWG\Definition(
 *      definition="Position",
 *      required={"name"},
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Position extends Model
{
    //use SoftDeletes;
    use PostSave;
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    public $table = 'positions';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string'
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

}
