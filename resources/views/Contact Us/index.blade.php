
@extends('template/master')

@section('title', 'お問い合わせ')

@section('css')
    <link rel="stylesheet" href="/css/pages/index.css" media="all" title="no title">
@endsection

@section('plug')

@endsection

@section('main')
    <div class="container wrap">
        <h1>お問い合わせ</h1>
        <div class="container">
          <form>
              <div class="form-group">
                  <label>メールアドレス(必須)</label>
                  <input type="text" name="email" class="form-control">
              </div>
              <div class="form-group">
                  <label>内容文</label>
                  <input type="text" name="sentence" class="form-control">
              </div>
              <div class="checkbox">
                  <label>
                      <input type="checkbox">
                  </label>
              </div>
              <button type="submit"></button>
          </form>
        </div>
    </div>
@endsection

@section('scrip')

@endsection
