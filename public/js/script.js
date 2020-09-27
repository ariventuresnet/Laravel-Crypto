$(document).ready(function(){
  $('.nav-button').click(function(){
      $('.nav-button').toggleClass('change');
  });

  var width= $(window).width();
  if(width < 425){
      $(".find").on("focus", function(){
          $('.wrapper').addClass('content-hide');
          $('.crypto-search').css({"position":"static", "padding-top":"20px"});
      }).on("blur", function(){
          $('.wrapper').removeClass('content-hide');
          $('.crypto-search').css({"position":"absolute", "top":"35%","padding-top":"0" });
      });
  }

});































