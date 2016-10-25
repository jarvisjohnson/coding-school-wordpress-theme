<!--switcher-->
   <?php if ( is_shop() ) { ?>
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
    <?php } elseif ( is_product_tag() ) { ?>  
      <div class="switcher">
          <div class="switch">
              <a rel='m_PageScroll2id' href="#page" id="all-courses" class="active">
                  <span><?php single_tag_title(); ?><span class="hide-for-small-only"> Courses</span></span>
             </a>           
          </div>                 
      </div>
    <?php } elseif ( is_page() ) { ?>  
      <div class="switcher single">
          <div class="switch">
              <a href="#you-learn"  id="" class="ps2id">
                  <span><?php single_tag_title(); ?><span class="hide-for-small-only"> What you'll learn</span></span>
             </a> 
              <a href="#us-different"  id="" class="ps2id">
                  <span><?php single_tag_title(); ?><span class="hide-for-small-only"> What sets SVCS apart</span></span>
             </a>                        
          </div>                 
      </div>                           
    <?php } elseif ( is_product() ) { ?>   

              <?php while ( have_posts() ) : the_post(); 

                // vars 
                $sections = get_field('sections_to_display'); ?>

                
                <?php 
                // check
                if( $sections ): ?>
                  <?php foreach( $sections as $section ): ?>
                  <?php endforeach; ?>


      <div class="switcher single">
          <div class="switch">

          <?php if ( in_array( 1, $sections ) ) { ?>
              <a href="#overview" id="overview-link" class="ps2id">
                  <span>Overview</span>
             </a>
          <?php }; if ( in_array( 2, $sections ) ) { ?>   
              <a href="#outcomes" id="outcomes-link" class="ps2id">
                  <span>Learning outcomes</span>
             </a>
          <?php }; if ( in_array( 3, $sections ) ) { ?>   
              <a href="#description" id="description-link" class="ps2id">
                  <span>Syllabus</span>
             </a>             
          <?php }; if ( in_array( 4, $sections ) ) { ?>          
              <a href="#details" id="details-link" class="ps2id">
                  <span>Upcoming dates</span>
             </a>  
          <?php }; if ( in_array( 5, $sections ) ) { ?>      
            <a href="#faqs" id="faqs-link" class="ps2id">
                  <span>FAQs</span>
             </a>
          <?php } ?>                            
          </div> 
          <?php if ( in_array( 4, $sections ) ) { ?>  
          <div class="apply">
            <a href="#details" class="ps2id button">
              APPLY
            </a>
          </div>
          <?php } ?>               
      </div>
    <?php endif; ?>    
    <?php 
        endwhile;
    } else { }?>        
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
<!-- //switcher -->