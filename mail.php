<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Récupération des données du formulaire
    $nom = htmlspecialchars($_POST["fname"]);
    $pnom = htmlspecialchars($_POST["lname"]);
    $tel = htmlspecialchars($_POST["tel"]);
    $email = htmlspecialchars($_POST["mail"]);
    $p = htmlspecialchars($_POST["p"]);
    $v = htmlspecialchars($_POST["v"]);
    $g = htmlspecialchars($_POST["g"]);
    $message = htmlspecialchars($_POST["message"]);

    //uploade file
    $target_dir = "pdf/"; // Répertoire où le fichier sera stocké
    $target_file = $target_dir . basename($_FILES["subject"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $alertMessage = '';

    // Vérifier si le fichier est une image réelle ou une fausse image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["subject"]["tmp_name"]);
        if ($check !== false) {
            $alertMessage .= "Le fichier est une image - " . $check["mime"] . ".\\n";
            $uploadOk = 1;
        } else {
            $alertMessage .= "Le fichier n'est pas une image.\\n";
            $uploadOk = 0;
        }
    }

    // Vérifier si le fichier existe déjà
    if (file_exists($target_file)) {
        $alertMessage .= "Désolé, le fichier existe déjà.\\n";
        $uploadOk = 0;
    }

    // Vérifier la taille du fichier
    if ($_FILES["subject"]["size"] > 5000000000000000000) {
        $alertMessage .= "Désolé, votre fichier est trop volumineux.\\n";
        $uploadOk = 0;
    }

    // Autoriser certains formats de fichier
    $allowed_types = array("docx", "doc", "pdf");
    if (!in_array($fileType, $allowed_types)) {
        $alertMessage .= "Désolé, seuls les fichiers DOCX, DOC, PDF sont autorisés.\\n";
        $uploadOk = 0;
    }

    // Vérifier si $uploadOk est défini à 0 par une erreur
    if ($uploadOk == 0) {
        $alertMessage .= "Désolé, votre fichier n'a pas été uploadé.\\n";
        // Si tout est ok, essayer d'uploader le fichier
    } else {
        if (move_uploaded_file($_FILES["subject"]["tmp_name"], $target_file)) {
            $alertMessage .= "Le fichier " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " a été uploadé.\\n";
        } else {
            $alertMessage .= "Désolé, une erreur est survenue lors de l'upload de votre fichier.\\n";
        }
    }



    // Adresse email où vous souhaitez recevoir les messages (votre adresse Gmail)
    $destinataire = "giovanidassitankou@gmail.com";

    // Sujet de l'email
    $sujet = "Nouveau message de $nom";

    // Corps de l'email
    $contenu = "Nom: $nom $pnom \n";
    $contenu .= "Email: $email\n";
    $contenu .= "Tel: $tel\n";
    $contenu .= "Pays: $p\n";
    $contenu .= "Ville: $v\n\n";
    $contenu .= "Message:\n$message";

    // Instanciation de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Paramètres SMTP pour Gmail
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'giovanidassitankou@gmail.com'; // Votre adresse Gmail
        $mail->Password = 'gsyj ntye gylo zvgz'; // Votre mot de passe Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Port SMTP de Gmail

        // Ajouter la pièce jointe
        $mail->addAttachment($target_file); // Ajouter le fichier uploadé comme pièce jointe


        // Destinataire et expéditeur
        $mail->setFrom($email, $nom);
        $mail->addAddress($destinataire);

        // Contenu de l'email
        $mail->isHTML(false); // Le contenu est-il au format HTML ? Non

        $mail->Subject = $sujet;
        $mail->Body = $contenu;

        // Envoi de l'email
        $mail->send();
        $alertMessage .= 'Message envoyé avec succès\\n';
        header("Location:contact.php");
    } catch (Exception $e) {
        $alertMessage .= "Le message n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}\\n";
    }
    echo "<script>alert('$alertMessage');</script>";
}