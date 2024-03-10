<!-- source https://gist.github.com/dsursulino/369a0998c0fc8c25e19962bce729674f -->
@include('layouts.head')

<link
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    rel="stylesheet" />

<div class="bg-orange-100 min-h-screen">
    <div class="fixed bg-white text-blue-800 px-10 py-1 z-10 w-full">
        <div class="flex items-center justify-between py-2 text-5x1">
            <a href="/page_index">
                <div class="font-bold text-blue-900 text-xl">Even<span class="text-orange-600">To</span></div>
            </a>
            <div class="flex items-center text-gray-500">
                <span class="material-icons-outlined p-2" style="font-size: 30px">search</span>
                <span class="material-icons-outlined p-2" style="font-size: 30px">notifications</span>
                <div class="bg-center bg-cover bg-no-repeat rounded-full inline-block h-12 w-12 ml-2"
                    style="background-image: url(https://i.pinimg.com/564x/de/0f/3d/de0f3d06d2c6dbf29a888cf78e4c0323.jpg)">
                </div>
            </div>
        </div>
    </div>

    @include('admin.layout.side')
    <div class="grid grid-cols-1 gap-2 sm:grid-cols-1 md:grid-cols-3  mt-3">
        <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
            style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
            <div class="absolute inset-0 bg-pink-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
            <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                <div>
                    <div class="text-white text-lg flex space-x-2 items-center">
                        <div class="bg-white rounded-md p-2 flex items-center">
                            <i class="fas fa-toggle-off fa-sm text-yellow-300"></i>
                        </div>
                        <p class="text-center text-white text-2xl">Total User</p>
                    </div>
                    <h3 class="text-white text-3xl mt-2 font-bold">
                        NB {{ $users }}
                    </h3>
                </div>
            </div>
        </div>
        <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
            style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
            <div class="absolute inset-0 bg-yellow-600 bg-opacity-75 transition duration-300 ease-in-out"></div>
            <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                <div>
                    <div class="text-white text-lg flex space-x-2 items-center">
                        <div class="bg-white rounded-md p-2 flex items-center">
                            <i class="fas fa-toggle-off fa-sm text-yellow-300"></i>
                        </div>
                        <p>Total Event</p>
                    </div>
                    <h3 class="text-white text-3xl mt-2 font-bold">
                        NB {{ $events }}
                    </h3>

                </div>
            </div>
        </div>
        <div class="relative w-full h-52 bg-cover bg-center group rounded-lg overflow-hidden shadow-lg transition duration-300 ease-in-out"
            style="background-image: url('https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/f868ecef-4b4a-4ddf-8239-83b2568b3a6b/de7hhu3-3eae646a-9b2e-4e42-84a4-532bff43f397.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Y4NjhlY2VmLTRiNGEtNGRkZi04MjM5LTgzYjI1NjhiM2E2YlwvZGU3aGh1My0zZWFlNjQ2YS05YjJlLTRlNDItODRhNC01MzJiZmY0M2YzOTcuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.R0h-BS0osJSrsb1iws4-KE43bUXHMFvu5PvNfoaoi8o');">
            <div class="absolute inset-0 bg-blue-900 bg-opacity-75 transition duration-300 ease-in-out"></div>
            <div class="relative w-full h-full px-4 sm:px-6 lg:px-4 flex items-center">
                <div>
                    <div class="text-white text-lg flex space-x-2 items-center">
                        <div class="bg-white rounded-md p-2 flex items-center">
                            <i class="fas fa-clipboard-check fa-sm text-blue-800"></i>
                        </div>
                        <p>Event Status</p>
                    </div>
                    <h3 class="text-lg mt-2 text-yellow-100 ">
                        {{ $eventsaccp }} confirmed
                    </h3>
                    <h3 class="text-lg mt-2 text-yellow-100 ">
                        {{ $eventspend }} pending
                    </h3>
                    <h3 class="text-lg mt-2 text-yellow-100 ">
                        {{ $eventrefuse }} refused
                    </h3>
                </div>
            </div>
        </div>

    </div>
    <div class="bg-white rounded-xl shadow-lg px-6 py-4 w-4/12 mt-5 flex gap-5 items-center">
      <h2 class="text-center text-black text-2xl">Total User {{$categories}}</h2>
    </div>
    <div class="mt-8 bg-white p-4 shadow rounded-lg">
        <div class="bg-white p-4 rounded-md mt-4">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Transacciones</h2>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Nombre</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Fecha</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-right">
                            Monto</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($eventsTable as $event)
                    <tr class="hover:bg-grey-lighter">
                        <td class="py-2 px-4 border-b border-grey-light">{{$event->user->name}}</td>
                        <td class="py-2 px-4 border-b border-grey-light">{{$event->title}}</td>
                        <td class="py-2 px-4 border-b border-grey-light text-right">{{$event->capacity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Botón "Ver más" para la tabla de Transacciones -->
            <div class="text-right mt-4">
                <button class <div class="text-right mt-4">
                    <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                        Ver más
                    </button>
            </div>
        </div>
    </div>
</div>
