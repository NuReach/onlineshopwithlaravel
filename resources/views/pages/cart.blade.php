@extends('/layouts.app-layout')
@section('content')

<div class="container flex flex-col p-3 md:flex-row md:justify-center md:space-x-6">
    <div class="left w-full md:w-1/3">
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
    @foreach ($cartItems as $cartItem)
        <div class="item card-custome border-2 shadow-lg rounded-md p-3 flex justify-between mb-3">
            <div class=" flex space-x-3">
                <img src="{{$cartItem->product->image}}
                " class="w-14 rounded-md" alt="">
                <div class=" -space-y-1">
                    <p class="font-thin text-sm ">{{$cartItem->product->name}}</p>
                    <p class="font-thin text-sm ">Quantity:{{$cartItem->quantity}}</p>
                    <p class="font-thin text-sm">Size:{{$cartItem->size->name}}</p>
                    <p class="font-thin text-sm">Color:{{$cartItem->color->name}}</p>
                </div>
            </div>
            <div>
            <a href="{{route('cart.delete.action',$cartItem->id)}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 28">
            <path fill="gray" d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12L19 6.41Z"/></svg>
            </a>
            <p class="font-thin text-sm">${{$cartItem->total}}</p>
            </div>
        </div>
    @endforeach
    </div>
    <div class="right p-3 shadow-md md:w-1/4 h-fit ">
        <div class="flex justify-between">
            <p class="text-gray-400">Subtotal</p>
            <p class="text-gray-400">${{$subTotal}}</p>
        </div>
        <div class="flex justify-between">
            <p class="text-gray-400">Items</p>
            <p class="text-gray-400">{{$count}}</p>
        </div>
        <div class="flex justify-between">
            <p class="text-gray-400">Discount</p>
            <p class="text-gray-400">$0</p>
        </div>
        <div class="border-t-2 my-3"></div>
        <div class="flex justify-between">
            <p class="font-bold">Total</p>
            <p class="font-bold">${{$subTotal}}</p>
        </div>
        <form action="{{route('order.create.action')}} " method="POST">
        @csrf
        @foreach ($cartItems as $cartItem)
        <input type="hidden" name="cartItems[]" value="{{ $cartItem->id }}">
        @endforeach
        <button type="submit" class="w-full my-3 text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Order</button>
        </form>
        </div>
</div>

@endsection