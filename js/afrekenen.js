console.log("afrekenen.js loaded");

$("span#remove").on("click", function(){
    let $deleteRow = $(this).parent().parent('tr');
    let id = $(this).parent().parent('tr').attr('id');

    console.log("wissen id :" + id);

    $deleteRow.addClass("danger");
        $deleteRow.fadeOut(2000, function(){
        $(this).remove();

        $.ajax({
            type: "POST",
            url: "functions/delete_from_cart.php",
            data: "action=delete_from_cart&id=" + id ,
            success : function(text){
                console.log(text);
                if (text != "success"){
                    updateTotal();    
                } else {
                
                }
            }
        });



    });
});

// waarde van de betaalmethode knop updaten
$(".dropdown-menu").on('click', 'li a', function(){
      $("button#betaalmethode").html($(this).text() + " <span class='caret'></span>");
      $("button#betaalmethode").val($(this).text().replace(/\s+/g, ''));
});


