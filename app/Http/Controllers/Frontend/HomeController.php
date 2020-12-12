<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Rating;
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
        $ratings = Rating::where('r_product_id', $product->id)->with('user')->orderBy('id', 'DESC')->take(5)->get();
        $ratingsDashboard = Rating::groupBy('r_number')->where('r_product_id', $product->id)->select(\DB::raw('count(r_number) as count_number'), \DB::raw('sum(r_number) as total'))->addSelect('r_number')->get()->toArray();
        //dd($ratingsDashboard);
        $ratingDefault = $this->mapRatingDefault();
        foreach ($ratingsDashboard as $key => $item) {
            $ratingDefault[$item['r_number']] = $item;
        }
        //dd($ratingDefault);
        return view('frontend.pages.detail.index', compact('product', 'ratings', 'ratingDefault'));
    }

    private function mapRatingDefault()
    {
        $ratingDefault = [];
        for ($i = 1; $i <= 5; $i++) {
            $ratingDefault[$i] = [
                'count_number' => 0,
                'total' => 0,
                'r_number' => 0
            ];
        }
        return $ratingDefault;
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

    public function ajax_add_comment(Request $request)
    {
        $data = $request->all();
        $comment = new Comment();
        $comment->cmt_content = $request->cmt_content;
        $comment->cmt_user_id = $request->cmt_user_id;
        $comment->cmt_product_id = $request->cmt_product_id;
        $comment->save();
        if ($comment->id) {
            $html = view('frontend.pages.detail.include.comment', compact('comment'))->render();

        }
        return response(['messages' => 'Đánh giá thành công', 'html' => $html]);

    }

    public function ajaxRating(Request $request)
    {
        //dd($request->all());
        if ($request->ajax()) {
            $rating = new Rating();
            $rating->r_user_id = \Auth::id();
            $rating->r_product_id = $request->product_id;
            $rating->r_content = $request->content_review;
            $rating->r_number = $request->review;
            $rating->save();

            if ($rating->id) {
                $html = view('frontend.pages.detail.include.rating', compact('rating'))->render();
                $this->staticRatingProduct($request->product_id, $request->review);
            }
            return response(['messages' => 'Đánh giá thành công', 'html' => $html]);
        }

    }

    private function staticRatingProduct($productID, $number)
    {
        $product = Product::findOrFail($productID);
        $product->p_review_total++;
        $product->p_review_star += $number;
        $product->save();
    }

    public function list_rating(Request $request, $slug)
    {
        $product = Product::where('p_slug', $slug)->first();
        $ratings = Rating::where('r_product_id', $product->id)->with('user')->orderBy('id', 'DESC')->paginate(5);
        $ratingsDashboard = Rating::groupBy('r_number')->where('r_product_id', $product->id)->select(\DB::raw('count(r_number) as count_number'), \DB::raw('sum(r_number) as total'))->addSelect('r_number')->get()->toArray();
        //dd($ratingsDashboard);
        if ($request->ajax()) {
            $query = $request->query();
            $html = view('frontend.pages.detail.include.list_rating_item', compact('ratings', 'query'))->render();
            return response(['html' => $html]);
        }
        $ratingDefault = $this->mapRatingDefault();
        foreach ($ratingsDashboard as $key => $item) {
            $ratingDefault[$item['r_number']] = $item;
        }
        return view('frontend.pages.detail.include.list_rating', compact('product', 'ratings', 'ratingsDashboard', 'ratingDefault'));
    }

    public function filter_rating(Request $request, $slug, $number)
    {
        $product = Product::where('p_slug', $slug)->first();
        $ratings = Rating::where('r_product_id', $product->id);
        $ratings = $ratings->where('r_number', $number);
        $ratings = $ratings->with('user')->orderBy('id', 'DESC')->paginate(10);
        $ratingsDashboard = Rating::groupBy('r_number')->where('r_product_id', $product->id);
        $ratingsDashboard = $ratingsDashboard->select(\DB::raw('count(r_number) as count_number'), \DB::raw('sum(r_number) as total'));
        $ratingsDashboard = $ratingsDashboard->addSelect('r_number')->get()->toArray();
        if ($request->ajax()) {
            $query = $request->query();
            $html = view('frontend.pages.detail.include.list_rating_item', compact('ratings', 'query'))->render();
            return response(['html' => $html]);
        }
        $ratingDefault = $this->mapRatingDefault();
        foreach ($ratingsDashboard as $key => $item) {
            $ratingDefault[$item['r_number']] = $item;
        }
        $query = $request->query();
        $html = view('frontend.pages.detail.include.list_rating_item', compact('ratings', 'query'))->render();
        return response(['html' => $html]);
        //dd($ratings);
        //return view('frontend.pages.detail.include.list_rating', compact('product', 'ratings', 'ratingsDashboard', 'ratingDefault'));
    }
}
