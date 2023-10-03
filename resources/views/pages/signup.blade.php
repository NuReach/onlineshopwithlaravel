<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
<div class=" flex justify-center items-center h-screen md:flex">
      <div class=" md:flex w-1/2 h-full bg-gradient-to-tr from-pink-600 to-purple-700 i justify-around items-center hidden">
        <div>
          <h1 class="text-white font-bold text-4xl font-sans">
            SHOPPINKKH
          </h1>
          <p class="text-white mt-1">The most popular Store for you</p>
          <button
            type="submit"
            class="block w-28 bg-white text-pink-600 mt-4 py-2 rounded-2xl font-bold mb-2"
          >
            Read More
          </button>
        </div>
      </div>
      <div class="flex md:w-1/2 justify-center py-10 items-center bg-white">
        <form class="bg-white" action="{{route('signupAction')}}" method="POST">
          @csrf
          <h1 class="text-gray-800 font-bold text-2xl mb-1">SIGN UP</h1>
          <p class="text-sm font-normal text-gray-600 mb-7">
            Your information
          </p>
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
              id=""
              placeholder="Email Address"
            />
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
              id=""
              placeholder="Password"
            />
          </div>
          <button
            type="submit"
            class="block w-full bg-stone-700 mt-4 py-2 rounded-2xl text-white font-semibold mb-2"
          >
            Sign up
          </button>
          <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">
            Forgot Password ?
          </span>
          <a href="/login">
            <span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">
              Log In
            </span>
          </a>
        </form>
      </div>
    </div>
</body>
</html>