@extends('/layouts.admin-layout')
@section('content')
<div class="p-9 space-y-6 flex flex-col justify-center items-center">
    @foreach($orderDetail as $item)
        <div class=" border-2  p-6 md:w-1/2 shadow-lg flex flex-wrap space-x-0 md:space-x-3">
            <div class="flex flex-col border-0 md:border-r-2 pr-20 w-60">
                <div>ID:SHOPINKH{{$item->id}}</div>
                <div>Account:{{$item->user->name}}</div>
                <div>Email:{{$item->user->email}}</div>
                <div>Name:{{$item->name}}</div>
                <div>Mobile:{{$item->mobile}}</div>
                <div>PaidBy:{{$item->paidBy}}</div>
                <div>Method:{{$item->method}}</div>
                <div>Process:{{$item->process}}</div>
            </div>
            <div class="flex flex-col">
                @foreach($item->cartItems as $cart)
                <div class="flex items-center space-x-6">
                <div>{{$loop->index+1}}-</div>
                <div>{{$cart->product->name}}</div>
                <div>{{$cart->size->name}}</div>
                <div>{{$cart->color->name}}</div>
                <div>{{$cart->quantity}}</div>
                </div>
                @endforeach
            <div>Total:${{$item->subTotal}}</div>
            @if($item->process==0)
            <form action="{{route('confirmOrder',$item->id)}}" method="POST" >
            @csrf
            @method('PUT')
            <button type="submit" class="w-fit mt-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 
            focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2
             dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Waiting to be confirmed</button>
             </form>
            @else
            <div type="button" class="w-fit mt-3 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4
             focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600
              dark:hover:bg-green-700 dark:focus:ring-green-800">Your order is confirmed</div>
            @endif
            </div>

        </div>
    @endforeach
</div>

@endsection