@extends('layouts.app')
@section('content')
    <div class=" flex ">

    </div>
    <div class="relative">
        <div class="absolute top-0 left-3"><img src="{{ asset('assets/images/Bubbles.png') }}" alt="">
        </div>
        <div class="absolute bottom-20 right-0"><img src="{{ asset('assets/images/Bubbles.png') }}" alt="">

        </div>
        {{-- <div method="" id="" class="relative mb-8 flex flex-col">
            <label
                class="mx-auto mt-8 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                <select onchange="filterSelection(this.value)" name="" id="category-tabs"
                    class="border 2 focus-within:border-gray-300 rounded-2xl p-2">
                    <option value="all" data-category="all">All</option>
                    @foreach ($categories as $category)
                        <option data-category="{{ $category->id }}" class="category-tab" id = "category_{{$category->id}}" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <input type="" name="" id="search" placeholder="your keyword here" name=""
                    class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white" required="">

            </label>
        </div> --}}
        <div method="" id="search_bar" class="relative mb-8 flex flex-col">

            <div method="" id="" class="relative mb-8 flex flex-col">
                <label
                    class="mx-auto mt-8 relative bg-white min-w-sm max-w-2xl flex flex-col md:flex-row items-center justify-center border py-2 px-2 rounded-2xl gap-2 shadow-2xl focus-within:border-gray-300">
                    <select name="" id="category"
                        class="border 2 focus-within:border-gray-300 rounded-2xl p-2">
                        <option value="all">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <input type="" name="" id="search_input" placeholder="your keyword here" name=""
                        class="px-6 py-2 w-full rounded-md flex-1 outline-none bg-white" required="">

                </label>
            </div>

        </div>
        {{-- <div id="place" class="flex  gap-4 p-20 justify-center items-center"> --}}
        <div id="result" class="grid grid-cols-1 md:grid-cols-2 gap-4 p-20 items-center">
            @foreach ($events as $event)
                <div style="" class="relative flex flex-col w-full bg-white rounded shadow-lg">

                    {{-- <div class="relative flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-3/5 "> --}}
                    <div class="w-full h-64 bg-top bg-cover rounded-t"
                        style="background-image: url('{{ asset('storage/' . $event->image) }}')" title="See more">
                    </div>
                    <div class="flex flex-col w-full md:flex-row">
                        <div
                            class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-purple-200 rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                            <div class="md:text-xl lg:text-xs xl:text-2xl text-xl">
                                {{ $event->date }}<br>{{ $event->address }}</div>
                        </div>
                        <div class="p-4 font-normal text-gray-800 md:w-3/4">
                            <h1 class="mb-4 md:text-4xl font-bold leading-none tracking-tight text-gray-800">2020 National
                                {{ $event->title }}</h1>
                            <p class="leading-normal">{{ $event->description }}</p>
                            <div class="flex flex-row items-center mt-4 text-gray-700">
                                <div class="w-1/2">
                                    {{ $event->capacity }} Places
                                </div>

                                <div class="w-1/2 flex justify-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em"
                                        viewBox="0 0 256 256">
                                        <defs>
                                            <path id="logosEventsentry0"
                                                d="m98.147 242.922l-84.731-84.733c-16.708-16.707-16.708-43.795 0-60.503l84.73-84.73c16.708-16.708 43.796-16.708 60.503 0l84.73 84.73c16.708 16.708 16.708 43.796 0 60.503l-84.73 84.733c-16.707 16.707-43.795 16.707-60.502 0" />
                                        </defs>
                                        <mask id="logosEventsentry1" fill="#fff">
                                            <use href="#logosEventsentry0" />
                                        </mask>
                                        <use fill="#fff" href="#logosEventsentry0" />
                                        <path fill="#f4922e"
                                            d="M247.196 102.089c-1.149-1.505-2.368-2.972-3.745-4.349l-29.876-29.876c-59.577 26.4-178.052 31.867-204.35 32.75c.102-.122-8.405 15.74-8.322 15.456c33.347 1.642 196.137 8.138 246.293-13.981M33.081 77.19c31.763-.971 102.694-6.709 154.24-37.185l-28.923-28.16c-16.897-17.461-44.853-16.334-61.75 1.128zm63.554 165.837c16.707 16.707 44.122 19.027 62.933.432l29.86-29.86c-49.754-29.168-121.363-32.322-153.969-31.761zM-1.586 136.253L9.486 157.57c33.26 1.092 134.87 6.17 205.66 28.979l28.305-28.306a42.92 42.92 0 0 0 5.794-7.239c-48.07-23.458-215.645-16.34-247.424-14.752"
                                            mask="url(#logosEventsentry1)" />
                                    </svg>
                                </div>
                            </div>
                            <div>
                                @auth
                                    @if (auth()->user()->hasRole('client'))
                                        @php
                                            $currentDate = now();
                                            $eventDate = \Carbon\Carbon::parse($event->date);
                                            $isExpired = $currentDate->greaterThan($eventDate);
                                        @endphp

                                        @if (!$isExpired)
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
                                    @endif

                                @endauth
                                <a class="flex items-center gap-2" href="{{ route('event_show', $event->id) }}"> Click here
                                    for more informations
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em"
                                        viewBox="0 0 24 24">
                                        <path fill="#bfa2c3"
                                            d="m7.088 18.5l4.654-6.5l-4.654-6.5h1.22l4.654 6.5l-4.654 6.5zm5.797 0l4.653-6.5l-4.653-6.5h1.219l4.654 6.5l-4.654 6.5z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="flex justify-center">
                {{ $events->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
 $(document).ready(function() {
    $('#category').on('change', function() {
        var category = $(this).val();
        $.ajax({
            url :"{{route('filter')}}",
            type : "GET",
            data : { category: category },
            success:function(res){
                console.log(res);
                
                // var result = '';
                // $('#result').html('');
                // $.each(res.events, function(index, value){
                //     result += '<h1>'+ value.title +'</h1>'; // Utilisation de += pour concaténer les résultats
                // });
                // $("#result").append(result); 

                displayEvents(res.events);
            }
        });
    });
});


$('#search_input').on('input', function() {
        var search = $(this).val(); // Convertir la recherche en minuscules
        var category = $('#category').val(); // Obtenir la valeur de la catégorie sélectionnée
        $.ajax({
            url :"{{ route('search') }}",
            type : "GET",
            data : { search: search, category: category }, // Envoyer à la fois la recherche et la catégorie sélectionnée
            success:function(res){
                console.log(res);

                displayEvents(res.events);
            }
        });
    });

function displayEvents(events) {
        var result = '';
        $('#result').html(''); // Effacer le contenu actuel de #result
        if(events.length > 0) {
            $.each(events, function(index, value) {
                result += '<h1>'+ value.title +'</h1>';
            });
        } else {
            result += '<h1>No events found</h1>';
        }
        $("#result").append(result); // Ajouter le contenu généré dans #result
    }


</script>
