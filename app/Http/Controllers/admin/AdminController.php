<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\createSeoRequest;
use App\Models\Seo;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view("dashboard.admin.index");
    }
    public function storeSeo(createSeoRequest $request){
        Seo::create([
            "title" => $request->title,
            "author" => $request->author,
            "keywords" => $request->keywords,
            "description" => $request->description
        ]);
       session()->flash('createSeo', "Seo is created successfully");
       return redirect()->route("admin.index");
    }
    public function showDetails(){
        $seo = Seo::paginate(5);
        return view("dashboard.admin.show",compact('seo'));
    }
    public function deleteSeo($id){
        Seo::destroy($id);
        session()->flash('deleteteSeo', "Seo is deleted successfully");
        return back();
    }
}
