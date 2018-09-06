$(document).ready(function(){
  $('.count').hide();
  $.get('assets/snippets/count_fav.php')
      .done(function( result ){
      $('#count_fav').html(result);
  });
});
