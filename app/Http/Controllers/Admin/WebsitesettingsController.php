<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddGeneralinfoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsitesettingsController extends Controller
{
    public function index()
    {
        $settings = DB::table('website_settings')->first();
        return view('admin.websettings.index', compact('settings'));
    }
    public function update(AddGeneralinfoRequest $request, $id)
    {
        try {
            $settings = DB::table('website_settings')->first();
            if ($request->hasFile('logo')) {
                $logo = $request->logo->store('websitesettings/logo');
            } else {
                $logo = $settings->logo;
            }
            DB::table('website_settings')->where('id', $id)->update([
                'logo' => $logo,
                'portal_name' => $request->portal_name,
                'address_en' => $request->address_en,
                'address_ar' => $request->address_ar,
                'email' => $request->email,
                'phone' => $request->phone
            ]);

            return redirect()->route('admin.settings.general')->with([
                'alert-type' => 'success',
                'message' => 'website settings updated successfully',
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
