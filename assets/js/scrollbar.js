//transparent scrollbar
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  console.log(scroll);
  if (scroll > 10) {
      $(".navbar").removeClass("transparent");
  } else {
      $(".navbar").addClass("transparent");
  }
});
