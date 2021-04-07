<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    public function index()
    {
        $ads = DB::table('ads')->get();
        return view('admin.ads.index', compact('ads'));
    }

}
