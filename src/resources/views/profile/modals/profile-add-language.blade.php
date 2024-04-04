<div id="addLanguageModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden max-w-lg w-full p-6 z-20">
            <h1 class="text-lg font-bold mb-4">Add Language</h1>

            <form id="addLanguageForm" action="{{ route('add.language') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="language" class="block text-sm font-medium text-gray-700">Language</label>
                    <input type="text" id="language" name="language" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                    <select id="level" name="level" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Beginner">Beginner</option>
                        <option value="Intermediate">Intermediate</option>
                        <option value="Advanced">Advanced</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelAddLanguage" class="text-gray-600 mr-4">Cancel</button>
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
