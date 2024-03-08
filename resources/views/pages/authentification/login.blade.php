@extends('layouts.app')
@section('content')
    <div class="h-screen md:flex">
        <div
            class="relative overflow-hidden md:flex w-1/2 bg-gradient-to-tr from-blue-800 to-purple-700 i justify-around items-center hidden">
            <div>
                <h1 class="text-white font-bold text-4xl font-sans">GoFinance</h1>
                <p class="text-white mt-1">The most popular peer to peer lending at SEA</p>
                <button type="submit" class="block w-28 bg-white text-indigo-800 mt-4 py-2 rounded-2xl font-bold mb-2">Read
                    More</button>
            </div>
            <div class="absolute -bottom-32 -left-40 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -bottom-40 -left-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-40 -right-0 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
            <div class="absolute -top-20 -right-20 w-80 h-80 border-4 rounded-full border-opacity-30 border-t-8"></div>
        </div>
        <div class="flex flex-col md:w-1/2 justify-center py-8 items-center bg-white">
            <form class="bg-white" action="{{ route('Login') }}" method="POST">
                @csrf
                @method('POST')
                <h1 class="text-gray-800 font-bold text-2xl mb-1">Hello Again!</h1>
                <p class="text-sm font-normal text-gray-600 mb-7">Welcome Back</p>

                <div class="flex items-center border-2 py-2 px-3 rounded-2xl mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="text" name="email" id=""
                        placeholder="Email Address" />
                </div>
                <div class="flex items-center border-2 py-2 px-3 rounded-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>
                    <input class="pl-2 outline-none border-none" type="password" name="password" id=""
                        placeholder="Password" />
                </div>
                <button type="submit"
                    class="block w-full bg-indigo-600 mt-4 py-2 rounded-2xl text-white font-semibold mb-2">Login</button>
                <a href="{{route('resset_pass')}}"><span class="text-sm ml-2 hover:text-blue-500 cursor-pointer">Forgot Password ?</span></a>

            </form>
            <div id="" class="w-60">
                <button id="register"
                    class="w-full group relative h-12 overflow-hidden rounded-lg bg-white text-lg shadow">
                    <div
                        class="absolute inset-0 w-3 bg-slate-400 transition-all duration-[250ms] ease-out group-hover:w-full">
                    </div>
                    <span class="relative text-black group-hover:text-white">Register here</span>
                </button>
            </div>
            <div>
                <button id="orgnizer"
                class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-pink-600 to-red-600 font-medium text-gray-100 block transition duration-300 w-full"
                type="submit">
                <span id="login_default_state">Register<span id="subtotal"></span></span>
            </button>
            </div>
        </div>
    </div>
    <!-- Client POPUP -->
    <section id="register_form" tabindex="-1"
        class="hidden bg-black/50 fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
        <div class="p-6 bg-sky-100 rounded">
            <div class="flex items-center justify-center font-black m-3 mb-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-3 text-red-600 animate-pulse"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" />
                </svg>
                <h1 class="tracking-wide text-3xl text-gray-900">Buy Me a Laptop</h1>
            </div>
            {{-- <form id="login_form" action="" method="POST" class="flex flex-col justify-center">
                <div class="flex justify-between items-center mb-3">

                </div> --}}
            <form action="{{ route('Register') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="role" value="client">

                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
				focus:outline-none
				focus:border-sky-500
				focus:ring-1
				focus:ring-sky-500
				focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="name" placeholder="tap your name here">
                </div>
                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
				focus:outline-none
				focus:border-sky-500
				focus:ring-1
				focus:ring-sky-500
				focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input type="text" name="email" placeholder="your email">
                </div>
                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
				focus:outline-none
				focus:border-sky-500
				focus:ring-1
				focus:ring-sky-500
				focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>

                    <input type="password" name="password" placeholder="your password">
                </div>

                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
			focus:outline-none
			focus:border-sky-500
			focus:ring-1
			focus:ring-sky-500
			focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>

                    <input type="password" name="pass_confirm" placeholder="conform your password">
                </div>
                <button
                    class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-pink-600 to-red-600 font-medium text-gray-100 block transition duration-300 w-full"
                    type="submit">
                    <span id="login_default_state">Register<span id="subtotal"></span></span>
                </button>
            </form>
            <div class="flex items-center mt-4 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                    <path fill="currentColor"
                        d="M16.563.969c-1.272 0-2.262.523-2.876 1.41a3.66 3.66 0 0 0-.452.907a2.904 2.904 0 0 0-.295-.09c-.754-.187-1.514-.057-2.158.25c-1.255.598-2.286 1.985-2.147 3.644l.23 4.828a5.358 5.358 0 0 0-.5-.326c-.543-.31-1.2-.545-1.916-.5c-.744.046-1.43.386-2.01 1.008c-1.105 1.188-1.397 3.126-.478 4.442c.368.526.757 1.07 1.15 1.622c.602.843 1.214 1.7 1.777 2.528c.46.677.87 1.308 1.19 1.86c.33.565.535.993.623 1.275c1.378 4.446 5.419 7.155 9.268 7.155c4.537 0 9.376-3.412 9.763-8.801l.711-12.131c.055-.775-.207-1.678-.713-2.395c-.525-.743-1.394-1.39-2.574-1.39c-.347 0-.662.047-.945.122v-.184c0-.843-.402-1.584-.94-2.097c-.538-.513-1.286-.872-2.1-.872a4.51 4.51 0 0 0-1.533.245a4.503 4.503 0 0 0-.312-.811a3.124 3.124 0 0 0-1.041-1.206c-.487-.325-1.067-.493-1.723-.493m9.884 8.957l-.71 12.118c-.302 4.157-4.089 6.938-7.768 6.938c-2.964 0-6.236-2.13-7.358-5.747c-.157-.508-.457-1.095-.804-1.69a34.865 34.865 0 0 0-1.266-1.977c-.57-.838-1.212-1.74-1.828-2.603c-.39-.547-.77-1.079-1.112-1.569c-.289-.413-.275-1.312.303-1.934c.273-.293.497-.364.67-.374c.2-.013.465.05.797.24c.303.173.604.419.883.696c.529.914 1.102 1.948 1.417 2.52a1 1 0 0 0 1.87-.599l-.905-8.872l-.004-.097l-.003-.042c-.064-.708.385-1.383 1.014-1.683c.3-.143.585-.17.817-.114c.178.044.381.152.575.399l.294 7.286a1 1 0 1 0 1.998-.081l-.311-7.73c0-.11-.003-.228-.005-.345l-.003-.148c.04-.418.156-.759.324-1c.21-.303.559-.55 1.23-.55c.301 0 .487.074.612.157c.132.089.257.23.369.448c.236.465.336 1.138.348 1.835a.78.78 0 0 0 0 .026a4.32 4.32 0 0 0-.016.34l-.28 6.307a1 1 0 1 0 1.998.088l.282-6.35v-.022c0-.05.002-.1.006-.15a.653.653 0 0 1 .081-.086c.121-.107.446-.327 1.21-.327c.225 0 .496.107.719.32c.221.21.32.454.32.65v1.921c0 .053.004.106.012.157L22 13.961a1 1 0 1 0 1.998.078l.215-5.482a1.613 1.613 0 0 1 .942-.291c.375 0 .69.189.94.543c.267.379.372.831.352 1.101zm-.71 12.118v.007v-.013z" />
                </svg>
                <button id="cancel" type="submit">
                    <span id="login_default_state">Cancel<span id="subtotal"></span></span>
                </button>
            </div>

            </form>
        </div>
    </section>

    {{-- Orgnize POPUP --}}
    <section id="register_form_orgnizer" tabindex="-1"
        class="hidden bg-black/50 fixed top-0 right-0 left-0 z-50 h-full items-center justify-center flex">
        <div class="p-6 bg-sky-100 rounded">
            <div class="flex items-center justify-center font-black m-3 mb-12">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mr-3 text-red-600 animate-pulse"
                    viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                        clip-rule="evenodd" />
                </svg>
                <h1 class="tracking-wide text-3xl text-gray-900">Buy Me a Laptop</h1>
            </div>
            {{-- <form id="login_form" action="" method="POST" class="flex flex-col justify-center">
                <div class="flex justify-between items-center mb-3">

                </div> --}}
            <form action="{{ route('Register') }}" method="POST">
                @csrf
                @method('POST')
                <input type="hidden" name="role" value="organ">

                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
				focus:outline-none
				focus:border-sky-500
				focus:ring-1
				focus:ring-sky-500
				focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="name" placeholder="tap your name here">
                </div>
                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
				focus:outline-none
				focus:border-sky-500
				focus:ring-1
				focus:ring-sky-500
				focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                    </svg>
                    <input type="text" name="email" placeholder="your email">
                </div>
                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
				focus:outline-none
				focus:border-sky-500
				focus:ring-1
				focus:ring-sky-500
				focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>

                    <input type="password" name="password" placeholder="your password">
                </div>

                <div
                    class=" mb-3 mt-1 w-full px-2 py-1.5 border bg-white gap-2 border-gray-300 rounded-md text-sm shadow-sm placeholder-gray-400
			focus:outline-none
			focus:border-sky-500
			focus:ring-1
			focus:ring-sky-500
			focus:invalid:border-red-500 focus:invalid:ring-red-500 flex">

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                            clip-rule="evenodd" />
                    </svg>

                    <input type="password" name="pass_confirm" placeholder="conform your password">
                </div>
                <button
                    class="px-4 py-1.5 rounded-md shadow-lg bg-gradient-to-r from-pink-600 to-red-600 font-medium text-gray-100 block transition duration-300 w-full"
                    type="submit">
                    <span id="login_default_state">Register<span id="subtotal"></span></span>
                </button>
            </form>
            <div class="flex items-center mt-4 ">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                    <path fill="currentColor"
                        d="M16.563.969c-1.272 0-2.262.523-2.876 1.41a3.66 3.66 0 0 0-.452.907a2.904 2.904 0 0 0-.295-.09c-.754-.187-1.514-.057-2.158.25c-1.255.598-2.286 1.985-2.147 3.644l.23 4.828a5.358 5.358 0 0 0-.5-.326c-.543-.31-1.2-.545-1.916-.5c-.744.046-1.43.386-2.01 1.008c-1.105 1.188-1.397 3.126-.478 4.442c.368.526.757 1.07 1.15 1.622c.602.843 1.214 1.7 1.777 2.528c.46.677.87 1.308 1.19 1.86c.33.565.535.993.623 1.275c1.378 4.446 5.419 7.155 9.268 7.155c4.537 0 9.376-3.412 9.763-8.801l.711-12.131c.055-.775-.207-1.678-.713-2.395c-.525-.743-1.394-1.39-2.574-1.39c-.347 0-.662.047-.945.122v-.184c0-.843-.402-1.584-.94-2.097c-.538-.513-1.286-.872-2.1-.872a4.51 4.51 0 0 0-1.533.245a4.503 4.503 0 0 0-.312-.811a3.124 3.124 0 0 0-1.041-1.206c-.487-.325-1.067-.493-1.723-.493m9.884 8.957l-.71 12.118c-.302 4.157-4.089 6.938-7.768 6.938c-2.964 0-6.236-2.13-7.358-5.747c-.157-.508-.457-1.095-.804-1.69a34.865 34.865 0 0 0-1.266-1.977c-.57-.838-1.212-1.74-1.828-2.603c-.39-.547-.77-1.079-1.112-1.569c-.289-.413-.275-1.312.303-1.934c.273-.293.497-.364.67-.374c.2-.013.465.05.797.24c.303.173.604.419.883.696c.529.914 1.102 1.948 1.417 2.52a1 1 0 0 0 1.87-.599l-.905-8.872l-.004-.097l-.003-.042c-.064-.708.385-1.383 1.014-1.683c.3-.143.585-.17.817-.114c.178.044.381.152.575.399l.294 7.286a1 1 0 1 0 1.998-.081l-.311-7.73c0-.11-.003-.228-.005-.345l-.003-.148c.04-.418.156-.759.324-1c.21-.303.559-.55 1.23-.55c.301 0 .487.074.612.157c.132.089.257.23.369.448c.236.465.336 1.138.348 1.835a.78.78 0 0 0 0 .026a4.32 4.32 0 0 0-.016.34l-.28 6.307a1 1 0 1 0 1.998.088l.282-6.35v-.022c0-.05.002-.1.006-.15a.653.653 0 0 1 .081-.086c.121-.107.446-.327 1.21-.327c.225 0 .496.107.719.32c.221.21.32.454.32.65v1.921c0 .053.004.106.012.157L22 13.961a1 1 0 1 0 1.998.078l.215-5.482a1.613 1.613 0 0 1 .942-.291c.375 0 .69.189.94.543c.267.379.372.831.352 1.101zm-.71 12.118v.007v-.013z" />
                </svg>
                <button id="cancel_orgnizer" type="submit">
                    <span id="login_default_state">Cancel<span id="subtotal"></span></span>
                </button>
            </div>

            </form>
        </div>
    </section>
    <!-- Script JavaScript -->
    <script>
        // Afficher la pop-up lors du clic sur le bouton
        document.getElementById('register').addEventListener('click', function() {
            document.getElementById('register_form').classList.remove('hidden');
        });
        document.getElementById('cancel').addEventListener('click', function() {
            document.getElementById('register_form').classList.add('hidden');
        });

        document.getElementById('orgnizer').addEventListener('click', function() {
            document.getElementById('register_form_orgnizer').classList.remove('hidden');
        });
        document.getElementById('cancel_orgnizer').addEventListener('click', function() {
            document.getElementById('register_form_orgnizer').classList.add('hidden');
        });
    </script>


    {{-- <script>
        // Afficher la pop-up lors du clic sur le bouton
        document.getElementById('register').addEventListener('click', function() {
            document.getElementById('popup').classList.remove('hidden');
        });
    </script> --}}
@endsection
