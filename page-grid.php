<?php
/**
 * Template Name: Grid
 * Description: A four-column grid page template.
 * Tutorial: http://graphpaperpress.com/tips/create-four-column-grid-template/
 */

get_header(); ?>

<?php
/**
 * Move the styles below into your stylesheet
 */
?>
<style type="text/css">
	.columns { margin: 1em 0; }
	.columns:before, .columns:after { content: " "; display: table; }
	.columns:after { clear: both; }
	.column { float: left; margin: 0 2.5% 10px 0; width: 22.5%; }
	.column:nth-child(4n) { margin-right: 0; }
	.column:nth-child(4n+1) { margin-left: 0; clear: left; }
	.column img { max-width: 100%; height: auto; }
	h2.entry-title { font-size: 12px; font-weight: bold; line-height: 1.5; }
</style>

<div id="primary" class="site-content">

	<?php
	/**
	 * Show page title and content
	 */
	?>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<header class="entry-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
			</header>
        
			
		<?php endwhile; ?>

		<div class="entry-content columns">

		<?php
		/**
		 * Create a new WP_Query
		 * Set $wp_query object to temp
		 * Grab $paged variable so pagination works
		 */
		?>
        
        	<?php
			global $wp_query; $post; $post_id = $post-> ID;
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
			rewind_posts();
			$temp = $wp_query;
			$wp_query = NULL;

			$post_type = 'post'; // change this to the post type you want to show
			$show_posts = '12'; // change this to how many posts you want to show

		?>
        
        
	
		<?php $wp_query = new WP_Query( 'post_type=' . $post_type . '&posts_per_page=' . $show_posts . '&paged=' . $paged ); ?>
			<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			<div class="column">
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>"><?php the_post_thumbnail('jfcustom'); ?></a>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt() ?></p>
			</div><!-- .column -->
			<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</div><!-- .columns -->

	<?php previous_posts_link(); ?>
		<?php next_posts_link(); ?>

		<?php $wp_query = NULL; $wp_query = $temp; ?>

	<?php else : ?>

		<article id="post-0" class="post no-results not-found">
			<header class="entry-header">
				<h1 class="entry-title">Nothing Found</h1>
			</header><!-- .entry-header -->

			<div class="entry-content">
				<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
				<?php get_search_form(); ?>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	<?php endif; ?>

</div><!-- .site-content -->

<?php get_footer(); ?>