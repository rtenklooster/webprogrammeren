$("#login_formulier").submit(function(event){
    // Formulier niet standaard methode versturen maar via Ajax
    event.preventDefault();
    submitForm();
});

function submitForm(){
    // Definieer formulier variabelen
    var email = $("#inputEmail").val();
    var password = $("#inputPassword").val();
    console.log("We gaan inloggen");
    $.ajax({
        type: "POST",
        url: "functions/verify_logon.php",
        data: "email=" + email + "&password=" + password,
        success : function(text){
            if (text == "success"){
                loginSuccess();
            }else{
                loginFailed();
            }
        }
    });
}

function loginSuccess(){
  console.log("De gebruiker is gevalideerd");
}

function loginFailed(){
  console.log("De gebruiker is helaas niet gevalideerd");
  $( "#foutmelding" ).removeClass( "hidden" );
}
