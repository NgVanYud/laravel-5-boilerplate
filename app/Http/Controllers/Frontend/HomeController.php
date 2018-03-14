<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryContract;
use App\Repositories\Backend\Post\PostContract;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{

    protected $category;
    protected $post;

    public function __construct(CategoryContract $category, PostContract $post)
    {
        $this->category = $category;
        $this->post = $post;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $data = [];
        $data['categoris'] = $this->category->orderBy('created_at', 'asc')->get();
        $data['posts'] = $this->post->orderBy('created_at', 'asc')->paginate(5);
        return view('frontend.index', $data);
    }
}
