<x-mail::message>
<h2>Confirmation d'email</h2>
    <p>Bonjour,</p>
    <p>Vous avez récemment demandé à modifier l'adresse e-mail associée à votre compte. Veuillez cliquer sur le bouton ci-dessous pour confirmer ce changement :</p>
    <a href="{{ $verificationUrl }}" target="_blank">Confirmer l'email</a>
    <p>Si vous n'avez pas demandé ce changement, vous pouvez ignorer cet e-mail.</p>
    <p>Merci,</p>
    <p>Votre équipe {{ config('app.name') }}</p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
