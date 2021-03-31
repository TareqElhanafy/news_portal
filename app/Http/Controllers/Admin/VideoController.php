<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddVideoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function index()
    {
        try {
            $videos = DB::table('videos')->get();
            return view('admin.video.index', compact('videos'));
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
            return view('admin.video.create');
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }
    public function store(AddVideoRequest $request)
    {
        try {
            DB::table('videos')->insert([
                'title' => $request->title,
                'embed_link' => $request->embed_link,
                'type' => $request->type
            ]);
            return redirect()->route('admin.videos')->with([
                'alert-type' => 'success',
                'message' => 'New video added to the video gallery',
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
            $video = DB::table('videos')->where('id', $id)->first();
            if (!$video) {
                return redirect()->route('dashboard')->with([
                    'alert-type' => 'error',
                    'message' => 'This video does not exist in the video gallery',
                ]);
            }
            return view('admin.video.edit', compact('video'));
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }

    public function update(AddVideoRequest $request, $id)
    {
        try {
            $video = DB::table('videos')->where('id', $id)->first();
            if (!$video) {
                return redirect()->route('dashboard')->with([
                    'alert-type' => 'error',
                    'message' => 'This video does not exist in the video gallery',
                ]);
            }
            DB::table('videos')->where('id', $id)->update([
                'title' => $request->title,
                'embed_link' => $request->embed_link,
                'type' => $request->type,
            ]);
            return redirect()->route('admin.videos')->with([
                'alert-type' => 'success',
                'message' => 'video updated successfully',
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
            $video = DB::table('videos')->where('id', $id)->first();
            if (!$video) {
                return redirect()->route('dashboard')->with([
                    'alert-type' => 'error',
                    'message' => 'This video does not exist in the video gallery',
                ]);
            }
            DB::table('videos')->where('id', $id)->delete();
            return redirect()->route('admin.videos')->with([
                'alert-type' => 'success',
                'message' => ' Video deleted successfully',
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'Sorry something went wrong',
            ]);
        }
    }
}
