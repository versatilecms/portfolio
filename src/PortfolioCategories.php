<?php

namespace Versatile\Portfolio;

use Versatile\Core\Traits\Translatable;
use Versatile\Core\Traits\HasRelationships;
use Versatile\Core\Models\BaseModel;

class PortfolioCategories extends BaseModel
{
    use Translatable, HasRelationships;

    protected $table = 'portfolio_categories';

    protected $translatable = ['name', 'slug'];

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
        'name',
        'slug',
        'parent_id',
        'order'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function parentId()
    {
        return $this->belongsTo(self::class);
    }

    public function portfolioId()
    {
        return $this->hasMany('Versatile\Portfolio\Portfolio')
            ->published()
            ->orderBy('created_at', 'DESC');
    }
}
