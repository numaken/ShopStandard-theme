<?php
/**
 The template name:インスタグラム api
 */
get_header(); ?>

<? $osusume = $obj['recommendations'] ?>

<?php

    // インスタグラム Api

    //インスタグラム連携利用可否
    global $insta_sw;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_sw     =  get_post_meta($get_page_id,'instaconnect' ,true); //ページIDを元にカスタムフィールドの値取得

    //インスタグラムアクセストークン
    global $insta_token;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_token     =  get_post_meta($get_page_id,'insta_token' ,true); //ページIDを元にカスタムフィールドの値取得

    //インスタグラムユーザー名
    global $insta_username;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_username     =  get_post_meta($get_page_id,'insta_username' ,true); //ページIDを元にカスタムフィールドの値取得

    //インスタグラムキャッチコピー
    global $insta_catchcopy;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_catchcopy     =  get_post_meta($get_page_id,'insta_catchcopy' ,true); //ページIDを元にカスタムフィールドの値取得

    //インスタグラム説明文
    global $insta_description;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_description     =  get_post_meta($get_page_id,'insta_description' ,true); //ページIDを元にカスタムフィールドの値取得

    //ビルボードに設定するタイトル
    global $billboard_insta_title1;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_insta_title1     =  get_post_meta($get_page_id,'billboard_insta_title1' ,true); //ページIDを元にカスタムフィールドの値取得

    //ビルボードに設定するキャプション
    global $billboard_insta_caption1;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_insta_caption1     =  get_post_meta($get_page_id,'billboard_insta_caption1' ,true); //ページIDを元にカスタムフィールドの値取得

    //ビルボードに設定する背景画像
    global $billboard_insta_img1;
    $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_insta_img1     =  get_post_meta($get_page_id,'billboard_insta_img1' ,true); //ページIDを元にカスタムフィールドの値取得

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
                $imgback_url = wp_get_attachment_image_src($billboard_insta_img1, 'full'); //サイズは自由に変更してね
                if ($imgback_url == null){
                    // 画像が無い場合の処理
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }else{
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }
                ?>

                <div class="billboard-caption">

                    <?php
                    if ($billboard_insta_title1 == null){
                        // 画像が無い場合の処理
                        echo '<h2 class="ta-center"><i class="fab fa-instagram fa-2x"></i>&nbsp;'. get_the_title() .'</h2>';
                    }else{
                        echo '<h3 class="ta-center">' . $billboard_title1_corp1 . '</h3>';
                    }
                    ?>

                    <?php
                    if ($billboard_insta_caption1 == null){
                        // 画像が無い場合の処理
                    }else{
                        echo '<h4 class="ta-center">' . $caption_corp1 . '</h4>';
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

            <section class="instagram">

                <div class="container">

                    <div class="row"><!-- #copy-area space -->


                        <?php

                        global $insta_token;
                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                        $insta_token     =  get_post_meta($get_page_id,'insta_token' ,true); //ページIDを元にカスタムフィールドの値取得

                        if ($insta_token == null) {

                            echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">';
                            echo '<h2 class="ta-center">アクセストークンが設定されていません。</h2>';
                            echo '<h4 class="ta-center">インスタグラム連携がONになっていますが、アクセストークンが設定されていないため表示されません。</h4>';
                            echo '</div>';

                        }else{



                        }

                        ?>


                        <?php

                        global $insta_catchcopy;
                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                        $insta_catchcopy     =  get_post_meta($get_page_id,'insta_catchcopy' ,true); //ページIDを元にカスタムフィールドの値取得

                        if ($insta_catchcopy == null) {

                            echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">';
                            echo '<h2 class="ta-center">キャッチコピーが設定されていません。</h2>';
                            echo '<h4 class="ta-center">インスタグラム連携がONになっていますが、キャッチコピーが設定されていないため表示されません。</h4>';
                            echo '</div>';

                        }else{

                            echo '<h2 class="ta-center"><i class="fab fa-instagram fa-2x"></i>&nbsp;Instagram</h2>';
                            echo '<h3 class="ta-center">' . $insta_catchcopy . '</h3>';

                        }

                        ?>

                        <?php

                        global $insta_description;
                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                        $insta_description     =  get_post_meta($get_page_id,'insta_description' ,true); //ページIDを元にカスタムフィールドの値取得

                        if ($insta_description == null) {

                            echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">';
                            echo '<h2 class="ta-center">説明文が設定されていません。</h2>';
                            echo '<h4 class="ta-center">インスタグラム連携がONになっていますが、説明文が設定されていないため表示されません。</h4>';
                            echo '</div>';

                        }else{

                            echo '<h3 class="ta-center">' . $insta_description . '</h3>';

                        }

                        ?>

                        <div class="hidden-xs hidden-sm">

                            <?php

                            global $insta_username;
                            $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                            $insta_username     =  get_post_meta($get_page_id,'insta_username' ,true); //ページIDを元にカスタムフィールドの値取得

                            $myAccessToken = $insta_token; //実際のアクセストークンを入力

                            $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token='.$myAccessToken);

                            $insta_obj = json_decode($json);

                            foreach($insta_obj->data as $data){

                                echo '<div class="col-md-3 col-lg-3 hidden-xs hidden-sm">';
                                echo '<div class="insta_content">';

                                echo '<img class="photo" src="'.$data->images->low_resolution->url.'" alt="photo">';
                                echo '<div class="fav"><i class="fa fa-heart" aria-hidden="true" style="color:#ec1717"></i>&nbsp;'.$data->likes->count.'</div>';
                                foreach($data->tags as $tags){
                                    echo '<span class="tag">'.$tags.'</span>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }

                            echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">';
                            echo '<h3 class="ta-center"><img class="ta-center thumb" src="'.$data->user->profile_picture. '" height="50px" alt="USER NAME" style="border-radius:50%;border:4px solid #fff;"><span class="username">'.$data->user->username.'</span></h3>';
                            echo '<div class="ta-center"><a href="https://www.instagram.com/' . $insta_username . '?ref=badge" class="insta_btn">';
                            echo '<span class="insta">';
                            echo '<i class="fab fa-instagram"></i>';
                            echo '</span>';
                            echo '&nbsp;Follow Me';
                            echo '</a>';
                            echo '</div>';

                            echo '</div>';

                            ?>

                        </div><!-- /.col-xs-12 col-sm-12 col-md-12 col-lg-12 -->

                        <div class="hidden-md hidden-lg">

                            <?php

                            $myAccessToken = $insta_token; //実際のアクセストークンを入力

                            $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token='.$myAccessToken);

                            $insta_obj = json_decode($json);

                            foreach($insta_obj->data as $data){

                                echo '<div class="col-xs-6 col-sm-6">';
                                echo '<div class="insta_content">';

                                echo '<img class="photo" src="'.$data->images->low_resolution->url.'" alt="photo">';
                                echo '<div class="fav"><i class="fa fa-heart" aria-hidden="true" style="color:#ec1717"></i>&nbsp;'.$data->likes->count.'</div>';
                                echo '</div>';
                                echo '</div>';
                            }

                            echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-md hidden-lg">';
                            echo '<h3 class="ta-center"><img class="ta-center thumb" src="'.$data->user->profile_picture. '" height="50px" alt="USER NAME" style="border-radius:50%;border:4px solid #fff;"><span class="username">'.$data->user->username.'</span></h3>';
                            echo '<div class="ta-center"><a href="https://www.instagram.com/' . $insta_username . '?ref=badge" class="insta_btn">';
                            echo '<span class="insta">';
                            echo '<i class="fab fa-instagram"></i>';
                            echo '</span>';
                            echo '&nbsp;Follow Me';
                            echo '</a>';
                            echo '</div>';

                            echo '</div>';

                            ?>

                        </div><!-- /.col-xs-12 col-sm-12 col-md-12 col-lg-12 -->

                    </div>

                </div>

                <div class="clearfix"></div>

                </section>


<?php get_footer(); ?>

