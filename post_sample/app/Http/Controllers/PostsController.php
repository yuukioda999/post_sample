<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;
use App\Http\Requests\PostRequest;
use Carbon\Carbon;

class PostsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //ポスト一覧を表示する

    public function index()
    {


        $posts = Post::where('user_id',Auth::id())->get();
        // $posts = Post::all();
        
        return view('home',['posts' => $posts]);
    }

    public function showCreate(){
        return view('post.form');
    }

    //ブログ登録
    public function exeStore(PostRequest $request){

        $nowtime = Carbon::now();

        $user = Auth::user();

        \DB::beginTransaction();
        try{
            $post = new Post();
            $post->title = $request->title;
            $post->content = $request->content;
            $user->posts()->save($post);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        
        \Session::flash('err_msg','ブログを登録しました');
         return redirect(route('home'));
    }

    //ブログ編集画面表示
    public function showEdit($id){

        $post = Post::find($id);
        if(is_null($post)){
            \Session::flash('err_msg','データがありません');
            return redirect(route('posts'));
        }

        return view('post.edit',['post' => $post]);
    }

    //ブログ更新
    public function exeUpdate(PostRequest $request){

        // $nowtime = Carbon::now();
        // $user = Auth::user();
        $inputs = $request->all();
        
        \DB::beginTransaction();
        try{
            $post = Post::find($inputs['id']);$post->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $post->save();
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
         return redirect(route('home'));
    }

    public function exeDelete($id){

        if(empty($id)){
            return redirect(route(''));
        }
        
        try{
         Post::destroy($id);
        }catch(\Throwable $e){
           
            abort(500);
        }

        return redirect(route('home'));
    }
}
