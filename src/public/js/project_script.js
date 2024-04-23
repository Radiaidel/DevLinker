function toggleDropdownProject(event) {
    var dropdownMenu = event.target.nextElementSibling;
    dropdownMenu.classList.toggle('hidden');
}
function openLikesPopup(projectId) {

    fetch('/projects/' + projectId + '/likes')
        .then(response => response.json())
        .then(data => {
            var likesList = document.getElementById('likesList');
            likesList.innerHTML = '';
            const likesCount = data.likes.length;
            document.getElementById('likesCount').textContent = likesCount;

            data.likes.forEach(like => {
                const listItem = document.createElement('li');
                listItem.classList.add('flex', 'items-center', 'py-2');

                const userImage = document.createElement('img');
                if (like.user.profile && like.user.profile.profile_image) {
                    // Construction de l'URL de l'image de profil si elle est disponible
                    userImage.src = '{{ asset("storage/profile/") }}' + '/' + like.user.profile.profile_image;
                } else {
                    // Utilisation de l'image par défaut si aucune image de profil n'est disponible
                    userImage.src = '{{ asset("storage/profile/unknown.png") }}';
                }
                userImage.alt = 'Profile Image';
                userImage.classList.add('w-10', 'h-10', 'rounded-full', 'mr-4');
                listItem.appendChild(userImage);

                const userName = document.createElement('span');
                userName.textContent = like.user.name; // Nom de l'utilisateur
                userName.classList.add('text-gray-800');
                listItem.appendChild(userName);

                likesList.appendChild(listItem);
            });
            var popup = document.getElementById('likesPopup');
            popup.classList.remove('hidden');

        });


}

function closeLikesPopup() {
    var popup = document.getElementById('likesPopup');
    popup.classList.add('hidden');
}


function toggleColors(svgElement, projectId) {
    var pathElement = svgElement.querySelector('#heartPath');
    var strokeColor = svgElement.getAttribute('stroke');
    var fillColor = pathElement.getAttribute('fill');

    // Création de l'objet XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Préparation des données à envoyer
    var data = 'project_id=' + projectId;

    // Configuration de la requête
    xhr.open('POST', '/projects/like', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content);
    // Gestion de la réponse de la requête
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = xhr.responseText;
            var likeCountElement = svgElement.closest('.flex').querySelector('.like-count');

            if (response === 'like') {
                // Si la réponse est 'like', remplir le cœur en rouge
                likeCountElement.innerText = parseInt(likeCountElement.innerText) + 1;
                pathElement.setAttribute('fill', '#ff0000');
                svgElement.setAttribute('stroke', '#ff0000');
            } else if (response === 'dislike') {
                // Si la réponse est 'dislike', remplir le cœur en blanc
                likeCountElement.innerText = parseInt(likeCountElement.innerText) - 1;
                pathElement.setAttribute('fill', '#ffffff');
                svgElement.setAttribute('stroke', '#000000');
            } else {
                console.error('Réponse inattendue du serveur :', response);
            }

        } else {
            console.error('Erreur lors de la requête :', xhr.statusText);
        }


    };

    // Gestion des erreurs de la requête
    xhr.onerror = function() {
        console.error('Erreur lors de la requête :', xhr.statusText);
    };

    // Envoi de la requête avec les données
    xhr.send(data);
}

function toggleSave(svgElement, projectId) {

    var xhr = new XMLHttpRequest();

    var data = 'project_id=' + projectId;

    xhr.open('POST', '/projects/save', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.setRequestHeader('X-CSRF-TOKEN', document.head.querySelector('meta[name="csrf-token"]').content);

    // Gestion de la réponse de la requête
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            var response = xhr.responseText;

            if (response === 'save') {
                // Si la réponse est 'save', remplir l'icône en bleu
                svgElement.setAttribute('fill', '#000000');
            } else if (response === 'unsave') {
                // Si la réponse est 'unsave', remplir l'icône en gris
                svgElement.setAttribute('fill', '#ffffff');
            } else {
                console.error('Réponse inattendue du serveur :', response);
            }
        } else {
            console.error('Erreur lors de la requête :', xhr.statusText);
        }
    };

    // Gestion des erreurs de la requête
    xhr.onerror = function() {
        console.error('Erreur lors de la requête :', xhr.statusText);
    };

    // Envoi de la requête avec les données
    xhr.send(data);
}


function CopyLink(projectId, event) {
    var projectLink = window.location.origin + '/projects/' + projectId; // URL originale + slug du projet
    navigator.clipboard.writeText(projectLink);

    // Récupérer l'élément .copiedText associé à l'icône SVG cliqué
    var copiedTextElement = event.target.parentNode.querySelector('.copiedText');

    // Afficher l'élément .copiedText
    copiedTextElement.classList.remove("hidden");

    // Masquer l'élément après 2 secondes
    setTimeout(function() {
        copiedTextElement.classList.add("hidden");
    }, 1000); // Masquer le message après 2 secondes
}



document.addEventListener("DOMContentLoaded", function () {
    // var description = document.getElementById('description_{{$project->id}}');
    // var toggleBtn = description.nextElementSibling;

    // toggleBtn.addEventListener('click', function () {
    //     if (description.classList.contains('max-h-24')) {
    //         description.classList.remove('max-h-24');
    //         toggleBtn.textContent = 'réduire';
    //     } else {
    //         description.classList.add('max-h-24');
    //         toggleBtn.textContent = '...lire la suite';
    //     }
    // });


    document.querySelectorAll('[id^="carousel_"]').forEach(function (carousel) {
        var mediaData = JSON.parse(carousel.getAttribute('data-media'));
        var totalMedia = mediaData.length;
        var currentMediaIndex = 0;

        function nextMedia() {
            currentMediaIndex = (currentMediaIndex + 1) % totalMedia;
            updateMedia();
        }

        function prevMedia() {
            currentMediaIndex = currentMediaIndex === 0 ? totalMedia - 1 : currentMediaIndex - 1;
            updateMedia();
        }

        function updateMedia() {
            var flexContainer = carousel.querySelector('.flex');
            flexContainer.innerHTML = ''; // Nettoyer le contenu du carrousel
            if (totalMedia > 0) {
                var currentMedia = mediaData[currentMediaIndex];
                if (currentMedia['type'] === 'image') {
                    var img = document.createElement('img');
                    img.src = currentMedia['path'];
                    img.alt = 'Image';
                    flexContainer.appendChild(img);
                } else if (currentMedia['type'] === 'video') {
                    var video = document.createElement('video');
                    video.controls = true;
                    var source = document.createElement('source');
                    source.src = currentMedia['path'];
                    source.type = 'video/mp4';
                    video.appendChild(source);
                    flexContainer.appendChild(video);
                }
            }
        }

        if (totalMedia > 1) { // Vérifier s'il y a plus d'un média dans le carrousel
            carousel.querySelector('.nextBtn').addEventListener('click', nextMedia);
            carousel.querySelector('.prevBtn').addEventListener('click', prevMedia);
        }
    });


    const reportForms = document.querySelectorAll('.reportForm');

    reportForms.forEach(function(reportForm) {
        reportForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du formulaire
            
            // Récupérer les données du formulaire
            const formData = new FormData(reportForm);

            // Envoyer les données via une requête Fetch
            fetch("/projects/report", {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Report submitted successfully:', data);
                // Traitez la réponse si nécessaire
            })
            .catch(error => {
                console.error('Error submitting report:', error);
                // Gérez les erreurs si nécessaire
            });
        });
    });
});