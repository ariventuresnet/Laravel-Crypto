$(document).ready(function(){
  $('.nav-button').click(function(){
      $('.nav-button').toggleClass('change');
  });

  var width= $(window).width();
  if(width < 425){
      $(".find").on("focus", function(){
          $('.wrapper').addClass('wrapper-change');
      }).on("blur", function(){
          $('.wrapper').removeClass('wrapper-change');
      });
  }

});































