@extends('layouts.app')

@section('content')
<div class="row"></div>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-12">


    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ブログ</a>
  <a class="nav-item nav-link" href="{{route('home')}}">ブログ一覧</a>
  <a class="nav-item nav-link" href="{{route('create')}}">ブログ投稿</a>

  
    </div>
  </div>
</nav>
   
    <br>
    <div class="container">
    <div class="row">
  <div class="col-md-12">
      
      <table class="table table-striped text-nowrap table-responsive-lg">
          <tr>
              
              <th>記事番号</th>
              <th>タイトル</th>
              <th>日付</th>
              <th>内容</th>
              <th></th>
              <th></th>
          </tr>
          @foreach($posts as $post)
          <tr>
              
              <td>{{ $post->id}}</td>
              <td><a href="/post/{{ $post->id }}">{{$post->title }}</a></td>
              <td>{{$post->updated_at }}</td>
              <td>{{$post->content }}</td>
              <td><button type="button" class="btn btn-primary" onclick="location.href='/post/edit/{{ $post->id }}'">編集</button></td>
              <form method="POST" action="{{ route('delete',$post->id ) }}" onSubmit="return checkDelete()">
              @csrf
              <td><button type="submit" class="btn btn-danger" onclick=>削除</button></td>
              </form>
          </tr>
          @endforeach
      </table>
  </div>
</div>
    </div>
    
</div>
</div>
</div>
<script>
function checkDelete(){
if(window.confirm('削除してよろしいですか？')){
return true;
} else {
return false;
}
}
</script>
@endsection
