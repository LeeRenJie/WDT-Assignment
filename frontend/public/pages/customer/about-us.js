// Responsive website functionality
$(window).on('resize', function() {
  if($(window).width() <= 768) {
    $('.title').addClass('col-12 text-center');
    $('.header-img').addClass('text-center');
    $('.title').removeClass('col-6');
  }else{
    $('.title').addClass('col-6');
    $('.title').removeClass('col-12 text-center');
    $('.header-img').removeClass('text-center');
  }
});

if($(window).width() <= 768) {
  $('.title').addClass('col-12 text-center');
  $('.header-img').addClass('text-center');
  $('.title').removeClass('col-6');
}else{
  $('.title').addClass('col-6');
  $('.title').removeClass('col-12 text-center');
  $('.header-img').removeClass('text-center');
};