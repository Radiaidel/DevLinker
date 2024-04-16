<div id="emailInputPopup" class="modal hidden fixed inset-0 z-50 overflow-auto bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
        <span class="close-modal absolute top-0 right-0 px-4 py-2 cursor-pointer">x</span>
        <h2 class="text-lg font-bold mb-4">Enter your email to receive a reset code</h2>
        <form id="emailInputForm">
            <!-- Utilisez le champ de jeton CSRF -->
            @csrf
            <input type="email" id="emailInput" name="email" placeholder="Your email" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            <button type="submit" class="mt-4 rounded-lg px-4 py-2 float-right">Envoyer</button>
        </form>
    </div>
</div>



<div id="codeInputPopup" class="modal hidden fixed inset-0 z-50 overflow-auto bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
        <span class="close-modal absolute top-0 right-0 px-4 py-2 cursor-pointer">x</span>
        <h2 class="text-lg font-bold mb-4">Enter the reset code sent to your email</h2>
        <form id="codeInputForm">
            <!-- Utilisez le champ de jeton CSRF -->
            @csrf
            <input type="text" id="resetCodeInput" name="reset_code" placeholder="Reset code" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            <button type="submit" class="mt-4 rounded-lg px-4 py-2 float-right">Submit</button>
        </form>
    </div>
</div>


<div id="passwordInputPopup" class="modal hidden fixed inset-0 z-50 overflow-auto bg-gray-800 bg-opacity-50 flex justify-center items-center">
    <div class="modal-content bg-white p-6 rounded-lg shadow-lg">
        <span class="close-modal absolute top-0 right-0 px-4 py-2 cursor-pointer">x</span>
        <h2 class="text-lg font-bold mb-4">Reset Your Password</h2>
        <form id="passwordInputForm">
            <!-- Utilisez le champ de jeton CSRF -->
            @csrf
            <input type="password" id="newPasswordInput" name="new_password" placeholder="New Password" class="w-full border border-gray-300 rounded-lg px-3 py-2 mb-4">
            <input type="password" id="confirmPasswordInput" name="confirm_password" placeholder="Confirm Password" class="w-full border border-gray-300 rounded-lg px-3 py-2">
            <button type="submit" class="mt-4 rounded-lg px-4 py-2 float-right">Reset Password</button>
        </form>
    </div>
</div>





<script>
    // Récupérer les éléments nécessaires
    var forgotPasswordLink = document.getElementById('forgot-password-link');
    var emailInputPopup = document.getElementById('emailInputPopup');
    var closeModalButton = emailInputPopup.querySelector('.close-modal');
    var emailInputForm = document.getElementById('emailInputForm');
    var emailInput = document.getElementById('emailInput');


    var codeInputPopup = document.getElementById('codeInputPopup');
    var codeInputForm = document.getElementById('codeInputForm');
    var resetCodeInput = document.getElementById('resetCodeInput');
    var passwordInputPopup = document.getElementById('passwordInputPopup');

    var resetCodeSent;


    // Ajouter un écouteur d'événements pour le clic sur "Forgot password?"
    forgotPasswordLink.addEventListener('click', function(event) {
        event.preventDefault();
        emailInputPopup.classList.remove('hidden');
    });

    // Ajouter un écouteur d'événements pour fermer le popup
    closeModalButton.addEventListener('click', function(event) {
        emailInputPopup.classList.add('hidden');
    });

    let email;
    // Ajouter un écouteur d'événements pour soumettre le formulaire
    emailInputForm.addEventListener('submit', function(event) {
        event.preventDefault();
        email = emailInput.value;
        var csrfToken = emailInputForm.querySelector('input[name="_token"]').value; // Récupérer le jeton CSRF du formulaire

        // Envoyer une requête AJAX pour envoyer le code de réinitialisation
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Le code a été envoyé avec succès
                    // Afficher le nouveau popup pour saisir le code
                    var response = JSON.parse(xhr.responseText);
                    resetCodeSent = response.reset_code;
                    var codeInputPopup = document.getElementById('codeInputPopup');
                    codeInputPopup.classList.remove('hidden');
                    closeModalButton.click();
                } else {
                    // Une erreur s'est produite lors de l'envoi du code
                    // Afficher un message d'erreur à l'utilisateur
                    console.error('Erreur lors de l\'envoi du code');
                }
            }
        };
        xhr.open('POST', '/reset-password'); // Remplacez '/reset-password' par l'URL de votre endpoint pour envoyer le code de réinitialisation
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Utilisez le jeton CSRF récupéré du formulaire dans l'en-tête de la requête
        xhr.send(JSON.stringify({
            email: email
        }));



        codeInputForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var resetCode = resetCodeInput.value;

            // Vérifier si le code inséré correspond au code envoyé par réponse
            if (resetCode == resetCodeSent) {
                // Afficher le formulaire de réinitialisation du mot de passe
                codeInputPopup.classList.add('hidden');
                passwordInputPopup.classList.remove('hidden');
            } else {
                // Afficher un message d'erreur si le code ne correspond pas
                console.error('Le code de réinitialisation est incorrect');
            }
        });







        // Récupérer les éléments nécessaires pour le formulaire de réinitialisation du mot de passe
        var passwordInputForm = document.getElementById('passwordInputForm');
        var newPasswordInput = document.getElementById('newPasswordInput');
        var confirmPasswordInput = document.getElementById('confirmPasswordInput');

        // Ajouter un gestionnaire d'événements pour soumettre le formulaire de réinitialisation du mot de passe
        passwordInputForm.addEventListener('submit', function(event) {
            event.preventDefault();
            var csrfToken = passwordInputForm.querySelector('input[name="_token"]').value; // Récupérer le jeton CSRF du formulaire

            // Récupérer les valeurs des champs de mot de passe
            var newPassword = newPasswordInput.value;
            var confirmPassword = confirmPasswordInput.value;
            // Vérifier si les nouveaux mots de passe correspondent
            if (newPassword === confirmPassword) {
                // Les mots de passe correspondent, envoyer une requête AJAX pour mettre à jour le mot de passe
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Mot de passe mis à jour avec succès
                            console.log('Mot de passe mis à jour avec succès');
                            passwordInputPopup.classList.add('hidden');

                        } else {
                            // Une erreur s'est produite lors de la mise à jour du mot de passe
                            console.error('Erreur lors de la mise à jour du mot de passe');
                        }
                    }
                };
                xhr.open('POST', '/update-password'); // Remplacez '/update-password' par l'URL de votre endpoint pour mettre à jour le mot de passe
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken); // Utilisez le jeton CSRF récupéré du formulaire dans l'en-tête de la requête

                xhr.send(JSON.stringify({
                    email: email,
                    password: newPassword // Envoyer le nouveau mot de passe au contrôleur
                }));
            } else {
                // Les mots de passe ne correspondent pas, afficher un message d'erreur
                console.error('Les mots de passe ne correspondent pas');
            }
        });

    });
</script>