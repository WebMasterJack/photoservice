<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Validator;
use Hash;
use Str;
use App\Http\Resources\PostResource;
class PostController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'title'=>'required|unique:posts',
            'anons'=>'required',
            'text'=>'required',
            'image'=>'required|image|mimes:jpg,png|max:2048',
        ]);
        
        if($validator->fails()){
            return resp([
                'status'=>false,
                'message'=>'NoAuth'
            ],401,'Invalid Auth');
        }
        $path=time().rand(0,99).'.png';
        $request->image->storeAs('public/post_images/',$path);
        $post = Post::create([
            'title'=>$request->title,
            'anons'=>$request->anons,
            'text'=>$request->text,
            'image'=>$path,
        ]);
        if(!is_null($request->tags)){
            $tags = explode(',',$request->tags);
            foreach($tags as $tag){
                $post->tags()->create(['name'=>$tag]);
            }
        }
        return resp([
            'status'=>true,
            'post_id'=>$post->id
        ],201,'Success creation');
    }
    public function update($id,Request $request){
        $validator = Validator::make($request->all(),[
            'image'=>'nullable|image|mimes:jpg,png|max:2048',
        ]);
        
        if($validator->fails()){
            return resp([
                'status'=>false,
                'message'=>$validator->errors()
            ],400,'Edditing error');
        }
        $post = Post::find($id);
        if(is_null($post)){
            return resp([
                'message'=>'Post not found'
            ],404,'Post not found');
        }
        if(!is_null($request->title)){

            if(!is_null(Post::where('title',$request->title)->first()) && $request->title != $post->title) {
                return resp([
                    'status'=>false,
                    'message'=>['title' => 'This title alredy exists']
                ],400,'Edditing error');
            }
            $post->title = $request->title;
        }
        if(!is_null($request->text)){
            $post->text = $request->text;
        }
        if(!is_null($request->anons)){
            $post->anons = $request->anons;
        }
        if(!is_null($request->tags)){
           $post->tags()->delete();
           $tags = explode(',',$request->tags);
           foreach($tags as $tag){
               $post->tags()->create(['name'=>$tag]);
           }
        }
        if(!is_null($request->image)){
            Storage::delete('public/post_images'.$post->image);

            $path=time().rand(0,99).'.png';
            $request->image->storeAs('public/post_images/',$path);

            $post->image = $path;
        }
        $post->save();

        return resp([
            'status'=>true,
            'post'=>PostResource::make($post)
        ],400,'Success creation');
    }
    public function destroy($id){
        $post = Post::find($id);
        if(is_null($post)){
            return resp([
                'message'=>'Post not found'
            ],404,'Post not found');
        }
        Storage::delete('public/post_images'.$post->image);
        $post->delete();
        return resp([
            'status'=>true,
        ],400,'Success delete');
    }
    public function all(){
        return resp(PostResource::collection(Post::all()),200,'List posts');
    }
    public function byid($id,Request $request){
        
        $post= Post::where('id',$id)->first();
        if(is_null($post)){
            return resp([
                'message'=>'Post not found'
            ],404,'Post not found');
        }
        return resp($post,200,'Post by ID');
    }
}
