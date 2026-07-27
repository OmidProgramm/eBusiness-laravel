<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Product;
use App\Models\Seo;
use App\Models\Slider;
use App\Models\Team;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $seo = Seo::orderBy('id','desc')->first();
        $slider = Slider::all();
        $about = About::orderBy('id','desc')->first();
        $team = Team::all();
        $category = Category::all();
        return view("front.index", compact('seo',"slider","about","team","category"));
    }

    public function category($id){
        $category = Category::all();
        $productRecent = Category::findOrfail($id)->products()->orderBy('id','desc')->take(5)->skip(0)->get();
        $products = Product::paginate(2);
        return view("front.category",compact('category','productRecent','products','id'));
    }
    public function product($title,$id){
        $category = Category::all();
        $productRecent = Category::findOrfail($id)->products()->orderBy('id','desc')->take(5)->skip(0)->get();
        
        $product = Product::where('title', $title)->firstOrFail();
        return view("front.product", compact('category','productRecent','product'));
    }
}
