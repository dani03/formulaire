$(function(){

     $('#contact-form').submit(function(e){
       e.preventDefault();
       $('.comments').empty();
      //  ici ont va chercher tout les elements du formulaire et les mettrent dans une variable postData
       var postData = $('#contact-form').serialize();
// ici on recupere les données avec ajax
       $.ajax({
         type: 'POST',
         url: '../html/contact.php',
         data: postData,
         dataType: 'json',
         success: function(result){

                    if(result.isSuccess){
                      $('#contact-form').append("<p class='merci'> votre message a bien été envoyé merci de m'avoir contacter.</p>");
                      $('#contact-form')[0].reset();
                      // ici si tout c'est bien page on envoyer le message a l'utilisateur et on remet tout a zero
                    }
                     else
                     {
                      //  le "+" ici veut dire "va chercher l'element qui suit directement l'id idententifier"
                       $("#firstname + .comments").html(result.firstnameError);
                       $("#name + .comments").html(result.nameError);
                       $("#message + .comments").html(result.messageError);
                       $("#phone + .comments").html(result.phoneError);
                       $("#email + .comments").html(result.emailError);
                     }


         }
       });
     });
})
