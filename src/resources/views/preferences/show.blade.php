@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-md w-full space-y-6">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Modifier votre nom
            </h2>
            <p class="mt-2 text-sm text-gray-600 text-center">Entrez votre nouveau nom ci-dessous :</p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('preferences.update.name') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="name" class="sr-only">Nom</label>
                    <input id="name" name="name" value="{{ old('name', auth()->user()->name) }}" type="text" autocomplete="name" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nouveau nom">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('profile.show') }}" class="text-sm text-gray-600 hover:text-gray-900">Annuler</a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Mettre à jour</button>
            </div>
        </form>
    </div>

    <div class="max-w-md w-full space-y-6">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Modifier votre adresse email
            </h2>
            <p class="mt-2 text-sm text-gray-600 text-center">Entrez votre nouvelle adresse email ci-dessous :</p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('preferences.update.email') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Adresse email</label>
                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email', auth()->user()->email) }}" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nouvelle adresse email">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('profile.show') }}" class="text-sm text-gray-600 hover:text-gray-900">Annuler</a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Mettre à jour</button>
            </div>
        </form>
    </div>

    <div class="max-w-md w-full space-y-6">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Modifier votre mot de passe
            </h2>
            <p class="mt-2 text-sm text-gray-600 text-center">Entrez votre mot de passe actuel et le nouveau mot de passe ci-dessous :</p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('preferences.update.password') }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="remember" value="true">
    <div class="rounded-md shadow-sm -space-y-px">
        <div>
            <label for="old_password" class="sr-only">Mot de passe actuel</label>
            <input id="old_password" name="old_password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Mot de passe actuel">
            @error('old_password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password" class="sr-only">Nouveau mot de passe</label>
            <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Nouveau mot de passe">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="password_confirmation" class="sr-only">Confirmer le nouveau mot de passe</label>
            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Confirmer le nouveau mot de passe">
        </div>
    </div>

    <div class="flex items-center justify-between">
        <a href="{{ route('profile.show') }}" class="text-sm text-gray-600 hover:text-gray-900">Annuler</a>
        <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Mettre à jour</button>
    </div>
</form>


    </div>

</div>
@endsection
