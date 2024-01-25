
@extends('master')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 offset-3">
                <div class="my-3">
                    <a href="{{route('post#home')}}" class="btn  text-decoration-none">
                        <i class="fa-solid fa-arrow-left-long"></i> Back
                    </a>
                </div>
                <h3>
                    <div class="row">
                        <div class="">   {{$post->title}}</div>
                    </div>

                  </h3>
                  <div class="d-flex">
                    <div class="btn btn-sm bg-dark text-white mx-2 my-3" ><i class="fa-solid fa-money-check-dollar"></i> {{$post->price}} kyats</div>
                    <div class="btn btn-sm bg-dark text-white mx-2 my-3" ><i class="fa-solid fa-location-dot"></i> {{$post->address}} </div>
                    <div class="btn btn-sm bg-dark text-white mx-2 my-3" > {{$post->rating}}<i class="fa-solid fa-star"></i></div>
                    <div class="btn btn-sm bg-dark text-white mx-2 my-3" ><i class="fa-solid fa-calendar-days"></i> {{$post->created_at->format('j-f-Y')}}</div>
                    <div class="btn btn-sm bg-dark text-white mx-2 my-3"><i class="fa-regular fa-clock"></i>    {{$post->created_at->format('h:m:s')}}</div>
                </div>

                  <div class="">
                    @if ($post->image==null)
                      <img class="img-thumbnail my-4 shadow" width="400px"   src="{{asset('404image.jpg')}}" alt="">

                    @else
                      <img class="img-thumbnail my-4 shadow"  src="{{asset('storage/'.$post->image)}}" alt="">

                    @endif



                  </div>
                <p class="text-muted">
                    <div class="row">
                        <div class="col-4">description</div>
                        <div class="col-8">   {{$post->description}}</div>
                    </div>
                </p>
                {{-- {{$post->created_at->format('j-F-Y')}} --}}
            </div>
        </div>
        <div class="row my-3">
            <div class="col-3 offset-8">
                <a href="{{ route('post#editPage',$post->id)}}">
                    <button class="btn bg-dark text-white my-3"> Edit</button>

                </a>
            </div>
        </div>
    </div>
@endsection
{{--  --}}
