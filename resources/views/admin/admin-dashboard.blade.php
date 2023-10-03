@extends('/layouts.admin-layout')
@section('content')

<div class="p-4 sm:ml-56">
   <div class="p-4 border-2 flex flex-wrap border-gray-200 border-dashed rounded-lg dark:border-gray-700 justify-center md:justify-start">
      <div class=" w-48 shadow-lg p-6 mx-6 mt-3" >
         <div class="font-bold text-xl">Users</div>
         <div>{{$users}}</div>
      </div>
      <div class=" w-48 shadow-lg p-6 mx-6 mt-3" >
         <div class="font-bold text-xl">Products</div>
         <div>{{$products}}</div>
      </div>
      <div class=" w-48 shadow-lg p-6 mx-6 mt-3" >
         <div class="font-bold text-xl">Colors</div>
         <div>{{$colors}}</div>
      </div>
      <div class=" w-48 shadow-lg p-6 mx-6 mt-3" >
         <div class="font-bold text-xl">Sizes</div>
         <div>{{$sizes}}</div>
      </div>
      <div class=" w-48 shadow-lg p-6 mx-6 mt-3" >
         <div class="font-bold text-xl">Categories</div>
         <div>{{$categories}}</div>
      </div>
      <div class=" w-48 shadow-lg p-6 mx-6 mt-3" >
         <div class="font-bold text-xl">Orders</div>
         <div>{{$orders}}</div>
      </div>
   </div>
</div>

@endsection
