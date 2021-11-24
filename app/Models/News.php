<?php

namespace App\Models;

use App\Auth\PostSave;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;

/**
 * @SWG\Definition(
 *      definition="New",
 *      required={"title", "description"},
 *      @SWG\Property(
 *          property="title",
 *          description="title",
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
class News extends Model
{
    //use SoftDeletes;

    use PostSave;
    use HasFactory;
    use HasTranslations;

    public $translatable = ['description','title'];

    public $table = 'news';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'title',
        'description',
        'publication_date'
    ];

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable');
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */

    /**
     * Validation rules
     *
     * @var array
     */
    /*public static $rules = [
        'title_es' => 'required|unique:news,title',
        'title_en' => 'nullable|unique:news,title',
        'image' => 'required|mimes:jpg,png,gif,jpeg|min:1',
        'description_es' => 'required',
        'description_en' => 'nullable'
    ];*/
}
