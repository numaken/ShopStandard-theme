<?php
/** The template name:archive-menus */
get_header(); ?>

<? $osusume = $obj['recommendations'] ?>

<?php

//固定ページ おすすめ情報1 のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

global $custom_page_name;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$custom_page_name =  get_post_meta($get_page_id,'custom_page_name' ,true); //ページIDを元にカスタムフィールドの値取得

global $custom_page_img;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$custom_page_img =  get_post_meta($get_page_id,'custom_page_img' ,true); //ページIDを元にカスタムフィールドの値取得

global $custom_page_caption;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$custom_page_caption =  get_post_meta($get_page_id,'custom_page_caption' ,true); //ページIDを元にカスタムフィールドの値取得

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
                $imgback_url = wp_get_attachment_image_src($custom_page_img, 'full'); //サイズは自由に変更してね
                if ($imgback_url == null){
                    // 画像が無い場合の処理
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }else{
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }
                ?>

                <div class="billboard-caption">

                    <?php
                    if ($custom_page_name == null){
                        // 画像が無い場合の処理
                        echo '<h2 class="ta-center">'. esc_html(get_post_type_object(get_post_type())->label ) .'</h2>';
                    }else{
                        echo '<h3 class="ta-center">' . $custom_page_name . '</h3>';
                    }
                    ?>

                    <?php
                    if ($custom_page_caption == null){
                        // 画像が無い場合の処理
                    }else{
                        echo '<h4 class="ta-center">' . $custom_page_caption . '</h4>';
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

        <article>

            <section class="blog">

                <div id="content">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div class="container">

                                <ul class="media-list">

                                    <?php $args = array(
                                        'numberposts' => 8,        //表示（取得）する記事の数(-1で全部)
                                        'post_type' => 'menus'    //投稿タイプの指定
                                    );
                                    $customPosts = get_posts($args);
                                    if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>

                                    <li class="media">

                                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                                            <div class="panel panel-default" style="height:160px;">

                                                <div class="panel-body">

                                                    <div class="media-left">
                                                        <a href="<?php the_permalink(); ?>">

                                                            <?php if(has_post_thumbnail()): ?>

                                                            <?php
                                                            // アイキャッチ画像のIDを取得
                                                            $thumbnail_id = get_post_thumbnail_id();

                                                            // mediumサイズの画像内容を取得（引数にgd_xxs_sizeをセット）
                                                            $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'gd_xxs_size' );

                                                            echo '<img class="media-object" src="'.$eye_img[0].'" alt="64x64">';
                                                            ?>

                                                            <?php else : ?>

                                                            <img class="media-object" src="<?php echo get_template_directory_uri(); ?>/images/nowprinting240.png" alt="" style="width: 160px; height: 99px;">


                                                            <?php endif; ?>

                                                        </a>
                                                    </div>

                                                    <div class="media-body">
                                                        <h4 class="page-header list-title media-heading blogs"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                        <p><a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a></p>
                                                    </div>

                                                </div>

                                            </div>

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

        </article>



<?php get_footer(); ?>
