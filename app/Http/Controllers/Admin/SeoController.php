<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddSeoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeoController extends Controller
{
    public function index()
    {
        $seo = DB::table('seos')->first();
        return view('admin.seo.index', compact('seo'));
    }
    public function update(AddSeoRequest $request, $id)
    {
        try {
            DB::table('seos')->where('id', $id)->update([
                'meta_author' => $request->meta_author,
                'meta_title' => $request->meta_title,
                'meta_tag' => $request->meta_tag,
                'meta_description' => $request->meta_description,
                'google_analytics' => $request->google_analytics,
                'bing_analytics' => $request->bing_analytics
            ]);

            return redirect()->route('admin.settings.seo')->with([
                'alert-type' => 'success',
                'message' => 'seo settings updated successfully',
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
