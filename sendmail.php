<?php

// Sécurisation basique
function clean($value) {
    return htmlspecialchars(trim($value));
}

$nom     = clean($_POST['nom']);
$email   = clean($_POST['email']);
$sujet   = clean($_POST['sujet']);
$message = clean($_POST['message']);

// Email de destination
$to = "contact@adbprocess.fr";

// Sujet de l'email
$subject = "Nouveau message depuis le formulaire ADB Process : " . $sujet;

// Contenu de l'email
$body = "
Nom : $nom
Email : $email

Message :
$message
";

// En-têtes
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoi
if (mail($to, $subject, $body, $headers)) {
    echo "Votre message a été envoyé avec succès.";
} else {
    echo "Une erreur est survenue lors de l'envoi.";
}

?>
