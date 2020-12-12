@extends('layouts.app_master_page')
@section('slider')
    @include('layouts.components.slider')
@endsection
@section('content')
    @include('frontend.components.left_sidebar')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    <img src="{{$product->p_image}}" alt="">
                    <h3>ZOOM</h3>
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item">
                            <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                            <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                            <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                            <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                            <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                        </div>
                        <div class="item active">
                            <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
                            <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
                            <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
                        </div>

                    </div>

                    <!-- Controls -->
                    <a class="left item-control" href="#similar-product" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a class="right item-control" href="#similar-product" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <img src="images/product-details/new.jpg" class="newarrival" alt="">
                    <h2>{{$product->p_name}}</h2>
                    <p>Web ID: 1089772</p>
                    <img src="images/product-details/rating.png" alt="">
                    <span>
									<span>US $59</span>
									<a href="{{route('frontend.shopping.add',$product->id)}}" type="button"
                                       class="btn btn-default add-to-cart add_cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
								</span>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> E-SHOPPER</p>
                    <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt=""></a>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li><a href="#details" data-toggle="tab">Details</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
                    <li><a href="#tag" data-toggle="tab">Tag</a></li>
                    <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade" id="details">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery1.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery2.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition 123</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart 123
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery3.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery4.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="companyprofile">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery1.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery3.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery2.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery4.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="tag">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery1.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery2.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery3.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="images/home/gallery4.jpg" alt="">
                                    <h2>$56</h2>
                                    <p>Easy Polo Black Edition</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                        <div class="item dashboards_btn">
                            <a style="margin-left: 224px; background-color: #288ad6; margin-top: 12px;"
                               href="javascript:;void(0)" title="Gửi đánh giá"
                               class="btn btn-success {{\Auth::id() ? 'js-review' : 'js-show-login'}}">Gửi đánh giá</a>
                        </div>
                        <div style="display: none;" class="block-reviews" id="block-review">
                            <form action="{{route('user.ajax_rating')}}" id="form-review" method="POST">
                                @csrf
                                <div>
                                    <p style="margin-bottom: 0">
                                        <span>Chọn đánh giá của bạn</span>
                                        <span id="ratings">
                                        @for ($i =1 ; $i <= 5 ; $i ++)
                                                <i class="fa fa-star active" data-i="{{ $i }}"></i>
                                            @endfor
                                    </span>
                                        <span class="reviews-text" id="reviews-text">Tuyệt vời</span>
                                    </p>
                                    <span style="color: red;margin-bottom: 10px;display: block">(Click vào ngôi sao để đánh giá)</span>
                                </div>
                                <div>
                                    <style>
                                        #evaluate {
                                            position: relative;
                                        }

                                        #count_evaluate {
                                            position: absolute;
                                            margin-top: -51px;
                                            margin-left: 671px;
                                            color: #50504b;
                                        }

                                        .rtpLnk {
                                            display: inline-block;
                                            padding: 7px 20px;
                                            color: #288ad6;
                                            border: solid 1px #288ad6;
                                            border-radius: 3px;
                                            text-align: center;
                                            box-sizing: border-box;
                                            margin: 0 0 20px;
                                            margin-top: 11px;
                                        }
                                    </style>
                                    <textarea style="width: 100%; height: 117px;" maxlength="80" name="content_review"
                                              id="evaluate" cols="30" rows="5"
                                              placeholder="Nhập đánh giá sản phẩm (Tối thiểu 80 ký tự )"></textarea>
                                    <span id="count_evaluate"></span>
                                    <input type="hidden" name="review" id="review_value" value="5">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                </div>
                                <button type="submit" style="font-size: 14px;margin-top: 10px;margin-bottom: 13px;"
                                        class="btn btn-success js-process-review">Gửi đánh giá
                                </button>
                            </form>
                        </div>
                        <div class="list_review">
                            @foreach($ratings as $rating)
                                <div class="itemm">
                                    <p class="item_author">
                                        <span>{{ $rating->user->name ?? "Admin" }}</span>
                                        <span class="item_success"><i class="fas fa-check-circle"></i> Đã mua hàng tại DuongGA</span>
                                    </p>
                                    <div class="item_review">
                                        <span id="ratingss" class="item_review">
                                            @for ($j = 1 ; $j <= 5 ; $j ++)
                                                <i class="fa fa-star {{ $j <= $rating->r_number ? 'done_active' : 'no_active' }}"></i>
                                            @endfor
                                        </span>

                                        {{$rating->r_content}}
                                    </div>
                                    <div class="item_footer">
                                        <span class="item_time"><i class="fa fa-clock-o"></i> đánh giá {{$rating->created_at}}</span>
                                    </div>
                                </div>
                            @endforeach
                            <a class="rtpLnk" href="{{route('user.list_rating', $product->p_slug)}}">Xem tất cả đánh giá<span>›</span></a>
                        </div>
                        <hr style="border:3px solid #f1f1f1">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>Comment</a></li>
                        </ul>
                        <style>
                            .style_comment {
                                border: 1px solid #ddd;
                                border-radius: 10px;
                                background: #F0F0E9;
                            }

                            .style_comment p {
                                margin: 10px;
                            }
                        </style>
                        <form id="l_cmt">
                            <div class="row style_comment">
                                <input type="hidden" class="comment_product_id" value="{{$product->id}}">
                            </div>
                        </form>
                        <br>
                        <p><b>Write Your Review</b></p>
                        <style>
                            .frm {
                                position: relative;
                            }

                            #count {
                                position: absolute;
                                margin-top: -51px;
                                margin-left: 671px;
                                color: #50504b;
                            }
                        </style>

                        <form class="frm" action="#">
                            <input class="cmt_prd_id" type="hidden" value="{{$product->id}}">
                            <textarea style="width: 100%; height: 141px;" id="textarea" maxlength='500' class="cmt"
                                      name="comment" rows="9"
                                      cols="70"></textarea>
                            <span id="count"></span>
                            <button type="button" class="btn btn-default pull-right cmt_send">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">recommended items</h2>

            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="item">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item active">
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend1.jpg" alt="">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend2.jpg" alt="">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="images/home/recommend3.jpg" alt="">
                                        <h2>$56</h2>
                                        <p>Easy Polo Black Edition</p>
                                        <button type="button" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div><!--/recommended_items-->

    </div>
@section('script')
    <script>
        $(document).ready(function () {
            //dem so ki tu trong textarea
            $("#textarea").keyup(function () {
                //$("#count").text("Characters left: " + (500 - $(this).val().length));
                $("#count").text($(this).val().length + "/500 kí tự");
            });
            $("#evaluate").keyup(function () {
                //$("#count").text("Characters left: " + (500 - $(this).val().length));
                $("#count_evaluate").text($(this).val().length + "/80 kí tự");
            });
            //end
            //rating
            $('.js-process-review').click(function (even) {
                even.preventDefault();
                let URL = $(this).parents('form').attr('action');
                //alert(URL);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: URL,
                    data: $('#form-review').serialize(),
                }).done(function (data) {
                    $('#form-review')[0].reset();
                    $(".js-review").trigger("click");
                    $('.list_review').prepend(data.html);
                    //alert(data.messages);
                });
            })
            //end
            $(".js-review").click(function (event) {
                event.preventDefault();
                let $this = $(this);
                if ($this.hasClass('js-check-login')) {
                    alert('Đăng  nhập để thực hiện chức năng này');
                    return false;
                }
                if ($this.hasClass('active')) {
                    $this.text('Gửi đánh giá').addClass('btn-success').removeClass('btn-default active')
                } else {
                    $this.text('Đóng lại').addClass('btn-default active').removeClass('btn-success')
                }
                $('#block-review').slideToggle();
            })
            // hover icon thay doi so sao danh gia
            let $item = $('#ratings i');
            let arrTextRating = {
                1: "Không thích",
                2: "Tạm được",
                3: "Bình thường",
                4: "Rất tốt",
                5: "Tuyệt vời"
            }
            // alert(1);
            $item.mouseover(function () {
                let $this = $(this);
                let $i = $this.attr('data-i');
                $('#review_value').val($i);
                $item.removeClass('active');
                $item.each(function (key, value) {
                    if (key + 1 <= $i) {
                        $(this).addClass('active')
                    }
                })
                $('#reviews-text').text(arrTextRating[$i]);
            })

            load_comment();

            function load_comment() {
                let product_id = $('.comment_product_id').val();
                let route = '{{route('pages.detail.load_comment')}}';
                //alert(route);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: "POST",
                    url: route,
                    data: {product_id: product_id},
                    success: function (dt) {
                        $('#l_cmt').html(dt);
                        //alert("ancd");
                    }
                })
            };
            $('.cmt_send').click(function (event) {

                if ('{{Auth::check()}}') {
                    let prd_id = $('.cmt_prd_id').val();
                    let content = $('.cmt').val();
                    let id_user = '{{Auth::user()->id}}';
                    //alert(id_user);
                    let route = '{{route('pages.detail.add_comment')}}';
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        url: route,
                        data: {cmt_product_id: prd_id, cmt_content: content, cmt_user_id: id_user},
                        success: function (data) {
                            //alert('1');
                            //$('.cmt').val('');
                            //load_comment();
                            if (data.html) {
                                //$('#list-comment .item').last().remove();
                                $('#l_cmt').append(data.html);
                                $('.cmt').val('');
                            }
                        }
                    })
                } else {
                    alert('You need to be logged in to perform this function');
                    $('.cmt').val('');
                }
            });


            $('.add_cart').click(function (event) {
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                //alert(url);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url,
                    success: function (data) {
                        //alert(data.messages);
                    }
                })
            });
        });
    </script>
@endsection
@endsection
