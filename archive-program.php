<?php 
get_header();?>
<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <!-- <h1 class="page-banner__title"><?php the_title(); ?></h1> -->
      <H1 class="page-banner__title"><?php echo 'ALL EVENTS HEARE';//the_archive_title( 'Wellcome ',' ' ); ?></H1>
      <div class="page-banner__intro">
        <p><?php //the_archive_description(); ?></p>
        <p>This Page Power by archive-Program.php </p>
        <p>Whats Heppend Nows </p>
      </div>
    </div>  
  </div>


  <div class="container container--narrow page-section">
  <ul class="link-list min-list">
  <?php 
  while(have_posts()){
    the_post(  );?>
    <li><a href="<?php the_permalink( ); ?>"><?php the_title();?></a></li>
            
  <?php }
  echo paginate_links(  );
  
  ?>
</ul>
</div>





<?php 
get_footer( );
?>