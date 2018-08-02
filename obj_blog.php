<?php
/**
 The template name:オブジェクト-ブログ
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

<!-- blog -->

<section id="blog" class="blog" style="background-color:<? echo $back_color5; ?>">

    <div class="container">

        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3 class="gemstone_title page-title ta-center">BLOG</h3>

            </div><!-- .col-xs-12 col-sm-8 col-md-8 col-lg-8 same-height mm-pad-big -->


            <div class="mis-stage">
                <!-- The element to select and apply miSlider to - the class is optional -->
                <ol class="mis-slider">

                    <?php $args = array(
                        'numberposts' => 20,        //表示（取得）する記事の数(-1で全部)
                        'post_type' => 'blogs'    //投稿タイプの指定
                    );
                    $customPosts = get_posts($args);
                    if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>

                    <?php

                    // アイキャッチ画像の確認
                    if ( has_post_thumbnail()) {
                        // 存在する

                        // アイキャッチ画像のIDを取得
                        $thumbnail_id = get_post_thumbnail_id();

                        // mediumサイズの画像内容を取得（引数にmediumをセット）
                        $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'gd_sm_size' );

                        // The slider element - the class is optional - Set width of slide using CSS on this element //
                        echo '<li class="mis-slide">';
                        // A slide element - the class is optional //
                        echo '<a href="'. get_permalink() . '" class="mis-container">';
                        // A slide container - this element is optional, if absent the plugin adds it automatically //
                        echo '<figure>';
                        // Slide content - whatever you want //
                        echo '<img src="' . $eye_img[0] . '" alt="">';
                        echo '<figcaption>' . mb_substr(get_the_title(), 0, 24) . '</figcaption>';
                        echo the_time('y.m.d');
                        echo '</figure>';
                        echo '</a>';
                        echo '</li>';

                    }

                    else{

                        // The slider element - the class is optional - Set width of slide using CSS on this element //
                        echo '<li class="mis-slide">';
                        // A slide element - the class is optional //
                        echo '<a href="'. get_permalink() . '" class="mis-container">';
                        // A slide container - this element is optional, if absent the plugin adds it automatically //
                        echo '<figure>';
                        // Slide content - whatever you want //
                        echo '<img src="' . get_template_directory_uri() . '/images/nowprinting_gd_xs.png" alt="">';
                        echo '<figcaption>' . mb_substr(get_the_excerpt(), 0, 24) . '</figcaption>';
                        echo the_time('y.m.d');
                        echo '</figure>';
                        echo '</a>';
                        echo '</li>';

                    }

                    ?>

                    <?php endforeach; ?>
                    <?php else : //記事が無い場合 ?>
                    <li><p>記事はまだありません。</p></li>
                    <?php endif;
                    wp_reset_postdata(); //クエリのリセット ?>


                </ol>

            </div>

            <div class="ta-center">

                <a href="<?php echo esc_url( home_url( '/' ) ); ?>blogs/" class="btn btn-danger" style="background-color:<?php echo $recommend1_btn_color; ?>">BLOG一覧を見る</a>
            </div>

            <div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-4 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4">

                <!--ページネーション-->
                <?php if (function_exists('pagination')) {
                    pagination($wp_query->max_num_pages);
                } ?>

            </div>

        </div><!-- end .row -->

    </div><!-- end #content -->

</section>
