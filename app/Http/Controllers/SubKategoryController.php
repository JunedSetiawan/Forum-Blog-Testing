<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\KategoryForum;
use App\Models\SubKategory;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;

class SubKategoryController extends Controller
{

    public function get()
    {
        $subcategories = SubKategory::query()->get();
        // dd(response()->json($data));
        return view('forum.get', compact('subcategories'));
    }
    public function loadData($subkategoryId)
    {
        $data = Forum::where('subkategory_forum_id', $subkategoryId)->first();
        return response()->json($data);
    }
    public function loadSubKategory($kategoryId)
    {
        $subKategory = SubKategory::where('kategory_id', $kategoryId)->get();
        return response()->json($subKategory);
    }
    public function store(Request $req)
    {

        dd($req->all());
    }
}
