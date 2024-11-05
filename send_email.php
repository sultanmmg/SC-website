<?php

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Hvis du bruker Composer


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Få dataene fra skjemaet
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Definer e-postadressen du vil sende meldingen til
    $to = "scarfades.as@gmail.com";
    $subject = "Ny melding fra kontaktskjemaet";

    // E-postens innhold
    $body = "Du har mottatt en ny melding fra kontaktskjemaet.\n\n";
    $body .= "Navn: $name\n";
    $body .= "E-post: $email\n";
    $body .= "Melding:\n$message\n";

    // E-postens header
    $headers = "Fra: $email";

    // Send e-posten
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Takk for din melding! Vi vil ta kontakt så snart som mulig.'); window.location.href = 'contact.html';</script>";
    } else {
        echo "<script>alert('Det oppsto et problem ved sending av meldingen. Vennligst prøv igjen senere.'); window.location.href = 'contact.html';</script>";
    }
} else {
    // Hvis noen prøver å få tilgang til filen uten å sende skjemaet
    echo "<script>alert('Ugyldig forespørsel.'); window.location.href = 'contact.html';</script>";
}
?>