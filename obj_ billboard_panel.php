<?php
/**
 The template name:オブジェクト−ブランディング
 */
get_header(); ?>

<?php

//固定ページのカスタムフィールドより入力されたDATAを他ページでも使用可能にする
global $code;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$code =  get_post_meta($get_page_id,'apicode' ,true); //ページIDを元にカスタムフィールドの値取得

$json = @file_get_contents($code);
if($http_response_header[0] == 'HTTP/1.1 404 Not Found'){
    print '404 Not Foundです。';
}
global $obj;
$obj = json_decode($json, true);

?>

<!-- ビルボード -->

<section class="branding">

    <? $osusume = $obj['recommendations']; ?>

    <!-- Navigation -->

    <?php get_template_part( 'obj_ nav' ); ?>

    <!-- end nav -->



<!-- Full Page Image Background Carousel Header -->
<div id="myCarousel" class="carousel slide  carousel-fade" data-ride="carousel">

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">

        <!-- 1枚目 -->

        <?php

        $imgback_url = wp_get_attachment_image_src($back_image1, 'full'); //サイズは自由に変更してね
        if ($imgback_url == null){
            // 画像が無い場合の処理

            echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); height:440px;" alt="' . $osusume[0]['title'] . '" >';

        }else{

            echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); height:440px;" alt="' . $osusume[0]['title'] . '" >';

        }

        ?>

            <div class="billboard-caption">

                <?php

                if ($caption1 == null){
                    // 画像が無い場合の処理

                    echo '<h2 class="ta-center">' . $osusume[0]['title'] . '</h2>';

                }else{

                    echo '<h2 class="ta-center">' . $caption1 . '</h2>';
                }

                ?>

                <h4><? echo $osusume[0]['description']; ?></h4>

            </div><!-- /.carousel-caption -->

        </div><!-- /.item active bgImage -->

    </div><!-- /.carousel-inner -->

</div><!-- /#myCarousel -->

</section><!-- #section branding -->

