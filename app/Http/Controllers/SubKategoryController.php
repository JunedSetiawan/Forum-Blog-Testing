<?php

namespace App\Http\Controllers;

use App\Models\KategoryForum;
use App\Models\SubKategory;
use Illuminate\Http\Request;

class SubKategoryController extends Controller
{
    public function loadSubKategory($kategoryId)
    {
        $subKategory = SubKategory::where('kategory_id', $kategoryId)->get();
        return response()->json($subKategory);
    }
}
