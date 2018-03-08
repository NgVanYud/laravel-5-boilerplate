<?php
/**
 * Created by PhpStorm.
 * User: duynv
 * Date: 3/7/2018
 * Time: 12:54 AM
 */

namespace App\Repositories\Backend\Post;


use App\Repositories\BaseRepository;
use App\Models\Post;

class PostEloquentRepository extends BaseRepository implements PostContract
{
    public function model()
    {
        return Post::class;
    }

    public function getBySlug($slug) {
        return $this->model->findBySlugOrFail($slug);
    }
}