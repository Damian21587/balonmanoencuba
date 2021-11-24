<?php

namespace App\Models;

use App\Auth\PostSave;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * @SWG\Definition(
 *      definition="Player",
 *      required={"name", "measure", "weigth", "years_experience", "image"},
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="measure",
 *          description="measure",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="weigth",
 *          description="weigth",
 *          type="number",
 *          format="number"
 *      ),
 *      @SWG\Property(
 *          property="years_experience",
 *          description="years_experience",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="image",
 *          description="image",
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
class Player extends Model
{
    //use SoftDeletes;
    use PostSave;
    use HasFactory;
    use HasTranslations;

    public $table = 'players';

    public $translatable = ['about_player'];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'province_id',
        'about_player',
        'measure',
        'weigth',
        'years_experience',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'measure' => 'double',
        'weigth' => 'double',
        'years_experience' => 'integer',
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class,
            'players_positions');
    }

    public function player_titles()
    {
        return $this->hasMany(PlayerTitle::class);
    }

    function provincia()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }

    /**
     * Validation rules
     *
     * @var array
     */
    /*public static $rules = [
        'name' => 'required',
        'measure' => 'required|numeric',
        'weigth' => 'required|numeric',
        'years_experience' => 'required|integer',
        'image' => 'required||mimes:jpg,png,gif,jpeg|min:1'
    ];*/


}
