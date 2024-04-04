<div id="editProfileTitleModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity z-10" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Contenu du modal -->
        <div class="bg-white rounded-lg overflow-hidden max-w-lg w-full p-6 z-20">
            <!-- Titre -->

            <!-- Formulaire pour éditer le titre -->
            <form id="editProfileTitleForm" action="{{ route('edit.profile.title') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="newProfileTitle" class="block text-sm font-medium text-gray-700">New Profile Title</label>
                    <input type="text" id="newProfileTitle" name="newProfileTitle" value="{{Auth::user()->profile->title}}" class="mt-1 py-2 border  focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('newProfileTitle') }}">
                </div>

                <!-- Boutons -->
                <div class="flex justify-end">
                    <button type="button" id="cancelEditProfileTitle" class="text-gray-600 mr-4">Cancel</button>
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>