
$(document).ready(function(){
                   
      var altura = $(".cabecera").offset().top; 
                         
      $(window).scroll(function(){
             
            if($(window).scrollTop() >= altura){
                         
                  $(".cabecera").css("margin-top","0");
                  $(".cabecera").css("position","fixed");
                               
            }else{
                                     
                  $(".cabecera").css("margin-top","100px");
                  $(".cabecera").css("position","static");
                               
            }
                         
      });
                   
});
