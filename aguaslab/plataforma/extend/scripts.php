</main>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="../js/materialize.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
  <script>
      $('.carousel.carousel-slider').carousel({
    fullWidth: true
  });
  $(document).ready(function(){
    $('.tabs').tabs();
  });
  	$('#buscar').keyup(function(event) {
  		var contenido = new RegExp($(this).val(), 'i');
  		$('tr').hide();
  		$('tr').filter(function(){
  			return contenido.test($(this).text());
  		}).show();
  		$('.cabecera').attr('style','');
  	});
  	  $(document).ready(function(){
    $('select').formSelect();
  });
  </script>
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

  </script>
  <script>
	  function may(obj, id){
  	obj = obj.toUpperCase();
  	document.getElementById(id).value = obj;
  }
</script>