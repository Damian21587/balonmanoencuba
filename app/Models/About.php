<?php

namespace App\Models;

use App\Auth\PostSave;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * @SWG\Definition(
 *      definition="About",
 *      required={"image", "description"},
 *      @SWG\Property(
 *          property="image",
 *          description="image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
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
class About extends Model
{
    //use SoftDeletes;
    use PostSave;
    use HasFactory;
    use HasTranslations;

    public $translatable = ['description'];

    public $table = 'abouts';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'description'
    ];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }

    /**
     * Validation rules
     *
     * @var array
     */
   /* public static  $rules = [
        'image' => 'required|mimes:jpg,png,gif,jpeg|min:1',
        'description_es' => 'required',
        'description_en' => 'nullable'
    ];

    public static $attributes = [
        'image' => 'imagen',
        'description_es' => 'Descripción',
        'description_en' => 'Descripción',
    ];*/
}
