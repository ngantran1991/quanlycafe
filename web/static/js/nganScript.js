/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('#get_data_for_day').click(function () {
    $('#waiting').modal('show');
    var typeExchange = $('#exchange_idTypeExchange').val();
    var dateCurr = $('#exchange_dateActive').val();
    $.ajax({
      type: 'POST',
      url: '/tygia/web/app_dev.php/ajax/pageDay/price/all',
      data: {
         typeExchange: typeExchange,
         dateCurr: dateCurr,
         format: "json"
      },
      async: false,
      beforeSend: function (xhr) {
        
      },
      dataType: 'json',
      complete: function (data) {
          $('#waiting').modal('hide');
      },
      success: function (data) {
          $('#exchange_valueIn').val(data['valueIn']) ;
          $('#exchange_valueOut').val(data['valueOut']);
          if (data['isClick'] == false) {
              $('#get_data_for_day').prop('disabled', true);
          } else {
              $('#get_data_for_day').prop('disabled', false);
              
          }
      }
    });
});
$('#exchange_dateActive').on('change keyup paste', function() {
    ajaxLoadPriceADay();
});
$('#exchange_idTypeExchange').change(function() {
    ajaxLoadPriceADay();
});
function ajaxLoadPriceADay()
{
    $('#waiting').modal('show');
    var typeExchange = $('#exchange_idTypeExchange').val();
    var dateCurr = $('#exchange_dateActive').val();
    $.ajax({
      type: 'POST',
      url: '/tygia/web/app_dev.php/ajax/day/price',
      data: {
         typeExchange: typeExchange,
         dateCurr: dateCurr,
         format: "json"
      },
      async: false,
      beforeSend: function (xhr) {
        
      },
      dataType: 'json',
      complete: function (data) {
          $('#waiting').modal('hide');
      },
      success: function (data) {
          $('#exchange_valueIn').val(data['valueIn']) ;
          $('#exchange_valueOut').val(data['valueOut']);
          if (data['isClick'] == false) {
              $('#get_data_for_day').prop('disabled', true);
          } else {
              $('#get_data_for_day').prop('disabled', false);
              
          }
      }
    });
}