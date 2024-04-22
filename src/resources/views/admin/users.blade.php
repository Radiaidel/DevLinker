@extends('layouts.app')

@section('content')
<script src="{{ asset('js/search_users.js') }}" defer></script>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="text-xs text-right text-base   p-5 text-sky-800 cursor-pointer" id="see-all">See all</div>



        <div id="popup" class="hidden z-50 fixed top-0 left-0 w-full h-full bg-gray-800 bg-opacity-50 flex justify-center items-center">
            <div class='max-w-md mx-auto w-[60%]'>
                <div class="relative flex items-center w-full h-12 rounded-full shadow-md focus-within:shadow-lg bg-white overflow-hidden">
                    <div class="grid place-items-center h-full w-12 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    <input id="search-input" class="peer h-full w-full outline-none text-sm text-gray-700 pr-2" type="text" placeholder="Search users.." />
                </div>
                <div id="searchResultsContainer"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($users as $user)
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg @if($user->trashed()) opacity-50 @endif">
                <div class="p-6">
                    <div class="tems-center ">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->role == 'admin' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                        <div class="flex items-center justify-center">
                            <img src="{{ asset('storage/profile/unknown.png') }}" alt="{{ $user->name }}" class="w-16 h-16 rounded-full">
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="text-lg font-semibold">{{ $user->name }}</p>
                        <p class="text-gray-500">{{ $user->email }}</p>

                        <form action="{{ route('block.user', $user->id) }}" method="POST" class="mt-4">
                            @csrf
                            @if(!$user->trashed())
                            <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md hover:bg-red-600">Bloquer</button>
                            @else
                            <button type="submit" class="bg-white text-red-600 shadow py-2 px-4 rounded-md hover:bg-red-600 hover:text-white">Débloquer</button>
                            @endif

                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @if($users->count() == 0)
        <p class="text-center mt-8">Aucun utilisateur trouvé.</p>
        @endif
    </div>
</div>
@endsection