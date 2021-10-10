$(window).on('resize', function() {
    if($(window).width() <= 768) {
      $('.label_text').addClass('ml-4');
      $('.buttons').addClass('btn-sm');
      $('.buttons').addClass('btn-block');
      $('.button_label').addClass('small');
      }
  });
  
  if($(window).width() <= 768) {
    $('.label_text').addClass('ml-4');
    $('.buttons').addClass('btn-sm');
    $('.buttons').addClass('btn-block');
    $('.button_label').addClass('small');
  };