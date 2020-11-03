<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Active;
class HomeController extends Controller
{
    public function index()
    {
        // Find latest users
        $users = Active::users()->get();
        $numberOfUsers = Active::users()->count();
        $users = Active::users(3)->get();
        $numberOfGuests = Active::guests()->count();  				// Last 3 minute
        dd($numberOfGuests);// Last 3 minutes
        $users = Active::usersWithinSeconds(30)->get();  	// Get active users within the last 30 seconds
        $users = Active::usersWithinMinutes(10)->get();  	// Get active users within the last 10 minutes
        $users = Active::usersWithinHours(1)->get(); // Count the number of active users
        dd($numberOfUsers);
        // Loop through and echo user's name
        foreach ($users as $activity) {
            echo $activity->user->name . '<br>';
        }
        $products = Product::paginate(10);
        return view('frontend.pages.home.index', compact('products'));
    }

    public function detail(Request $request, $slug){
        $product = Product::where('p_slug', $slug)->first();
        return view('frontend.pages.detail.index', compact('product'));
    }
    public function autoComplete(Request $request){
        $key = $request->all();
        $searchs = Product::where('p_name', 'like', '%' .$key['query']. '%')->get();
        $out_put = '<ul class="dropdown-menu" style="display: block; position: relative">';
        foreach ($searchs as $search){
            $out_put .= '<li class="ajax_click"><a href="#">'.$search->p_name.'</a></li>';
        }
        $out_put .= '</ul>';
        //dd($out_put);
        echo $out_put;
    }
    public function search(Request $request){
        $products = Product::where('p_name','like','%'.$request->key.'%')->orWhere('p_price','like','%'.$request->key.'%')->paginate(5);
        return view('frontend.pages.home.index', compact('products'));
    }
}
