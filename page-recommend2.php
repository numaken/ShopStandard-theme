<?php
/**
 The template name:おすすめ情報２
 */
get_header(); ?>

<? $osusume = $obj['recommendations'] ?>

<?php

//固定ページのカスタムフィールドより入力されたDATAを他ページでも使用可能にする
global $billboard_title2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_title2 =  get_post_meta($get_page_id,'billboard_title2' ,true); //ページIDを元にカスタムフィールドの値取得

global $img2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$img2 =  get_post_meta($get_page_id,'image2' ,true); //ページIDを元にカスタムフィールドの値取得

global $caption2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$caption2 =  get_post_meta($get_page_id,'caption2' ,true); //ページIDを元にカスタムフィールドの値取得


global $back_image2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_image2 =  get_post_meta($get_page_id,'background_image2' ,true); //ページIDを元にカスタムフィールドの値取得
global $back_color2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_color2 =  get_post_meta($get_page_id,'background_color2' ,true); //ページIDを元にカスタムフィールドの値取得
global $title_color2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$title_color2 =  get_post_meta($get_page_id,'title_color2' ,true); //ページIDを元にカスタムフィールドの値取得
global $font_color2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$font_color2 =  get_post_meta($get_page_id,'font_color2' ,true); //ページIDを元にカスタムフィールドの値取得

?>

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post() ?>

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
                $imgback_url = wp_get_attachment_image_src($img2, 'full'); //サイズは自由に変更してね
                if ($imgback_url == null){
                    // 画像が無い場合の処理
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[1]['image'] . '\'); " alt="' . $osusume[1]['title'] . '" >';
                }else{
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); " alt="' . $osusume[1]['title'] . '" >';
                }
                ?>

                <div class="billboard-caption">

                    <?php
                    if ($billboard_title2 == null){
                        // 画像が無い場合の処理
                        echo '<h2 class="ta-center">'. get_the_title() .'</h2>';
                    }else{
                        echo '<h3 class="ta-center">' . $billboard_title2 . '</h3>';
                    }
                    ?>

                    <?php
                    if ($caption2 == null){
                        // 画像が無い場合の処理
                    }else{
                        echo '<h4 class="ta-center">' . $caption2 . '</h4>';
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


<section class="recommend">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 cl-sm-12 col-md-12 col-lg-12">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <?php

                        if (function_exists('has_post_thumbnail') AND has_post_thumbnail($post->ID)) {
                            $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                            $image = esc_url($attachment[0]);
                            echo '<img class="img-responsive" src="' . $image . '"  width="100%" alt="">';

                        } else {
                            echo '<img class="img-responsive" src="' . $osusume[1]['image'] . '"  width="100%" alt="">';
                        }
                        ?>

                        <a href="<?php the_permalink(); ?>"></a>


                        <div class="col-xs-12 cl-sm-12 col-md-12 col-lg-12">

                            <div class="entry-header">
                                <h3 class="heading recommend-title"><? echo $osusume[1]['title']; ?></h3>
                            </div>
                            <? echo $osusume[1]['description']; ?>

                        </div>


                        <?php endwhile; ?>
                        <?php else : ?>
                        <div>記事が見つかりませんでした。</div>
                        <?php endif; ?>

                        <div class="col-xs-12 cl-sm-12 col-md-12 col-lg-12">

                            <div><?php the_content(); ?></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div><!-- .container -->


    <!-- おすすめ3商品 -->

    <div class="container">

        <div class="row">

            <div class="col-xs-12">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                            <h3 class="heading recommend-title" style="color:<? echo $title_color1; ?>"><? echo $osusume[0]['title']; ?></h3>
                            <div class="media">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>recommend1/">

                                    <?php

                                    $imgurl = wp_get_attachment_image_src($img2, 'full'); //サイズは自由に変更してね
                                    if ($imgurl == null){
                                        // 画像が無い場合の処理

                                        echo '<img alt="64x64" class="media-object" data-src="holder.js/64x64" src="' . $osusume[0]['image'] . '" alt="' . $osusume[0]['title'] . '" data-holder-rendered="true" style="width: 100%;">';

                                    }else{

                                        echo '<img alt="64x64" class="media-object" data-src="holder.js/64x64" src="' . $imgurl[0] . '" alt="' . $osusume[0]['title'] . '" data-holder-rendered="true" style="width: 100%;">';
                                    }

                                    ?>

                                </a>
                                <div class="media-body">
                                    <div class="content" style="color:<? echo $font_color1; ?>"><? echo $osusume[0]['description']; ?></div>
                                </div>
                            </div>

                        </div>

                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

                            <h3 class="heading recommend-title" style="color:<? echo $title_color2; ?>"><? echo $osusume[2]['title']; ?></h3>
                            <div class="media">
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>recommend3/">

                                    <?php

                                    $imgurl = wp_get_attachment_image_src($img3, 'full'); //サイズは自由に変更してね
                                    if ($imgurl == null){
                                        // 画像が無い場合の処理

                                        echo '<img alt="64x64" class="media-object" data-src="holder.js/64x64" src="' . $osusume[2]['image'] . '" alt="' . $osusume[2]['title'] . '" data-holder-rendered="true" style="width: 100%;">';

                                    }else{

                                        echo '<img alt="64x64" class="media-object" data-src="holder.js/64x64" src="' . $imgurl[0] . '" alt="' . $osusume[2]['title'] . '" data-holder-rendered="true" style="width: 100%;">';
                                    }

                                    ?>

                                </a>
                                <div class="media-body">
                                    <div class="content" style="color:<? echo $font_color2; ?>"><? echo $osusume[2]['description']; ?></div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div><!-- /.col-xs-12 -->

        </div><!-- /.row -->

    </div><!-- /.container -->

    </section>

<?php get_footer(); ?>
