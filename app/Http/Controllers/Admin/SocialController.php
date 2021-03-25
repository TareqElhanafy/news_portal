<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddSocialRequest;

class SocialController extends Controller
{
    public function index()
    {
        $social = DB::table('socials')->first();
        return view('admin.social.index', compact('social'));
    }
    public function update(AddSocialRequest $request, $id)
    {
        try {
            DB::table('socials')->where('id',$id)->update([
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
            ]);

            return redirect()->route('admin.settings.social')->with([
                'alert-type' => 'success',
                'message' => 'Social links updated successfully',
            ]);
        } catch (\Exception $ex) {
            throw $ex;
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }
}
