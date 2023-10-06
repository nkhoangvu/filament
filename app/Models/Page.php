<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Page extends Model
{
    use HasSEO, HasSlug, SoftDeletes;

    protected $table = 'pages';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title', 
        'header',
        'intro',
        'published',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    
    }    

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->slugsShouldBeNoLongerThan(254)
            ->doNotGenerateSlugsOnUpdate();
    }

    public function paragraphs()
    {
        return $this->HasMany(Paragraph::class, 'page_id');
    }
}
