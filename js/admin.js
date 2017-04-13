$(".btn[data-target='#myModal']").click(function() {
       var columnHeadings = $("thead th").map(function() {
                 return $(this).text();
              }).get();
       columnHeadings.pop();
       var columnValues = $(this).parent().siblings().map(function() {
                 return $(this).text();
       }).get();
  var modalBody = $('<div id="modalContent"></div>');
  var modalForm = $('<form role="form" name="modalForm" action="functions/updateProduct.php" method="post"></form>');
  $.each(columnHeadings, function(i, columnHeader) {
       var formGroup = $('<div class="form-group"></div>');
       if(columnHeader == "Id"){
         formGroup.append('<input class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'" value="'+columnValues[i]+'" type="hidden" />');
       }else {
       formGroup.append('<label for="'+columnHeader+'">'+columnHeader+'</label>');
       if(columnHeader == "Categorie"){

         var placeholder = '<select class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'">';
         //formGroup.append('<option value="1">Dranken</option><option>2</option><option>3</option><option>4</option></select>');
         if(columnValues[i] == "Dranken") {
           placeholder += '<option value="1" SELECTED >Dranken</option>';
         }else{
           placeholder += '<option value="1">Dranken</option>';
         }
         if(columnValues[i] == "Pizza's") {
           placeholder += '<option value="2" SELECTED >Pizza\'s</option>';
         }else{
           placeholder += '<option value="2">Pizza\'s</option>';
         }
         if(columnValues[i] == "Pasta's") {
           placeholder += '<option value="3" SELECTED >Pasta\'s</option>';
         }else{
           placeholder += '<option value="3">Pasta\'s</option>';
         }
         if(columnValues[i] == "Lasagne's") {
           placeholder += '<option value="4" SELECTED >Lasagne\'s</option>';
         }else{
           placeholder += '<option value="4">Lasagne\'s</option>';
         }
         placeholder += "</select>";
         formGroup.append(placeholder);
       }else if(columnHeader == "Omschrijving"){
         formGroup.append('<textarea class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'">'+columnValues[i]+'</textarea>');
       }else{
         formGroup.append('<input class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'" value="'+columnValues[i]+'" />');
     }
   }
       modalForm.append(formGroup);
  });
  modalBody.append(modalForm);
  $('.modal-body').html(modalBody);
});
$('.modal-footer .btn-primary').click(function() {
   $('form[name="modalForm"]').submit();
});
