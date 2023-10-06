<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Spatie\Tags\HasTags;

class BaiViet extends Model implements Feedable, HasMedia
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;
    use HasSlug, HasTags, LogsActivity;
    use InteractsWithMedia;
    use HasSEO, SoftDeletes;

    protected $table = 'ngkhoa_baiviet';
    public $timestamps = true;
    
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'title',
        'content',
        'category_id',
        'author_id',
        'date',
        'published',
		'user_id',
        'created_at',
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
            ->slugsShouldBeNoLongerThan(254);
    }
    /* Activity Log */
    public function getDescriptionForEvent(string $eventName) : string {
        return "A article have been {$eventName}";
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName('news')
            ->dontLogIfAttributesChangedOnly(['updated_at'])
            ->logOnlyDirty();
    }
    /* Media Library */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(160)
            ->height(120)
            ->sharpen(10);

        $this
            ->addMediaConversion('preview')
            ->performOnCollections('article')
            ->width(800)
            ->height(600)
            //->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued()
            ->withResponsiveImages();
    }
    
    /* Article Feed */
    public function toFeedItem(): FeedItem
    {
        return FeedItem::create([
            'id' => $this->id,
            'title' => $this->title,
            'summary' => $this->content,
            'updated' => $this->updated_at,
            'link' => '/bai-viet/'.$this->id,
            'authorName' => config('app.name'),
        ]);
    }
    
    public static function getFeedItems()
    {
        return BaiViet::published()->where('is_deleted', 0)->get();
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
