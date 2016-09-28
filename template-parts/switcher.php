<script type="text/javascript">
$( "#online-courses").click(function() {
  $( this ).toggleClass( "active" );
  $('.product_cat-online').toggleClass( "no-display" );
});
$( "#campus-courses").click(function() {
  $( this ).toggleClass( "active" );
  $('.product_cat-on-campus').toggleClass( "display" );  
});
</script>