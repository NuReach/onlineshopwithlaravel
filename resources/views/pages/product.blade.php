@extends('/layouts.app-layout')
@section('content')
<form  class="p-9  flex flex-col justify-center items-center md:flex md:flex-row md:space-x-9 md:justify-center" action="{{route('addToCart',$product->id)}}" method="POST">
    @csrf
    <input type="hidden" name="userId" value="{{auth()->user()->id}}">
    <input type="hidden" name="productId" value="{{$product->id}}">
    <div class=" flex w-80 shadow-md rounded-md">
      <img
        src="{{$product->image}}"
        alt=""
      />
      <input type="hidden" name="image" value="{{$product->image}}">
    </div>
    <div class="shadow-md w-80 rounded-md p-9 space-y-2 mt-3 md:mt-0 ">
        <div>
        <p  class="text-2xl font-bold" >{{$product->name}}</p>
        </div>
        <div class=" flex flex-col -space-y-1 ">
        <p class=" font-semibold text-md">Description</p>
        <p class="font-thin leading-tight">{{$product->description}}</p>
        <input type="hidden" name="description" value='{{$product->description}}'>
        </div>
        <div class=" flex flex-col -space-y-1 ">
        <p class=" font-semibold text-md">Price</p>
        <p class="font-thin">${{$product->price}}</p>
        <input type="hidden" name="price" value="{{$product->price}}">
        </div>
        <div class="flex space-x-3 items-center justify-between">
            <p class=" font-semibold text-md">Color</p>
            <select class="border-none focus:ring-0 font-thin" name="color" id="" value="{{$product->color}}"> 
            @foreach ($colors as $color)
            <option value="{{$color->id}}" class="border-none  font-thin">{{$color->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="flex space-x-3 items-center justify-between">
            <p class=" font-semibold text-md">Size</p>
            <select class="border-none focus:ring-0 font-thin" name="size" id="" value="{{$product->size}}"> 
            @foreach ($sizes as $size)
            <option value="{{$size->id}}" class="border-none focus:ring-0 font-thin">{{$size->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="flex flex-col ">
        <p class=" font-semibold text-md">Category</p>
            <div class="flex space-x-3">
            @foreach ($categories as $category)
            <p value="{{$category->id}}" class="border-none focus:ring-0 font-thin">{{$category->name}}</p>
            @endforeach
            </div>
        </div>
        <div class="flex justify-between items-center ">
            <p class=" font-semibold text-md">Quantity</p>
            <input type="number" name="quantity" value="1" class="border-1 rounded-lg font-thin focus:ring-0 w-16" min="1">
        </div>
        <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium 
        rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">ADD TO CART</button>
        
        @if (session('sucMsg'))
            <div id="toast-success" class="  flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                    </svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ml-3 text-sm font-normal">  {{ session('sucMsg') }}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            @endif
    </div>
</form>
@endsection