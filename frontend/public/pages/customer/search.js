$(window).on('resize', function() {
  if($(window).width() <= 768) {
    $('.minprice').addClass('col-3');
    $('.maxprice').addClass('col-3');
    $('.dash-div').removeClass('col-1');
    $('.minprice').removeClass('col-1');
    $('.maxprice').removeClass('col-1');
  }else{
    $('.minprice').removeClass('col-3');
    $('.maxprice').removeClass('col-3');
    $('.dash-div').addClass('col-1');
    $('.minprice').addClass('col-1');
    $('.maxprice').addClass('col-1');
  }
})

if($(window).width() <= 768) {
  $('.minprice').addClass('col-3');
  $('.maxprice').addClass('col-3');
  $('.minprice').removeClass('col-1');
  $('.maxprice').removeClass('col-1');
}else{
  $('.minprice').removeClass('col-3');
  $('.maxprice').removeClass('col-3');
  $('.minprice').addClass('col-1');
  $('.maxprice').addClass('col-1');
}