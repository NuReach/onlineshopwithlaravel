@extends('/layouts.admin-layout')
@section('content')

<div class="p-4 sm:ml-56">
    <form action="{{route('admin.product.create.action')}}" method="POST">
        @csrf
        <div class="mb-6">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name</label>
            <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
        </div>
        <div class="mb-6">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Image</label>
            <input type="text" id="image" name="image"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
        </div>
        <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Description</label>
            <input type="text" id="description" name="description"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
        </div>
        <div class="mb-6">
            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
            <input type="number" id="price" name="price"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
        </div>
        <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Colors</label>
            <div class="flex flex-wrap">
            @foreach($colors as $color)
                <div class="mx-20 w-48 flex  items-center space-x-3">
                <input value="{{$color->id}}" name="colors[]" type="checkbox">
                <p>{{$color->name}}</p>
                </div>
            @endforeach
            </div>
        </div>
        <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sizes</label>
            <div class="flex flex-wrap">
            @foreach($sizes as $size)
                <div class="mx-20 w-48 flex  items-center space-x-3">
                <input value="{{$size->id}}" name="sizes[]" type="checkbox">
                <p>{{$size->name}}</p>
                </div>
            @endforeach
            </div>
        </div>
        <div class="mb-6">
        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">categories</label>
            <div class="flex flex-wrap">
            @foreach($categories as $category)
                <div class="mx-20 w-48 flex  items-center space-x-3">
                <input value="{{$category->id}}" name="categories[]" type="checkbox">
                <p>{{$category->name}}</p>
                </div>
            @endforeach
            </div>
        </div>
        <div class="mb-6">
        <button
            type="submit"
            class="block w-full bg-stone-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-2"
          >
            Create
          </button>
        </div>
    </form>
</div>

@endsection
