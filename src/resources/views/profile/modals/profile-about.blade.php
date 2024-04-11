<div id="editAboutModal" class="fixed z-50 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 transition-opacity z-10" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden max-w-lg w-full p-6 z-20">
            <!-- Titre du modal -->

            <!-- Formulaire pour éditer la section "About" -->
            <form id="editAboutForm" action="{{ route('edit.profile.about') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="newAboutContent" class="block text-sm font-medium text-gray-700">New About Content</label>
                    <textarea id="newAboutContent" name="newAboutContent" rows="4" class="border mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ Auth::user()->profile->about }}</textarea>
                </div>

                <!-- Boutons -->
                <div class="flex justify-end">
                    <button type="button" id="cancelEditAbout" class="text-gray-600 mr-4">Cancel</button>
                    <button type="submit" class="bg-sky-800 text-white px-4 py-2 rounded-md">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Sélection des boutons pour ouvrir le modal
    // const editAboutButtons = document.querySelectorAll('.editAboutButton');
    // // Sélection de l'élément modal
    // const editAboutModal = document.getElementById('editAboutModal');
    // // Sélection du bouton pour fermer le modal
    // const cancelEditAbout = document.getElementById('cancelEditAbout');

    // Fonction pour ouvrir le modal
    function openEditAboutModal() {
        document.getElementById('editAboutModal').classList.remove('hidden');
    }

    // Fonction pour fermer le modal
    function closeEditAboutModal() {
        document.getElementById('editAboutModal').classList.add('hidden');
    }

    // Ajout d'un écouteur d'événement à chaque bouton pour ouvrir le modal
    document.querySelectorAll('.editAboutButton').forEach(button => {
        button.addEventListener('click', openEditAboutModal);
    });
    // Ajout d'un écouteur d'événement au bouton pour fermer le modal
    document.getElementById('cancelEditAbout').addEventListener('click', closeEditAboutModal);
</script>
