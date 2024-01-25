<?php

namespace App\Http\Controllers;

use Storage;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    // create
    // public function create(){

    //     // $posts = Post::orderBy('created_at','desc')->get()->toArray(); //Post::get();// Post::all();
    //     $posts = Post::orderBy('created_at','desc')->paginate(3);
    //     // $posts = Post::orderBy('created_at','desc')->get();
    //     // dd($posts->toArray());
    //     return view('create',compact('posts'));
    // }
    //post create
    // public function postCreate(Request $req){
    //      $this->newValidationCreate($req);
    //    $data = $this->getPostData($req);
    //    $dd($date);
    //     Post::create($data);
    //     // return view('create');

    //      return back()->with(['insertSuccess'=>'Post Create Success.']);
    //     // return redirect('home'); //url
    //     //return redirect()->route('wc'); //route
    // }
    public function postCreate(Request $req){
        // dd($req->hasFile('postImage')? "Yes Img":"no  image");
       // dd($req->file('postImage'));
        // dd($req->file('postImage')->path());
        // dd($req->file('postImage')->extension());
        // dd($req->file('postImage')->getClientOriginalName());

         $this->newValidationCreate($req);
          $data = $this->getPostData($req);
         // $this->createImageFile($req);
         if($req->hasFile('postImage')){
            $fileName = uniqid()."to_do_list_" . $req->file('postImage')->getClientOriginalName();
            // $req->file('postImage')->storeAs('myImage',$fileName);
            $req->file('postImage')->storeAs('public',$fileName);//if we write public it know both
            $data['image']=$fileName; //storage
            // $file->move(public_path().'/uploads/'.$fileName); // if we want to storge public -> storage
            // $file->move(storgae_path().'/uploads/'.$fileName); // if we want to storge
            // dd($data);
        }else{
             $data['image']=null;
        }
// dd($data);


        Post::create($data);

        // dd($data);
         return back()->with(['insertSuccess'=>'Post Create Success.']);

    }
    //delete
    public function postDelete($id){
        //first way
        Post::where('id',$id)->delete();
        return redirect()->route('post#createPage');
        // return view('create');
        // If we write that we cannot get scan point is
        // $posts = Post::orderBy('created_at','desc')->get()->toArray();
        //view ('create') is page

        //second way
        Post::find($id)->delete();
        return redirect()->route('post#createPage')->with(['deleteSuccess'=>"Post Delete Success."]);
    }

    public function updatePage($id){

          $post =Post::where('id',$id)->first(); //{{$post[0]['title']}}
        // $post =Post::where('id',$id)->first()->toArray();// {{$post['title']}}
        // $post =Post::find('id',$id)->get()->toArray();
    //   $post=  Post::first()->toArray();
        // dd($post);
        return view('update',compact('post'));
    }
    public function editPage($id){

        $post =Post::where('id',$id)->get()->toArray(); //direct
        // dd($post);
        return view('edit',compact('post'));
    }
    //update post
    // public function update(Request $req){
    // //    dd($req->all());
    //     $this->newValidationCreate($req);
    //     $updateData = $this-> getUpdateData($req);
    //     // dd($updateData);
    //     $id = $req->postId;
    //     Post::where('id',$id)->update($updateData);
    //     return redirect()->route('post#createPage')->with(['updateSuccess'=> "Post Update Success."]);
    // }
    public function update(Request $req){
        $this->newValidationCreate($req);
        $updateData = $this-> getUpdateData($req);
        $id = $req->postId;
          if($req->hasFile('postImage')){

            //delete old image
            $oldImgName=  Post::select('image')->where('id', $req->postId)->first()->toArray();
            $oldImgName =$oldImgName['image'];

            if($oldImgName!=  null){
              Storage::delete('public/'.$oldImgName);

            }

            $fileName = uniqid()."to_do_list_" . $req->file('postImage')->getClientOriginalName();
            $req->file('postImage')->storeAs('public',$fileName);
            $updateData['image']=$fileName; //storage

        }


        Post::where('id',$id)->update($updateData);
        return redirect()->route('post#createPage')->with(['updateSuccess'=> "Post Update Success."]);
    }
    private function newValidationCreate($req){
        // dd($status);

            $validationRole = [
                'postTitle'=>'required|unique:posts,title,'.$req->postId,
                'postDescription'=>'required',
                 'postFee'=>'required',
                 'postAddress'=>'required',
                'postRating'=>'required',
                // 'postImage'=>'mimes:jpg,png,jpeg|file',

            ];


        $validationMessage=[
            'postTitle.required'=>'Need to fill post title',
            'postTitle.min'=>'at least 3 and max 10',
            'postTitle.max'=>'at least 3 and max 10',
            'postTitle.unique'=>'Post title must be unique',
            'postDescription.required'=>'Need to fill post description',
            'postFee.required'=>'Need to fill post fee',
            'postAddress.required'=>'Need to fill post address',
            'postRating.required'=>'Need to fill post rating',
            'postImage.mimes'=>'Must be jpg,png,jpeg',
            'postImage.file'=>'Must be files',

        ];
        $validator =Validator::make($req->all(),$validationRole,$validationMessage)->validate();
    }
    private function oldValidation($req){
        $validator =Validator::make($req->all(),[
            'postTitle'=>'required|unique:posts|max:10|min:3',
            'postDescription'=>'required',
        ]);
        if($validator->fails()){
            return back()
                    ->withError($validator)
                    ->withInput();
        }
    }
    //get update data
    private function getUpdateData($req){
        return [
            'title' => $req->postTitle,
            'description' => $req->postDescription,
                'price' => $req->postFee,
                'address' => $req->postAddress,
                'rating' => $req->postRating,
                'image' => $req->postImage
        ];
    }
    //get post data
    private function getPostData($req){
        $response =[
            'title'=> $req->postTitle,
            'description'=> $req->postDescription,
            'price' => $req->postFee,
            'address' => $req->postAddress,
            'rating' => $req->postRating,
            // 'image' => $req->postImage,

        ];
        return $response;
    }
    // private function createImageFile($req){
    //     if($req->hasFile('postImage')){
    //         // $imgName = $req->file('postImage')->getClientOriginalName();
    //         // $fileName = uniqid() . $req->file('postImage')->getClientOriginalName();
    //         $fileName = uniqid()."to_do_list" . $req->file('postImage')->getClientOriginalName();
    //         // $req->file('postImage')->store('myImage');
    //         // $req->file('postImage')->storeAs('myImage','ss.png');
    //         $req->file('postImage')->storeAs('myImage',$fileName);
    //         // dd("DD Store success");
    //         $data['image']=$fileName;
    //     }
    //     else{
    //         // dd("no image");
    //     }
    // }
    //==============================================================


    //where &&
    //orWhere ||
    //Query Builder
    // public function create(){
    //     // $posts= Post::where('id','<=','10')->where("address","=","Ayeyawady")->get()->toArray();
    //     // $posts= Post::where('id','<=','30')->pluck("address")->toArray();
    //     //$posts = Post::pluck('title');   //pluck value only
    //     // $posts = Post::select('title',"price")->get();// select(*)
    //     // $posts = Post::where("id","<","3")->get()->random();

    //     // $posts = Post::orderBy("id","desc")->get();
    //     // $posts = Post::whereBetween("id",[3,7])->orderBy("price","desc")->get()->dd();
    //     // $posts = Post::where("address","Ayeyawady")->dd();
    //     // $posts = DB::table("posts")->where("address","Ayeyawady")->dd();
    //     // $posts = DB::table("posts")->where("address","Ayeyawady")->value("price");
    //     $posts = DB::table("posts")->select("address as location")
    //     ->groupBy('address')
    //     ->get()
    //     ->toArray();
    //     $posts = DB::table("posts")->select(  "address", DB::raw('count(address) as address_count'))
    //     ->groupBy('address')
    //     ->get()
    //     ->toArray();

    //     // dd($posts[0]["title"]);
    //     dd($posts);
    //     return view('create',compact('posts'));
    // }

    //map each (through  use in paginate )
    // public function create(){
    //     // $posts =    Post::get()->map(function($p){
    //     //     $p->title = strtoupper($p->title);
    //     //     $p->description = strtoupper($p->description);
    //     //     // $p->price = ($p->price   *30) /100;
    //     //     return $p;
    //     // })->toArray();
    //     $posts =    Post::paginate(5)->through(function($p){
    //         $p->title = strtoupper($p->title);
    //         $p->description = strtoupper($p->description);
    //         // $p->price = ($p->price   *30) /100;
    //         return $p;
    //     })->toArray();

    //     dd($posts);
    //     return view('create',compact('posts'));
    // }


    // public function create(){
    //     //http://localhost/to_do_list/public/customer/createPage?key = "code lab"
    //     //$searchKey =  $_REQUEST['key'];
    //    //  dd($searchKey);
    //     // $posts =Post::where("title","like",'%'.$searchKey.'%')->get()->toArray();

    //     $posts = Post::when($_REQUEST['key'],function($p){
    //         $searchKey =$_REQUEST['key'];
    //         $p->where("title","like",'%'.$searchKey.'%');
    //     })->get()->toArray();
    //     //key exist
    //     //Post::get();
    //     // //key not exist
    //     // Post::where("title","like",'%'.$searchKey.'%')->get();

    //     // dd($posts);
    //     return view('create',compact('posts'));
    // }
    public function create(){

        $posts = Post::when(request('searchKey'),function($query){
            $key=request('searchKey');
            $query
            ->orWhere('title','like','%'.$key."%")
            ->orWhere('description','like','%'.$key."%");
        })->orderBy('created_at','desc') ->paginate(4);

        return view('create',compact('posts'));
    }
}

