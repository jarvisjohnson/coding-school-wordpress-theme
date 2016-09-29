      <?php if ( is_shop() || is_product_tag() ) { ?>
      <div class="switcher">
          <div class="switch">
              <a id="online-courses" class="active">
                  <span>Online<span class="hide-for-small-only"> Courses</span></span>
             </a>
              <a id="campus-courses">
                  <span>On Campus<span class="hide-for-small-only"> Courses</span></span>
             </a>             
          </div>                 
      </div>        
        <?php } elseif ( is_product() ) { ?>      
      <div class="switcher single">
          <div class="switch">
              <a href="#overview" id="overview-link" class="ps2id">
                  <span>Overview</span>
             </a>
              <a href="#outcomes" id="outcomes-link" class="ps2id">
                  <span>Learning outcomes</span>
             </a>    
              <a href="#dates" id="dates-link" class="ps2id">
                  <span>Upcoming dates</span>
             </a>  
            <a href="#faqs" id="faqs-link" class="ps2id">
                  <span>FAQs</span>
             </a>                        
          </div>  
          <div>
          <a class="apply">
            APPLY
          </a>
          </div>               
      </div>
    <?php } else { }?>        
<script type="text/javascript">
$( "#online-courses").click(function() {
  $( this ).addClass( "active" ).siblings().removeClass('active');
  $('.online').addClass( "active" );
  $('.offline').removeClass( "active" );
  if (!$( this ).hasClass( "active" )) {
  	$('.product_cat-on-campus').addClass( "display" );  	
  	$('.product_cat-online').addClass( "no-display" );	
  } else {
  	$('.product_cat-on-campus').removeClass( "display" );  	
	$('.product_cat-online').removeClass( "no-display" );  	
  }
});
$( "#campus-courses").click(function() {
  $( this ).addClass( "active" ).siblings().removeClass('active'); 
  	$('.offline').addClass( "active" );	 
  	$('.online').removeClass( "active" );  	  
  if (!$( this ).hasClass( "active" )) {
  	$('.product_cat-on-campus').removeClass( "display" );
	$('.product_cat-online').removeClass( "no-display" );
  } else {
	$('.product_cat-on-campus').addClass( "display" );
	$('.product_cat-online').addClass( "no-display" );		
  }
});  
</script>