$(window).on('resize', function() {
  if($(window).width() <= 768) {
    $('.contact').addClass('col-lg-4 text-center');
    $('.contact').removeClass('col-3');
    $('.info-links').addClass('col-lg-4');
    $('.info-links').removeClass('col-3');
  }else{
    $('.contact').addClass('col-3');
    $('.contact').removeClass('col-lg-4 text-center');
    $('.info-links').addClass('col-3');
    $('.info-links').removeClass('col-lg-4');
  }
})