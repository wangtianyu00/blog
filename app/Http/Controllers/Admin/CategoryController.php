<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCategory;
use App\Http\Controllers\Controller;
use App\Category;
use App\Article;


class CategoryController extends Controller
{
    protected $category;

    // 首页
    public function index()
    {
        $categories = Category::all();
        return view('/admin/category', compact('categories'));
    }

    // 处理post请求
    public function new_category(StoreCategory $request)
    {
        if (request('id') > 0) {
            // 更新逻辑
            $category = Category::where('id', '=', request('id'))->first();
            $category->name = request('name');
            $category->slug = request('slug');
            $category->path = '/category/' . request('slug');
            $category->type = request('type');
            $category->save();
            if (request('father') == 0){
                $category->parent_id = 0;
            } else {
                $father = Category::where('id', '=', request('father'));
                $category->makeChildOf(request('father'));
            }
            return redirect()->to('admin/category');
        }  else {
            if (Category::roots()->count() >= 7)
            {
                return redirect()->to('admin/category');
            }
            $category = Category::create([
                'name' => request('name'),
                'slug' => request('slug'),
                'path' => '/category/'. request('slug'),
                'type' => request('type')
            ]);
            if (request('father') == 0){
                $category->parent_id = null;
                $category->save();
            } else {
                $father = Category::where('id', '=', request('father'));
                $category->makeChildOf(request('father'));
            }
            return redirect()->to('admin/category');
        }
    }

    // 删除目录
    public function del_category()
    {
        $category = Category::Where('id', '=', request('id'))->first();
        if ($category['name'] == '日志' || $category['name']=='分类'){
            return redirect()->to('admin/category');
        }
        if ((Category::where('parent_id', '=', request('id'))->count()>0) ||
            (Article::where('category_id', '=', request('id'))->count() > 0))
        {
            return redirect()->to('admin/category');
        }
        $category->delete();
        return redirect()->to('admin/category');
    }

    public function get_item()
    {
        $category = Category::where('id', '=', request('id'))->first();
        if ($category['name'] == '日志' || $category['name'] == '分类') {
        }
        return response()->json($category);
    }
}
