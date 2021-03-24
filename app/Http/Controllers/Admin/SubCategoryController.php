<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSubCategoryRequest;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = SubCategory::all();
        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(AddSubCategoryRequest $request)
    {
        try {
            SubCategory::create([
                'category_id' => $request->category_id,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);

            return redirect()->route('admin.subcategories')->with([
                'alert-type' => 'success',
                'message' => 'New Sub Category added successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subcategories')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $subcategory = SubCategory::find($id);
            if (!$subcategory) {
                return redirect()->back()->with([
                    'alertt-type' => 'error',
                    'message' => "This product doesn't exist"
                ]);
            }
            $categories = Category::all();
            return view('admin.subcategory.edit', compact('subcategory', 'categories'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.subcategories')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function update(AddSubCategoryRequest $request, $id)
    {
        try {
            $subcategory = SubCategory::find($id);
            if (!$subcategory) {
                return redirect()->back()->with([
                    'alertt-type' => 'error',
                    'message' => "This product doesn't exist"
                ]);
            }
            $subcategory->update([
                'category_id' => $request->category_id,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);
            return redirect()->route('admin.subcategories')->with([
                'alert-type' => 'success',
                'message' => '  SubCategory updated successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subcategories')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $subcategory = SubCategory::find($id);
            if (!$subcategory) {
                return redirect()->back()->with([
                    'alertt-type' => 'error',
                    'message' => "This product doesn't exist"
                ]);
            }
            $subcategory->delete();
            return redirect()->route('admin.subcategories')->with([
                'alert-type' => 'success',
                'message' => ' SubCategory deleted successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subcategories')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }
}
