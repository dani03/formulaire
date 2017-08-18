<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1 ">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link  href="http://fonts.googleapis.com/css?family=lato" rel= "stylesheet" type="text/css">
    <link rel="stylesheet" type='text/css' href="../css/style.css">

    <title>formulaire de contact</title>
  </head>
  <body>
    <div class="container">
      <div class="diviseur"></div>
      <div class="heading">
        <h2 id="contactME">contactez moi</h2>
      </div>
      <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
          <form class="formulaire" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" id='contact-form' role='form' required>
            <div class="row">
              <div class="col-md-6">
                <label for="firstname"> prénom <span class="blue">*</span></label>
                <input type="text" name="firstname" id="firstname" class="form-control" value='<?php echo $firstname ; ?>' placeholder="votre prénom" required>
                <p class="comments"><?php echo $firstnameError;?></p>
              </div>
              <div class="col-md-6">
                <label for="name"> nom <span class="blue">*</span></label>
                <input type="text" name="name" id="name" class="form-control" value='<?php echo $name ; ?>' placeholder="votre nom" required >
                <p class="comments"><?php  echo $nameError ;?></p>
              </div>
              <div class="col-md-6">
                <label for="firstname"> email<span class="blue">*</span></label>
                <input type="email" name="email" id="email" class="form-control" value="<?php echo $email ; ?>" placeholder="visiteur@gmail.com" required>
                <p class="comments"><?php  echo $emailError ;?></p>
              </div>
              <div class="col-md-6">
                <label for="phone"> téléphone <span class="blue">*</span></label>
                <input type="tel" name="phone" id="phone" class="form-control" value="<?php echo $phone ; ?>" placeholder=" ex:12 34 56 78 90" required >
                <p class="comments"><?php  echo $phoneError ;?></p>
              </div>
              <div class="col-md-12">
                  <label for="message"> message <span class="blue">*</span></label>
                  <textarea name="message" id="message"  class="form-control" placeholder="entrez votre message"rows="8" cols="80"> </textarea>
                  <p class="comments"><?php  echo $messageError ;?></p>
              </div>
              <div class="col-md-12">
                    <p class="blue"><strong>*ces champs sont requis</strong> </p>
              </div>
              <div class="col-md-12">
              <input type="submit" class="envoyer" name="" value="envoyer">
              </div>

            </div>
            <p class="merci" style="display:<?php if($isSuccess) echo 'block'; else {echo 'none';} ?>"> votre message a bien été envoyé merci de m'avoir contacter.</p>
          </form>

        </div>

      </div>
    </div>
 <script src='../js/script.js' type="text/javascript">

 </script>
  </body>
</html>
