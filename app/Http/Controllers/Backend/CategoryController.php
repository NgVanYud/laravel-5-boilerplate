<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Category\CategoryContract;
use App\Models\Category;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryContract $category)
    {
        $this->category = $category;
    }

    public function index() {
        $all_cate = $this->category->orderBy('slug', 'asc')->paginate(25);
        return view('backend.categories.index', ['categories' => $all_cate]);
    }

    public function create() {
        return view('backend.categories.create');
    }

    public function store(Request $request) {
        $this->category->create($request->only('title'));
        return redirect()->route('backend.category.index')->withFlashSuccess(__('alerts.backend.categories.created'));
    }

    public function edit($slug) {
        $cate = $this->category->getBySlug($slug);
        return view('backend.categories.edit', ['category' => $cate]);
    }

    public function update($slug, Request $request) {
        $cate = $this->category->getBySlug($slug);
        $this->category->updateById($cate->id, $request->only('title'));
        return redirect()->route('backend.category.index')->withFlashSuccess(__('alerts.backend.categories.updated'));
    }

    public function destroy($slug, Request $request) {
        $cate = $this->category->getBySlug($slug);
        $cate->softDeletes();
        return redirect()->route('backend.category.index')->withFlashSuccess(__('alerts.backend.categories.deleted'));
    }

    public function changeStatus($slug) {
        $cate = $this->category->getBySlug($slug);
        if($cate->isActived()) {
            $this->category->updateById($cate->id, ['is_active' => 0]);
            return redirect()->route('backend.category.index')->withFlashSuccess(__('alerts.backend.categories.deactivated'));
        } else {
            $this->category->updateById($cate->id, ['is_active' => 1]);
            return redirect()->route('backend.category.index')->withFlashSuccess(__('alerts.backend.categories.activated'));
        }
    }
}
