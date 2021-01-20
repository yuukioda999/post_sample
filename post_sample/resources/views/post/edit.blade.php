@extends('layouts.app')
@section('title', 'ブログ編集')
@section('content')
<div class="row justify-content-center">
<div class="col-10 col-sm-10 col-md-6">
<h2>ブログ編集フォーム</h2>
<form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
@csrf
    <input type="hidden" name="id" value="{{ $post->id }}">
    <div class="form-group">
        <label for="title">
            タイトル
        </label>
        <input
            id="title"
            name="title"
            class="form-control"
            value="{{$post->title}}"
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
        >{{ $post->content }}</textarea>
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
            更新する
        </button>
    </div>
</form>
</div>
</div>
<script>
function checkSubmit(){
if(window.confirm('更新してよろしいですか？')){
return true;
} else {
return false;
}
}
</script>
@endsection