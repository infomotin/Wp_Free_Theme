
<?php 
get_header( );
    while(have_posts()){
        the_post();
        ?>

            <h1><a><?php the_title();?></a></h1>
            <?php the_content();?>
   <?php }
    get_footer();
?>