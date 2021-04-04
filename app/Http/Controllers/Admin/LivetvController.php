<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddLivetvRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LivetvController extends Controller
{
    public function index()
    {
        $livetv = DB::table('livetvs')->first();
        return view('admin.livetv.index', compact('livetv'));
    }
    public function update(AddLivetvRequest $request, $id)
    {
        try {
            DB::table('livetvs')->where('id', $id)->update([
                'embed_link' => $request->embed_link,
            ]);

            return redirect()->route('admin.settings.livetv')->with([
                'alert-type' => 'success',
                'message' => 'LiveTv settings updated successfully',
            ]);
        } catch (\Exception $ex) {
            return redirect()->route('dashboard')->with([
                'alert-type' => 'error',
                'message' => 'sorry something went wrong'
            ]);
        }
    }

    public function changeStatus()
    {
        $livetv = DB::table('livetvs')->first();
        if (!$livetv) {
            return redirect()->back()->with([
                'alert-type' => 'error',
                'message' => "This Livetv doesn't exist"
            ]);
        }

        $status = $livetv->status == 1 ? 0 : 1;
        DB::table('livetvs')->update(['status' => $status]);

        return redirect()->route('admin.settings.livetv')->with([
            'alert-type' => 'success',
            'message' => 'LiveTv status updated successfully',
        ]);
    }
}
