<?php

$firstname = $name = $phone = $message = $email = "";
$firstnameError = $nameError = $phoneError = $messageError = $emailError= "";
$isSuccess = false;
$emailTo = "issoasamedaniel@yahoo.fr";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $firstname = security($_POST["firstname"]);
  $name = security($_POST["name"]);
  $email = security($_POST["email"]);
  $phone = security($_POST["phone"]);
  $message = security($_POST["message"]);
  $isSuccess = true;
  $emailText = "";

  if(empty($firstname)){
     $firstnameError = "hey votre prénom!!";
  }
    // ici le ".= " le point devant le egale permet de concatener
   else{
       $emailText .= "Prénom : $firstname\n";}

  if(empty($name)){
     $nameError = "hey votre nom!!";
     $isSuccess = false;
  }
  // ici le ".= " le point devant le égal permet de concatener
    else{
      $emailText .= "Nom : $name\n";}

  if(empty($email)){
     $emailError = "hey votre email!!";
     $isSuccess = false;
  }
  else{
      $emailText .= "mail: $email\n";}

  if(empty($phone)){
     $phoneError = "hey votre numéro de téléphone!!";
     $isSuccess = false;
  }
  else{
      $emailText .= "téléphone: $phone\n";}

  if(empty($message)){
     $messageError = "hey vous oubliez le plus important!!";
     $isSuccess = false;
  }
  else{
      $emailText .= "message: $message\n";
    }

  if(!isEmail($email)){
    $emailError = "entrez un email valide";
    $isSuccess = false;
  }

  if(!isphone($phone)){
    $phoneError = "la syntaxe est ..06 xx xx xx xx";
    $isSuccess = false;
  }

  if(isSuccess){
    // le headers ici permet d'avoir les informations sur celui qui nous a envoyer l'email et de lui repondre
    $headers ="from: $firstname $name <$email>\r\nReplyTo: $email";
    mail($emailTo, "un message de votre site", $emailText, $headers);
    // apres avoir cliquer sur envoyer on remets les valeurs a zero
    $firstname = $name = $phone = $message = $email = "";
  }

}
// ici on verifie si le telephone est valide
function isPhone($var){
  return preg_match("/^[0-9 ]*$/", $var);
}
// on verifie que l'utilisateur entre un email valide
 function isEmail($var){
    return filter_var($var, FILTER_VALIDATE_EMAIL);
 }
// on cree une fonction pour la secutité
 function security($var){
   $var = trim($var);
   $var = stripslashes($var);
   $var = htmlspecialchars($var);

   return $var;
 }

 ?>
