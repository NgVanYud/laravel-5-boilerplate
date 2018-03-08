<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;
use Conner\Tagging\Taggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use App\Models\Traits\Post\PostAttribute;
use App\Models\Traits\Post\PostMethod;
use App\Models\Auth\User;

class Post extends Model
{
    use Sluggable;
    use Taggable;
    use SluggableScopeHelpers;
    use PostAttribute;
    use PostMethod;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'sourse' => 'title',
                'unique' => true,
                'onUpdate' => true
            ]
        ];
    }


    protected $table = 'posts';
    protected $fillable = [
      'title',
      'content',
      'user_id',
      'ava_path',
      'views',
      'slug',
      'is_active',
      'is_public',
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_post', 'post_id', 'cate_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
