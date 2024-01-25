@extends('layouts.main')


@section('myContact')
  <h1 style="color: red;">Home Page</h1>



<img src="{{asset('image/car.webp')}} " alt="" width="300px">

<a href=" {{ url('resultPage/10/20')}} "> URL  </a>|
<a href=" {{ route('res',[100,200])}} ">ROUTE </a> |
<a href=" {{ url('paraPass')}} "> Para Pass URL  </a>|
<a href=" {{ route('passWithPara',"Moe Min Thway")}} ">Para Pass Route </a>
@endsection

@section('footer')
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus beatae repellendus harum eum. Necessitatibus ab culpa nobis. Odit officiis sequi quidem, aut enim aliquid debitis voluptatibus iure laudantium, qui consectetur.</p>
@endsection


{{-- @section('js')
    <script> alert("MMT") </script>
@endsection --}}
{{-- @push('stackPush')
    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus blanditiis hic natus fugiat ducimus officia omnis corporis dolorum nihil deleniti delectus, vel voluptatum eum voluptate sit nemo obcaecati quae laboriosam.</h1>
@endpush
@push('stackPush')
    <script> alert("This is stack push") </script>
@endpush --}}
