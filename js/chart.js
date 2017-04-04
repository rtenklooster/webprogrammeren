jQuery(document).ready(function() {
    console.log("chart.js loaded");
    // On page refresh: update chart total
    updateTotal();
  });

function updateTotal(){
  $.ajax({
      type: "POST",
      url: "functions/get_chart.php",
      data: "action=getTotal",
      success : function(text){
        console.log(text);
        $( "#totaalBedrag" ).text( "Winkelmandje: € "+text);
      }
  });
};
