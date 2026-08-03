<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Méthode non autorisée.");
}

function clean($value) {
    return htmlspecialchars(trim($value));
}

$nom     = clean($_POST['nom']);
$email   = clean($_POST['email']);
$sujet   = clean($_POST['sujet']);
$message = clean($_POST['message']);

$to = "contact@adbprocess.fr";
$subject = "Message depuis le site ADB Process : " . $sujet;

$body = "
Nom : $nom
Email : $email

Message :
$message
";

$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo "Votre message a été envoyé avec succès.";
} else {
    echo "Erreur : le serveur n'autorise pas l'envoi d'email.";
}

?>
