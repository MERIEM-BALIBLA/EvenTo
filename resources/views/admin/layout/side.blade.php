<div class="flex flex-row pt-24 px-10 pb-4">
    <div class="w-2/12 mr-6">
        <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
            <a href="/home" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">dashboard</span>
                Home
            </a>
            <a href="/event" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">tune</span>
                Events list
            </a>
            <a>
                <div class="group relative cursor-pointer">

                    <div class="flex items-center gap-2 bg-white">
                        <a class="menu-hover my-2 py-2 text-base text-grey-600" onClick="">
                            <span class="material-icons-outlined float-left pr-2">file_copy</span>
                            another list items
                        </a>
                        <span class="material-icons-outlined float-right ml-12">keyboard_arrow_right</span>
                    </div>
                    @auth

                        @if (auth()->user()->hasRole('admin'))
                            <div
                                class="invisible absolute z-50 flex w-full flex-col bg-gray-100 py-1 px-4 text-gray-800 shadow-xl group-hover:visible">



                                <a href="/category"
                                    class="my-2 block border-b border-gray-100 py-1 font-semibold text-gray-500 hover:text-black md:mx-2">
                                    Categories
                                </a>

                                <a
                                    class="my-2 block border-b border-gray-100 py-1 font-semibold text-gray-500 hover:text-black md:mx-2">
                                    Users
                                </a>
                            </div>
                        @elseif(auth()->user()->hasRole('organ'))
                            <div
                                class="invisible absolute z-50 flex w-full flex-col bg-gray-100 py-1 px-4 text-gray-800 shadow-xl group-hover:visible">
                                <a href="{{route('booking')}}"
                                    class="my-2 block border-b border-gray-100 py-1 font-semibold text-gray-500 hover:text-black md:mx-2">
                                    Booking list
                                </a>
                            </div>
                        @endif
                    @endauth

                </div>
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-lg mb-6 px-6 py-4">
            {{-- <a href="{{ route('logout') }}" class="inline-block text-gray-600 hover:text-black my-4 w-full">
                <span class="material-icons-outlined float-left pr-2">power_settings_new</span>
                Log out
            </a> --}}
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="material-icons-outlined float-left pr-2">power_settings_new</button>
                Log out
            </form>
        </div>
    </div>

    <div class="w-10/12">
        {{-- <div class="flex flex-row">
            <div class="bg-no-repeat bg-red-200 border border-red-300 rounded-xl w-7/12 mr-2 p-6"
                style="background-image: url(https://previews.dropbox.com/p/thumb/AAvyFru8elv-S19NMGkQcztLLpDd6Y6VVVMqKhwISfNEpqV59iR5sJaPD4VTrz8ExV7WU9ryYPIUW8Gk2JmEm03OLBE2zAeQ3i7sjFx80O-7skVlsmlm0qRT0n7z9t07jU_E9KafA9l4rz68MsaZPazbDKBdcvEEEQPPc3TmZDsIhes1U-Z0YsH0uc2RSqEb0b83A1GNRo86e-8TbEoNqyX0gxBG-14Tawn0sZWLo5Iv96X-x10kVauME-Mc9HGS5G4h_26P2oHhiZ3SEgj6jW0KlEnsh2H_yTego0grbhdcN1Yjd_rLpyHUt5XhXHJwoqyJ_ylwvZD9-dRLgi_fM_7j/p.png?fv_content=true&size_mode=5); background-position: 90% center;">
                <p class="text-5xl text-indigo-900">Welcome <br><strong>Lorem Ipsum</strong></p>
                <span
                    class="bg-red-300 text-xl text-white inline-block rounded-full mt-12 px-8 py-2"><strong>01:51</strong></span>
            </div>

            <div class="bg-no-repeat bg-orange-200 border border-orange-300 rounded-xl w-5/12 ml-2 p-6"
                style="background-image: url(https://previews.dropbox.com/p/thumb/AAuwpqWfUgs9aC5lRoM_f-yi7OPV4txbpW1makBEj5l21sDbEGYsrC9sb6bwUFXTSsekeka5xb7_IHCdyM4p9XCUaoUjpaTSlKK99S_k4L5PIspjqKkiWoaUYiAeQIdnaUvZJlgAGVUEJoy-1PA9i6Jj0GHQTrF_h9MVEnCyPQ-kg4_p7kZ8Yk0TMTL7XDx4jGJFkz75geOdOklKT3GqY9U9JtxxvRRyo1Un8hOObbWQBS1eYE-MowAI5rNqHCE_e-44yXKY6AKJocLPXz_U4xp87K4mVGehFKC6dgk_i5Ur7gspuD7gRBDvd0sanJ9Ybr_6s2hZhrpad-2WFwWqSNkh/p.png?fv_content=true&size_mode=5); background-position: 100% 40%;">
                <p class="text-5xl text-indigo-900">Inbox <br><strong>23</strong></p>
                <a href=""
                    class="bg-orange-300 text-xl text-white underline hover:no-underline inline-block rounded-full mt-12 px-8 py-2"><strong>See
                        messages</strong></a>
            </div>
        </div>
        <div class="flex flex-row h-64 mt-6">
            <div class="bg-white rounded-xl shadow-lg px-6 py-4 w-4/12">
                a
            </div>
            <div class="bg-white rounded-xl shadow-lg mx-6 px-6 py-4 w-4/12">
                b
            </div>
            <div class="bg-white rounded-xl shadow-lg px-6 py-4 w-4/12">
                c
            </div>
        </div>
    </div>
</div> --}}
