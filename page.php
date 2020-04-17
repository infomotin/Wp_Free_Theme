<?php 

    get_header( );
    while(have_posts()){
        the_post();?>
 <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php the_title(); ?></h1>
      <div class="page-banner__intro">
        <p>Repace This Text Next Time. </p>
      </div>
    </div>  
  </div>

  <div class="container container--narrow page-section">

      <?php
        
        // echo wp_the_ID();
        //echo get_the_ID(); curent get  post id 
        //get current perrent post id 

        //echo wp_get_post_parent_id(get_the_ID());
        $the_paren = wp_get_post_parent_id(get_the_ID());

        if($the_paren){
            ?>
          <div class="metabox metabox--position-up metabox--with-home-link">
          <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($the_paren) ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($the_paren);?></a> <span class="metabox__main"><?php the_title();?></span></p>
        </div>
       
       <?php }
       ?> 

<?php 
$testArray = get_pages(array(
  'child_of'     => get_the_ID(),

));

if($the_paren or $testArray){?> 
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($the_paren); ?>"><?php echo get_the_title($the_paren); ?></a></h2>
      <ul class="min-list">
        <?php 
        if($the_paren){
          $theChaild = $the_paren;
        }else {
          $theChaild =get_the_ID();
        }
          wp_list_pages(array(
            'title_li'     => NULL,
            'child_of'     =>  $theChaild,
            'sort_column'  => 'menu_order,post_title',

          ));
        ?>
      </ul>
    </div>
    
    <?php } ?>
    <!-- <div class="page-links">
      <h2 class="page-links__title"><a href="#">About Us</a></h2>
      <ul class="min-list">
        <li class="current_page_item"><a href="#">Our History</a></li>
        <li><a href="#">Our Goals</a></li>
      </ul>
    </div>  -->

    <div class="generic-content">
      <?php the_content( );?>
    </div>

  </div>
           
<?php } get_footer( );?>