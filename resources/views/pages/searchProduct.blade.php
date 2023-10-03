@extends('/layouts.app-layout')
@section('content')
<div  class="flex flex-wrap justify-center items-center my-9">
    @foreach($products as $product)
    <div class=" flex flex-col cards px-3 mx-6 mb-16">
          <a href="{{route('product',$product->id)}}">
            <img
              src="{{$product->image}}"
              style= "minWidth: 240 "
              alt=""
            />
          </a>
          <div class="flex justify-between px-1 font-bold">
            <p class="w-48 truncate">{{$product->name}}</p>
            <p>${{$product->price}}</p>
          </div>
          <div class="text-xs px-1 overflow-hidden line-clamp-2 ">
              {{$product->description}}
          </div>
      </div>
    @endforeach
</div>
@endsection