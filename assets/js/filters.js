$(document).ready(function() {
    $( '#amount' ).val( "$40 - $120" );
    $( '#slider' ).slider({
      animate: 300,
      range: true,
      min: 0,
      max: 300,
      values: [ 40, 120 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });

    $('#btnReset').click(function(){
      $( '#slider' ).slider({ values: [ 40, 120 ] });
      $( '#amount' ).val( "$40 - $120" );
    });

    $('.icn_price').click(function(){
      $('.icn_price').fadeOut(function(){
        $('.icn_price').text(($('.icn_price').text() == 'keyboard_arrow_down') ? 'keyboard_arrow_up' : 'keyboard_arrow_down').fadeIn();
      });
    });

    $('.icn_cat').click(function(){
      $('.icn_cat').fadeOut(function(){
        $('.icn_cat').text(($('.icn_cat').text() == 'keyboard_arrow_down') ? 'keyboard_arrow_up' : 'keyboard_arrow_down').fadeIn();
      });
    });

    $('.icn_size').click(function(){
      $('.icn_size').fadeOut(function(){
        $('.icn_size').text(($('.icn_size').text() == 'keyboard_arrow_down') ? 'keyboard_arrow_up' : 'keyboard_arrow_down').fadeIn();
      });
    });
});

  //sizes functions

  $('.sizes').change(function() {

    var selectAll = true;
    var sizes = "";

    $('.sizes').each( function(){
      if( $(this).is(":checked") ) {
          selectAll = false;
          sizes += $(this).val();
          sizes += "-";
      }
    });

    $( "#allSizes").prop("checked", selectAll);

    ajax_size_update(sizes);
  });

  $('#allSizes').change(function() {
    if( $(this).is(":checked") ) {
        $( ".sizes").prop("checked", false);
        ajax_size_update("");
    } else {
      $(this).prop("checked", true);
    }
  });

  function ajax_size_update(sizes){
    $.ajax({
      url: "products.php?sizes="+sizes,
      type: "POST",
      data: sizes,
      success: function(response) {
        $('#filter_prods').html(response);
        console.log(response);
      },
      error: function(xhr) {
        console.log("error");
      }
    });
  }

  //categories function
  $('.categories').change(function() {

  var catAll = true;
  var categories = "";

  $('.categories').each( function(){
    if( $(this).is(":checked") ) {
      catAll = false;
        categories += $(this).val();
        categories += "-";
    }
  });

  $( "#allCat").prop("checked", catAll);

  ajax_cat_update(categories);

  });

  $('#allCat').change(function() {
  if( $(this).is(":checked") ) {
      $( ".categories").prop("checked", false);
      ajax_cat_update("");
  } else {
    $(this).prop("checked", true);
  }
  });


  function ajax_cat_update(categories){
    $.ajax({
      url: "all_prod.php",
      type: "GET",
      data: categories,
      success: function(data, status) {
        $('#filter_prods').html(data);
        console.log(status);
      },
      error: function(xhr) {
        console.log(status);
      }
    });

}
