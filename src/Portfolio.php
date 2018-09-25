<?php

namespace Versatile\Portfolio;

use Versatile\Core\Traits\Translatable;
use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Versatile\Core\Models\BaseModel;

class Portfolio extends BaseModel
{
    use Translatable, Searchable;

    const PUBLISHED = 'PUBLISHED';

    public $asYouType = false;

    protected $table = 'portfolio';

    protected $translatable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'testimonial',
        'meta_title',
        'meta_description'
    ];

    /**
     * Get the indexed data array for the model.
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        // customise the searchable array
        return $array;
    }

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'status',
        'featured',
        'category_id',
        'image',
        'excerpt',
        'body',
        'testimonial',
        'testimonial_author',
        'meta_title',
        'meta_description'
    ];

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categoryId()
    {
        return $this->belongsTo('Versatile\Portfolio\PortfolioCategories');
    }
}
