<?php 
get_header();?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <!-- <h1 class="page-banner__title"><?php the_title(); ?></h1> -->
      <H1 class="page-banner__title"><?php the_archive_title( 'Wellcome ',' ' ); ?></H1>
      <div class="page-banner__intro">
        <p><?php the_archive_description(); ?></p>
        <p>This Page Power by archive.php </p>
      </div>
    </div>  
  </div>


  <div class="container container--narrow page-section">
  
  <?php 
  while(have_posts()){
    the_post(  );?>
    <div class="post-item">
      <h2><a class="headline headline--medium headline--post-title" href="<?php the_permalink( ); ?>"><?php the_title(); ?></a></h2>
      <div class="metabox">
          <!-- <p><a class="metabox__blog" href="<?php //echo get_permalink($the_paren) ?>"> Back to <?php //echo get_the_title($the_paren);?></a> <span class="metabox__main"><?php //the_title();?></span></p> -->
          <p>Posted By <?php the_author_posts_link( ); ?> on <?php the_time( 'n.j.y' ); ?>in <?php echo get_the_category_list( ',' ) ?> <a href=""></a></p>
      </div>
        <div class="generic-content">
        <?php  the_excerpt(); ?>
        <p><a class="btn btn--blue" href="<?php the_permalink( ); ?>">Continue Rading...</a></p>
        </div>
      


    </div>



  <?php }
  echo paginate_links(  );
  
  ?>

</div>





<?php 
get_footer( );
?>