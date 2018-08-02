<?php
/**
The template name:メニューページ
*/
get_header(); ?>


<? $osusume = $obj['recommendations'] ?>

<?php

    //固定ページ おすすめ情報1 のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

    global $billboard_about_title1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_about_title1 =  get_post_meta($get_page_id,'billboard_about_title1' ,true); //ページIDを元にカスタムフィールドの値取得

global $img_about1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$img_about1 =  get_post_meta($get_page_id,'image_about1' ,true); //ページIDを元にカスタムフィールドの値取得

global $caption_about1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$caption_about1 =  get_post_meta($get_page_id,'caption_about1' ,true); //ページIDを元にカスタムフィールドの値取得

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
                $imgback_url = wp_get_attachment_image_src($img_about1, 'full'); //サイズは自由に変更してね
                if ($imgback_url == null){
                    // 画像が無い場合の処理
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\');" alt="' . $osusume[0]['title'] . '" >';
                }else{
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\');" alt="' . $osusume[0]['title'] . '" >';
                }
                ?>

                <div class="billboard-caption">

                    <?php
                    if ($billboard_about_title1 == null){
                        // 画像が無い場合の処理
                        echo '<h2 class="ta-center">'. get_the_title() .'</h2>';
                    }else{
                        echo '<h3 class="ta-center">' . $billboard_about_title1 . '</h3>';
                    }
                    ?>

                    <?php
                    if ($caption_about1 == null){
                        // 画像が無い場合の処理
                    }else{
                        echo '<h4 class="ta-center">' . $caption_about1 . '</h4>';
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

            <section class="blog">

                <div id="content">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <h3 class="page-title ta-center">
                                <?php echo esc_html(get_post_type_object(get_post_type())->label ) ?>
                                一覧
                            </h3>

                            <div class="container">

                                <ul class="products pure-pad pure-g"><!-- #blog space -->

                                    <?php $args = array(
    'numberposts' => 6,        //表示（取得）する記事の数(-1で全部)
    'post_type' => 'menus'    //投稿タイプの指定
);
                                $customPosts = get_posts($args);
                                if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>

                                    <li class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                        <div class="photo">

                                            <?php if(has_post_thumbnail()): ?>

                                            <?php
                                            // アイキャッチ画像のIDを取得
                                            $thumbnail_id = get_post_thumbnail_id();

                                            // mediumサイズの画像内容を取得（引数にmediumをセット）
                                            $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'full' );

                                            echo '<img src="'.$eye_img[0].'" alt="64x64">';
                                            ?>

                                            <?php else : ?>

                                            <img  alt="現在写真準備中" src="<?php echo get_template_directory_uri(); ?>/images/nowprinting240.png" alt="">


                                            <?php endif; ?>

                                            <p class="text"><a href="<?php the_permalink(); ?>"  style="color:#fff;"><?php the_title(); ?></a></p>

                                        </div>

                                    </li>

                                    <?php endforeach; ?>
                                    <?php else : //記事が無い場合 ?>
                                    <li><p>記事はまだありません。</p></li>
                                    <?php endif;
                                    wp_reset_postdata(); //クエリのリセット ?>

                                </ul>

                            </div>

                        </div><!-- .col-xs-12 col-sm-8 col-md-8 col-lg-8 same-height mm-pad-big -->

                        <div class="col-xs-4 col-xs-offset-4 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">

                            <!--ページネーション-->
                            <?php if (function_exists('pagination')) {
    pagination($wp_query->max_num_pages);
} ?>

                        </div>

                    </div><!-- end .row -->

                </div><!-- end #content -->

            </section>



    <?php get_footer(); ?>
