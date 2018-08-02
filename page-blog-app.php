<?php
/**
 The template name:ブログ（App）
 */
get_header(); ?>



<div class="container">

<div class="row">

    <main class="cd-main"><!-- .cd-main -->

        <ul class="cd-gallery">

            <?php

                $post_counter = null;

                $args = array(
                'posts_per_page' => 5,    //表示（取得）する記事の数
                'post_type' => 'blogs'    //投稿タイプの指定
            ); ?>

            <?php $loop = new WP_Query( $args ); ?>
            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


            <?php if($post_counter ==0): ?>

                    <?php

                    // 出力のバッファリングを有効にする
                    ob_start();
                    ?>
                    <!-- ここから -->

                    <!doctype html>
                    <html <?php language_attributes(); ?>>
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
                    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
                    <script src="js/modernizr.js"></script> <!-- Modernizr -->

                    <title><?php the_title(); ?></title>
                    </head>
                    <body>
                    <div class="cd-fold-content single-page">

                    <h2 class="page-header"><?php the_title(); ?></h2>
                    <?php the_content(); ?>

                    </div>

                    </body>
                    <script src="js/jquery-2.1.1.js"></script>
                    <script src="js/main.js"></script> <!-- Resource jQuery -->
                    </body>
                    </html>

                    <!-- ここがバッファされます -->
                    <?php
                    // 同階層の test.html にphp実行結果を出力
                    file_put_contents( 'item-1.html', ob_get_contents() );

                    // 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
                    ob_end_clean();
                    ?>

                    <?

                    // アイキャッチ画像のIDを取得
                    $thumbnail_id = get_post_thumbnail_id();

                    //画像(返り値は「画像ID」)
                    $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                    if ($imgurl == null){
                    // 画像が無い場合の処理

                    echo '<li class="cd-item">';

                    }else{ ?>

                    <?

                    echo '<li class="cd-item" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                    ?>

                    <?  } ?>

                    <a href="<?php echo home_url( ); ?>/item-1.html">
                        <div class="padd-xs">
                            <?php echo '<h2>' . wp_trim_words( get_the_title(), 20 ) . '</h2>'; ?>
                            <p><?php the_excerpt(); ?></p>
                            <b>View More</b>
                        </div>
                    </a>
                    </li>


            <?php elseif($post_counter ==1): ?>

                    <?php

                    // 出力のバッファリングを有効にする
                    ob_start();
                    ?>
                    <!-- ここから -->

                    <!doctype html>
                    <html <?php language_attributes(); ?>>
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
                    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
                    <script src="js/modernizr.js"></script> <!-- Modernizr -->

                    <title><?php the_title(); ?></title>
                    </head>
                    <body>
                    <div class="cd-fold-content single-page">

                        <h2 class="page-header"><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>

                    </div>

                    </body>
                    <script src="js/jquery-2.1.1.js"></script>
                    <script src="js/main.js"></script> <!-- Resource jQuery -->
                    </body>
                    </html>

                    <!-- ここがバッファされます -->
                    <?php
                    // 同階層の test.html にphp実行結果を出力
                    file_put_contents( 'item-2.html', ob_get_contents() );

                    // 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
                    ob_end_clean();
                    ?>

                    <?

                    // アイキャッチ画像のIDを取得
                    $thumbnail_id = get_post_thumbnail_id();

                    //画像(返り値は「画像ID」)
                    $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                    if ($imgurl == null){
                    // 画像が無い場合の処理

                        echo '<li class="cd-item">';

                    }else{ ?>

                    <?

                        echo '<li class="cd-item" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                    ?>

                    <?  } ?>

                    <a href="<?php echo home_url( ); ?>/item-2.html">
                        <div class="padd-xs">
                            <?php echo '<h2>' . wp_trim_words( get_the_title(), 20 ) . '</h2>'; ?>
                            <p><?php the_excerpt(); ?></p>
                            <b>View More</b>
                        </div>
                    </a>
                    </li>

            <?php elseif($post_counter ==2): ?>

                    <?php

                    // 出力のバッファリングを有効にする
                    ob_start();
                    ?>
                    <!-- ここから -->

                    <!doctype html>
                    <html <?php language_attributes(); ?>>
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1">

                        <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
                        <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
                        <script src="js/modernizr.js"></script> <!-- Modernizr -->

                        <title><?php the_title(); ?></title>
                    </head>
                    <body>
                        <div class="cd-fold-content single-page">

                            <h2 class="page-header"><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>

                        </div>

                    </body>
                    <script src="js/jquery-2.1.1.js"></script>
                    <script src="js/main.js"></script> <!-- Resource jQuery -->
                    </body>
                    </html>

                    <!-- ここがバッファされます -->
                    <?php
                    // 同階層の test.html にphp実行結果を出力
                    file_put_contents( 'item-3.html', ob_get_contents() );

                    // 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
                    ob_end_clean();
                    ?>

                    <?

                        // アイキャッチ画像のIDを取得
                        $thumbnail_id = get_post_thumbnail_id();

                        //画像(返り値は「画像ID」)
                        $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                        if ($imgurl == null){
                        // 画像が無い場合の処理

                            echo '<li class="cd-item">';

                        }else{ ?>

                        <?

                            echo '<li class="cd-item" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                        ?>

                      <?  } ?>


                        <a href="<?php echo home_url( ); ?>/item-3.html">
                            <div class="padd-xs">
                                <?php echo '<h2>' . wp_trim_words( get_the_title(), 20 ) . '</h2>'; ?>
                                <p><?php the_excerpt(); ?></p>
                                <b>View More</b>
                            </div>
                        </a>
                    </li>

            <?php elseif($post_counter ==3): ?>

                    <?php

                    // 出力のバッファリングを有効にする
                    ob_start();
                    ?>
                    <!-- ここから -->

                    <!doctype html>
                    <html <?php language_attributes(); ?>>
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
                    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
                    <script src="js/modernizr.js"></script> <!-- Modernizr -->

                    <title><?php the_title(); ?></title>
                    </head>
                    <body>
                    <div class="cd-fold-content single-page">

                        <h2 class="page-header"><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>

                    </div>

                    </body>
                    <script src="js/jquery-2.1.1.js"></script>
                    <script src="js/main.js"></script> <!-- Resource jQuery -->
                    </body>
                    </html>

                    <!-- ここがバッファされます -->
                    <?php
                    // 同階層の test.html にphp実行結果を出力
                    file_put_contents( 'item-4.html', ob_get_contents() );

                    // 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
                    ob_end_clean();
                    ?>

                    <?

                    // アイキャッチ画像のIDを取得
                    $thumbnail_id = get_post_thumbnail_id();

                    //画像(返り値は「画像ID」)
                    $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                    if ($imgurl == null){
                    // 画像が無い場合の処理

                        echo '<li class="cd-item">';

                    }else{ ?>

                    <?

                        echo '<li class="cd-item" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                    ?>

                    <?  } ?>

                    <a href="<?php echo home_url( ); ?>/item-4.html">
                        <div class="padd-xs">
                            <?php echo '<h2>' . wp_trim_words( get_the_title(), 20 ) . '</h2>'; ?>
                            <p><?php the_excerpt(); ?></p>
                            <b>View More</b>
                        </div>
                    </a>
                    </li>

            <?php elseif($post_counter ==4): ?>

                    <?php

                    // 出力のバッファリングを有効にする
                    ob_start();
                    ?>
                    <!-- ここから -->

                    <!doctype html>
                    <html <?php language_attributes(); ?>>
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
                    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
                    <script src="js/modernizr.js"></script> <!-- Modernizr -->

                    <title><?php the_title(); ?></title>
                    </head>
                    <body>
                    <div class="cd-fold-content single-page">

                    <h2 class="page-header"><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>

                    </div>

                    </body>
                    <script src="js/jquery-2.1.1.js"></script>
                    <script src="js/main.js"></script> <!-- Resource jQuery -->
                    </body>
                    </html>

                    <!-- ここがバッファされます -->
                    <?php
                    // 同階層の test.html にphp実行結果を出力
                    file_put_contents( 'item-5.html', ob_get_contents() );

                    // 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
                    ob_end_clean();
                    ?>

                    <?

                    // アイキャッチ画像のIDを取得
                    $thumbnail_id = get_post_thumbnail_id();

                    //画像(返り値は「画像ID」)
                    $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                    if ($imgurl == null){
                    // 画像が無い場合の処理

                    echo '<li class="cd-item">';

                    }else{ ?>

                    <?

                    echo '<li class="cd-item" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                    ?>

                    <?  } ?>

                    <a href="<?php echo home_url( ); ?>/item-5.html">
                    <div class="padd-xs">
                        <?php echo '<h2>' . wp_trim_words( get_the_title(), 20 ) . '</h2>'; ?>
                        <p><?php the_excerpt(); ?></p>
                    <b>View More</b>
                    </div>
                    </a>
                    </li>

            <?php elseif($post_counter ==5): ?>

                    <?php

                    // 出力のバッファリングを有効にする
                    ob_start();
                    ?>
                    <!-- ここから -->

                    <!doctype html>
                    <html <?php language_attributes(); ?>>
                    <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1">

                    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
                    <link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
                    <script src="js/modernizr.js"></script> <!-- Modernizr -->

                    <title><?php the_title(); ?></title>
                    </head>
                    <body>
                    <div class="cd-fold-content single-page">

                    <h2 class="page-header"><?php the_title(); ?></h2>
                    <p><?php the_content(); ?></p>

                    </div>

                    </body>
                    <script src="js/jquery-2.1.1.js"></script>
                    <script src="js/main.js"></script> <!-- Resource jQuery -->
                    </body>
                    </html>

                    <!-- ここがバッファされます -->
                    <?php
                    // 同階層の test.html にphp実行結果を出力
                    file_put_contents( 'item-6.html', ob_get_contents() );

                    // 出力用バッファをクリア(消去)し、出力のバッファリングをオフにする
                    ob_end_clean();
                    ?>

                    <?

                    // アイキャッチ画像のIDを取得
                    $thumbnail_id = get_post_thumbnail_id();

                    //画像(返り値は「画像ID」)
                    $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                    if ($imgurl == null){
                    // 画像が無い場合の処理

                    echo '<li class="cd-item">';

                    }else{ ?>

                    <?

                    echo '<li class="cd-item" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                    ?>

                    <?  } ?>


                    <a href="<?php echo home_url( ); ?>/item-6.html">
                    <div class="padd-xs">
                        <?php echo '<h2>' . wp_trim_words( get_the_title(), 20 ) . '</h2>'; ?>
                        <p><?php the_excerpt(); ?></p>
                    <b>View More</b>
                    </div>
                    </a>
                    </li>


            <?php elseif($post_counter ==6): ?>


            <?php endif; ?>
            <?php $post_counter++; ?>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>


        </ul> <!-- .cd-gallery -->

    </main> <!-- .cd-main -->

    <div class="cd-folding-panel">

        <div class="fold-left"></div> <!-- this is the left fold -->

        <div class="fold-right"></div> <!-- this is the right fold -->

        <div class="cd-fold-content">
            <!-- content will be loaded using javascript -->
        </div>

        <a class="cd-close" href="#0"></a>

    </div> <!-- .cd-folding-panel -->

</div><!-- .row -->


<?php get_footer(); ?>
