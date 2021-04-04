<?php

namespace App\Http\Controllers\Admin;

use App\District;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSubDistrictRequest;
use App\SubDistrict;
use Illuminate\Http\Request;

class SubDistrictController extends Controller
{
    public function index()
    {
        $subdistricts = SubDistrict::all();
        return view('admin.subdistrict.index', compact('subdistricts'));
    }

    public function create()
    {
        $districts = District::all();
        return view('admin.subdistrict.create', compact('districts'));
    }

    public function store(AddSubDistrictRequest $request)
    {
        try {
            SubDistrict::create([
                'district_id' => $request->district_id,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);

            return redirect()->route('admin.subdistricts')->with([
                'alert-type' => 'success',
                'message' => 'New sub district added successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subdistricts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $subdistrict = SubDistrict::find($id);
            if (!$subdistrict) {
                return redirect()->back()->with([
                    'alertt-type' => 'error',
                    'message' => "This sub district doesn't exist"
                ]);
            }
            $districts = District::all();
            return view('admin.subdistrict.edit', compact('subdistrict', 'districts'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.subdistricts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function update(AddSubDistrictRequest $request, $id)
    {
        try {
            $subdistrict = SubDistrict::find($id);
            if (!$subdistrict) {
                return redirect()->back()->with([
                    'alert-type' => 'error',
                    'message' => "This sub district doesn't exist"
                ]);
            }
            $subdistrict->update([
                'district_id' => $request->district_id,
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar
            ]);
            return redirect()->route('admin.subdistricts')->with([
                'alert-type' => 'success',
                'message' => '  sub district updated successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subdistricts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $subdistrict = SubDistrict::find($id);
            if (!$subdistrict) {
                return redirect()->back()->with([
                    'alert-type' => 'error',
                    'message' => "This sub district doesn't exist"
                ]);
            }
            $subdistrict->delete();
            return redirect()->route('admin.subdistricts')->with([
                'alert-type' => 'success',
                'message' => ' sub district deleted successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.subdistricts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }
}
