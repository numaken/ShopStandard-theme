<?php
/**
 The template name:オブジェクト-Appダウンロード
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

<!-- shop -->

<!-- App DownLoad -->

<section id="panolaboApp" class="panolaboApp">



    <div class="parallax-inner">

            <!-- アプリリンク -->
            <div class="container">

                <?php

                //Appleアプリタイトル
                global $app_title;
                $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                $app_title =  get_post_meta($get_page_id,'app_title' ,true); //ページIDを元にカスタムフィールドの値取得

                //Appleアプリ説明文
                global $app_description;
                $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                $app_description =  get_post_meta($get_page_id,'app_description' ,true); //ページIDを元にカスタムフィールドの値取得

                //Googleアプリurl
                global $app_url_android;
                $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                $app_url_android     =  get_post_meta($get_page_id,'gapp' ,true); //ページIDを元にカスタムフィールドの値取得


                //Appleアプリurl
                global $app_url_iphone;
                $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                $app_url_iphone     =  get_post_meta($get_page_id,'iapp' ,true); //ページIDを元にカスタムフィールドの値取得


                if ($app_url_iphone == null){

                    if($app_url_android == null){

                    }else{

                        echo '<h3 class="ta-center">' . $app_title . '</h3>';
                        echo '<h4 class="ta-center">' . $app_description . '</h4>';

                        echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';

                        echo '<div class="ta-center">';
                        echo '<a href="' . $app_url_android . '">';
                        echo '<img class="google-DLlogo img-responsive center-block" src="' . get_template_directory_uri() . '/img/google-play-badge.png" alt="panolaboAppダウンロード">';
                        echo '</a>';
                        echo '</div><!-- /.ta-center -->';

                        echo '</div><!-- /.col-xs-12 col-sm-12 col-md-12 col-lg-12 -->';
                    }

                }else if($app_url_android == null){

                    echo '<h3 class="ta-center">' . $app_title . '</h3>';
                    echo '<h4 class="ta-center">' . $app_description . '</h4>';

                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';

                    echo '<div class="ta-center">';
                    echo '<a href="' . $app_url_iphone . '">';
                    echo '<img class="apple-DLlogo img-responsive center-block" src="' . get_template_directory_uri() . '/img/app-store_badge.png" alt="panolaboAppダウンロード">';
                    echo '</a>';
                    echo '</div><!-- /.ta-center -->';


                    echo '</div><!-- /.col-xs-12 col-sm-12 col-md-12 col-lg-12 -->';


                }else{

                    echo '<h3 class="ta-center">' . $app_title . '</h3>';
                    echo '<h4 class="ta-center">' . $app_description . '</h4>';

                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">';

                    echo '<div class="ta-center">';
                    echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
                    echo '<a href="' . $app_url_iphone . '">';
                    echo '<img class="apple-DLlogo img-responsive pull-right" src="' . get_template_directory_uri() . '/img/app-store_badge.png" alt="panolaboAppダウンロード">';
                    echo '</a>';
                    echo '</div><!-- /.col-xs-12 col-sm-6 col-md-6 col-lg- -->';

                    echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
                    echo '<a href="' . $app_url_android . '">';
                    echo '<img class="google-DLlogo img-responsive pull-left" src="' . get_template_directory_uri() . '/img/google-play-badge.png" alt="panolaboAppダウンロード">';
                    echo '</a>';
                    echo '</div><!-- /.col-xs-12 col-sm-6 col-md-6 col-lg- -->';
                    echo '</div><!-- /.ta-center -->';

                    echo '</div><!-- /.col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 -->';


                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-md hidden-lg">';

                    echo '<div class="ta-center">';
                    echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
                    echo '<a href="' . $app_url_iphone . '">';
                    echo '<img class="apple-DLlogo img-responsive center-block" src="' . get_template_directory_uri() . '/img/app-store_badge.png" alt="panolaboAppダウンロード">';
                    echo '</a>';
                    echo '</div><!-- /.col-xs-12 col-sm-6 col-md-6 col-lg- -->';

                    echo '<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">';
                    echo '<a href="' . $app_url_android . '">';
                    echo '<img class="google-DLlogo img-responsive center-block" src="' . get_template_directory_uri() . '/img/google-play-badge.png" alt="panolaboAppダウンロード">';
                    echo '</a>';
                    echo '</div><!-- /.col-xs-12 col-sm-6 col-md-6 col-lg- -->';
                    echo '</div><!-- /.ta-center -->';

                    echo '</div><!-- /.col-xs-12 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 -->';



                }

                ?>

            </div><!-- /.contentainer --><!-- /.アプリリンク -->


    </div><!-- /.parallax-inner -->

</section>
