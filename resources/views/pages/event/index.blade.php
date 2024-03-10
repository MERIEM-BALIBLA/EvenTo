@extends('layouts.app')
@section('content')
    {{-- <body style="background-image: url('{{ asset('assets/images/flouer.png') }}')"> --}}
    <div class="relative">
        <div class="absolute top-0 left-3"><img src="{{ asset('assets/images/Bubbles.png') }}" alt="">
        </div>
        <div class="absolute bottom-20 right-0"><img src="{{ asset('assets/images/Bubbles.png') }}" alt="">
        </div>
    <section class="relative text-gray-600 body-font overflow-hidden">
        <div class="container px-5 py-24 mx-auto">
            <div class="lg:w-4/5 mx-auto flex flex-wrap">
                <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
                    src="{{ asset('storage/'.$event->image) }}">
                <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 mt-6 lg:mt-0">
                    <h2 class="text-sm title-font text-gray-500 tracking-widest">EvenTo Event</h2>
                    <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">{{ $event->title }}</h1>
                    <div class="flex mb-4">
                    
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 100 100">
                                <path fill="black"
                                    d="M50.001 0C33.65 0 20.25 13.36 20.25 29.666c0 6.318 2.018 12.19 5.433 17.016L46.37 82.445c2.897 3.785 4.823 3.066 7.232-.2l22.818-38.83c.46-.834.822-1.722 1.137-2.629a29.28 29.28 0 0 0 2.192-11.12C79.75 13.36 66.354 0 50.001 0m0 13.9c8.806 0 15.808 6.986 15.808 15.766c0 8.78-7.002 15.763-15.808 15.763c-8.805 0-15.81-6.982-15.81-15.763c0-8.78 7.005-15.765 15.81-15.765" />
                                <path fill="black"
                                    d="m68.913 48.908l-.048.126c.015-.038.027-.077.042-.115zm-5.065 24.446l-1.383 1.71c1.87.226 3.68.491 5.375.812l-5.479 1.623l7.313 1.945l5.451-1.719c3.348 1.123 7.984 2.496 9.52 4.057h-10.93l1.086 3.176h11.342c-.034 1.79-3.234 3.244-6.29 4.422l-7.751-1.676l-7.303 2.617l7.8 1.78c-4.554 1.24-12.2 1.994-18.53 2.341l-.266-3.64h-7.606l-.267 3.64c-6.33-.347-13.975-1.1-18.53-2.34l7.801-1.781l-7.303-2.617l-7.752 1.676c-3.012-.915-6.255-2.632-6.289-4.422H25.2l1.086-3.176h-10.93c1.536-1.561 6.172-2.934 9.52-4.057l5.451 1.719l7.313-1.945l-5.479-1.623a82.552 82.552 0 0 1 5.336-.807l-1.363-1.713c-14.785 1.537-27.073 4.81-30.295 9.979C.7 91.573 19.658 99.86 49.37 99.989c.442.022.878.006 1.29 0c29.695-.136 48.636-8.42 43.501-16.654c-3.224-5.171-15.52-8.445-30.314-9.981"
                                    color="black" />
                            </svg>
                            {{ $event->address }}
                        </div>
                        <span class="flex ml-3 pl-3 py-2 border-l-2 border-gray-200 space-x-2s">
                            <div class="flex items-center gap-2">

                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="black"
                                        d="m13.817 5.669l4.504 4.501l-8.15 8.15l-4.501-4.504zm-3.006 13.944l8.8-8.8a.894.894 0 0 0 .001-1.28l-5.156-5.156a.926.926 0 0 0-1.28.001l-8.8 8.8a.894.894 0 0 0-.001 1.28l5.156 5.156a.926.926 0 0 0 1.28-.001m12.663-9.073L10.556 23.473c-.332.326-.787.527-1.289.527s-.957-.201-1.289-.527L6.184 21.68a2.74 2.74 0 0 0-3.875-3.874l.001-.001l-1.781-1.794c-.326-.332-.527-.787-.527-1.289s.201-.957.527-1.289L13.448.527C13.78.201 14.235 0 14.737 0s.957.201 1.289.527l1.781 1.781a2.74 2.74 0 1 0 3.874 3.874l.001-.001l1.794 1.781c.326.332.527.787.527 1.289s-.201.957-.527 1.289z" />
                                </svg>
                                We steal have {{ $event->capacity }} left
                            </div>


                        </span>
                    </div>
                    <p class="leading-relaxed">{{ $event->description }}</p>

                    <div class="flex mt-8">
                        <span class="title-font font-medium text-2xl text-gray-900">{{ $event->price }}$</span>
                        <a href="{{ route('booking_show', $event->id) }}" class="flex ml-auto">
                        <button title="Book here"
                            class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z">
                                </path>
                            </svg>
                        </button>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
