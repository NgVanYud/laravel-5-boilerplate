<?php
/**
 * Created by PhpStorm.
 * User: duynv
 * Date: 3/8/2018
 * Time: 1:29 AM
 */
namespace App\Models\Traits\Post;

trait PostMethod {
    public function isActived() {
        return !($this->is_active == 0);
    }
}