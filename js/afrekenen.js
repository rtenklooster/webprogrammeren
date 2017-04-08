console.log("afrekenen.js loaded");

$("span#remove").on("click", function(){
    let $deleteRow = $(this).parent().parent('tr');

    $deleteRow.addClass("danger");
        $deleteRow.fadeOut(2000, function(){
    $(this).remove();
});});