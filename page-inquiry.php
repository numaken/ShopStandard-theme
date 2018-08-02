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


                    <?php if(have_posts()): while(have_posts()): the_post(); ?>


                                    
                    <?php endwhile; endif; ?>   
           
				
						
					</div><!-- end #content -->
			
			</main>
		</div><!-- #primary -->
		

<?php get_footer(); ?>