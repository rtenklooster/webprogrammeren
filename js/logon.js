$("#login_formulier").submit(function(event){
    // Formulier niet standaard methode versturen maar via Ajax
    event.preventDefault();
    console.log("We gaan inloggen");
    logIn();
});
/*
$("#logout_formulier").submit(function(event){
    // Formulier niet standaard methode versturen maar via Ajax
    event.preventDefault();
    console.log("We gaan uitloggen");
    logOut();
});
*/
function logIn(){
    // Definieer formulier variabelen
    var email = $("#inputEmail").val();
    var password = $("#inputWachtwoord").val();
    //console.log("We gaan inloggen: "+email+" password: "+password);
    $.ajax({
        type: "POST",
        url: "functions/verify_logon.php",
        data: "action=login&email=" + email + "&password=" + password,
        success : function(text){
          console.log(text);
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
  // Verberg inlog scherm
  $( "#loginForm" ).removeClass( "show" );
  $( "#loginForm" ).hide();
  // Ververs de inhoud van de header ( moet nu een in / uitlog knop komen)
  $("#header").load(location.href + " #header");
  window.location.replace("index.php?page=bestellingen"); 
  //$( "#loginText" ).html( "uitloggen" );

}

function loginFailed(){
  console.log("De gebruiker is helaas niet gevalideerd");
  $( "#foutmelding" ).removeClass( "hidden" );
  $( "#loginForm" ).addClass( "show" );
}
/*
function logOut(){
    $.ajax({
        type: "POST",
        url: "functions/verify_logon.php",
        data: "action=logout&logout=true",
        success : function(text){
          console.log(text);
            if (text == "success"){
                logoutSuccess();
            }
        }
    });
}

function logoutSuccess(){
  console.log("De gebruiker is uitgelogd");
  $( "#logoutForm" ).removeClass( "show" );
  $( "#logoutForm" ).hide();
  //$( "#loginText" ).html( "uitloggen" );

}
*/
