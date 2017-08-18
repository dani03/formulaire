<?php
$tableau = array(
  "firstname" => "",
  "name" => "",
  "phone" => "",
  "email" => "",
  "message" => "",
  "firstnameError" => "",
  "nameError" => "",
  "phoneError" => "",
  "messageError" => "",
  "emailError" => "",
  "isSuccess" => false
);


$emailTo = "issoasamedaniel@yahoo.fr";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $tableau["firstname"] = security($_POST["firstname"]);
  $tableau["name"] = security($_POST["name"]);
  $tableau["email"] = security($_POST["email"]);
  $tableau["phone"] = security($_POST["phone"]);
  $tableau["message"] = security($_POST["message"]);
  $tableau["isSuccess"] = true;
  $emailText = "";

  if(empty($tableau["firstname"])){
     $tableau["firstnameError"] = "hey votre prénom!!";
     $tableau["isSuccess"] = false;
  }

   else{
       $emailText .= "Prénom: ".$tableau['firstname']."\n";
     }

  if(empty($tableau["name"])){
     $tableau["nameError"] = "hey votre nom!!";
     $tableau["isSuccess"] = false;
  }
  // ici le ".= " le point devant le égal permet de concatener
    else{
      $emailText .= "Nom: ".$tableau['name']."\n";}

  if(empty($tableau["email"])){
     $tableau["emailError"] = "hey votre email!!";
     $tableau["isSuccess"] = false;
  }
  else{
      $emailText .= "mail: ".$tableau['email']."\n";}

  if(empty($tableau["phone"])){
     $tableau["phoneError"] = "hey votre numéro de téléphone!!";
     $tableau["isSuccess"] = false;
  }
  else{
      $emailText .= "téléphone: ".$tableau['phone']."\n";}

  if(empty($tableau["message"])){
     $tableau["messageError"] = "hey vous oubliez le plus important!!";
    $tableau["isSuccess"] = false;
  }
  else{
      $emailText = "message:". $tableau['message']."\n";
    }
// ici on verifie si l'email est valide
  if(!isEmail($tableau["email"])){
    $tableau["emailError"] = "entrez un email valide";
    $tableau["isSuccess"] = false;
  }

  if(!isphone($tableau["phone"])){
    $tableau["phoneError"] = "la syntaxe est ..06 xx xx xx xx";
    $tableau["isSuccess"] = false;
  }

  if($tableau["isSuccess"]){
    // le headers ici permet d'avoir les informations sur celui qui nous a envoyer l'email et de lui repondre
    $headers ="from: ". $tableau['firstname']. $tableau['name']."<".$tableau['email'].">"."\r\nReplyTo:" .$tableau['email']."";
    mail($emailTo, "un message de votre site", $emailText, $headers);
  }

  echo json_encode($tableau);

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
