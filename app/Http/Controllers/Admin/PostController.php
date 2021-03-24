<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::all();
            return view('admin.post.index', compact('posts'));
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
            return view('admin.post.create');
        } catch (\Exception $ex) {
            return redirect()->route('admin.posts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function store(AddPostRequest $request)
    {
        try {
            $image = $request->image->store('posts');
            $data = [];
            $data['category_id'] = $request->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['district_id'] = $request->district_id;
            $data['subdistrict_id'] = $request->subdistrict_id;
            $data['title_en'] = $request->title_en;
            $data['title_ar'] = $request->title_ar;
            $data['user_id'] = Auth::id();
            $data['details_en'] = $request->details_en;
            $data['details_ar'] = $request->details_ar;
            $data['tags_en'] = $request->tags_en;
            $data['tags_ar'] = $request->tags_ar;
            $data['headline'] = $request->headline;
            $data['first_section'] = $request->first_section;
            $data['first_section_thumbnail'] = $request->first_section_thumbnail;
            $data['bigthumbnail'] = $request->bigthumbnail;
            $data['month'] = date('F');
            $data['date'] = date('Y-m-d');
            $data['image'] = $image;

            Post::create($data);

            return redirect()->route('admin.posts')->with([
                'alert-type' => 'success',
                'message' => 'New Post added successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.posts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function edit($id)
    {
        try {
            $post = Post::find($id);
            if (!$post) {
                return redirect()->route('admin.posts')->with([
                    'alert-type' => 'error',
                    'message' => "This post doen't exist"
                ]);
            }
            return view('admin.post.edit', compact('post'));
        } catch (\Throwable $th) {
            return redirect()->route('admin.posts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function  update(AddPostRequest $request, $id)
    {
        try {
            $post = Post::find($id);
            if (!$post) {
                return redirect()->route('admin.posts')->with([
                    'alert-type' => 'error',
                    'message' => "This post doen't exist"
                ]);
            }
            if ($request->hasFile('image')) {
                $image = $request->image->store('posts');
                Storage::delete($post->image);
            } else {
                $image = $post->image;
            }
            $data = [];
            $data['category_id'] = $request->category_id;
            $data['subcategory_id'] = $request->subcategory_id;
            $data['district_id'] = $request->district_id;
            $data['subdistrict_id'] = $request->subdistrict_id;
            $data['title_en'] = $request->title_en;
            $data['title_ar'] = $request->title_ar;
            $data['user_id'] = Auth::id();
            $data['details_en'] = $request->details_en;
            $data['details_ar'] = $request->details_ar;
            $data['tags_en'] = $request->tags_en;
            $data['tags_ar'] = $request->tags_ar;
            $data['headline'] = $request->headline;
            $data['first_section'] = $request->first_section;
            $data['first_section_thumbnail'] = $request->first_section_thumbnail;
            $data['bigthumbnail'] = $request->bigthumbnail;
            $data['month'] = date('F');
            $data['date'] = date('Y-m-d');
            $data['image'] = $image;

            $post->update($data);
            return redirect()->route('admin.posts')->with([
                'alert-type' => 'success',
                'message' => 'Post updated successfully'
            ]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.posts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $post = Post::find($id);
            if (!$post) {
                return redirect()->route('admin.posts')->with([
                    'alert-type' => 'error',
                    'message' => "This post doen't exist"
                ]);
            }
            $post->delete();
            Storage::delete($post->image);
            return redirect()->route('admin.posts')->with([
                'alert-type' => 'success',
                'message' => 'Post deleted successfully'
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('admin.posts')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }
}
