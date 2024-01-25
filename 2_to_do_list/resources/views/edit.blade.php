
@extends('master')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 offset-3">
                <div class="my-3">
                    <a href="{{route('post#updatePage',$post[0]['id'])}}" class="btn  text-decoration-none">
                        <i class="fa-solid fa-arrow-left-long"></i> Back
                    </a>
                </div>
                <form action="{{ route('post#update')}} " method="POST" enctype="multipart/form-data">
                    @csrf
                        <label  for="">Post Title</label>
                        <input type="hidden" name="postId" value="{{$post[0]['id']}}">

                        <input type="text" name="postTitle" class="form-control my-3 @error('postTitle') is-invalid @enderror" placeholder="Enter post title "  value="{{old('postDescription',$post[0]['title'])}}">
                    @error('postTitle')
                        <div class="invalid-feedback">
                         {{$message}}
                     </div>
                     @enderror

                        <label for="">Post Description</label>
                        <textarea  name="postDescription" class="form-control my-3 @error('postDescription') is-invalid @enderror" placeholder="Enter post description "  id="" cols="30" rows="10"> {{old('postDescription',$post[0]['description'])}}</textarea >
                    @error('postDescription')
                        <div class="invalid-feedback">
                         {{$message}}
                     </div>

                     @enderror
                         <div class="">
                            <label for="">Image</label>
                    @if ($post[0]['image']==null)
                      <img class="img-thumbnail my-4 shadow" width="400px"   src="{{asset('404image.jpg')}}" alt="">

                    @else
                      <img class="img-thumbnail my-4 shadow"  src="{{asset('storage/'.$post[0]['image'])}}" alt="">

                    @endif
             <div class="text-group mb-3">

                        <input type="file"  name="postImage" class="form-control" >


                    </div>


                     <label  for="">Post Fee</label>
                     <input type="number" name="postFee" class="form-control my-3 @error('postFee') is-invalid @enderror" placeholder="Enter post fee "  value="{{old('postFee',$post[0]['price'])}}">
                     @error('postFee')
                     <div class="invalid-feedback">
                      {{$message}}
                    </div>
                      @enderror


                     <label  for="">Post Address</label>
                     <input type="text" name="postAddress" class="form-control my-3 @error('postAddress') is-invalid @enderror" placeholder="Enter post address "  value="{{old('postAddress',$post[0]['address'])}}">
                     @error('postAddress')
                     <div class="invalid-feedback">
                      {{$message}}
                    </div>
                      @enderror


                     <label  for="">Post Rating</label>
                     <input type="number" min="0" max="5" name="postRating" class="form-control my-3 @error('postRating') is-invalid @enderror" placeholder="Enter post rating "  value="{{old('postRating',$post[0]['rating'])}}">
                     @error('postRating')
                     <div class="invalid-feedback">
                      {{$message}}
                  </div>
                     @enderror
                        <button type="submit" class="btn bg-dark text-white my-3 float-right"> Update</button>

                </form>
            </div>
        </div>

    </div>
@endsection
{{--  --}}
