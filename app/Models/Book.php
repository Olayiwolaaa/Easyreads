<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media as ModelsMedia;

class Book extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'author_id',
        'init_price',
        'discount_price',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function coupon()
    {
        return $this->hasMany(Coupon::class);
    }

    // public function getDiscountRateAttribute()
    // {
    //     return round((($this->init_price - $this->discount_price)*100)/$this->init_price);
    // }

    public function discountRate(): Attribute
    {
        return new Attribute(
            get : fn ($value) => ((($this->init_price - $this->discount_price)*100)/$this->init_price),
            set : fn ($value) => (($this->init_price * $this->discount_rate)/100),
        );
    }

    public function registerMediaConversions(?ModelsMedia $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }
}
