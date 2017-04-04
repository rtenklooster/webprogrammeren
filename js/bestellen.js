jQuery(document).ready(function() {
    console.log("Bestellen.js loaded");

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
            console.log("order");
        }
    });
});






