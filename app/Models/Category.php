<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Post;
use App\Models\Traits\Category\CategoryAttribute;
use App\Models\Traits\Category\CategoryMethod;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    use Sluggable;
    use SoftDeletes;
    use CategoryMethod;
    use CategoryAttribute;
    use SluggableScopeHelpers;


    public function sluggable(): array
    {
        return [
            'slug' => [
                'unique' => true,
                'source' => 'title',
                'onUpdate' => true
            ]
        ];
    }


    protected $table = 'categories';

    protected $fillable = [
      'title',
      'is_active',
      'slug',
      'post_counter',
    ];
    protected $dates = ['deleted_at'];

    public function posts() {
        return $this->belongsToMany(Post::class, 'category_post', 'cate_id', 'post_id');
    }
}
