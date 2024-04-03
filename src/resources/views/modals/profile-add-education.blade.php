<div id="educationModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
        <!-- Overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- Modal -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Close button -->
            <button id="closeEducationModalButton" class="absolute top-0 right-0 m-4 p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">&times;</button>

            <form id="addEducationForm" method="POST" action="{{route('education.store')}}" class="w-full px-6 py-4 mt-6" enctype="multipart/form-data">
                @csrf
                <!-- Champ d'entrée pour le nom de l'institution -->
                <div class="mb-4">
                    <label for="institution" class="block text-sm font-medium text-gray-700">Institution</label>
                    <input type="text" id="institution" name="institution" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <!-- Champ d'entrée pour le domaine d'études -->
                <div class="mb-4">
                    <label for="fieldOfStudy" class="block text-sm font-medium text-gray-700">Field Of Study</label>
                    <input type="text" id="fieldOfStudy" name="fieldOfStudy" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <!-- Champs d'entrée pour les dates de début et de fin -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="startDate" name="startDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="endDate" name="endDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <!-- Champ d'entrée pour la description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" name="description" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="schoolImage" class="block text-sm font-medium text-gray-700">Company Image</label>
                    <input type="file" id="schoolImage" name="schoolImage" accept="image/*" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <!-- Bouton pour soumettre le formulaire -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Add Education</button>
                </div>
            </form>
        </div>
    </div>
</div>
