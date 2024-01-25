@extends('master')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class=" col-5 ">
            <div class="p-3">

                @if (session('insertSuccess'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('insertSuccess')}} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                </div>
                @endif
                @if (session('updateSuccess'))
                <div class="alert-message">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{session('updateSuccess')}} </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                </div>
                @endif
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error )
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>

                @endif --}}

                <form action="{{route('post#create')}} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="text-group mb-3">
                        <label for="title">Post Title</label>
                        <input id="title" type="text" name="postTitle" class="form-control @error('postTitle') is-invalid @enderror " value="{{old('postTitle')}}"  placeholder="Enter Post Title...">

                        @error('postTitle')
                           {{-- <small class="text-danger">Post Title is required</small> --}}
                           <div class="invalid-feedback">
                            {{-- Post Title is required --}}
                            {{$message}}
                        </div>
                        @enderror

                    </div>

                    <div class="text-group mb-3">
                        <label>Post Description</label>
                        <textarea id="desc" name="postDescription" class="form-control @error('postDescription') is-invalid @enderror"   placeholder="Enter Post Description..." id="" cols="30" rows="10">{{old('postDescription')}}</textarea>

                        @error('postDescription')
                        {{-- <small class="text-danger">Post Description is required</small> --}}
                        <div class="invalid-feedback">
                            {{-- Post Description is required --}}
                            {{$message}}
                        </div>
                     @enderror

                    </div>

                    <div class="text-group mb-3">
                        <label> Image</label>
                        <input type="file"   name="postImage" class="form-control  @error('postImage') is-invalid @enderror"   placeholder="Enter Post Fee ...">

                        @error('postImage')
                        <div class="invalid-feedback">
                            {{$message}}
                         {{-- <h5>File type must be jpeg,jpg,png</h5> --}}
                     </div>
                     @enderror
                    </div>

                    <div class="text-group mb-3">
                        <label> Fee</label>
                        <input type="number" value="{{old('postFee')}}"  name="postFee" class="form-control  @error('postFee') is-invalid @enderror"    placeholder="Enter Post Fee ...">
                        @error('postFee')
                        <div class="invalid-feedback">
                         {{$message}}
                     </div>
                     @enderror
                    </div>



                    <div class="text-group mb-3">
                        <label for="desc"> Address</label>
                        <input type="text" value="{{old('postAddress')}}"  name="postAddress" class="form-control  @error('postAddress') is-invalid @enderror"   placeholder="Enter Post Address ...">
                        @error('postAddress')
                        <div class="invalid-feedback">
                         {{$message}}
                     </div>
                     @enderror
                    </div>

                    <div class="text-group mb-3">
                        <label> Rating</label>
                        <input type="number" value="{{old('postRating')}}"
                        name="postRating" class="form-control  @error('postRating') is-invalid @enderror"
                        placeholder="Enter Post Rating ...">
                        @error('postRating')
                            <div class="invalid-feedback">
                               {{$message}}
                            </div>
                         @enderror
                     </div>





                     <div class="mb-3">
                        <input type="submit"   class="btn btn-danger" value="Create">
                    </div>
                  </form>
            </div>
        </div>
        <div class=" col-7 "">
            <h3 class="mb-3">
                <div class="row">
                    <div class="col-5"> Total -{{$posts->total()}}</div>
                    <div class="col-5 offset-2">
                        <form action="{{ route('post#createPage')}}" method="get">
                            <div class="d-flex">
                                <input type="text" value="{{ request('searchKey') }}" placeholder="Enter the Search key..." class="form-control" name="searchKey" id="">
                                <button type="submit" class="btn btn-success">
                                   <div class="d-flex">
                                    {{-- <strong>Search</strong> --}}
                                    <i class="fa-solid fa-magnifying-glass px-2 py-1"></i>
                                   </div>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </h3>
            <div class="data-container">


                @if (count($posts) == 0)
                    <h1 class="text-danger">No Result</h1>
                @else
                @foreach ($posts as $item )
                <div class="post p-3 mb-4 shadow-sm">
                    {{-- <h5>{{  $item['title'] }} </h5> --}}
                    <div class="row">
                        <h5 class="col-7">{{  $item['title'] }} | {{$item['id']}} </h5>
                        <h5 class="col-5">{{  $item->created_at->format("d/m/Y | n:i:A")}}</h5>

                        {{-- <span class="col"> {{ $item['created_at'] }} </span> --}}
                    </div>
                    {{-- <p class="text-muted"> {{ substr ( $item['description'],0,100 )     }}</p> php --}}
                    <p class="text-muted"> {{ Str::words ( $item['description'],50,'...' )     }}</p>{{-- laravel --}}
                    <span>
                        <i class="fa-solid fa-money-check-dollar"></i> {{$item->price}} kyats
                    </span> |
                    <span>
                      <i class="fa-solid fa-location-dot"></i>  {{$item->address}}
                    </span> |
                    <span>
                        {{$item->rating}}<i class="fa-solid fa-star"></i>
                    </span>

                    <div class=" text-right  ">
                        {{-- <a href=" {{ url('post/delete/'.$item['id'])}}"> --}}
                        <a href=" {{ route('post#delete',$item['id'])}}">
                            <button class=" btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash p-2"></i>Delete
                            </button>
                        </a>
                        {{-- <form action="{{ route('post#delete',$item['id'])}}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class=" btn btn-sm btn-danger">
                                    <i class="fa-solid fa-trash p-2"></i>Delete
                                </button>
                        </form> --}}
                        <a href="{{route('post#updatePage',$item['id'])}}">
                            <button class=" btn btn-sm btn-primary">
                                <i class="fa-regular fa-file-lines p-2"></i>Details
                             </button>

                        </a>

                    </div>
                </div>
                @endforeach
                @endif




            </div>
            {{-- {{$posts->links()}} --}}
            {{$posts->appends(request()->query())->links()}}
        </div>
    </div>
</div>

@endsection

{{--  --}}
