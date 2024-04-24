@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col gap-4 items-center justify-center  py-12 px-4 sm:px-6 lg:px-8">













    <div class="max-w-lg w-full bg-white rounded-2xl shadow-md p-6 space-y-6">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Edit Your Name
            </h2>
            <p class="mt-2 text-sm text-gray-600 text-center">Enter your new name below:</p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('preferences.update.name') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="name" class="sr-only">Name</label>
                    <input id="name" name="name" value="{{ old('name', auth()->user()->name) }}" type="text" autocomplete="name" required class=" rounded-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  sm:text-sm" placeholder="New name">
                </div>
            </div>

            <div class="flex items-end justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-sky-700 ">Update</button>
            </div>
        </form>
    </div>

    <div class="max-w-lg w-full bg-white rounded-2xl shadow-md p-6 space-y-6">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Change your email address </h2>
            <p class="mt-2 text-sm text-gray-600 text-center">Enter your new email address below:</p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('preferences.update.email') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" value="{{ old('email', auth()->user()->email) }}" required class=" rounded-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  sm:text-sm" placeholder="New email address">
                </div>
            </div>

            <div class="flex items-end justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-sky-700  ">Update</button>
            </div>
        </form>
    </div>

    <div class="max-w-lg w-full bg-white rounded-2xl shadow-md p-6 space-y-6">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Change your password
            </h2>
            <p class="mt-2 text-sm text-gray-600 text-center">Enter your current password and the new password below:</p>
        </div>
        <form class="mt-8 space-y-6" action="{{ route('preferences.update.password') }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm space-y-3">
                <div>
                    <label for="old_password" class="sr-only">Current password</label>
                    <input id="old_password" name="old_password" type="password" autocomplete="current-password" required class=" rounded-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  sm:text-sm" placeholder="Current password">
                    @error('old_password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="sr-only">New password</label>
                    <input id="password" name="password" type="password" autocomplete="new-password" required class=" rounded-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  sm:text-sm" placeholder="New password">
                    @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="sr-only">Confirm new password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class=" rounded-xl relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900  sm:text-sm" placeholder="Confirm new password">
                </div>
            </div>

            <div class="flex items-end justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-xl shadow-sm text-white bg-sky-700 ">Update</button>
            </div>
        </form>


    </div>
    <div class="max-w-lg mx-auto border border-red-500 rounded-md p-6">
        <p class="text-center text-gray-800 mb-4">
            By clicking the button below, you will permanently delete your account. This action cannot be undone.
        </p>
        <form id="delete-account-form" action="{{ route('delete-account') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
            <input type="text" name="password">
        </form>
        <button type="button" onclick="confirmDeleteAccount()" class="w-full py-2 bg-red-600 text-white font-semibold rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete Account</button>

    </div>


    <script>
        function confirmDeleteAccount() {
            if (confirm('Are you sure you want to delete your account? This action cannot be undone.')) {
                // Si l'utilisateur confirme, demandez son mot de passe pour confirmer la suppression du compte
                var password = prompt("To confirm, please enter your password:");
                if (password != null) {
                    // Envoyer le formulaire de suppression du compte avec le mot de passe
                    document.getElementById('delete-account-form').submit();
                }
            }
        }
    </script>
</div>
@endsection