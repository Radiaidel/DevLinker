<div id="experienceModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center block">
        <!-- Overlay -->
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- Modal -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Close button -->
            <button id="closeModalButton" class="absolute top-0 right-0 m-4  rounded-full text-bold text-lg">&times;</button>

            <!-- Form for adding experience -->
            <form action="{{ route('add.experience') }}" method="POST" enctype="multipart/form-data" class="w-full px-6 py-4 mt-6">
                @csrf
                <div class="mb-4">
                    <label for="companyName" class="block text-sm font-medium text-gray-700">Company Name</label>
                    <input type="text" id="companyName" name="companyName" class="mt-1 border py-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" id="position" name="position" class="mt-1 border py-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-sm font-medium text-gray-700">Location</label>
                    <input type="text" id="location" name="location" class="mt-1 border py-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="startDate" class="block text-sm font-medium text-gray-700">Start Date</label>
                        <input type="date" id="startDate" name="startDate" class="mt-1 block w-full border py-2 shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div>
                        <label for="endDate" class="block text-sm font-medium text-gray-700">End Date</label>
                        <input type="date" id="endDate" name="endDate" class="mt-1 border py-2  block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="about" class="block text-sm font-medium text-gray-700">About</label>
                    <textarea id="about" name="about" rows="5" class="mt-1 border py-2 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
                <div class="mb-4">
                    <label for="companyImage" class="block text-sm font-medium text-gray-700">Company Image</label>
                    <input type="file" id="companyImage" name="companyImage" accept="image/*" class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-sky-800 text-white px-4 py-2 rounded-md">Add Experience</button>
                </div>
            </form>
        </div>
    </div>
</div>