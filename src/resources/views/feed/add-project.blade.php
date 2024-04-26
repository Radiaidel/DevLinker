<div id="addProjectModal" class="fixed inset-0 z-50 overflow-y-auto hidden bg-gray-800 bg-opacity-50 w-full">
    <div class="flex items-center justify-center min-h-screen">
    <div class="relative bg-white rounded-lg w-[90%] md:w-[50%] mx-auto p-8">
            <button id="closeModalButton" class="absolute top-0 right-0 mt-4 mr-4 text-bold text-lg text-gray-600 hover:text-gray-800">&times;</button>

            <form id="projectForm" action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 border py-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" rows="4" class="border mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>

                <div class="flex gap-3 items-center mb-4">
                    <div class="flex items-center space-x-4">
                        <label for="images" class="cursor-pointer">
                            <input type="file" name="images[]" id="images" accept="image/*" multiple class="hidden">
                            <svg id="imageUpload" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                                <g id="SVGRepo_bgCarrier" stroke-width="0" />

                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                                <g id="SVGRepo_iconCarrier">
                                    <path d="M14.2639 15.9375L12.5958 14.2834C11.7909 13.4851 11.3884 13.086 10.9266 12.9401C10.5204 12.8118 10.0838 12.8165 9.68048 12.9536C9.22188 13.1095 8.82814 13.5172 8.04068 14.3326L4.04409 18.2801M14.2639 15.9375L14.6053 15.599C15.4112 14.7998 15.8141 14.4002 16.2765 14.2543C16.6831 14.126 17.12 14.1311 17.5236 14.2687C17.9824 14.4251 18.3761 14.8339 19.1634 15.6514L20 16.4934M14.2639 15.9375L18.275 19.9565M18.275 19.9565C17.9176 20 17.4543 20 16.8 20H7.2C6.07989 20 5.51984 20 5.09202 19.782C4.71569 19.5903 4.40973 19.2843 4.21799 18.908C4.12796 18.7313 4.07512 18.5321 4.04409 18.2801M18.275 19.9565C18.5293 19.9256 18.7301 19.8727 18.908 19.782C19.2843 19.5903 19.5903 19.2843 19.782 18.908C20 18.4802 20 17.9201 20 16.8V16.4934M4.04409 18.2801C4 17.9221 4 17.4575 4 16.8V7.2C4 6.0799 4 5.51984 4.21799 5.09202C4.40973 4.71569 4.71569 4.40973 5.09202 4.21799C5.51984 4 6.07989 4 7.2 4H16.8C17.9201 4 18.4802 4 18.908 4.21799C19.2843 4.40973 19.5903 4.71569 19.782 5.09202C20 5.51984 20 6.0799 20 7.2V16.4934M17 8.99989C17 10.1045 16.1046 10.9999 15 10.9999C13.8954 10.9999 13 10.1045 13 8.99989C13 7.89532 13.8954 6.99989 15 6.99989C16.1046 6.99989 17 7.89532 17 8.99989Z" stroke="#000000" stroke-width="1.248" stroke-linecap="round" stroke-linejoin="round" />
                                </g>

                            </svg>
                        </label>
                    </div>

                    <label for="video" class="cursor-pointer">
                        <input type="file" name="video[]" id="video" accept="video/*" multiple class="hidden">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path d="M16 10L18.5768 8.45392C19.3699 7.97803 19.7665 7.74009 20.0928 7.77051C20.3773 7.79703 20.6369 7.944 20.806 8.17433C21 8.43848 21 8.90095 21 9.8259V14.1741C21 15.099 21 15.5615 20.806 15.8257C20.6369 16.056 20.3773 16.203 20.0928 16.2295C19.7665 16.2599 19.3699 16.022 18.5768 15.5461L16 14M6.2 18H12.8C13.9201 18 14.4802 18 14.908 17.782C15.2843 17.5903 15.5903 17.2843 15.782 16.908C16 16.4802 16 15.9201 16 14.8V9.2C16 8.0799 16 7.51984 15.782 7.09202C15.5903 6.71569 15.2843 6.40973 14.908 6.21799C14.4802 6 13.9201 6 12.8 6H6.2C5.0799 6 4.51984 6 4.09202 6.21799C3.71569 6.40973 3.40973 6.71569 3.21799 7.09202C3 7.51984 3 8.07989 3 9.2V14.8C3 15.9201 3 16.4802 3.21799 16.908C3.40973 17.2843 3.71569 17.5903 4.09202 17.782C4.51984 18 5.07989 18 6.2 18Z" stroke="#000000" stroke-width="1.272" stroke-linecap="round" stroke-linejoin="round" />
                            </g>

                        </svg>
                    </label>

                    <label for="links" class="cursor-pointer">
                        <input type="url" name="links[]" id="links" multiple class="hidden">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <path d="M12.5 14.75H10C9.59 14.75 9.25 14.41 9.25 14C9.25 13.59 9.59 13.25 10 13.25H12.5C15.12 13.25 17.25 11.12 17.25 8.5C17.25 5.88 15.12 3.75 12.5 3.75H7.5C4.88 3.75 2.75 5.88 2.75 8.5C2.75 9.6 3.14 10.67 3.84 11.52C4.1 11.84 4.06 12.31 3.74 12.58C3.42 12.84 2.95 12.8 2.68 12.48C1.76 11.36 1.25 9.95 1.25 8.5C1.25 5.05 4.05 2.25 7.5 2.25H12.5C15.95 2.25 18.75 5.05 18.75 8.5C18.75 11.95 15.95 14.75 12.5 14.75Z" fill="#000000" />
                                <path d="M16.5 21.75H11.5C8.05 21.75 5.25 18.95 5.25 15.5C5.25 12.05 8.05 9.25 11.5 9.25H14C14.41 9.25 14.75 9.59 14.75 10C14.75 10.41 14.41 10.75 14 10.75H11.5C8.88 10.75 6.75 12.88 6.75 15.5C6.75 18.12 8.88 20.25 11.5 20.25H16.5C19.12 20.25 21.25 18.12 21.25 15.5C21.25 14.4 20.86 13.33 20.16 12.48C19.9 12.16 19.94 11.69 20.26 11.42C20.58 11.15 21.05 11.2 21.32 11.52C22.25 12.64 22.76 14.05 22.76 15.5C22.75 18.95 19.95 21.75 16.5 21.75Z" fill="#000000" />
                            </g>

                        </svg>
                    </label>

                    <label for="document" class="cursor-pointer">
                        <input type="file" name="document[]" id="document" multiple accept=".txt,.pdf,.doc,.docx" class="hidden">
                        <svg fill="#000000" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="20px" viewBox="0 0 31.612 31.612" xml:space="preserve">

                            <g id="SVGRepo_bgCarrier" stroke-width="0" />

                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" />

                            <g id="SVGRepo_iconCarrier">
                                <g>
                                    <g>
                                        <path d="M10.871,13.671l-4.058,4.057c-0.234,0.234-0.367,0.553-0.367,0.885c0,0.333,0.133,0.65,0.367,0.885l3.923,3.924 c0.245,0.244,0.565,0.367,0.887,0.367c0.32,0,0.641-0.123,0.885-0.367c0.49-0.488,0.49-1.281,0-1.771L9.47,18.613l3.173-3.172 c0.489-0.488,0.489-1.281,0-1.77C12.152,13.182,11.36,13.182,10.871,13.671z" />
                                        <path d="M18.969,15.443l3.174,3.171l-3.039,3.038c-0.488,0.488-0.488,1.281,0,1.771c0.244,0.244,0.564,0.366,0.886,0.366 s0.642-0.122,0.887-0.366l3.923-3.924c0.234-0.234,0.367-0.554,0.367-0.886c0-0.333-0.133-0.651-0.367-0.886l-4.058-4.056 c-0.489-0.489-1.281-0.489-1.771,0C18.48,14.16,18.48,14.954,18.969,15.443z" />
                                        <path d="M13.265,26.844c0.081,0.023,0.162,0.037,0.245,0.037c0.356,0,0.688-0.232,0.798-0.592l4.59-14.995 c0.138-0.441-0.111-0.908-0.553-1.043c-0.443-0.135-0.906,0.113-1.043,0.554L12.71,25.799 C12.576,26.241,12.823,26.707,13.265,26.844z" />
                                        <path d="M11.216,0L3.029,8.643v22.969h25.554V0H11.216z M10.495,3.635v3.83H6.867L10.495,3.635z M26.605,29.637H5.005V9.441h7.465 V1.975h14.135V29.637z" />
                                    </g>
                                </g>
                            </g>

                        </svg>
                    </label>

                </div>
                <div id="imagePreview" class="flex flex-wrap mt-4"></div>
                <div id="videoPreview" class="flex flex-wrap mt-4"></div>
                <div id="documentPreview" class="flex flex-wrap mt-4"></div>
                <div id="linkDisplay" class="mb-4 text-blue-500"></div>


                <button type="submit" class="bg-sky-800 hover:bg-sky-700 text-white px-6 py-3 rounded-md float-right">Envoyer</button>
            </form>
        </div>

    </div>
</div>








<script>
    var modal = document.getElementById("addProjectModal");

    // Get the button that opens the modal
    var btn = document.getElementById("openModalButton");

    // Get the <span> element that closes the modal
    var span = document.getElementById("closeModalButton");

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    var modal = document.getElementById("addProjectModal");
    var span = document.getElementById("closeModalButton");

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    document.getElementById('imageUpload').addEventListener('click', function() {
        document.getElementById('images').click();
    });

    document.getElementById('images').addEventListener('change', function() {
        document.getElementById('video').setAttribute('disabled', 'disabled');
        document.getElementById('document').setAttribute('disabled', 'disabled');
        document.getElementById('video').style.opacity = '0.5';
        document.getElementById('document').style.opacity = '0.5';
    });

    document.getElementById('video').addEventListener('change', function() {
        document.getElementById('images').setAttribute('disabled', 'disabled');
        document.getElementById('document').setAttribute('disabled', 'disabled');
        document.getElementById('images').style.opacity = '0.5';
        document.getElementById('document').style.opacity = '0.5';
    });

    document.getElementById('document').addEventListener('change', function() {
        document.getElementById('images').setAttribute('disabled', 'disabled');
        document.getElementById('video').setAttribute('disabled', 'disabled');
        document.getElementById('images').style.opacity = '0.5';
        document.getElementById('video').style.opacity = '0.5';
    });


    function previewImages() {
        var preview = document.getElementById('imagePreview');
        var files = document.getElementById('images').files;

        // Parcourir les fichiers sélectionnés
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            // Lecture du fichier en tant qu'URL de données
            reader.onload = function(e) {
                var thumbnail = document.createElement('div');
                thumbnail.classList.add('relative', 'mr-4', 'mb-4');

                var image = document.createElement('img');
                image.src = e.target.result;
                image.classList.add('w-24', 'h-24', 'rounded-md');

                var closeButton = document.createElement('button');
                closeButton.innerHTML = '&times;';
                closeButton.classList.add('absolute', 'top-0', 'right-0', 'mt-1', 'mr-1', 'text-white', 'bg-gray-500', 'rounded-full', 'hover:bg-red-600');
                closeButton.onclick = function() {
                    thumbnail.remove(); // Supprimer la vignette d'image lorsqu'on clique sur le bouton de fermeture
                };

                thumbnail.appendChild(image);
                thumbnail.appendChild(closeButton);

                // Ajouter la vignette à la section de prévisualisation
                preview.appendChild(thumbnail);

                // Insérer l'image choisie dans l'input images[]
                var hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'images[]';
                hiddenInput.value = e.target.result; // Utilisez l'URL de données comme valeur de l'input
                preview.appendChild(hiddenInput);
            };

            reader.readAsDataURL(file); // Lecture du fichier en tant qu'URL de données
        }
    }

    document.getElementById('images').addEventListener('change', previewImages);



    function previewVideos() {
        var preview = document.getElementById('videoPreview');
        var files = document.getElementById('video').files;

        // Parcourir les fichiers sélectionnés
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            var reader = new FileReader();

            // Vérifier si le fichier est une vidéo
            if (file.type.includes('video')) {
                var video = document.createElement('video');
                video.src = URL.createObjectURL(file);
                video.controls = true;
                video.classList.add('w-24', 'h-24', 'rounded-md');

                var thumbnail = document.createElement('div');
                thumbnail.classList.add('relative', 'mr-4', 'mb-4');

                var closeButton = document.createElement('button');
                closeButton.innerHTML = '&times;';
                closeButton.classList.add('absolute', 'top-0', 'right-0', 'mt-1', 'mr-1', 'text-white', 'bg-gray-500', 'rounded-full', 'hover:bg-red-600');
                closeButton.onclick = function() {
                    thumbnail.remove(); // Supprimer la vignette de vidéo lorsqu'on clique sur le bouton de fermeture
                };

                thumbnail.appendChild(video);
                thumbnail.appendChild(closeButton);

                // Ajouter la vignette à la section de prévisualisation
                preview.appendChild(thumbnail);
            }
        }
    }

    // Ajout d'un gestionnaire d'événement pour déclencher la fonction de prévisualisation lorsqu'une vidéo est sélectionnée
    document.getElementById('video').addEventListener('change', previewVideos);



    function previewDocuments() {
    var preview = document.getElementById('documentPreview');
    var filesInput = document.getElementById('document');
    var files = filesInput.files;

    // Parcourir les fichiers sélectionnés
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        var reader = new FileReader();

        // Vérifier si le fichier est un document
        if (file.type.includes('application/pdf') || file.type.includes('text/plain') || file.type.includes('application/msword') || file.type.includes('application/vnd.openxmlformats-officedocument.wordprocessingml.document')) {
            var documentPreview = document.createElement('div');
            documentPreview.classList.add('document-preview', 'flex','flex-col', 'items-center', 'mb-2');


            // Ajouter le titre du document
            var documentTitle = document.createElement('div');
            documentTitle.classList.add('document-title', 'text-sm','mr-6', 'truncate', 'flex-grow');
            // Limiter la longueur du titre et ajouter "..." à la fin si nécessaire
            var truncatedTitle = file.name.length > 20 ? file.name.substring(0, 20) + '...' : file.name;
            documentTitle.innerText = truncatedTitle;
            documentPreview.appendChild(documentTitle);

            // Ajouter le bouton de suppression à droite
            var closeButton = document.createElement('button');
            closeButton.innerHTML = '&times;';
            closeButton.classList.add('close-button', 'text-sm',  'rounded-full', 'hover:bg-red-600');
            closeButton.onclick = function() {
                // Supprimer l'aperçu du document lorsqu'on clique sur le bouton de fermeture
                this.parentNode.remove();
            };
            documentPreview.appendChild(closeButton);

            // Ajouter l'aperçu du document à la section de prévisualisation
            preview.appendChild(documentPreview);
        }
    }
}


    // Ajouter un gestionnaire d'événement pour déclencher la fonction de prévisualisation lorsqu'un document est sélectionné
    document.getElementById('document').addEventListener('change', previewDocuments);

    document.getElementById('links').addEventListener('click', function() {
        var link = prompt("Veuillez saisir le lien:");

        if (link !== null && link.trim() !== "") {
            // Expression régulière pour vérifier si le texte saisi est un lien
            var urlPattern = /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w\.-]*)*\/?$/;

            if (urlPattern.test(link)) {
                document.getElementById('links').value = link;
                // Afficher le lien saisi dans une zone de texte à des fins de démonstration
                document.getElementById('linkDisplay').innerHTML = "<a href='" + link + "' target='_blank'>" + link + "</a>";
            } else {
                alert("Le lien saisi n'est pas valide.");
            }
        }
    });
</script>