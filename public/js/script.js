$(document).ready(function(){
  $('.nav-button').click(function(){
      $('.nav-button').toggleClass('change');
  });

  var width= $(window).width();
  if(width < 425){
      $(".find").on("focus", function(){
          $('.wrapper').addClass('content-hide');
          $('.separator').addClass('content-hide');
      }).on("blur", function(){
          $('.wrapper').removeClass('content-hide');
          $('.separator').removeClass('content-hide');
      });
  }

});































