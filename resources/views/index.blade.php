@extends('layouts.app')
@section('content')
<div class="lg:w-full mx-auto">
    <div class="flex flex-wrap w-full bg-gray-600 py-32 px-10 relative justify-center">
        <img alt="gallery" class="w-full object-cover h-full object-center block opacity-25 absolute inset-0"
            src="{{ asset('assets/images/background.jpg') }}">
        <div class="text-center relative z-10 w-2/3 flex flex-col justify-center items-center">

            <a href="{{route('index')}}"><h2 class="mb-4 text-5xl font-bold font-salsa tracking-tight text-white">LE SITE DE
                L’EVENTO
            </h2></a>
            <p class="leading-relaxed text-gray-200 font-medium text-3xl">Trusted by over 10,000 event organizers.</p>
            <p class="leading-relaxed text-gray-200 mt-8 text-3xl"><span class="font-bold text-grey-900 text-5xl">Even</span><span class="font-bold text-orange-600 text-5xl"">To</span> is the ideal partner for your event</p>
            <a href="/auth"><div class="text-center mt-10 flex items-center gap-8">
                <p class="text-3xl font-semibold leading-relaxed text-gray-200">
                    Get Started Now
                </p>
                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 24 24"><g fill="none"><path d="M24 0v24H0V0zM12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036c-.01-.003-.019 0-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427c-.002-.01-.009-.017-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092c.012.004.023 0 .029-.008l.004-.014l-.034-.614c-.003-.012-.01-.02-.02-.022m-.715.002a.023.023 0 0 0-.027.006l-.006.014l-.034.614c0 .012.007.02.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"/><path fill="black" d="M18.5 19a1.5 1.5 0 0 0 3 0V5a1.5 1.5 0 0 0-3 0zM10.944 6.697a1.5 1.5 0 0 0 0 2.121l1.682 1.682H4a1.5 1.5 0 0 0 0 3h8.626l-1.682 1.682a1.5 1.5 0 1 0 2.121 2.121l4.243-4.242a1.5 1.5 0 0 0 0-2.121l-4.243-4.243a1.5 1.5 0 0 0-2.121 0"/></g></svg>
            </div></a>
        </div>
    </div>
</div>

<div class="w-68 bg-gray-50 px-4 mx-auto mt-8">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl font-poppins tracking-wider font-bold text-black">Latest categories</h2>
    </div>
    <div class="flex flex-wrap justify-center">
    @foreach($categories as $category)
        <div class="max-w-xl m-4">
        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-green-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000 group-hover:duration-200"></div>
            <div class="relative px-7 py-6 bg-white ring-1 ring-gray-900/5 rounded-lg leading-none flex items-top justify-start space-x-6">
            <svg class="w-8 h-8 text-blue-600" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 6.75C6.75 5.64543 7.64543 4.75 8.75 4.75H15.25C16.3546 4.75 17.25 5.64543 17.25 6.75V19.25L12 14.75L6.75 19.25V6.75Z"></path>
            </svg>
            <div class="space-y-2">
                <p class="text-slate-800">{{$category->name}}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$category->description}}</p>
           
            </div>
            </div>
        </div>
        </div>
    {{-- </div> --}}
    @endforeach
    </div>

    <div id="place" class="flex flex-wrap md:flex-nowrap gap-4 p-20 justify-center items-center">
        {{-- <div class="flex flex-wrap"> --}}
        {{-- <div class="flex flex-wrap w-full bg-white rounded shadow-lg sm:w-3/4 md:w-1/4 lg:w-3/5"> --}}

        @foreach ($events as $event)
            
            <div class="relative flex flex-col w-full bg-white rounded shadow-lg sm:w-3/4 md:w-1/2 lg:w-3/5">
                <div class="w-full h-64 bg-top bg-cover rounded-t"
                    style="background-image: url('{{ asset('storage/'.$event->image) }}')" title="See more">
                </div>
                <div class="flex flex-col w-full md:flex-row">
                    <div
                        class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-purple-200 rounded md:flex-col md:items-center md:justify-center md:w-1/4">
                        <div class="md:text-xl lg:text-xs xl:text-2xl text-xl">{{$event->date }}<br>{{$event->address }}</div>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="3em" height="3em" viewBox="0 0 256 256"><defs><path id="logosEventsentry0" d="m98.147 242.922l-84.731-84.733c-16.708-16.707-16.708-43.795 0-60.503l84.73-84.73c16.708-16.708 43.796-16.708 60.503 0l84.73 84.73c16.708 16.708 16.708 43.796 0 60.503l-84.73 84.733c-16.707 16.707-43.795 16.707-60.502 0"/></defs><mask id="logosEventsentry1" fill="#fff"><use href="#logosEventsentry0"/></mask><use fill="#fff" href="#logosEventsentry0"/><path fill="#f4922e" d="M247.196 102.089c-1.149-1.505-2.368-2.972-3.745-4.349l-29.876-29.876c-59.577 26.4-178.052 31.867-204.35 32.75c.102-.122-8.405 15.74-8.322 15.456c33.347 1.642 196.137 8.138 246.293-13.981M33.081 77.19c31.763-.971 102.694-6.709 154.24-37.185l-28.923-28.16c-16.897-17.461-44.853-16.334-61.75 1.128zm63.554 165.837c16.707 16.707 44.122 19.027 62.933.432l29.86-29.86c-49.754-29.168-121.363-32.322-153.969-31.761zM-1.586 136.253L9.486 157.57c33.26 1.092 134.87 6.17 205.66 28.979l28.305-28.306a42.92 42.92 0 0 0 5.794-7.239c-48.07-23.458-215.645-16.34-247.424-14.752" mask="url(#logosEventsentry1)"/></svg>
                            </div>
                        </div>
                        <div>
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
                    <a class="flex items-center gap-2" href="{{ route('event_show', $event->id) }}"> Click here for more informations
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24"><path fill="#bfa2c3" d="m7.088 18.5l4.654-6.5l-4.654-6.5h1.22l4.654 6.5l-4.654 6.5zm5.797 0l4.653-6.5l-4.653-6.5h1.219l4.654 6.5l-4.654 6.5z"/></svg>
                </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- </div> --}}
    </div>

</div>
@endsection
