<script type="text/javascript">
$( "#online-courses").click(function() {
  $( this ).addClass( "active" ).siblings().removeClass('active');
  if (!$( this ).hasClass( "active" )) {
  	$('.product_cat-on-campus').addClassremoveClass( "display" );  	
  	$('.product_cat-online').addClass( "no-display" );
  } else {
  	$('.product_cat-on-campus').removeClass( "display" );  	
	$('.product_cat-online').removeClass( "no-display" );
  }
});
$( "#campus-courses").click(function() {
  $( this ).addClass( "active" ).siblings().removeClass('active'); 
  if (!$( this ).hasClass( "active" )) {
  	$('.product_cat-on-campus').removeClass( "display" );
	$('.product_cat-online').removeClass( "no-display" );  	
  } else {
	$('.product_cat-on-campus').addClass( "display" );
	$('.product_cat-online').addClass( "no-display" );	
  }
});  
</script>