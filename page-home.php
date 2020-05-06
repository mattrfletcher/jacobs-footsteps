<?php

/* 

Template Name: Home Page
*/


// Advanced Custom Fields - Jumbotron //


$jumbotron_title = get_field('jumbotron_title');
$jumbotron_description = get_field('jumbotron_description');
$jumbotron_button_text = get_field('jumbotron_button_text');
$jumbotron_button_link = get_field('jumbotron_button_link');
$jumbotron_background = get_field('jumbotron_background');

// Advanced Custom Fields - Featured Pages //


$featured_page_image_1 = get_field('featured_page_image_1');
$featured_page_title = get_field('featured_page_title');
$featured_page_description = get_field('featured_page_description');
$featured_page_button_text = get_field ('featured_page_button_text');
$featured_page_button_link = get_field ('featured_page_button_link');

$featured_page_image_2 = get_field('featured_page_image_2');
$featured_page_title_2 = get_field('featured_page_title_2');
$featured_page_description_2 = get_field('featured_page_description_2');
$featured_page_button_text_2 = get_field ('featured_page_button_text_2');
$featured_page_button_link_2 = get_field ('featured_page_button_link_2');

$featured_page_image_3 = get_field('featured_page_image_3');
$featured_page_title_3 = get_field('featured_page_title_3');
$featured_page_description_3 = get_field('featured_page_description_3');
$featured_page_button_text_3 = get_field ('featured_page_button_text_3');
$featured_page_button_link_3 = get_field ('featured_page_button_link_3');

get_header(); ?>

<div class="home-content">

<div class="row">
<div class="jumbotron">
  <div class="container">

<h1><?php echo $jumbotron_title ?></h1>

 <?php if(!empty($jumbotron_description) ) :?>

 <p><?php echo $jumbotron_description ?></p>
   
  <?php endif; ?>
 
 <?php if(!empty($jumbotron_button_text) ) :?>
 
 <a class="btn btn-default btn-lg btn-primary" href="<?php echo $jumbotron_button_link ?>" role="button"><?php echo $jumbotron_button_text ?> </a>
 
 <?php endif; ?>
 
 
  </div>
</div>
</div>
<section class="featured">
<div class="row">
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
 	<img src="<?php echo $featured_page_image_1['url'] ?>" alt="<?php echo $featured_page_image_1['alt']?>">
    <div class="caption">   
    <h3><?php echo $featured_page_title ?> </h3>
    
    <?php if(!empty($featured_page_description) ) :?>
    
        <p><?php echo $featured_page_description ?> </p>
        <?php endif ?>
        
        <p><a href="<?php echo $featured_page_button_link ?>" class="btn btn-primary" role="button"><?php echo $featured_page_button_text ?></a></p>
      </div>
    </div>
  </div>
  
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
 	<img src="<?php echo $featured_page_image_2['url'] ?>" alt="<?php echo $featured_page_image_2['alt'] ?>">
    <div class="caption">   
    <h3><?php echo $featured_page_title_2 ?> </h3>
    
    <?php if(!empty($featured_page_description_2) ) :?>
    
        <p><?php echo $featured_page_description_2 ?> </p>
        <?php endif ?>
        
        <p><a href="<?php echo $featured_page_button_link_2 ?>" class="btn btn-primary" role="button"><?php echo $featured_page_button_text_2 ?></a></p>
      </div>
    </div>
  </div>
  
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
 	<img src="<?php echo $featured_page_image_3['url'] ?>" alt="<?php echo $featured_page_image_3['alt'] ?>">
    <div class="caption">   
    <h3><?php echo $featured_page_title_3 ?> </h3>
    
    <?php if(!empty($featured_page_description_3) ) :?>
    
        <p><?php echo $featured_page_description_3 ?> </p>
        <?php endif ?>
        
      <p><a href="<?php echo $featured_page_button_link_3 ?>" class="btn btn-primary" role="button"><?php echo $featured_page_button_text_3?>	</a></p>
      </div>
    </div>
  </div>
  
  
  

</div>
<h1 class="section-title"> Latest News </h1>
<div class="row">

<?php $wp_query = new WP_Query( 'post_type=' . $post_type . '&posts_per_page=4' . $show_posts . '&paged=' . $paged ); ?>
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<div class="column">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>"><?php the_post_thumbnail('jfcustom'); ?></a>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                <p><?php the_excerpt() ?></p>
                
			</div><!-- .column -->
			<?php endwhile; ?>
</div>
</section>



<?php

get_footer();
