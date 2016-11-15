
@extends('template/master')

@section('title', 'メニュー')

@section('css')
    <link rel="stylesheet" href="/css/cart/index.css" media="all" title="no title">
@endsection

@section('plug')
    <script src="/plug/heightLine/heightLine.js" charset="utf-8"></script>
@endsection

@section('main')
    <div id="cart" class="wrap">
        <h2>CART</h2>

        @if ($products)
            {{-- {{ dd($productMap) }} --}}

            <div class="clear btn">
                <form id="clear" action="/cart/clear" method="post">
                    <div class="inner form-bottom"><a>カートをカラにする</a></div>
                    {{ csrf_field() }}
                </form>
            </div>

            @foreach ($productMap as $product)
                <ul>
                    <li><img src="{{$product->product_image}}" alt="" /></li>
                    <li>{{$product->product_name}}</li>
                    <li>{{$product->product_text}}</li>
                    <li>{{$product->productPrice->product_price}}</li>
                    <li>{{$productCount[$product->id]}}</li>
                    <li>{{number_format($productCount[$product->id] * $product->productPrice->product_price)}}</li>
                </ul>
            @endforeach

            <div class="total">
                <p>合計金額: <span>{{ number_format($total) }}</span>円</p>
            </div>
            <div class="btn">
                <div class="inner special"><a href="/menu">買い物を続ける</a></div>
                <div class="inner"><a href="/menu">レジに進む</a></div>
            </div>
        @else
            <div class="empty">
                <div class="inner">
                    <i class="fa fa-cube" aria-hidden="true"></i>
                    <h3>カートの中にはなにもありませんでした。</h3>
                </div>

            </div>
            <div class="btn">
                <div class="inner"><a href="/menu">商品一覧へ</a></div>
            </div>
        @endif
    </div>
@endsection

@section('script')

@endsection
