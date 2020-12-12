@extends('.layouts.app_master_page')
@section('content')
    <div class="tab-pane fade active in" id="reviews">
        <style>
            #ratings i {
                cursor: pointer;
            }

            #ratings i.active {
                color: #faca51;
            }

            #ratings i.done_active {
                color: #faca51;
            }

            #ratingss i.active {
                color: #faca51;
            }

            #ratingss span.done_active {
                color: #faca51;
            }

            #ratingss i.done_active {
                color: #faca51;
            }

            #ratingss i.no_active {
                color: #eff0f5;
            }

            .item_success {
                color: #049802;
            }

            .item_footer {
                color: #8e8e8e;
            }
        </style>
        <div class="col-sm-12">
            <div class="reviews content_text">
                <div class="dashboards">
                    <ul>
                        <li><a href=""><i class="fa fa-star"></i>Rating</a></li>
                    </ul>
                    <div id="ratingss" style="margin-left: 316px">
                        <span class="heading">User Rating</span>
                        @for($i = 1; $i<=5; $i++)

                            @if($product->p_review_total>0)
                                <span
                                    class="fa fa-star {{$i <= round($product->p_review_star/$product->p_review_total) ? 'done_active' : 'no_active'}}"></span>
                            @else
                                <span class="fa fa-star checked"></span>
                            @endif

                        @endfor
                        <p>@if($product->p_review_total>0)
                                {{round($product->p_review_star/$product->p_review_total,2)}} average based
                                on {{$product->p_review_total}} reviews.@else  0  average based
                                on 0 reviews.  @endif </p>
                    </div>
                    <hr style="border:3px solid #f1f1f1">
                    <style>
                        .item_review {
                            display: flex
                        }

                        .bgb-in {
                            background-color: #f25800;
                            background-image: linear-gradient(90deg, #ff7d26 0%, #f25800 97%);
                            height: 5px;
                            border-radius: 5px 0 0 5px;
                            max-width: 100%;
                        }

                        .bgb {
                            width: 468px;
                            background-color: #e9e9e9;
                            height: 5px;
                            display: inline-block;
                            margin: 0 10px;
                            border-radius: 5px;
                        }
                    </style>
                    <div class="item dashboards_item">
                        @foreach($ratingDefault as $key => $item)
                            <div class="item_review">
                                <span class="item_review-name">{{ $key }} <i class="fa fa-star"></i></span>
                                <div class="item_review-process">
                                    <div class="bgb">
                                        <div class="bgb-in"
                                             style="width:@if ($product->p_review_total>0) {{($item['count_number'] / $product->p_review_total) * 100}}%@else 0 @endif"></div>
                                    </div>
                                </div>
                                <span class="item_review-count"><b>{{ $item['count_number'] }}</b> đánh giá</span>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
{{--            <div class="item dashboards_btn">--}}
{{--                <a style="margin-left: 224px; background-color: #288ad6; margin-top: 12px;"--}}
{{--                   href="javascript:;void(0)" title="Gửi đánh giá"--}}
{{--                   class="btn btn-success {{\Auth::id() ? 'js-review' : 'js-show-login'}}">Gửi đánh giá</a>--}}
{{--            </div>--}}
{{--            <div style="display: none;" class="block-reviews" id="block-review">--}}
{{--                <form action="{{route('user.ajax_rating')}}" id="form-review" method="POST">--}}
{{--                    @csrf--}}
{{--                    <div>--}}
{{--                        <p style="margin-bottom: 0">--}}
{{--                            <span>Chọn đánh giá của bạn</span>--}}
{{--                            <span id="ratings">--}}
{{--                                        @for ($i =1 ; $i <= 5 ; $i ++)--}}
{{--                                    <i class="fa fa-star active" data-i="{{ $i }}"></i>--}}
{{--                                @endfor--}}
{{--                                    </span>--}}
{{--                            <span class="reviews-text" id="reviews-text">Tuyệt vời</span>--}}
{{--                        </p>--}}
{{--                        <span--}}
{{--                            style="color: red;margin-bottom: 10px;display: block">(Click vào ngôi sao để đánh giá)</span>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <style>--}}
{{--                            #evaluate {--}}
{{--                                position: relative;--}}
{{--                            }--}}

{{--                            #count_evaluate {--}}
{{--                                position: absolute;--}}
{{--                                margin-top: -51px;--}}
{{--                                margin-left: 671px;--}}
{{--                                color: #50504b;--}}
{{--                            }--}}

{{--                            .rtpLnk {--}}
{{--                                display: inline-block;--}}
{{--                                padding: 7px 20px;--}}
{{--                                color: #288ad6;--}}
{{--                                border: solid 1px #288ad6;--}}
{{--                                border-radius: 3px;--}}
{{--                                text-align: center;--}}
{{--                                box-sizing: border-box;--}}
{{--                                margin: 0 0 20px;--}}
{{--                                margin-top: 11px;--}}
{{--                            }--}}
{{--                        </style>--}}
{{--                        <textarea style="width: 100%; height: 117px;" maxlength="80" name="content_review"--}}
{{--                                  id="evaluate" cols="30" rows="5"--}}
{{--                                  placeholder="Nhập đánh giá sản phẩm (Tối thiểu 80 ký tự )"></textarea>--}}
{{--                        <span id="count_evaluate"></span>--}}
{{--                        <input type="hidden" name="review" id="review_value" value="5">--}}
{{--                        <input type="hidden" name="product_id" value="{{$product->id}}">--}}
{{--                    </div>--}}
{{--                    <button type="submit" style="font-size: 14px;margin-top: 10px;margin-bottom: 13px;"--}}
{{--                            class="btn btn-success js-process-review">Gửi đánh giá--}}
{{--                    </button>--}}
{{--                </form>--}}
{{--            </div>--}}
            @include('frontend.pages.detail.include.filter_rating')
            @include('frontend.pages.detail.include.list_rating_item')
            <hr style="border:3px solid #f1f1f1">
        </div>
    </div>
@section('script')
    <script>
        $('body').on('click', '.pagination a', function (e) {
            e.preventDefault();
            var URL = $(this).attr('href');
            getPosts(URL);
        });
        $('body').on('click', '.filter a', function (e) {
            e.preventDefault();
            let $this = $(this);
            if ($('.filter a').hasClass('active')) {
                $('.filter a').removeClass('active');
            }
            $this.addClass('active');
            var URL = $this.attr('href');
            getPosts(URL);
        });

        function getPosts(URL) {
            $.ajax({
                type: "GET",
                url: URL
            })
                .success(function (data) {
                    //console.log(data.html);
                    $('.list_review').html(data.html);
                });
        }
    </script>
@endsection
@endsection
