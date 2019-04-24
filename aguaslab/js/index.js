$(document).ready(function(){

	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('header').addClass('sticky img');
      }else {
			$('header').removeClass('sticky img');
       }
	});
});
$("#accionar").click(function(){
  
  $('#navegador').toggle();
   
  
});
$(document).ready(function() {
    $('#Carousel').carousel({
        interval: 10000
    })
});