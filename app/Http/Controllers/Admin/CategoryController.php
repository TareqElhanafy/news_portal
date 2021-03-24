<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(AddCategoryRequest $request)
    {
        try {
            Category::create([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);

            return redirect()->route('admin.categories')->with([
                'alert-type' => 'success',
                'message' => 'New Category added successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.categories')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->back()->with([
                    'alertt-type' => 'danger',
                    'message' => "This product doesn't exist"
                ]);
            }
            return view('admin.category.edit', compact('category'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.categories')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function update(AddCategoryRequest $request, $id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->back()->with([
                    'alertt-type' => 'danger',
                    'message' => "This product doesn't exist"
                ]);
            }
            $category->update([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);
            return redirect()->route('admin.categories')->with([
                'alert-type' => 'success',
                'message' => 'New Category updated successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.categories')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if (!$category) {
                return redirect()->back()->with([
                    'alertt-type' => 'danger',
                    'message' => "This product doesn't exist"
                ]);
            }
            $category->delete();
            return redirect()->route('admin.categories')->with([
                'alert-type' => 'success',
                'message' => 'New Category deleted successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.categories')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }
}