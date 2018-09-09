$(document).ready(function(){
  $('.count').hide();
  countFav();
  $('.fav').click(function(){
    countFav();
  });
});

function countFav(){
  $.get('assets/snippets/count_fav.php')
      .done(function( result ){
      $('#count_fav').html(result);
  });
}
