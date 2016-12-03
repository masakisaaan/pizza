@extends('template/admin')

@section('title', 'メニュー編集')

@section('css')
    <link rel="stylesheet" href="/css/pizzzzza/menu/index.css" media="all" title="no title">
    <link href="/plug/featherlight/featherlight.css" title="Featherlight Styles" rel="stylesheet"/>
@endsection

@section('pankuzu')
    <ol class="breadcrumb">
        <li><a href="/pizzzzza/order/top">ホーム</a></li>
        @if(is_null($product->deleted_at))
            <li><a href="/pizzzzza/menu">商品一覧</a></li>
        @else
            <li><a href="/pizzzzza/menu/history">商品履歴一覧</a></li>
        @endif
        <li><a href="/pizzzzza/menu/{{$product->id}}/show">{{$product->product_name}}</a></li>
        <li class="active">編集</li>
    </ol>
@endsection

@section('main')
    <h1>商品編集</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="/pizzzzza/menu/{{ $product->id }}/update" method="post">
        <div class="row">
            <div class="col-md-7">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th class="text-center" style="width:15%">名前</th>
                        <td><input class="form-control" type="text" name="product_name" value="{{ $product->product_name }}"></td>
                    </tr>
                    <tr>
                        <th class="text-center">画像</th>
                        <td class="imgInput">
                            <img class="imgView mb" src="{{ $product->product_image }}" alt="">
                            <input type="file" name="product_img" >
                            <div class="caption mt">※ 横:366px 縦:223px 拡張子: jpg</div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center">内容</th>
                        <td><textarea class="form-control" name="product_text" rows="5" >{{ $product->product_text }}</textarea></td>
                    </tr>
                    <tr>
                        <th class="text-center">ジャンル</th>
                        <td>
                            <select name="product_genre_id" >
                                <option value="{{ $product->genre->id }}" selected>{{ $product->genre->genre_name }}</option>
                                ----
                                <option value="1">ピザ</option>
                                <option value="2">サイド</option>
                                <option value="3">ドリンク</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center">金額</th>
                        <td><input class="form-control" type="text" name="product_price" value="{{ $product->productPrice->product_price }}"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th class="text-center">販売開始日</th>
                        <td><input class="form-control" type="date" name="product_sales_start_day" value="{{$product->sales_start_date }}"></td>
                    </tr>
                    <tr>
                        <th class="text-center">販売終了日</th>
                        <td><input class="form-control" type="date" name="product_sales_end_day" value="{{$product->sales_end_date }}"></td>
                    </tr>
                    <tr>
                        <th class="text-center">登録日</th>
                        <td>{{ $product->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="text-center">更新日</th>
                        <td>{{ $product->updated_at }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 col-md-offset-4 ac">
                <a class="btn btn-default btn-lg mr" href="/pizzzzza/menu">戻る</a>
                <input type="submit" class="btn btn-primary btn-lg" name="update" value="更新">
            </div>
        </div>
        {{ csrf_field() }}
    </form>

@endsection


@section('script')
    <script type="text/javascript">
        $(function(){
            var setFileInput = $('.imgInput'),
                    setFileImg = $('.imgView');

            setFileInput.each(function(){
                var selfFile = $(this),
                        selfInput = $(this).find('input[type=file]'),
                        prevElm = selfFile.find(setFileImg),
                        orgPass = prevElm.attr('src');

                selfInput.change(function(){
                    var file = $(this).prop('files')[0],
                            fileRdr = new FileReader();

                    if (!this.files.length){
                        prevElm.attr('src', orgPass);
                        return;
                    } else {
                        if (!file.type.match('image.*')){
                            prevElm.attr('src', orgPass);
                            return;
                        } else {
                            fileRdr.onload = function() {
                                prevElm.attr('src', fileRdr.result);
                            }
                            fileRdr.readAsDataURL(file);
                        }
                    }
                });
            });
        });
    </script>
@endsection