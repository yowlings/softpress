<?php $options = get_option('softpress'); ?>
<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box" class="home_page">
				<h1 class="postsby">
					<?php if (is_category()) { ?>
						<span><?php single_cat_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
					<?php } elseif (is_tag()) { ?> 
						<span><?php single_tag_title(); ?><?php _e(" Archive", "mythemeshop"); ?></span>
					<?php } elseif (is_search()) { ?> 
						<span><?php _e("Search Results for:", "mythemeshop"); ?></span> <?php the_search_query(); ?>
					<?php } elseif (is_author()) { ?>
						<span><?php _e("Author Archive", "mythemeshop"); ?></span> 
					<?php } elseif (is_day()) { ?>
						<span><?php _e("Daily Archive:", "mythemeshop"); ?></span> <?php the_time('l, F j, Y'); ?>
					<?php } elseif (is_month()) { ?>
						<span><?php _e("Monthly Archive:", "mythemeshop"); ?>:</span> <?php the_time('F Y'); ?>
					<?php } elseif (is_year()) { ?>
						<span><?php _e("Yearly Archive:", "mythemeshop"); ?>:</span> <?php the_time('Y'); ?>
					<?php } ?>
				</h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post excerpt">                        	
						<header>
							<h2 class="title">
								<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
							<div class="post-info post-info_custom">
								<div class="author_mt hp_meta"><span class="mt_icon"> </span><?php the_time('F d.Y.'); ?></div>
								<div class="comment_mt hp_meta"><span class="mt_icon"> </span> <a href="<?php comments_link(); ?>"><?php comments_number('0 Comment','1 Comment','% Comment(s)'); ?></a></div>
								<div class="cat_mt hp_meta"><span class="mt_icon"> </span> <?php the_author_posts_link(); ?> </div>                                    
							</div>
						</header><!--.header-->                            
						<a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="nofollow" id="featured-thumbnail">
							<?php if ( has_post_thumbnail() ) { ?> 
								<?php echo '<div class="featured-thumbnail">'; the_post_thumbnail('featured',array('title' => '')); echo '</div>'; ?>								
							<?php } else { ?>
								<div class="featured-thumbnail"><img width="200" height="200" src="<?php echo get_template_directory_uri(); ?>/images/nothumb.png" class="attachment-featured wp-post-image" alt="<?php the_title(); ?>"></div>                      
							<?php } ?>
						</a>
						<div class="post-content image-caption-format-1">
							<span class="excerpt_overlap"><?php echo excerpt(56);?></span>
						</div>
						<span class="cust_category"><?php _e('Category: ','mythemeshop'); ?><?php $category = get_the_category(); echo '<a href="'.get_category_link($category[0]->cat_ID).'">'.$category[0]->cat_name.'</a>';?> </span>
						<div class="readMore"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php _e('Read More','mythemeshop'); ?></a></div>
						<div id="hover_line"></div>
					</div><!--.post excerpt-->
				<?php endwhile; else: ?>
					<div class="post excerpt">
						<div class="no-results">
							<p><strong><?php _e('There has been an error.', 'mythemeshop'); ?></strong></p>
							<p><?php _e('We apologize for any inconvenience, please hit back on your browser or use the search form below.', 'mythemeshop'); ?></p>
							<?php get_search_form(); ?>
						</div><!--noResults-->
					</div>
				<?php endif; ?>
				<?php if ($options['mts_pagenavigation'] == '1') { ?>
					<?php pagination($additional_loop->max_num_pages);?>
				<?php } else { ?>
					<div class="pnavigation2">
						<div class="nav-previous"><?php next_posts_link( __( '&larr; '.'Older posts', 'mythemeshop' ) ); ?></div>
						<div class="nav-next"><?php previous_posts_link( __( 'Newer posts'.' &rarr;', 'mythemeshop' ) ); ?></div>
					</div>
				<?php } ?>			
			</div>
		</article>
		<?php get_sidebar(); ?>
<?php get_footer(); ?>