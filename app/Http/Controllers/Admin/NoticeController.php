<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddNoticeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoticeController extends Controller
{
    public function index()
    {
        $notice = DB::table('notices')->first();
        return view('admin.notice.index', compact('notice'));
    }
    public function update(AddNoticeRequest $request, $id)
    {
        try {
            DB::table('notices')->where('id', $id)->update([
                'notice_body' => $request->notice_body,
            ]);

            return redirect()->route('admin.settings.notice')->with([
                'alert-type' => 'success',
                'message' => 'Notice settings updated successfully',
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
        $notice = DB::table('notices')->first();
        if (!$notice) {
            return redirect()->back()->with([
                'alertt-type' => 'error',
                'message' => "This notice doesn't exist"
            ]);
        }

        $status = $notice->status == 1 ? 0 : 1;
        DB::table('notices')->update(['status' => $status]);

        return redirect()->route('admin.settings.notice')->with([
            'alert-type' => 'success',
            'message' => 'notice status updated successfully',
        ]);
    }
}
