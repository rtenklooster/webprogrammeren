jQuery(document).ready(function() {
    console.log("Bestellen.js loaded");
    // categorieen
    let categories = ["Pasta", "Pizza", "Dranken"];

    $("a:contains('Bestellen')").after();

    // events
    $("button").click(function(event) {
        // op welke knop is geklikt.
        let clickedId = $(this).attr("id");

        if (clickedId.indexOf("min") != -1) {
            let id = clickedId.substr(0, clickedId.indexOf("min"))
            // console.log(id);
            let amount = Number($("#" + id + "amount").val()) - 1;
            if (amount>=0) {
                $("#" + id + "amount").val(amount);
            }

        } else if (clickedId.indexOf("plus") != -1) {
            let id = clickedId.substr(0, clickedId.indexOf("plus"))
            let amount = Number($("#" + id + "amount").val()) + 1;
            $("#" + id + "amount").val(amount);

        } else if (clickedId.indexOf("order") != -1) {
            // Strip alle non-digits
            let id = $(this).attr("id").replace(/\D/g,'');
            //let id = clickedId.substr(0, clickedId.indexOf("order"))
            let amount = Number($("#product" + id + "amount").val());
            console.log("order ID:"+ id +" aantal: "+amount);

            $.ajax({
                type: "POST",
                url: "functions/add_cart.php",
                data: "action=add_to_cart&id=" + id + "&amount=" + amount,
                success : function(text){
                  console.log(text);
                    if (text != "success"){
                        updateTotal("13,50");
                    //    $("#navigation_container").load(location.href + " #navigation_container");
                    }else{
                        //loginFailed();
                    }
                }
            });
        }
    });
});
