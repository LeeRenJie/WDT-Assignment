$(window).on('resize', function() {
    if($(window).width() <= 768) {
        $('.headerrow').addClass('col-12');
        $('.header-img').addClass('text-center');
        $('.headerrow').removeClass('col-6');
    }
  })