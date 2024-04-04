<div id="editExperienceModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center block">
        <!-- Overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Close button -->
            <button id="closeEditModalButton" class="absolute top-0 right-0 m-4 p-2 rounded-full bg-gray-200 hover:bg-gray-300 focus:outline-none">&times;</button>

            <!-- Form for editing experience -->
            <form id="editExperienceForm" action="{{route('update.experience')}}" method="POST" enctype="multipart/form-data" class="w-full px-6 py-4 mt-6">
                @csrf
                <!-- Hidden input for experience ID -->
                <div class="mb-4">
                    <label for="editCompanyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" id="editCompanyName" name="editCompanyName" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="editPosition" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="editPosition" name="editPosition" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="editLocation" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" id="editLocation" name="editLocation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="editStartDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="editStartDate" name="editStartDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="editEndDate" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="editEndDate" name="editEndDate" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="editAbout" class="block text-sm font-medium text-gray-700">About</label>
                    <textarea id="editAbout" name="editAbout" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="editCompanyImage" class="block text-sm font-medium text-gray-700">Company Image</label>
                    <input type="file" id="editCompanyImage" name="editCompanyImage" accept="image/*" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="flex justify-end">
                    <button id="updateExperienceButton" type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md">Update Experience</button>
                    <button id="deleteExperienceButton" type="button" class="bg-red-500 text-white px-4 py-2 rounded-md ml-4">Delete Experience</button>
                </div>
            </form>
        </div>
    </div>
</div>