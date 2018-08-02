<?php get_header(); ?>

<!-- archive.php -->


<div class="bg_loader"><div class="loader"></div></div>
	
	<div id="page" class="hfeed site">
			
<?php get_template_part( 'side-menu' ); ?>
		
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			
				<div id="upperbar-selector">

<?php get_template_part( 'navi' ); ?>

<!--
					<form class="woocommerce-ordering" method="get">
						<select name="orderby" class="orderby">
							<option value="popularity">Sort by popularity</option>
							<option value="rating">Sort by average rating</option>
							<option value="date">Sort by newness</option>
							<option value="price">Sort by price: low to high</option>
							<option value="price-desc">Sort by price: high to low</option>
						</select>
					</form>
-->
				</div><!-- #upperbar-selector -->

				<span class="clear"></span>

				<div id="content" role="main">
                    
                <?php breadcrumb(); ?>

                    <span class="clear"></span>

					<h2 class="page-title ta-center list-imline"></h2>
                    
                    <span class="line_break_two"><i class="ion-more"></i></span>

					<ul class="products pure-pad pure-g">

                    <?php if(have_posts()): while(have_posts()): the_post(); ?>

                            <li class="product type-product status-publish has-post-thumbnail first sale shipping-taxable purchasable product-type-simple product-cat-furniture instock pure-u-1 pure-u-sm-1-2 pure-u-lg-1-2 pure-u-xl-1-3 mm-color-three full-image same-height mm-product">
							<a href="<?php the_permalink(); ?>">


                                <?php if(has_post_thumbnail()): ?>

                                        <?php 
                                        // アイキャッチ画像のIDを取得
                                        $thumbnail_id = get_post_thumbnail_id($post->ID); 

                                        // mediumサイズの画像内容を取得（引数にmediumをセット）
                                        $src_info = wp_get_attachment_image_src( $thumbnail_id , 'garaly_size' );
                                        $src = $src_info[0];
                                        $width = $src_info[1];
                                        $height  = $src_info[2];
?>
                                <img src="<?php echo $src; ?>" width="300" height="300" class="attachment-shop_catalog wp-post-image" alt="poster_2_up" > 

                                <?php else : ?>                        
                                
                                <img width="300" height="300" class="attachment-shop_catalog wp-post-image" alt="poster_2_up" src="<?php echo get_template_directory_uri(); ?>/images/nowprinting.png" alt="">
                                
                                
                                <?php endif; ?>
                                
                                <div class="cont_cell">
                                    
                                    <h5><?php the_title(); ?></h5>
                                    <div class="star-rating" title="<?php the_excerpt(); ?>
"><p class="price" style="font-size:.8em;line-height:1.4em;"><?php the_excerpt(); ?></p></div>

                                </div>                                
							</a>
							<a href="<?php the_permalink(); ?>" rel="nofollow" data-product_id="70" data-product_sku="" data-quantity="1" class="button add_to_cart_button mm-btn mm-btn-small mm-ripple product_type_simple">Read More </a>
						</li>
                                    
                    <?php endwhile; endif; ?>   
           
                    </ul>
							
						<nav class="woocommerce-pagination">
                        <!--ページネーション-->
                        <?php if (function_exists('pagination')) {
                        pagination($wp_query->max_num_pages);
                        } ?>  
						</nav>
				
						
					</div><!-- end #content -->
			
			</main>
		</div><!-- #primary -->
		

<?php get_footer(); ?>