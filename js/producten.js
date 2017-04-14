$(".btn[data-target='#myModal']").click(function() {
       var columnHeadings = $("thead th").map(function() {
                 return $(this).attr('id');
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
       }else if (columnHeader == "Wijzig"){

       } else{
       formGroup.append('<label for="'+columnHeader+'">'+columnHeader+'</label>');
       if(columnHeader == "Categorie"){

         var placeholder = '<select class="form-control" name="'+columnHeader+i+'" id="'+columnHeader+i+'">';
         //formGroup.append('<option value="1">Dranken</option><option>2</option><option>3</option><option>4</option></select>');
         if(columnValues[i] == "Dranken") {
           placeholder += '<option value="4" SELECTED >Dranken</option>';
         }else{
           placeholder += '<option value="4">Dranken</option>';
         }
         if(columnValues[i] == "Pizza's") {
           placeholder += '<option value="1" SELECTED >Pizza\'s</option>';
         }else{
           placeholder += '<option value="1">Pizza\'s</option>';
         }
         if(columnValues[i] == "Pasta's") {
           placeholder += '<option value="2" SELECTED >Pasta\'s</option>';
         }else{
           placeholder += '<option value="2">Pasta\'s</option>';
         }
         if(columnValues[i] == "Lasagne's") {
           placeholder += '<option value="3" SELECTED >Lasagne\'s</option>';
         }else{
           placeholder += '<option value="3">Lasagne\'s</option>';
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


/////////////
/*
Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
*/
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
////////////////////
