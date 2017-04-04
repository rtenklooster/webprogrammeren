jQuery(document).ready(function() {
    console.log("Bestellen.js loaded");

    var waarde = Number($("input#product1").val());

    $("button#product1min").click(function() {
        if(waarde > 0) {
            console.log("click min");
            $("input#product1").val(waarde - 1);
            waarde -= 1;
        }
    });

    // $("button#product1plus").click(function() {

    //         console.log("click min");
    //         $("input#product1").val(waarde + 1);
    //         waarde += 1;

    // });

$("button").click(function(event) {
   var clicked = $(this); // jQuery wrapper for clicked element
    console.log($(this).attr("id"));
    //    console.log(clicked);
});



});






