@extends('template/admin')

@section('title', '値引きクーポン新規発行')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('pankuzu')
    <ol class="breadcrumb">
        <li><a href="/pizzzzza/order">ホーム</a></li>
        <li class="active">値引きクーポン新規発行</li>
    </ol>
@endsection

@section('main')
    <h1>値引きクーポン新規発行</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/pizzzzza/coupon/add/discount/do" method="post">
        <table class="table table-bordered ">
            <tbody>
            <tr>
                <th class="text-center">クーポン名</th>
                <td><input class="form-control" type="text" name="coupon_name" value="{{ old('coupon_name') }}" placeholder="冬限定５００円OFFクーポン"></td>
            </tr>
            <tr>
                <th class="text-center">クーポン番号</th>
                <td><input class="form-control" type="text" name="coupon_num" value="{{ old('coupon_num') }}" placeholder="半角英数字とハイフンのみ"></td>
            </tr>
            <tr>
                <th class="text-center">値引き額</th>
                <td><input class="form-control" type="number" name="coupon_discount_price" value="{{ old('coupon_discount_price') }}" placeholder="500"></td>
            </tr>
            <tr>
                <th class="text-center">利用開始日</th>
                <td><input class="form-control" type="date" name="coupon_start_date" value="{{ old('coupon_start_date') }}" checked>
                </td>
            </tr>
            <tr>
                <th class="text-center">利用終了日</th>
                <td><input class="form-control" type="date" name="coupon_end_date" value="{{ old('coupon_end_date') }}" placeholder="ハイフン抜き"></td>
            </tr>
            <tr>
                <th class="text-center">対象者</th>
                <td><select class="form-control" name="coupon_target" id="">
                        @if(old('coupon_target'))
                            @if(old('coupon_target') == 0)
                                <option value="0" selected>全員</option>
                                <option value="1">当店初回利用者限定</option>
                            @else
                                <option value="0">全員</option>
                                <option value="1" selected>当店初回利用者限定</option>
                            @endif
                        @else
                            <option value="0" selected>全員</option>
                            <option value="1">当店初回利用者限定</option>
                        @endif
                    </select>
                </td>
            </tr>
            <tr>
                <th class="text-center">利用上限回数</th>
                <td><input class="form-control" type="number" name="coupon_max" value="{{ old('coupon_max') }}" placeholder="１人あたりの使用上限回数を指定します">
                </td>
            </tr>
            <tr>
                <th class="text-center">利用条件金額</th>
                <td><input class="form-control" type="number" name="coupon_conditions_price" value="{{ old('coupon_conditions_price') }}"
                           placeholder="この金額以上の際にクーポンが適用可能になります"></td>
            </tr>
            <tr>
                <th class="text-center">利用条件商品</th>
                <td>
                    <select class="form-control" name="coupon_product_id" id="">
                        <optgroup label="●">
                            <option value="0">なし</option>
                        </optgroup>
                        <?php $cnt = 1; ?>
                        @foreach($products as $product)
                            @if(!isset($genre))
                                <?php $genre = $product->genre_id; ?>
                                <optgroup label="●">
                            @endif
                            @if($genre != $product->genre_id)
                                @if($cnt != 1)
                                <?php  $cnt = 1; ?>
                                </optgroup>
                                @endif
                                <?php $cnt = 0; $genre = $product->genre_id; ?>
                                <optgroup label="●">
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @else
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="col-md-4 col-md-offset-4 ac">
            <a class="btn btn-default btn-lg mr" href="/pizzzzza/coupon">戻る</a>
            <input type="submit" class="btn btn-primary btn-lg" name="store" value="追加">
        </div>
        {{ csrf_field() }}
    </form>
@endsection