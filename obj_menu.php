<?php
/**
 The template name:オブジェクト−メニュー
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

<!-- MENU -->


<section id="menu" class="menu" style="background-color:<? echo $back_color5; ?>">

    <div class="container"  style="background-image: url('/images/bg_1.png') repeat-x center top;">

        <div class="row"><!-- #copy-area space -->

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3 class="gemstone_title page-title ta-center">MENU</h3>

            </div>

            <?php $args = array(
    'numberposts' => -1,        //表示（取得）する記事の数(-1で全部)
    'post_type' => 'menus'    //投稿タイプの指定
);
            $customPosts = get_posts($args);
            if($customPosts) : foreach($customPosts as $post) : setup_postdata( $post ); ?>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                <div class="thumbnail">

                    <?php if(has_post_thumbnail()): ?>

                    <?php
                    // アイキャッチ画像のIDを取得
                    $thumbnail_id = get_post_thumbnail_id();

                    // mediumサイズの画像内容を取得（引数にmediumをセット）
                    $eye_img = wp_get_attachment_image_src( $thumbnail_id , 'vga_sm_size' );

                    echo '<a href="' . get_permalink() . '">';
                    echo '<img class="img-rounded img-responsive" src="'.$eye_img[0].'" alt="64x64">';
                    echo '<h2 class="menu">' . get_the_title() . '</h2>';
                    echo '</a>';
                    ?>

                    <?php else : ?>

                    <a href="<?php the_permalink(); ?>"><img class="img-rounded img-responsive" alt="現在写真準備中" src="<?php echo get_template_directory_uri(); ?>/images/nowprinting_vga_sm.png" alt=""><h2 class="menu ta-center"><?php the_title(); ?></h2></a>

                    <?php endif; ?>

                </div>

            </div>

            <?php endforeach; ?>
            <?php else : //記事が無い場合 ?>
            <li><p>記事はまだありません。</p></li>
            <?php endif;
            wp_reset_postdata(); //クエリのリセット ?>


        </div>

    </div><!-- /.container -->

</section>
