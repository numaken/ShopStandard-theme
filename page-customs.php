<?php
/** The template name:カスタムページ */
get_header(); ?>


<header>

    <!-- top nav -->
    <nav class="navbar navbar-default">

        <div class="container"><!-- 無くても良い -->

            <div class="navbar-header">

                <!-- logo img -->
                <?php

                $url = home_url();

                $imgurl = wp_get_attachment_image_src($logo, 'full');//サイズは自由に変更してね
                //サイズは自由に変更してね
                if ($imgurl == null){
                    // 画像が無い場合の処理

                    echo '<a class="navbar-brand hidden-xs hidden-sm" href="' . $url . '" style="background-color:' . $back_color4 . '"><img class="brand-logo" src="' . $obj['bottom_patch_url'] . '" height="" width="" alt="" />' . '</a>';
                    echo '<h1><a class="navbar-brand" href="' . $url . '" style="background-color:' . $back_color4 . '">' . $obj['title'] . '</a></h1>';


                }else{ ?>

                <?php
                    echo '<a class="navbar-brand hidden-xs hidden-sm" href="' . $url . '" style="background-color:' . $back_color4 . '"><img class="brand-logo" src="' . $imgurl[0] . '" height="" width="" alt="" />' . $obj['title'] . '</a>';

                ?>

                <?php  } ?>

                <!-- toggle -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- top menu -->
            <div class="collapse navbar-collapse" id="top-nav">

                <!-- main navbar -->
                <!--リンクのリスト メニューリスト-->
                <?php get_template_part( 'navi' ); ?>


                <!-- right navbar
<ul class="nav navbar-nav navbar-right">
<li>
<a href=""><i class="fa fa-sign-in"></i> お問合せはこちら</a>
</li>
</ul>-->
            </div>
        </div>
        <!-- end container -->
    </nav>
    <!-- end nav -->

</header>

<div class="bg_loader"><div class="loader"></div></div>

    <div id="page" class="hfeed site">

<?php get_template_part( 'side-menu' ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <span class="clear"></span>

                <div id="content" role="main">

                    <h2 class="page-title ta-center"></h2>

                    <span class="line_break_two"><i class="ion-more"></i></span>

                    <ul class="products pure-pad pure-g mm-container">

                    <?php if ( have_posts() ) : ?>
                    <?php /* Start the Loop */ ?>
                        <?php query_posts( 'post_type=custom&posts_per_page=2' ); ?>
                         <?php while ( have_posts() ) : the_post(); ?>


                            <li class="product type-product status-publish has-post-thumbnail first sale shipping-taxable purchasable product-type-simple product-cat-furniture instock pure-u-1 pure-u-sm-1-4 pure-u-lg-1-4 pure-u-xl-1-4 mm-color-three full-image same-height mm-product">
                            <a href="#">
                                <span class="onsale">menu<br><small><?php the_date(); ?></small></span>


                                <?php if(has_post_thumbnail()): ?>

                                        <?php
                                        // アイキャッチ画像のIDを取得
                                        $thumbnail_id = get_post_thumbnail_id();

                                        // mediumサイズの画像内容を取得（引数にmediumをセット）
                                        $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'garaly_size' );

                                        echo '<img width="300" height="300" class="attachment-shop_catalog wp-post-image" alt="poster_2_up" src="'.$eye_img[0].'">';
                                        ?>

                                <?php else : ?>

                                        <img width="300" height="300" class="attachment-shop_catalog wp-post-image" alt="poster_2_up" src="<?php echo get_template_directory_uri(); ?>/images/nowprinting.png" alt="">


                                <?php endif; ?>

                                <div class="cont_cell">

                                    <h4><?php the_title(); ?></h4>
                                    <div class="star-rating" title="<?php the_excerpt(); ?>
"><span style="width:80%"><?php the_excerpt(); ?></span></div>

                                </div>
                            </a>
                            <a href="<?php the_permalink(); ?>" rel="nofollow" data-product_id="70" data-product_sku="" data-quantity="1" class="button add_to_cart_button mm-btn mm-btn-small mm-ripple product_type_simple">Read More </a><?php echo get_the_term_list( $post->ID, 'menus_cat', 'Category: ','・','' ); ?>
                            <?php get_template_part( 'content', 'page' ); ?>
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

            <?php comments_template(); ?>


            </main>
        </div><!-- #primary -->


<?php get_footer(); ?>
