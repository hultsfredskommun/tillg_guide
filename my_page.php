<?php
/*
Template Name: My page
*/

get_header(); ?>
Och så visas detta!
		<div id="primary">
			<div id="content" role="main">


				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php comments_template( '', true ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>