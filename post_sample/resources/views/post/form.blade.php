@extends('layouts.app')
@section('title', 'ブログ投稿')
@section('content')
<div class="row justify-content-center">
<div class="col-10 col-sm-10 col-md-6">
<h2>ブログ投稿フォーム</h2>
<form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
@csrf

    <div class="form-group">
        <label for="title">
            タイトル
        </label>
        <input
            id="title"
            name="title"
            class="form-control"
            value="{{ old('title') }}"
            type="text"
        >
        @if ($errors->has('title'))
            <div class="text-danger">
                {{ $errors->first('title') }}
            </div>
        @endif
    </div>
    <div class="form-group">
        <label for="content">
            本文
        </label>
        <textarea
            id="content"
            name="content"
            class="form-control"
            rows="4"
        >{{ old('content') }}</textarea>
        @if ($errors->has('content'))
            <div class="text-danger">
                {{ $errors->first('content') }}
            </div>
        @endif
    </div>
    <div class="mt-5">
        <a class="btn btn-secondary" href="{{ route('home') }}">
            キャンセル
        </a>
        <button type="submit" class="btn btn-primary">
            投稿する
        </button>
    </div>
</form>
</div>
</div>
<script>
function checkSubmit(){
if(window.confirm('送信してよろしいですか？')){
return true;
} else {
return false;
}
}
</script>
@endsection