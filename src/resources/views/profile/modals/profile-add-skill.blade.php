<div id="addSkillModal" class="fixed inset-0 z-50 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden max-w-lg w-full p-6 z-20">

            <form id="addSkillForm" action="{{ route('add.skill') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="skillName" class="block text-sm font-medium text-gray-700">Skill</label>
                    <input type="text" id="skillName" name="skillName" class="mt-1 py-2 border block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="flex justify-end">
                    <button type="button" id="cancelAddSkill" class="text-gray-600 mr-4">Cancel</button>
                    <button type="submit" class="bg-sky-800 text-white px-4 py-2 rounded-md">Add Skill</button>
                </div>
            </form>
        </div>
    </div>
</div>