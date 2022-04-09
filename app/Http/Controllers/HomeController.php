<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chef;
use App\Models\Products;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::latest()->get();
        $products = Products::latest()->get();
        $specials = Products::where('is_special' , 'yes')->get();
        $testimonials = Testimonial::latest()->get();
        $chefs = Chef::latest()->paginate(3);
        return view('frontend.home', ['categories' => $categories , 'products'=> $products , 'testimonials' => $testimonials , 'chefs' => $chefs , 'specials'=> $specials]);
    }
}
