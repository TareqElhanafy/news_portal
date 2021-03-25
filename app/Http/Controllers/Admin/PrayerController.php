<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddPrayerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrayerController extends Controller
{
    public function index()
    {
        $prayer = DB::table('prayers')->first();
        return view('admin.prayer.index', compact('prayer'));
    }
    public function update(AddPrayerRequest $request, $id)
    {
        try {
            DB::table('prayers')->where('id', $id)->update([
                'fajr' => $request->fajr,
                'duhr' => $request->duhr,
                'asr' => $request->asr,
                'magrib' => $request->magrib,
                'esha' => $request->esha,
                'jummah' => $request->jummah
            ]);

            return redirect()->route('admin.settings.prayer')->with([
                'alert-type' => 'success',
                'message' => 'Prayers settings updated successfully',
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
