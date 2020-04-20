
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
  $reletionFields = get_field('eventtoprogram');
  foreach($reletionFields as $program){ ?>
    <!-- //echo get_the_title($program); -->
    <li><a href="<?php echo get_the_permalink( $program ); ?>"><?php echo get_the_title($program);?></a></li>
    
<?php }
 
 ?>
    </div>


   <?php }
    get_footer();
?>