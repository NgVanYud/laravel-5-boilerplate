<?php
/**
 * Created by PhpStorm.
 * User: duynv
 * Date: 3/7/2018
 * Time: 9:33 PM
 */

namespace App\Repositories\Backend\Category;


use App\Repositories\BaseRepository;
use App\Models\Category;

class CategoryEloquentRepository extends BaseRepository implements CategoryContract
{
    public function model()
    {
        return Category::class;
    }

    public function getBySlug($slug) {
        return $this->model->findBySlugOrFail($slug);
    }

}