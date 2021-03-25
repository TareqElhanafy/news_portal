<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddWebsiteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteController extends Controller
{
    public function index()
    {
        try {
            $websites = DB::table('websites')->get();
            return view('admin.website.index', compact('websites'));
        } catch (\Throwable $th) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'something went wrong',
            ]);
        }
    }

    public function create()
    {
        try {
            return view('admin.website.create');
        } catch (\Throwable $th) {
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'error',
                'message' => 'something went wrong',
            ]);
        }
    }

    public function store(AddWebsiteRequest $request)
    {
        try {
            DB::table('websites')->insert([
                'name' => $request->name,
                'link' => $request->link,
            ]);
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'success',
                'message' => 'New Website added successfully',
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'error',
                'message' => 'something went wrong',
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $website = DB::table('websites')->where('id', $id)->first();
            return view('admin.website.edit', compact('website'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'error',
                'message' => 'something went wrong',
            ]);
        }
    }

    public function update(AddWebsiteRequest $request, $id)
    {
        try {
            $website = DB::table('websites')->where('id', $id)->first();
            if (!$website) {
                return redirect()->route('admin.websites')->with([
                    'alert-type' => 'error',
                    'message' => 'This website does not exist',
                ]);
            }

            DB::table('websites')->where('id', $id)->update([
                'name' => $request->name,
                'link' => $request->link,
            ]);
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'success',
                'message' => 'Website updated successfully',
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'error',
                'message' => 'something went wrong',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $website = DB::table('websites')->where('id', $id)->first();
            if (!$website) {
                return redirect()->route('admin.websites')->with([
                    'alert-type' => 'error',
                    'message' => 'This website does not exist',
                ]);
            }
            DB::table('websites')->where('id', $id)->delete();
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'success',
                'message' => 'website deleted successfully',
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.websites')->with([
                'alert-type' => 'error',
                'message' => 'something went wrong',
            ]);
        }
    }
}
