<?php
/**
 * Created by PhpStorm.
 * User: duynv
 * Date: 3/7/2018
 * Time: 11:27 PM
 */
namespace App\Models\Traits\Category;

trait CategoryMethod {

    /**
     * Check if category is actived
     * @return bool
     */

    public function isActived() {
        return !($this->is_active == 0);
    }
}