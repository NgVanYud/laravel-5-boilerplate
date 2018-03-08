<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\Backend\Post\PostContract;
use App\Repositories\Backend\Category\CategoryContract;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    protected $post;
    protected $category;

    public function __construct(PostContract $post, CategoryContract $category)
    {
        $this->post = $post;
        $this->category = $category;
    }

    public function index() {
        $posts =  $this->post->where('user_id', auth()->user()->id)->with('categories', 'user')->orderBy('title', 'asc')->paginate(10);
        return view('frontend.posts.index', ['posts' => $posts]);
    }

    public function create() {

    }

    public function save() {

    }

    public function destroy() {

    }

    public function update() {

    }
}
