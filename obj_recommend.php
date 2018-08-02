<?php
/**
 The template name:オブジェクト-おすすめ
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

<!-- おすすめ -->
<? $osusume = $obj['recommendations']; ?>

<section id="recommend" class="recommend">

    <!-- おすすめ3商品 -->

    <div class="container"><!-- #copy space -->

        <div class="row">

            <div class="ta-center">

                <h2 class="gemstone_title"><? echo $obj['title']; ?></h2>

                <div class="gemstone_subtext content-box">
                    <? echo $obj['description']; ?>
                </div>

            </div>

            <div class="col-xs-12">

                <ul>

                    <li>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                            <h2 class="gemstone_title recommend-title ta-center" style="color:<? echo $title_color1; ?>;"><? echo $osusume[0]['title']; ?></h2>

                            <?php

                            $imgurl = wp_get_attachment_image_src($img1, 'full'); //サイズは自由に変更してね
                            if ($imgurl == null){
                                // 画像が無い場合の処理

                                echo '<div class="center-block"><img src="' . $osusume[0]['image'] . '" class="attachment-shop_catalog wp-post-image img-feature img-responsive image-round center-block img-responsive-overwrite" alt="' . $osusume[0]['title'] . '" ></div>';

                            }else{

                                echo '<div class="center-block"><img src="' . $imgurl[0] . '" class="attachment-shop_catalog wp-post-image img-feature img-responsive image-round center-block img-responsive-overwrite" alt="' . $osusume[0]['title'] . '" ></div>';

                            }

                            ?>

                            <div class="gemstone_subtext" style="color:<? echo $font_color1; ?>">
                                <? echo $osusume[0]['description']; ?>
                            </div>

                        </div>
                    </li>

                    <li>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                            <h2 class="gemstone_title recommend-title ta-center" style="color:<? echo $title_color2; ?>;"><? echo $osusume[1]['title']; ?></h2>

                        <?php

                        $imgurl = wp_get_attachment_image_src($img2, 'full'); //サイズは自由に変更してね
                        if ($imgurl == null){
                            // 画像が無い場合の処理

                            echo '<div class="center-block"><img src="' . $osusume[1]['image'] . '" class="attachment-shop_catalog wp-post-image img-feature img-responsive image-round center-block img-responsive-overwrite" alt="' . $osusume[1]['title'] . '" ></div>';

                        }else{

                            echo '<div class="center-block"><img src="' . $imgurl[0] . '" class="attachment-shop_catalog wp-post-image img-feature img-responsive image-round center-block img-responsive-overwrite" alt="' . $osusume[1]['title'] . '" ></div>';

                        }

                        ?>

                            <div class="gemstone_subtext" style="color:<? echo $font_color1; ?>">
                                <? echo $osusume[1]['description']; ?>
                            </div>
                        </div>
                    </li>

                    <li>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                            <h2 class="gemstone_title recommend-title ta-center" style="color:<? echo $title_color3; ?>;"><? echo $osusume[2]['title']; ?></h2>

                        <?php

                        $imgurl = wp_get_attachment_image_src($img3, 'full'); //サイズは自由に変更してね
                        if ($imgurl == null){
                            // 画像が無い場合の処理

                            echo '<div class="center-block"><img src="' . $osusume[2]['image'] . '" class="attachment-shop_catalog wp-post-image img-feature img-responsive image-round center-block img-responsive-overwrite" alt="' . $osusume[2]['title'] . '" ></div>';

                        }else{

                            echo '<div class="center-block"><img src="' . $imgurl[0] . '" class="attachment-shop_catalog wp-post-image img-feature img-responsive image-round center-block img-responsive-overwrite" alt="' . $osusume[2]['title'] . '" ></div>';

                        }

                        ?>

                            <div class="gemstone_subtext" style="color:<? echo $font_color1; ?>">
                                <? echo $osusume[2]['description']; ?>
                            </div>

                        </div>
                    </li>

                </ul>

            </div>

        </div>

    </div><!-- /.container -->

</section>
