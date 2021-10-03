$(window).on('resize', function() {
  if($(window).width() <= 768) {
    $('.headerrow').addClass('col-12');
    $('.header-img').addClass('text-center');
    $('.headerrow').removeClass('col-6');
  }else{
    $('.headerrow').removeClass('col-12');
    $('.header-img').removeClass('text-center');
    $('.headerrow').addClass('col-6');
  }
})

if($(window).width() <= 768) {
  $('.headerrow').addClass('col-12');
  $('.header-img').addClass('text-center');
  $('.headerrow').removeClass('col-6');
}else{
  $('.headerrow').removeClass('col-12');
  $('.header-img').removeClass('text-center');
  $('.headerrow').addClass('col-6');
}