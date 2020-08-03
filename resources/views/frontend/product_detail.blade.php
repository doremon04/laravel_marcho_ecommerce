@php
\Assets::addStyles([
'animate',
'bootstrap',
'fontawesome',
'jquery-ui',
'slick',
'slick-theme',
'select2',
'select2-bootstrap4',
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'slick',
'select2',
'jquery-scrollup',
'custom',
'custom-slick',
'custom-select2',
]);
@endphp

@extends('layouts.master')

@section('main')
<div class="custom-container">
    <section class="makp_breadcrumb bg_image">
        <div class="banner">
            <div class="bg_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_content text-center">
                            <h1 class="font-weight-normal">Tất cả sản phẩm</h1>
                            <ul>
                                <li class="mx-1">
                                    <a href="{{ route('home') }}">
                                        <i class="fal fa-home-alt mr-1"></i>Trang chủ
                                    </a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-chevron-double-right"></i>
                                </li>
                                <li class=" mx-1 active">Chi tiết sản phẩm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="login-wrapper all_product_section product_detai_section">
    <div class="container">
        <div class="head_product_detail">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="slider slider-nav">
                                        <div>
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset($product->image) }}" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 text-center">
                                    <div class="slider slider-for">
                                        <div>
                                            <img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" alt="">
                                        </div>
                                        <div>
                                            <img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf

                        <h5 class="product_name">{{ $product->name }}</h5>
                        <div class="product_info">
                            <div class="row">
                                <div class="left col-md-6">
                                    @if($product->sale_price)
                                    <p class="product_sale_price d-inline">{{ number_format($product->sale_price, 0) }}đ</p>
                                    <span class="product_price d-inline">({{ number_format($product->price, 0) }}đ)</span>
                                    @else
                                    <p class="product_sale_price d-inline">{{ number_format($product->price, 0) }}đ</p>
                                    @endif
                                </div>
                                <div class="right d-flex col-md-6 justify-content-end">
                                    <div class="star_rating d-inline">
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="product_quantity_review">(22)</span>
                                </div>
                            </div>
                        </div>
                        <div class="product_review mt-4">
                            <p class="title">Mô tả</p>
                            <p class="content">{{ $product->description }}</p>
                        </div>
                        <div class="product-attribute">
                            @if(isset($productAttributes) && !$productAttributes->isEmpty())
                            <div class="attribute mt-3">
                                <p class="title">Tùy chọn</p>
                                <div class="form-group">
                                    <select name="productAttribute" id="productAttribute" class="form-control select2">
                                        @foreach($productAttributes as $productAttribute)
                                        <option value="{{ $productAttribute->id }}">
                                            @foreach($productAttribute->attributesValues as $value)
                                            {{ $value->attribute->name }} : {{ ucwords($value->value) }}
                                            @endforeach

                                            @if(!is_null($productAttribute->price))
                                            ( {{ number_format($productAttribute->price, 0) }}đ )
                                            @endif
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="attribute mt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="title">SKU</p>
                                        <p class="title">Danh mục</p>
                                        <p class="title">Nhãn</p>
                                        <p class="title">Chia sẻ</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $product->sku }}</p>
                                        <p>{{ $product->category->name }}</p>
                                        <p>Thời trang | Đàn ông | Lịch lãm</p>
                                        <p class="product_sharing">
                                            <a href=""><i class="fab fa-facebook-f"></i></a>
                                            <a href=""><i class="fab fa-twitter"></i></a>
                                            <a href=""><i class="fab fa-instagram"></i></a>
                                            <a href=""><i class="fab fa-pinterest-p"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_action mt-4">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                            <input type="hidden" name="product" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-fill-out filter_btn">Thêm vào giỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="body_product_detail mb-70">
            <div class="row">
                <div class="col-12">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#body">Nội dung</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#review">Nhận xét</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="body" class="container tab-pane active"><br>
                            <h3>HOME</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.</p>
                        </div>
                        <div id="review" class="container tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="foot_product_detail">
            <h4 class="title"><span class="underline">Thêm</span> nhận xét của bạn</h4>
            <div class="choose_star">
                <div class="d-inline">
                    <span>Đánh giá</span>
                    <div class="star_rating d-md-inline mt-2 ml-md-5 pl-md-2">
                        <div class="star d-inline mr-4">
                            <a href="#/"><i class="fas fa-star"></i></a>
                        </div>
                        <div class="star d-inline mr-4">
                            <a href="#/">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </a>
                        </div>
                        <div class="star d-inline mr-4">
                            <a href="#/">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </a>
                        </div>
                        <div class="star d-inline mr-4">
                            <a href="#/">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </a>
                        </div>
                        <div class="star d-inline mr-4 checked">
                            <a href="#/">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-review mt-4">
                <div class="contact_form">
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control" placeholder="Tên bạn..." name="name" required="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="email" class="form_control" placeholder="Địa chỉ E-mail..." name="email" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <textarea class="form_control" placeholder="Đánh giá của bạn..." name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="button_box">
                                    <button class="btn btn-fill-out">Để lại đánh giá</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="related_products mt-5 pt-5">
            <div class="text-center">
                <h1>Sản phẩm liên quan</h1>
            </div>

            <div class="products mt-5">
                @foreach($relatedProducts as $product)
                <div class="product_section col-12">
                    <div class="card">
                        <div class="row">
                            <div class="product_image col-md-4 col-sm-12 col-12">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" class="card-img card-img-list" alt="">
                                </a>

                                <div class="product_item">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="add-wishlist @if(auth()->user()->isFavorited($product->id)) active @endif" data-product="{{ $product->id }}">
                                            <i class="fal fa-heart"></i>
                                        </a>
                                        <a class="add-cart">
                                            <i class="fal fa-shopping-bag"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                <a href="{{ route('product.show', $product->slug) }}">
                                    <h4 class="card-title">{{ $product->name }}</h4>
                                </a>
                                <span class="price mr-5">
                                    @if($product->sale_price)
                                    <span class="new">{{ number_format($product->sale_price, 0) }}đ</span>
                                    <span class="old">{{ number_format($product->price, 0) }}đ</span>
                                    @else
                                    <span class="new">{{ number_format($product->price, 0) }}đ</span>
                                    @endif
                                </span>
                                <div class="star_rating d-inline-block">
                                    <i class="fas fa-star checked"></i>
                                    <i class="fas fa-star checked"></i>
                                    <i class="fas fa-star checked"></i>
                                    <i class="fas fa-star checked"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section>
@stop

@section('script')
<script>
    /*-------------------------------
        Plus and minus quantity
	------------------------------ */
    $(function() {

        $(".plus").on("click", function() {
            var self = this;
            var qty = $(self).closest("div.quantity").find(".qty");

            if (qty.val()) {
                qty.val(+qty.val() + 1);
                $(self).closest("div.quantity").find(".minus").attr("disabled", false);
                //Trigger change event
                qty.trigger("change");
            }
        });

        $(".minus").on("click", function() {
            var self = this;

            var qty = $(self).closest("div.quantity").find(".qty");

            if (qty.val() <= 1) {
                $(self).attr("disabled", true);
            } else {
                qty.val(+qty.val() - 1);
                //Trigger change event
                qty.trigger("change");
            }
        });

        $(".qty").on("change", debounce(function(e) {
            var self = this;

            if ($(self).val() <= 0) {
                $(self).val(1);
            }

            // var id = $(self).closest("tr").attr('id');
            // var qty = $(self).val();
            // var total = $(self).closest("tr").find(".product-subtotal");

            // $.ajax({
            //     "url": "cart/update/" + id,
            //     "method": "POST",
            //     "data": {
            //         "quantity": qty,
            //     }
            // }).done(function(json) {
            //     // console.log(json);

            //     if (json.success === true) {
            //         total.html(json.item_total);
            //         $('#cart_subtotal').html(json.cart_subtotal);
            //         $('#cart_total > strong').html(json.cart_total);
            //         $('#cart_count').html(json.cart_count);
            //     } else {
            //         Swal.fire({
            //             toast: true,
            //             position: "top-end",
            //             showConfirmButton: false,
            //             timer: 3000,
            //             icon: "error",
            //             title: json.msg,
            //         });
            //     }
            // });
        }, 300));
    });
</script>
@endsection