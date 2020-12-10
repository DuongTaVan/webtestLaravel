<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
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
        $numberOfGuests = Active::guests()->count();                // Last 3 minute
        //dd($numberOfGuests);// Last 3 minutes
        $users = Active::usersWithinSeconds(30)->get();    // Get active users within the last 30 seconds
        $users = Active::usersWithinMinutes(10)->get();    // Get active users within the last 10 minutes
        $users = Active::usersWithinHours(1)->get(); // Count the number of active users
        //dd($numberOfUsers);
        // Loop through and echo user's name
//        foreach ($users as $activity) {
//            echo $activity->user->name . '<br>';
//        }
        $products = Product::paginate(10);
        return view('frontend.pages.home.index', compact('products'));
    }

    public function detail(Request $request, $slug)
    {
        $product = Product::where('p_slug', $slug)->first();
        return view('frontend.pages.detail.index', compact('product'));
    }

    public function autoComplete(Request $request)
    {
        $key = $request->all();
        $searchs = Product::where('p_name', 'like', '%' . $key['query'] . '%')->get();
        $out_put = '<ul class="dropdown-menu" style="display: block; position: relative">';
        foreach ($searchs as $search) {
            $out_put .= '<li class="ajax_click"><a href="#">' . $search->p_name . '</a></li>';
        }
        $out_put .= '</ul>';
        //dd($out_put);
        echo $out_put;
    }

    public function search(Request $request)
    {
        $products = Product::where('p_name', 'like', '%' . $request->key . '%')->orWhere('p_price', 'like', '%' . $request->key . '%')->paginate(5);
        return view('frontend.pages.home.index', compact('products'));
    }

    public function ajax_load_comment(Request $request)
    {
        $comments = Comment::where('cmt_product_id', $request->product_id)->with('user')->paginate(5);
        //dd($comments);
        $output = '';
        foreach ($comments as $comment) {
            $output .= '
                <div class="row style_comment">
                    <div class="col-md-2">
                        <img width="100%" src="' . url('source/icons/user.png') . '" alt="">
                    </div>
                    <div class="col-md-10">
                        <p style="color: green">' . $comment->user->name . '</p>
                        <p>' . $comment->user->updated_at . '</p>
                        <p>' . $comment->cmt_content . '</p>
                    </div>
                </div>
            ';
        }
        //$output .= '<div>' . $comments->links() . '</div>';
        echo $output;
    }
    public function ajax_add_comment(Request $request){
        $data = $request->all();
        $comment = new Comment();
        $comment->cmt_content = $request->cmt_content;
        $comment->cmt_user_id = $request->cmt_user_id;
        $comment->cmt_product_id = $request->cmt_product_id;
        $comment->save();
        if($comment->id){
            $html = view('frontend.pages.detail.include.comment', compact('comment'))->render();

        }
        return response(['messages'=>'Đánh giá thành công','html'=>$html]);

    }
}
