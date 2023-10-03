@extends('/layouts.app-layout')
@section('content')
<div class="flex flex-col justify-center items-center my-9">
<div class="relative overflow-x-auto w-3/4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Size
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
@foreach($cartItems as $cartItem)   
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{$cartItem->product->name}}
                </th>
                <td class="px-6 py-4">
                {{$cartItem->color->name}}
                </td>
                <td class="px-6 py-4">
                {{$cartItem->size->name}}
                </td>
                <td class="px-6 py-4">
                {{$cartItem->quantity}}
                </td>
                <td class="px-6 py-4">
                {{$cartItem->product->price}}
                </td>
                <td class="px-6 py-4">
                ${{$cartItem->total}}
                </td>
                <td class="px-6 py-4">
                <a href="#">Delete</a>
                </td>
            </tr>
@endforeach
        </tbody>   
    </table>
</div>

        <div class="font-bold my-3 ">COMPLET YOUR INFORMATION</div>
        <div class="w-3/4 ">              
            <form method="POST" action="{{ route('sendOrder') }}" >
            @csrf
            @foreach ($cartItems as $cartItem)
            <input type="hidden" name="cartItems[]" value="{{ $cartItem->id }}">
            <input type="hidden" name="subTotal" value="{{ $subTotal }}">
            <input type="hidden" name="process" value="0">
            @endforeach
            <input type="hidden" name="userId" value="{{auth()->user()->id}}">
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Full Name</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Address</label>
                </div>
            </div>
            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="mobile" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number</label>
                </div>
            </div>
            <div class="flex flex-col lg:flex lg:justify-between ">
                <div class="mb-3">     
                    <div class="font-bold mb-3">Paid by :</div>          
                    <div class="flex items-center mb-4">
                        <input checked id="bank" onclick="javascript:yesnoCheck();" type="radio" value="bank" name="paidBy" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bank" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Bank</label>
                    </div>
                    <div class="flex items-center">
                        <input  id="deliver" onclick="javascript:yesnoCheck();" type="radio" value="onHand" name="paidBy" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="deliver" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">On Hand</label>
                    </div>
                </div>
                <div class="mb-3">     
                    <div class="font-bold mb-3">Service :</div>          
                    <div class="flex items-center mb-4">
                        <input checked id="pickUp" type="radio" value="pickUp" name="method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="pickUp" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pick Up</label>
                    </div>
                    <div class="flex items-center">
                        <input id="delivery" type="radio" value="delivery" name="method" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="delivery" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Delivery</label>
                    </div>
                </div>
                <div class="flex my-3 ">
                    <div class="text-md font-bold p-3 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">TOTAL</div>
                    <div class="text-md font-bold p-3 text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">${{$subTotal}}</div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

                <div id="uploadFile" class="flex items-center justify-center w-96 h-72">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
            </div>
          </form>
           
        </div>
        </div>
<script type="text/javascript">
  function yesnoCheck() {
    if (document.getElementById('bank').checked) {
      document.getElementById('uploadFile').style.visibility = 'visible';
    } else {
      document.getElementById('uploadFile').style.visibility = 'hidden';
    }
  }
</script>
@endsection