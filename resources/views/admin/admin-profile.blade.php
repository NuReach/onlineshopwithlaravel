@extends('/layouts.admin-layout')
@section('content')

<div class="p-4 sm:ml-56">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
        <form class="bg-white" action="{{route('admin.users.edit.action',auth()->user()->id)}}" method="POST">
          @csrf
          <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fill-rule="evenodd"
                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                clip-rule="evenodd"
              />
            </svg>
            <input
              class="pl-2 focus:ring-0 focus:border-1 
                focus:border-gray-300 border-none placeholder-gray-500"
              type="text"
              name="name"
              value="{{auth()->user()->name}}"
              id=""
              placeholder="Full name"
            />
          </div>
          <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-400"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                strokeLinecap="round"
                strokeLinejoin="round"
                strokeWidth="2"
                d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"
              />
            </svg>
            <input
              class="pl-2 focus:ring-0 focus:border-1 
                focus:border-gray-300 border-none placeholder-slate-500"
              type="text"
              name="email"
              value="{{auth()->user()->email }}"
              id=""
              placeholder="Email Address"
            />
          </div>
          <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
            <select name="role"  value="{{auth()->user()->role}}"  class="pl-2 focus:ring-0 focus:border-1 focus:border-gray-300 border-none placeholder-slate-500" >
              <option value="admin">Admin</option>
              <option value="customer">Customer</option>
            </select>
          </div>
          <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5 text-gray-400"
              viewBox="0 0 20 20"
              fill="currentColor"
            >
              <path
                fillRule="evenodd"
                d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                clip-rule="evenodd"
              />
            </svg>
            <input
              class="pl-2 focus:ring-0 focus:border-1 
                focus:border-gray-300 border-none placeholder-slate-500"
              type="text"
              name="password"
              value="{{auth()->user()->password}}"
              id=""
              placeholder="Password"
            />
          </div>
          <button
            type="submit"
            class="block w-full bg-stone-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-2"
          >
            Update
          </button>
        </form>
   </div>
</div>

@endsection
