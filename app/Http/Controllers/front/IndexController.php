<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Information;
use App\Models\Product;
use App\Models\Seo;
use App\Models\Slider;
use App\Models\Social;
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
        $info = Information::orderBy('id',"desc")->first();
        $social = Social::orderBy('id',"desc")->first();
         return view("front.index", compact('seo',"slider","about","team","category","info", "social"));
    }

    public function category($id){
        $category = Category::all();
        $productRecent = Category::findOrfail($id)->products()->orderBy('id','desc')->take(5)->skip(0)->get();
        $products = Product::all();
        $info = Information::orderBy('id',"desc")->first();
        $social = Social::orderBy('id',"desc")->first();
        return view("front.category",compact('category','productRecent','products','id','info',"social"));
    }
    public function product($titleC,$id){
        $categoryName = $titleC;
        $category = Category::all();
        $productRecent = Category::findOrfail($id)->products()->orderBy('id','desc')->take(5)->skip(0)->get();
        
        $product = Product::where('id',"=", $id)->firstOrFail();
       
        $info = Information::orderBy('id',"desc")->first();
        $social = Social::orderBy('id',"desc")->first();
        return view("front.product", compact('category','productRecent','product','info',"social"));
    }
    public function ajaxContact(Request $request){
        Contact::create([
            "fullName" => $request->fullName,
            "email" => $request->email,
            "comment" => $request->comment
        ]);
        session()->flash('sendEmail', "Email is sended successfully");
        return response()->json([
            'success' => true,
            'message' => 'Email sent successfully.',
            'data' => $request->all(),
        ]);
    }
    public function ajaxComments(Request $request){
        $productId = Product::where("title","=",$request->product_id)->first();
        Comment::create([
            "fullName" => $request->fullName,
            "email" => $request->email,
            "comment" => $request->comment,
            "product_id" => $productId->id
        ]);
        session()->flash('sendComment', "Comment sent successfully");
        return response()->json([
            'success' => true,
            'message' => 'Comment sent successfully.',
            'data' => $request->all(),
        ]);
    }
}
