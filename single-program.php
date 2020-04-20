
<?php 
get_header( );
?>

<?php
    while(have_posts()){
        the_post();
        ?>
        <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>Repace This Text Next Time. </p>
        <p>Power by single-program.php </p>
      </div>
    </div>  
</div>



  <div class="container container--narrow page-section">
  <div class="metabox metabox--position-up metabox--with-home-link">
          <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i> All Program </a> <span class="metabox__main"><?php echo the_title(); ?></span></p>
        </div>
          
  <div class="generic-content">
      <?php the_content( );?>
    </div>
    <?php 
          $today = date('Ymd');
            $custom_query_for_home_events = new WP_Query(array(
                'posts_per_page'=>3,
                'post_type'=>'event',
                'order_by'=>'meta_value',//rand for every time randome event Show 
                'meta_key'=>'event_date',//'post_date',//order by query meta is custo value at any case 

                'meta_query'=>array(
                    array(
                      'key'=>'event_date',//its a sql like where conditions 
                      'compare'=>'>=',
                      'value'=>$today,
                      'type'=>'numeric'

                    ),
                    array(
                      'key'=>'relations_programs',//its a sql like where conditions 
                      'compare'=>'LIKE',
                      'value'=> '"'. get_the_ID() . '"'
                    ),
                ),
            ));
            while($custom_query_for_home_events->have_posts()){
              $custom_query_for_home_events->the_post( );
                
                ?>
        <div class="event-summary">
          <a class="event-summary__date t-center" href="#">
            <span class="event-summary__month"><?php 
            
            $aData = get_field('event_date');
            //echo $aData;
            //$eventDate  = the_field('event_date');
            //$eventDate = new DateTime(the_field('event_date'));
            $eventDate = new DateTime($aData);
            echo $eventDate->format('M');
            
            ?></span>
            <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>  
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink( ); ?>"><?php the_title( ); ?></a></h5>
            <p><?php if(has_excerpt( )){
                      echo get_the_excerpt();
            }else{
              echo wp_trim_words(get_the_content(), 18);
            } 
            ?> <a href="<?php the_permalink( ); ?>" class="nu gray">Learn more</a></p>
          </div>
        </div>
        <!-- <div class="event-summary">
          <a class="event-summary__date t-center" href="#">
            <span class="event-summary__month">Apr</span>
            <span class="event-summary__day">02</span>  
          </a>
          <div class="event-summary__content">
            <h5 class="event-summary__title headline headline--tiny"><a href="#">Quad Picnic Party</a></h5>
            <p>Live music, a taco truck and more can found in our third annual quad picnic day. <a href="#" class="nu gray">Learn more</a></p>
          </div>
        </div> -->
        <?php }
        wp_reset_postdata();
        ?>



  <!-- //  <?php  
//     echo '<ul class="link-list min-list" >';
//   $reletionFields = get_field('eventtoprogram');
//   if($reletionFields){
//   foreach($reletionFields as $program){ ?>
<!-- //     //echo get_the_title($program); -->
<!-- //     <li><a href="<?php //echo get_the_permalink( $program ); ?>"><?php// echo get_the_title($program);?></a></li> -->
    
<!-- // <?php// } -->
//  echo '</ul>';
// }
//  //?>
    </div>


   <?php }
    get_footer();
?>