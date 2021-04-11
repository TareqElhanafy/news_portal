<?php

namespace App\Http\Controllers;

use App\Category;
use App\District;
use App\Post;
use App\SubCategory;
use App\SubDistrict;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $posts = Post::where('category_id', $id)->orderBy('views', 'desc')->paginate(1);
        return view('allposts', compact('posts', 'category'));
    }
    public function subcategoryPosts($id)
    {
        $category = SubCategory::find($id);
        if (!$category) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => "This subcategory doesn't exist"
            ]);
        }
        $posts = Post::where('subcategory_id', $id)->orderBy('views', 'desc')->paginate(4);
        return view('allposts', compact('posts', 'category'));
    }

    public function search(Request $request)
    {
        $district_id = $request->district_id;
        $subdistrict_id = $request->subdistrict_id;
        $district = District::find($district_id);
        if (!$district) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => "This district doesn't exist"
            ]);
        }
        $subdistrict = SubDistrict::find($subdistrict_id);
        if (!$subdistrict) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => "This sub district doesn't exist"
            ]);
        }
        $posts = Post::where(['district_id' => $district_id, 'subdistrict_id' => $subdistrict_id])->orderBy('views', 'desc')->paginate(5);


        return view('searchposts', compact('posts'));
    }
    public function searchByDate(Request $request)
    {
        $first_date = $request->start_date;
        $end_date = $request->end_date;
        $posts = DB::table('posts')->where('date', '>=', $first_date)->where('date', '<=', $end_date)->orderBy('views', 'desc')->paginate(5);

        return view('searchposts', compact('posts'));
    }
}
