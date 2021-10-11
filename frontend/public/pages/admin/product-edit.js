$(window).on('resize', function() {
    if($(window).width() <= 768) {
      $('.profile').addClass('col-1');
      $('.profile').removeClass('col-2');
      $('.icon').addClass('col-1');
      $('.icon').removeClass('col-2');
      $('.tcon').addClass('col-5');
      $('.tcon').removeClass('col-7');
    }else{
      $('.profile').addClass('col-2');
      $('.profile').removeClass('col-1');
      $('.icon').addClass('col-2');
      $('.icon').removeClass('col-1');
      $('.tcon').addClass('col-7');
      $('.tcon').removeClass('col-5');
    }
  })


if($(window).width() <= 768) {
  $('.profile').addClass('col-1');
  $('.profile').removeClass('col-2');
  $('.icon').addClass('col-1');
  $('.icon').removeClass('col-2');
  $('.tcon').addClass('col-5');
  $('.tcon').removeClass('col-7');
}else{
  $('.profile').addClass('col-2');
  $('.profile').removeClass('col-1');
  $('.icon').addClass('col-2');
  $('.icon').removeClass('col-1');
  $('.tcon').addClass('col-7');
  $('.tcon').removeClass('col-5');
}