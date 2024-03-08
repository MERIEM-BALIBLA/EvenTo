@extends('layouts.app')
@section('content')
    {{-- <section class="text-gray-600 body-font" style="background-image: url('{{ asset('assets/images/flouer.png') }}')">
        <div class=" flex ">
            <div class="lg:w-full mx-auto">
                <div class="flex flex-wrap w-full bg-gray-600 py-32 px-10 relative justify-center">
                    <img alt="gallery" class="w-full object-cover h-full object-center block opacity-25 absolute inset-0"
                        src="{{ asset('assets/images/background.jpg') }}">
                    <div class="text-center relative z-10 w-2/3 flex flex-col justify-center items-center">

                        <h2 class="text-2xl text-white font-medium title-font mb-2">LE SITE DE
                            L’EVENTO
                        </h2>
                        <p class="leading-relaxed text-gray-200">Le Site de l'EVENTO est à votre service et met en oeuvre
                            tout son savoir
                            faire pour organiser l’événement qui convient le mieux à votre perception, budget et à vos
                            attentes !
                            Agence événementielle Parisienne & Créateur d’événements sur-mesure, nous sommes à votre écoute
                            pour mettre en place, concrétiser et donner vie à tous vos projets.</p>
                       
                        <select id="category" name="category_id"
                                class="w-30 h-10 border-2 border-sky-500 focus:outline-none focus:border-purple-500 text-gray-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
                                <option value="All" selected>All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        <div class="search">
                            <form class="flex flex-col md:flex-row gap-3 mt-8" action="" method="POST">
                                @csrf
                                
                                <div class="flex w-full">
                                    <input id="search" name="search" type="text"
                                        placeholder="Search for the event you like"
                                        class="w-full md:w-80 px-3 h-10 rounded-l border-2 border-purple-300 focus:outline-none focus:border-sky-500"
                                        onkeyup="show_result(this.value)">
                                    <button id="searchButton" type="button"
                                        class="bg-purple-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
                                </div>
                            </form>
                        </div>
                        <form id="searchForm">
                            <input id="search" name="search" type="text">
                            <button id="searchButton" type="submit"
                                class="bg-purple-500 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Search</button>
                        </form>

                        <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
    </section> --}}
    <section>
        <div class="relative gap-6 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-3 lg:py-16 lg:px-6">
        <div class="absolute top-0 left-3"><img src="{{ asset('assets/images/Bubbles.png') }}" alt="">

            <div class="font-light h-full col-span-2 text-gray-500 sm:text-lg dark:text-gray-400">
                <div class="flex flex-col justify-between w-full h-full p-6 bg-white border border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700"
                    style="background-image: url('https://img.freepik.com/free-photo/3d-illustration-smartphone-with-products-coming-out-screen-online-shopping-e-commerce-concept_58466-14529.jpg')">
                    <div class="h-fit">
                        <h1 class="mb-4 text-5xl font-bold font-salsa  tracking-tight text-gray-900 dark:text-white">Welcome
                            to EvenTo
                        </h1>
                        <p class="mb-4">The EVENTO website is at your service and implements all its expertise to organize the event that best suits your perception, budget, and expectations! As a Parisian event agency and creator of tailor-made events, we are here to listen to you, to establish, realize, and bring all your projects to life</p>
                    </div>
                    <div>
                        {{-- @auth --}}
                            <a href="product"
                                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-800  rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                Discover Our Store
                            </a>
                        {{-- @else: --}}
                            <a href="product"
                                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-800  rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                                Discover Our Store
                            </a>
                            <button id="register-btn"
                                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-gray-800 dark:text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                Get started
                                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        {{-- @endauth --}}
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="h-full lg:grid grid-cols-1 gap-6">
                    {{-- @foreach ($products as $product) --}}
                        <div 
                            class="bg-cover bg-center max-w-sm p-6 bg-white border border-gray-200 rounded-3xl shadow dark:bg-gray-800 dark:border-gray-700">
                            <svg class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
                            </svg>
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-300">
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-400"></p>
                            <a 
                                class="inline-flex font-medium items-center text-blue-600 hover:underline">
                                Check it out
                                <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                                </svg>
                            </a>
                        </div>
                    {{-- @endforeach --}}

                </div>
            </div>
        </div>
    </section>
    <div class="relative">
        <div class="absolute top-0 left-3"><img src="{{ asset('assets/images/Bubbles.png') }}" alt="">
        </div>
        <div class="absolute bottom-20 right-0"><img src="{{ asset('assets/images/Bubbles.png') }}" alt="">
        </div>
        <div id="place" class="flex flex-wrap justify-center items-center">
            @if ($events->isEmpty())
                <div class=" flex justify-center">
                    {{-- <img src="{{ asset('assets/images/no_event.svg') }}" alt="" width="50%" height="40%"> --}}
                </div>
                <p class="text-red-300">Oops, no events found.</p>
            @else
                @foreach ($events as $event)
                    <div id="card"
                        class="relative m-4 w-full max-w-xl bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{ route('event_show', $event->id) }}">
                            <img class="pb-8g rounded-t-lg" src="{{ asset('assets/images/event.jpg') }}"
                                alt="product image" />
                        </a>
                        <div class="px-5 pb-5">
                            <div class="flex flex-row justify-between mb-4">
                                <div>
                                    <a href="#">
                                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                            {{ $event->title }}</h5>
                                    </a>
                                    <p> {{ $event->description }}</p>
                                    <p> {{ $event->date }}</p>
                                    <p> {{ $event->address }}</p>
                                    @if ($event->capacity > 0)
                                        <p> {{ $event->capacity }}</p>
                                    @else
                                        <p>Opps no more tickets</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                d="M28 6h-.586L30 3.414L28.586 2L2 28.586L3.414 30l4-4H28a2.003 2.003 0 0 0 2-2v-5a1 1 0 0 0-1-1a2 2 0 0 1 0-4a1 1 0 0 0 1-1V8a2.002 2.002 0 0 0-2-2m0 6.127a4 4 0 0 0 0 7.746V24h-7v-3h-2v3H9.414L19 14.414V19h2v-6.586L25.414 8H28zm-24 0V8h15V6H4a2.002 2.002 0 0 0-2 2v5a1 1 0 0 0 1 1a2 2 0 0 1 0 4a1 1 0 0 0-1 1v5h2v-4.127a4 4 0 0 0 0-7.746" />
                                        </svg>
                                    @endif

                                </div>
                                {{-- <div class="flex items-center mt-2.5 mb-5">
                            <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                                <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                    <path
                                        d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                </svg>
                            </div>

                        </div> --}}
                            </div>
                            @auth
                                @if (auth()->user()->hasRole('client'))
                                    <div class="mx-auto mt-4">
                                        <a href="{{ route('booking_show', $event->id) }}">
                                            <button
                                                class="group relative h-12 w-full overflow-hidden rounded-lg bg-white text-lg shadow"
                                                type="submit">
                                                <div
                                                    class="absolute inset-0 w-3 bg-purple-200 transition-all duration-[250ms] ease-out group-hover:w-full">
                                                </div>
                                                <span class="relative text-black group-hover:text-white">Book now</span>
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            @endauth

                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- <div class="flex flew-wrap gap-8" id="card">
            @foreach ($events as $event)
                <a href="" id="event">
                    <div>

                        <div class="max-w-xl m-4" id="">
                            <div>
                                <a href="#">
                                    <img class="rounded-t-lg" src="" alt="" />
                                </a>
                                <div class="p-5">
                                    <a href="#">

                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $event->title }}</h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->description }}
                                    </p>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $event->price }}</p>

                                </div>
                            </div>
                            @auth
                                @if (auth()->user()->hasRole('client'))
                                    <div class="mx-auto mt-4">
                                        <a href="{{ route('booking_show', $event->id) }}">
                                            <button
                                                class="group relative h-12 w-full overflow-hidden rounded-lg bg-white text-lg shadow"
                                                type="submit">
                                                <div
                                                    class="absolute inset-0 w-3 bg-purple-200 transition-all duration-[250ms] ease-out group-hover:w-full">
                                                </div>
                                                <span class="relative text-black group-hover:text-white">Book now</span>
                                            </button>
                                        </a>
                                    </div>
                                @endif
                            @endauth
                            <a href="{{ route('event_show', $event->id) }}">
                                See more
                            </a>
                        </div>
                    </div>
                </a>
            @endforeach
            </div> --}}
    @endsection
    <!-- Inclure jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Lorsque le formulaire de recherche est soumis
        $('#searchForm').submit(function(event) {
            // Empêcher le formulaire de se soumettre normalement
            event.preventDefault();

            // Récupérer la valeur du champ de recherche
            var searchTerm = $('#search').val();

            // Envoyer une requête AJAX au serveur
            $.ajax({
                type: 'GET',
                url: '/search',
                data: {
                    q: searchTerm
                },
                success: function(response) {
                    // Mettre à jour le contenu de la div 'card' avec les résultats de la recherche
                    $('#card').html(response);
                    // Parcourir les résultats de la recherche
                    $.each(response, function(index, event) {
                        // Construire le HTML pour chaque résultat de la recherche
                        var eventHtml = '<a href="#" id="event">';
                        eventHtml += '<div class="max-w-xl m-4">';
                        eventHtml += '<div>';
                        eventHtml +=
                            '<a href="#"><img class="rounded-t-lg" src="" alt="" /></a>';
                        eventHtml += '<div class="p-5">';
                        eventHtml +=
                            '<a href="#"><h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">' +
                            event.title + '</h5></a>';
                        eventHtml +=
                            '<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">' +
                            event.description + '</p>';
                        eventHtml +=
                            '<p class="mb-3 font-normal text-gray-700 dark:text-gray-400">' +
                            event.price + '</p>';
                        eventHtml += '</div></div></div></a>';
                        // Ajouter le HTML construit à la div 'card'
                        $('#card').append(eventHtml);
                    });

                }
            });
        });
    </script>
