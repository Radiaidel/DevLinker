<div class="col-span-12   border border-stroke bg-white p-7.5 p-6 rounded-xl shadow-md xl:col-span-4">
    <div class="flex justify-between items-center mb-5">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Utilisateurs Supprimés</h2>
        <a href="{{ route('users') }}" class="text-sm text-blue-500 dark:text-blue-300 hover:underline">Voir tout</a>
    </div>

    <div class="grid grid-cols-3 gap-4">
        @foreach($deletedUsers as $user)
        <div class="flex items-center">
            <img src="{{ asset('storage/profile/' . $user->profile->profile_image) }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full object-cover">
            <span class="ml-3">{{ $user->name }}</span>
        </div>
        @endforeach
    </div>
</div>