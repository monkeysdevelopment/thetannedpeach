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
        console.log("Slider has loaded");
        console.log(ui.values);
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
    var zioDB = "";

    $('.sizes').each( function(){
      if( $(this).is(":checked") ) {
          selectAll = false;
          zioDB += $(this).val();
          zioDB += "-";
      }
    });

    $( "#allSizes").prop("checked", selectAll);

    ajax_size_update(zioDB);

  });

  $('#allSizes').change(function() {
    if( $(this).is(":checked") ) {
        $( ".sizes").prop("checked", false);
        ajax_size_update("");
    } else {
      $(this).prop("checked", true);
    }
  });


  function ajax_size_update(zioDB){

    console.log(zioDB);
    //ajax search

  }

  //categories function
  $('.categories').change(function() {

  var catAll = true;
  var zioDB1 = "";

  $('.categories').each( function(){
    if( $(this).is(":checked") ) {
      catAll = false;
        zioDB1 += $(this).val();
        zioDB1 += "-";
    }
  });

  $( "#allCat").prop("checked", catAll);

  ajax_cat_update(zioDB1);

  });

  $('#allCat').change(function() {
  if( $(this).is(":checked") ) {
      $( ".categories").prop("checked", false);
      ajax_cat_update("");
  } else {
    $(this).prop("checked", true);
  }
  });


  function ajax_cat_update(zioDB1){

  console.log(zioDB1);
  //ajax search

}
