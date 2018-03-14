<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Post\PostContract;
use App\Repositories\Backend\Category\CategoryContract;
use App\Models\Auth\User;
use Illuminate\Support\Facades\DB;

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
        $posts =  $this->post->with('categories', 'user')->orderBy('title', 'asc')->paginate(10);
        return view('backend.posts.index', ['posts' => $posts]);
    }

    public function create() {
        $data  = [];
        $cate = $this->category->all();
        $data['categories'] = $cate;
        return view('backend.posts.create', $data);
    }

    public function add() {

    }

    public function store(Request $request) {
        $img = $request->file('avatar');
        $img_path = $img->move(public_path('img/post'), $img->getClientOriginalName())->getRealPath();
        $post = $this->post->create([
           'title' => $request->title,
           'content' => $request->summary,
           'ava_path' => $img_path,
           'user_id' => auth()->user()->id,
        ]);

        $post = $post->refresh();
        $post->categories()->attach($request->category);
        return redirect()->route('backend.post.index')->withFlashSuccess(__('alerts.backend.posts.created'));
    }

    public function changeStatus($slug) {
        $post = $this->post->getBySlug($slug);
        if($post->isActived()) {
            $this->post->updateById($post->id, ['is_active' => 0]);
            return redirect()->route('backend.post.index')->withFlashSuccess(__('alerts.backend.posts.deactivated'));
        } else {
            $this->post->updateById($post->id, ['is_active' => 1]);
            return redirect()->route('backend.post.index')->withFlashSuccess(__('alerts.backend.posts.activated'));
        }

    }

    public function edit($slug) {
        $post = $this->post->getBySlug($slug);
        $categories = $this->category->all();
        return view('backend.posts.edit', ['post' => $post, 'categories' => $categories]);
    }

    public function save($slug) {

    }

    public function update($slug, Request $request) {
        $post = $this->post->getBySlug($slug);
        \DB::beginTransaction();
        $img = $request->file('avatar');
        $img_path = $img->move('/img/post', $img->getClientOriginalName())->getRealPath();
        $post = $this->post->updateById($post->id, [
            'title' => $request->title,
            'content' => $request->summary,
            'ava_path' => $img_path,
            'user_id' => auth()->user()->id,
        ]);

        $post = $post->refresh();
        $post->categories()->detach();
        $post->refresh();
        $post->categories()->attach($request->category);
        \DB::commit();
        return redirect()->route('backend.post.index')->withFlashSuccess(__('alerts.backend.posts.updated'));
    }

    public function destroy() {

    }

}
