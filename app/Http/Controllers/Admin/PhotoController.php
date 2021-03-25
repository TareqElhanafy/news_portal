<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPhotoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        try {
            $photos = DB::table('photos')->get();
            return view('admin.gallery.index', compact('photos'));
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }

    public function create()
    {
        try {
            return view('admin.gallery.create');
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }
    public function store(AddPhotoRequest $request)
    {
        try {
            $image = $request->image->store('galleryphotos');
            DB::table('photos')->insert([
                'title' => $request->title,
                'image' => $image,
                'type' => $request->type
            ]);
            return redirect()->route('admin.photos')->with([
                'alert-type' => 'success',
                'message' => 'New photo added to the gallery',
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $photo = DB::table('photos')->where('id', $id)->first();
            if (!$photo) {
                return redirect()->route('dashboard')->with([
                    'alert-type' => 'error',
                    'message' => 'This photo does not exist in the gallery',
                ]);
            }
            return view('admin.gallery.edit', compact('photo'));
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }

    public function update(AddPhotoRequest $request, $id)
    {
        try {
            $photo = DB::table('photos')->where('id', $id)->first();
            if (!$photo) {
                return redirect()->route('dashboard')->with([
                    'alert-type' => 'error',
                    'message' => 'This photo does not exist in the gallery',
                ]);
            }
            if ($request->hasFile('image')) {
                $image = $request->image->store('galleryphotos');
                Storage::delete($photo->image);
            } else {
                $image = $photo->image;
            }
            DB::table('photos')->where('id', $id)->update([
                'title' => $request->title,
                'image' => $image,
                'type' => $request->type,
            ]);
            return redirect()->route('admin.photos')->with([
                'alert-type' => 'success',
                'message' => ' photo updated successfully',
            ]);
        } catch (\Exception $ex) {
            throw $ex;
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $photo = DB::table('photos')->where('id', $id)->first();
            if (!$photo) {
                return redirect()->route('dashboard')->with([
                    'alert-type' => 'error',
                    'message' => 'This photo does not exist in the gallery',
                ]);
            }
            DB::table('photos')->where('id', $id)->delete();
            Storage::delete($photo->image);
            return redirect()->route('admin.photos')->with([
                'alert-type' => 'success',
                'message' => ' photo deleted successfully',
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }
}
