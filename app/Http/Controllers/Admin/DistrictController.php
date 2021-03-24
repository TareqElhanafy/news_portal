<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddDistrictRequest;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('admin.district.index', compact('districts'));
    }

    public function create()
    {
        return view('admin.district.create');
    }

    public function store(AddDistrictRequest $request)
    {
        try {
            District::create([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);

            return redirect()->route('admin.districts')->with([
                'alert-type' => 'success',
                'message' => 'New district added successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.districts')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $district = District::find($id);
            if (!$district) {
                return redirect()->back()->with([
                    'alertt-type' => 'danger',
                    'message' => "This district doesn't exist"
                ]);
            }
            return view('admin.district.edit', compact('district'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.districts')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function update(AddDistrictRequest $request, $id)
    {
        try {
            $district = District::find($id);
            if (!$district) {
                return redirect()->back()->with([
                    'alertt-type' => 'danger',
                    'message' => "This district doesn't exist"
                ]);
            }
            $district->update([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);
            return redirect()->route('admin.districts')->with([
                'alert-type' => 'success',
                'message' => 'district updated successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.districts')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $district = District::find($id);
            if (!$district) {
                return redirect()->back()->with([
                    'alertt-type' => 'danger',
                    'message' => "This district doesn't exist"
                ]);
            }
            $district->delete();
            return redirect()->route('admin.districts')->with([
                'alert-type' => 'success',
                'message' => 'district deleted successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.districts')->with([
                'alert-type' => 'danger',
                'message' => 'sorry something went wrong'
            ]);
        }
    }
}
