<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function setEnglish()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'english');
        return redirect()->back();
    }

    public function setArabic()
    {
        Session::get('lang');
        Session()->forget('lang');
        Session()->put('lang', 'arablic');
        return redirect()->back();
    }

    public function categoryPosts($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => "This category doesn't exist"
            ]);
        }
        $posts = Post::where('category_id', $id)->orderBy('views', 'desc')->paginate(4);
        return view('categoryposts', compact('posts', 'category'));
    }
    public function subcategoryPosts($id)
    {
        $subcategory = SubCategory::find($id);
        if (!$subcategory) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => "This subcategory doesn't exist"
            ]);
        }
        $posts = Post::where('subcategory_id', $id)->orderBy('views', 'desc')->paginate(4);
        return view('subcategoryposts', compact('posts', 'subcategory'));
    }
}
