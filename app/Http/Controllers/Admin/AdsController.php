<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddAdsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdsController extends Controller
{
    public function index()
    {
        try {
            $ads = DB::table('ads')->get();
            return view('admin.ads.index', compact('ads'));
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function create()
    {
        try {
            return view('admin.ads.create');
        } catch (\Exception $ex) {
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function store(AddAdsRequest $request)
    {
        try {
            $image = $request->image->store('ads');
            DB::table('ads')->insert([
                'link' => $request->link,
                'image' => $image,
                'type' => $request->type,
            ]);
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'success',
                'message' => 'New Ad added successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $ad = DB::table('ads')->where('id', $id)->first();
            if (!$ad) {
                return redirect()->back()->with([
                    'alert-type' => 'error',
                    'message' => 'This Ad does not exist'
                ]);
            }
            return view('admin.ads.edit', compact('ad'));
        } catch (\Exception $ex) {
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function update(AddAdsRequest $request, $id)
    {
        try {
            $ad = DB::table('ads')->where('id', $id)->first();
            if (!$ad) {
                return redirect()->back()->with([
                    'alert-type' => 'error',
                    'message' => 'This Ad does not exist'
                ]);
            }

            if ($request->hasFile('image')) {
                $image = $request->image->store('ads');
                Storage::delete($ad->image);
            } else {
                $image = $ad->image;
            }
            DB::table('ads')->where('id', $id)->update([
                'link' => $request->link,
                'image' => $image,
                'type' => $request->type,
            ]);
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'success',
                'message' => 'Ad updated successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $ad = DB::table('ads')->where('id', $id)->first();
            if (!$ad) {
                return redirect()->back()->with([
                    'alert-type' => 'error',
                    'message' => 'This Ad does not exist'
                ]);
            }
            Storage::delete($ad->image);
            DB::table('ads')->where('id', $id)->delete();
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'success',
                'message' => 'Ad deleted successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.ads')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }
}
