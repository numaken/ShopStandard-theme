<?php
/** The template name:archive-blogs */
get_header(); ?>

<? $osusume = $obj['recommendations'] ?>

<?php

//固定ページ おすすめ情報1 のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

global $billboard_title1_event1;
$get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_title1_event1 =  get_post_meta($get_page_id,'billboard_title1_event1' ,true); //ページIDを元にカスタムフィールドの値取得

global $image_event1;
$get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$image_event1 =  get_post_meta($get_page_id,'image_event1' ,true); //ページIDを元にカスタムフィールドの値取得

global $caption_event1;
$get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$caption_event1 =  get_post_meta($get_page_id,'caption_event1' ,true); //ページIDを元にカスタムフィールドの値取得

global $background_image5;
$get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$background_image5 =  get_post_meta($get_page_id,'background_image5' ,true); //ページIDを元にカスタムフィールドの値取得

global $background_color5;
$get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$background_color5 =  get_post_meta($get_page_id,'background_color5' ,true); //ページIDを元にカスタムフィールドの値取得

global $title_color5;
$get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$title_color5 =  get_post_meta($get_page_id,'title_color5' ,true); //ページIDを元にカスタムフィールドの値取得

global $font_color5;
$get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$font_color5 =  get_post_meta($get_page_id,'font_color5' ,true); //ページIDを元にカスタムフィールドの値取得

?>


<div id="wrapper">

    <main id="main">

        <section class="branding">

            <!-- Navigation -->

            <?php get_template_part( 'obj_ nav' ); ?>

            <!-- end nav -->


            <!-- Full Page Image Background Carousel Header -->

            <div id="myCarousel" class="carousel slide  carousel-fade" data-ride="carousel">

                <!-- Wrapper for Slides -->
                <div class="carousel-inner">

                    <?php
                    $imgback_url = null;
                    $imgback_url = wp_get_attachment_image_src($image_event1, 'full'); //サイズは自由に変更してね
                    if ($imgback_url == null){
                        // 画像が無い場合の処理
                        echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                    }else{
                        echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                    }
                    ?>

                        <div class="billboard-caption">

                            <?php
                            if ($billboard_title1_event1 == null){
                                // 画像が無い場合の処理
                                echo '<h2 class="ta-center">'. esc_html(get_post_type_object(get_post_type())->label ) .'</h2>';
                            }else{
                                echo '<h3 class="ta-center">' . $billboard_title1_event1 . '</h3>';
                            }
                            ?>

                            <?php
                            if ($caption_event1 == null){
                                // 画像が無い場合の処理
                            }else{
                                echo '<h4 class="ta-center">' . $caption_event1 . '</h4>';
                            }
                            ?>

                        </div><!-- /.carousel-caption -->

                    </div><!-- /.item active bgImage -->

                </div><!-- /.carousel-inner -->

            </div><!-- /#myCarousel -->

        </section><!-- #section branding -->


<!-- Navigation -->

<?php get_template_part( 'header-navi' ); ?>

<!-- breadcrumb -->

<?php

$ua = $_SERVER['HTTP_USER_AGENT'];
if ((strpos($ua, 'iPhone') !== false) && (strpos($ua, 'Safari') === false)) {
}else{
    echo breadcrumb(); // パンくず
}

?>

    <section id="blog" class="blog" style="background-color:<? echo $back_color5; ?>">

        <div class="blog-wrap">

            <div class="col-xs-12"><!-- col-xs-12 col-sm-8 col-md-8 col-lg-8 -->

                <div class="panel panel-default">

                    <div class="panel-body">

                    <!-- Full Page Image Background Carousel Header -->
                    <div id="myCarousel2" class="carousel slide" data-ride="carousel">

                        <!-- Indicators -->
                        <ol class="carousel-indicators">


                            <?php

                            $post_counter = null;

                            $args = array(
                                'posts_per_page' => 5,        //表示（取得）する記事の数
                                'post_type' => 'blogs'    //投稿タイプの指定
                            ); ?>

                            <?php $loop = new WP_Query( $args ); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


                            <?php if($post_counter ==0): ?>

                            <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>

                            <?php elseif($post_counter ==1): ?>

                            <li data-target="#myCarousel2" data-slide-to="1"></li>

                            <?php elseif($post_counter ==2): ?>

                            <li data-target="#myCarousel2" data-slide-to="2"></li>

                            <?php elseif($post_counter ==3): ?>

                            <li data-target="#myCarousel2" data-slide-to="3"></li>

                            <?php elseif($post_counter ==4): ?>

                            <li data-target="#myCarousel2" data-slide-to="4"></li>

                            <?php endif; ?>
                            <?php $post_counter++; ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>


                        </ol>

                        <!-- Wrapper for Slides -->
                        <div class="carousel-inner">

                            <?php

                            $post_counter = null;

                            $args = array(
                                'posts_per_page' => 5,        //表示（取得）する記事の数
                                'post_type' => 'blogs'    //投稿タイプの指定
                            ); ?>

                            <?php $loop = new WP_Query( $args ); ?>
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


                            <?php if($post_counter ==0): ?>

                            <div class="item active">

                                <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id();

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                                if($imgurl){ ?><div class="fill" style="background-image:url('<? echo $imgurl[0]; ?>');" alt="">
                                <a href="<?php the_permalink(); ?>"></a></div>
                                <? }
                                ?>

                                <div class="carousel-caption">
                                    <h2><?php the_title(); ?>
                                    <a href="<?php the_permalink(); ?>"></a>
                                    </h2>
                                </div>

                            </div>

                            <?php elseif($post_counter ==1): ?>

                            <div class="item">

                                <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id();

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                                if($imgurl){ ?><div class="fill" style="background-image:url('<? echo $imgurl[0]; ?>');" alt="">
                                <a href="<?php the_permalink(); ?>"></a></div>
                                <? }
                                ?>

                                <div class="carousel-caption">
                                    <h2><?php the_title(); ?>
                                        <a href="<?php the_permalink(); ?>"></a>
                                    </h2>
                                </div>

                            </div>

                            <?php elseif($post_counter ==2): ?>

                            <div class="item">

                                <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id();

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                                if($imgurl){ ?><div class="fill" style="background-image:url('<? echo $imgurl[0]; ?>');" alt="">
                                <a href="<?php the_permalink(); ?>"></a></div>
                                <? }
                                ?>

                                <div class="carousel-caption">
                                    <h2><?php the_title(); ?></h2>
                                    <a href="<?php the_permalink(); ?>"></a>
                                </div>

                            </div>

                            <?php elseif($post_counter ==3): ?>

                            <div class="item">

                                <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id();

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                                if($imgurl){ ?><div class="fill" style="background-image:url('<? echo $imgurl[0]; ?>');" alt="">
                                <a href="<?php the_permalink(); ?>"></a></div>
                                <? }
                                ?>

                                <div class="carousel-caption">
                                    <h2><?php the_title(); ?></h2>
                                    <a href="<?php the_permalink(); ?>"></a>
                                </div>

                            </div>

                            <?php elseif($post_counter ==4): ?>

                            <div class="item">

                                <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id();

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'full');
                                if($imgurl){ ?><div class="fill" style="background-image:url('<? echo $imgurl[0]; ?>');" alt="">
                                <a href="<?php the_permalink(); ?>"></a></div>
                                <? }
                                ?>

                                <div class="carousel-caption">
                                    <h2><?php the_title(); ?></h2>
                                    <a href="<?php the_permalink(); ?>"></a>
                                </div>

                            </div>



                            <?php endif; ?>
                            <?php $post_counter++; ?>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>



                        </div><!-- /.carousel-inner -->

                        <!-- Controls -->
                        <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                            <span class="icon-next"></span>
                        </a>

                        </div><!-- /.myCarousel -->

                    </div><!-- panel panel-body -->

                </div><!-- panel panel-default -->

            </div><!-- ./col-xs-12 -->


            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">


                <ul class="media-list">

                    <?php $args = array(
                        'numberposts' => 10,        //表示（取得）する記事の数(-1で全部)
                        'post_type' => 'blogs'    //投稿タイプの指定
                    );
                    $customPosts = get_posts($args);
                    if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>


                    <li class="media">

                        <div class="panel panel-default">

                            <div class="panel-body">


                                    <div class="media-left">

                                        <a href="<?php the_permalink(); ?>">

                                            <?php if(has_post_thumbnail()): ?>

                                            <?php
                                            // アイキャッチ画像のIDを取得
                                            $thumbnail_id = get_post_thumbnail_id();

                                            // mediumサイズの画像内容を取得（引数にmediumをセット）
                                            $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'sidebar_size' );

                                            echo '<img class="media-object" src="'.$eye_img[0].'" alt="64x64">';
                                            ?>

                                            <?php else : ?>

                                            <a href="<?php the_permalink(); ?>">
                                                <img class="media-object img-thumbnail img-responsive" src="<?php echo $obj['bottom_patch_url']; ?>"   style="max-width:100px;" alt="<?php the_title(); ?>">
                                            </a>


                                            <?php endif; ?>

                                        </a>

                                    </div>

                                    <div class="media-body">

                                        <span class="label label-default"><?php the_time( 'Y/m/d' ); ?></span>
                                        <h4 class="page-header list-title media-heading <?php echo esc_attr(get_post_type()); ?>" ><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h4>
                                        <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>

                                    </div><!-- media-body -->

                            </div>

                        </div>

                    </li>


                    <?php endforeach; ?>
                    <?php else : //記事が無い場合 ?>
                    <li><p>記事はまだありません。</p></li>
                    <?php endif;
                    wp_reset_postdata(); //クエリのリセット ?>

                </ul><!-- ./media-list -->


                <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">

                    <!--ページネーション-->
                    <?php if (function_exists('pagination')) {
                        pagination($wp_query->max_num_pages);
                    } ?>

                </div><!-- col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4 -->



            </div><!-- col-xs-12 col-sm-8 col-md-8 col-lg-8 -->



            <?php

            $ua = $_SERVER['HTTP_USER_AGENT'];
            if ((strpos($ua, 'iPhone') !== false) && (strpos($ua, 'Safari') === false)) {
            }else{
                echo '<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">';
                echo '<section class="side-bar">';
                echo '<div class="panel panel-default">';
                echo '<div class="panel-body">';
                echo get_template_part( 'blog-summary' ); //　サイドバーサマリー
                echo '</div>'; //.panel-body
                echo '</div>'; //.panel panel-default
                echo '</section>'; //.side-bar
                echo '</div>'; //.col-xs-12 col-sm-4 col-md-4 col-lg-4
            }

            ?>

        </div><!-- blog-wrap -->

        </section>
<div class="clearfix"></div>

<?php get_footer(); ?>

