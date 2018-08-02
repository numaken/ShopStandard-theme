<?php
/**
 The template name:オブジェクト−ビルボード
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



<?php

//固定ページ おすすめ情報１のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

//ビルボードに設定するタイトル
global $billboard_title1;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_title1 =  get_post_meta($get_page_id,'billboard_title1' ,true); //ページIDを元にカスタムフィールドの値取得

//ページに設定する画像
global $img1;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$img1 =  get_post_meta($get_page_id,'image1' ,true); //ページIDを元にカスタムフィールドの値取得

//添付画像のキャプション
global $caption1;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$caption1 =  get_post_meta($get_page_id,'caption1' ,true); //ページIDを元にカスタムフィールドの値取得

//背景画像
global $back_image1;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_image1 =  get_post_meta($get_page_id,'background_image1' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報１のボタン色
global $recommend1_btn_color;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend1_btn_color =  get_post_meta($get_page_id,'recommend1_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報１のボタン名
global $recommend1_btn_name;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend1_btn_name =  get_post_meta($get_page_id,'recommend1_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報１のボタンリンク先
global $recommend1_btn_url;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend1_btn_url =  get_post_meta($get_page_id,'recommend1_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

//背景色
global $back_color1;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_color1 =  get_post_meta($get_page_id,'background_color1' ,true); //ページIDを元にカスタムフィールドの値取得

//タイトル色
global $title_color1;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$title_color1 =  get_post_meta($get_page_id,'title_color1' ,true); //ページIDを元にカスタムフィールドの値取得

//文字色
global $font_color1;
$get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$font_color1 =  get_post_meta($get_page_id,'font_color1' ,true); //ページIDを元にカスタムフィールドの値取得


//固定ページ おすすめ情報２ のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

//ビルボードに設定するタイトル
global $billboard_title2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_title2 =  get_post_meta($get_page_id,'billboard_title2' ,true); //ページIDを元にカスタムフィールドの値取得

//ページに設定する画像
global $img2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$img2 =  get_post_meta($get_page_id,'image2' ,true); //ページIDを元にカスタムフィールドの値取得

//添付画像のキャプション
global $caption2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$caption2 =  get_post_meta($get_page_id,'caption2' ,true); //ページIDを元にカスタムフィールドの値取得

//背景画像
global $back_image2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_image2 =  get_post_meta($get_page_id,'background_image2' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報２のボタン色
global $recommend2_btn_color;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend2_btn_color =  get_post_meta($get_page_id,'recommend2_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報２のボタン名
global $recommend2_btn_name;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend2_btn_name =  get_post_meta($get_page_id,'recommend2_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報２のボタンリンク先
global $recommend2_btn_url;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend2_btn_url =  get_post_meta($get_page_id,'recommend2_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

//背景色
global $back_color2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_color2 =  get_post_meta($get_page_id,'background_color2' ,true); //ページIDを元にカスタムフィールドの値取得

//タイトル色
global $title_color2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$title_color2 =  get_post_meta($get_page_id,'title_color2' ,true); //ページIDを元にカスタムフィールドの値取得

//文字色
global $font_color2;
$get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$font_color2 =  get_post_meta($get_page_id,'font_color2' ,true); //ページIDを元にカスタムフィールドの値取得



//固定ページ おすすめ情報３ のカスタムフィールドより入力されたDATAを他ページでも使用可能にする


//ビルボードに設定するタイトル
global $billboard_title3;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_title3 =  get_post_meta($get_page_id,'billboard_title3' ,true); //ページIDを元にカスタムフィールドの値取得

//ページに設定する画像
global $img3;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$img3 =  get_post_meta($get_page_id,'image3' ,true); //ページIDを元にカスタムフィールドの値取得

//添付画像のキャプション
global $caption3;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$caption3 =  get_post_meta($get_page_id,'caption3' ,true); //ページIDを元にカスタムフィールドの値取得

//背景画像
global $back_image3;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_image3 =  get_post_meta($get_page_id,'background_image3' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報３のボタン色
global $recommend3_btn_color;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend3_btn_color =  get_post_meta($get_page_id,'recommend3_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報３のボタン名
global $recommend3_btn_name;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend3_btn_name =  get_post_meta($get_page_id,'recommend3_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

//おすすめ情報３のボタンリンク先
global $recommend3_btn_url;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$recommend3_btn_url =  get_post_meta($get_page_id,'recommend3_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

//背景色
global $back_color3;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$back_color3 =  get_post_meta($get_page_id,'background_color3' ,true); //ページIDを元にカスタムフィールドの値取得

//タイトル色
global $title_color3;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$title_color3 =  get_post_meta($get_page_id,'title_color3' ,true); //ページIDを元にカスタムフィールドの値取得

//文字色
global $font_color3;
$get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$font_color3 =  get_post_meta($get_page_id,'font_color3' ,true); //ページIDを元にカスタムフィールドの値取得



//　TOPビルボードエリア設定

//ビルボードに設定する背景画像1
global $billboard_bg_img1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_bg_img1     =  get_post_meta($get_page_id,'billboard_bg_img1' ,true); //ページIDを元にカスタムフィールドの値取得

//ビルボードに設定する背景画像2
global $billboard_bg_img2;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_bg_img2     =  get_post_meta($get_page_id,'billboard_bg_img2' ,true); //ページIDを元にカスタムフィールドの値取得

//ビルボードに設定する背景画像3
global $billboard_bg_img3;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_bg_img3     =  get_post_meta($get_page_id,'billboard_bg_img3' ,true); //ページIDを元にカスタムフィールドの値取得


?>

<article>
<!-- ビルボード -->

<section class="branding">


    <!-- Navigation -->
    <? $osusume = $obj['recommendations']; ?>

    <?php

    $url = home_url();

    $imgurl = wp_get_attachment_image_src($head_image, 'full');//サイズは自由に変更してね
    //サイズは自由に変更してね
    if ($imgurl == null){
        // 画像が無い場合の処理

        echo '<nav class="navbarHeader" role="navigation">';


    }else{ ?>

    <?php
        echo '<nav class="navbarHeader" role="navigation" style="background: url(\'' . $imgurl[0] . '\') repeat center top;">';

    ?>

    <?php  } ?>

    <!-- top nav -->


    <?php echo '<a class="navbar-brand" href="' . $url . '">'; ?>
    <img class="MainVisual__logoImg img-responsive" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    </a>


    <ul class="nav navbar-right nav-address">

        <li><h4 class="pull-right hidden-xs" style="color:#fff;"><?php echo $obj['address']; ?></h4></li>
        <li><h3 class="pull-right"  style="color:#fff;"><span data-action="call" data-tel="<?php echo $obj['tel']; ?>"><i class="fas fa-phone-square"></i>&nbsp;<?php echo $obj['tel']; ?></span></h3></li>

    </ul>

    </nav>
    <!-- end nav -->

<!-- Full Page Image Background Carousel Header -->
<div id="myCarousel" class="carousel slide  carousel-slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">

        <!-- 1枚目 -->
        <!-- カスタムフィールド　ビルボードで背景変更可 -->

        <?php

        $imgback_url = null;
        $imgback_url = wp_get_attachment_image_src($billboard_bg_img1, 'full'); //サイズは自由に変更してね
        if ($imgback_url == null){
            // 画像が無い場合の処理

            echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); height:700px;" alt="' . $osusume[0]['title'] . '" >';

        }else{

            echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); height:700px;" alt="' . $osusume[0]['title'] . '" >';
        }

        ?>

            <?php

            if ($recommend1_btn_url == null){

                echo '<a href="recommend1">';

            }else{

                echo '<a href="' . $recommend1_btn_url . '/" >';
            }

            ?>


            <?php

            $imgurl = wp_get_attachment_image_src($img1, 'full'); //サイズは自由に変更してね
            if ($imgurl == null){
                // 画像が無い場合の処理

                echo '<img src="' . $osusume[0]['image'] . '" class="branding-imgL wp-post-image" alt="' . $osusume[0]['title'] . '">';

            }else{

                echo '<img src="' . $imgurl[0] . '" class="branding-imgL" alt="' . $osusume[0]['title'] . '">';
            }

            ?>

        </a>

        <div class="carousel-caption">

            <?php

            if ($billboard_title1 == null){
                // 固定ページ$billboard_title1が無い場合の処理

                echo '<h2 style="color:' . $title_color1 . ';">'.$osusume[0]['title'].'</h2>';

            }else{

                echo '<h2 style="color:' . $title_color1 . ';">'.$osusume[0]['title'].'</h2>';
            //    echo '<h2 style="color:' . $title_color1 . ';">' . $billboard_title1 . '</h2>';

            }

            ?>

            <?php

            if ($caption1 == null){
                // 固定ページ$caption1が無い場合の処理

                echo '<h4 style="color:' . $font_color1 . ';">' . $osusume[0]['description'] . '</h4>';

            }else{

                echo '<h4 style="color:' . $font_color1 . ';">' . $osusume[0]['description'] . '</h4>';
            //    echo '<h4 style="color:' . $font_color1 . ';">' . $caption1 . '</h4>';

            }

            ?>

            <?php

            if ($recommend1_btn_url == null){
                // 固定ページ$recommend1_btn_urlが無い場合の処理

                echo '<a href="recommend1" class="btn btn-danger" style="background-color:' . $recommend1_btn_color . ';">詳細を見る</a>';

            }else{

                echo '<a href="' . $recommend1_btn_url . '/" class="btn btn-danger" style="background-color:' . $recommend1_btn_color . ';">'. $recommend1_btn_name .'</a>';
            }

            ?>


        </div><!-- /.carousel-caption -->


    </div><!-- /.item active bgImage -->

    <!-- 2枚目 -->
    <!-- カスタムフィールド　ビルボードで背景変更可 -->

    <?php

    $imgback_url = null;
    $imgback_url = wp_get_attachment_image_src($billboard_bg_img2, 'full'); //サイズは自由に変更してね
    if ($imgback_url == null){
        // 画像が無い場合の処理

        echo '<div class="item bgImage" style="background-image:url(\'' . $osusume[1]['image'] . '\'); height:700px;" alt="' . $osusume[1]['title'] . '" >';

    }else{

        echo '<div class="item bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); height:700px;" alt="' . $osusume[1]['title'] . '" >';
    }

    ?>

    <?php

    if ($recommend1_btn_url == null){

        echo '<a href="recommend2">';

    }else{

        echo '<a href="' . $recommend1_btn_url . '/" >';
    }

    ?>
        <?php

        $imgurl = wp_get_attachment_image_src($img2, 'full'); //サイズは自由に変更してね
        if ($imgurl == null){
            // 画像が無い場合の処理

            echo '<img src="' . $osusume[1]['image'] . '" class="branding-imgL wp-post-image" alt="' . $osusume[1]['title'] . '">';

        }else{

            echo '<img src="' . $imgurl[0] . '" class="branding-imgL wp-post-image" alt="' . $osusume[1]['title'] . '">';
        }

        ?>

    </a>

    <div class="carousel-caption">

        <?php

        if ($billboard_title2 == null){
            // 固定ページ$billboard_title2が無い場合の処理

            echo '<h2 style="color:' . $title_color2 . ';">'.$osusume[1]['title'].'</h2>';

        }else{

            echo '<h2 style="color:' . $title_color2 . ';">'.$osusume[1]['title'].'</h2>';
        //    echo '<h2 style="color:' . $title_color2 . ';">' . $billboard_title2 . '</h2>';

        }

        ?>

        <?php

        if ($caption2 == null){
            // 固定ページ$caption2が無い場合の処理

            echo '<h4 style="color:' . $font_color2 . ';">' . $osusume[1]['description'] . '</h4>';

        }else{

            echo '<h4 style="color:' . $font_color2 . ';">' . $osusume[1]['description'] . '</h4>';
        //    echo '<h4 style="color:' . $font_color2 . ';">' . $caption2 . '</h4>';

        }

        ?>

        <?php

        if ($recommend2_btn_url == null){
            // 固定ページ$recommend2_btn_urlが無い場合の処理

                echo '<a href="recommend2" class="btn btn-danger" style="background-color:' . $recommend2_btn_color . ';">詳細を見る</a>';

            }else{

                echo '<a href="' . $recommend2_btn_url . '/" class="btn btn-danger" style="background-color:' . $recommend2_btn_color . ';">'. $recommend2_btn_name .'</a>';

        }

        ?>


    </div><!-- /.carousel-caption -->

</div><!-- /.item bgImage -->

    <!-- 3枚目 -->
    <!-- カスタムフィールド　ビルボードで背景変更可 -->

<?php

    $imgback_url = null;
    $imgback_url = wp_get_attachment_image_src($billboard_bg_img3, 'full'); //サイズは自由に変更してね
    if ($imgback_url == null){
        // 画像が無い場合の処理

        echo '<div class="item bgImage" style="background-image:url(\'' . $osusume[2]['image'] . '\'); height:700px;" alt="' . $osusume[1]['title'] . '" >';

    }else{

        echo '<div class="item bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); height:700px;" alt="' . $osusume[2]['title'] . '" >';
    }

?>

<?php

if ($recommend1_btn_url == null){

    echo '<a href="recommend3">';

}else{

    echo '<a href="' . $recommend1_btn_url . '/" >';
}

?>
        <?php

        $imgurl = wp_get_attachment_image_src($img3, 'full'); //サイズは自由に変更してね
        if ($imgurl == null){
            // 画像が無い場合の処理

            echo '<img src="' . $osusume[2]['image'] . '" class="branding-imgL wp-post-image" alt="' . $osusume[2]['title'] . '">';

        }else{

            echo '<img src="' . $imgurl[0] . '" class="branding-imgL wp-post-image" alt="' . $osusume[2]['title'] . '">';
        }

        ?>

    </a>

    <div class="carousel-caption">

        <?php

        if ($billboard_title3 == null){
            // 固定ページ$billboard_title3が無い場合の処理

            echo '<h2 style="color:' . $title_color3 . ';">'.$osusume[2]['title'].'</h2>';

        }else{

            echo '<h2 style="color:' . $title_color3 . ';">'.$osusume[2]['title'].'</h2>';
        //    echo '<h2 style="color:' . $title_color3 . ';">' . $billboard_title3 . '</h2>';

        }

        ?>

        <?php

        if ($caption3 == null){
            // 固定ページ$caption3が無い場合の処理

            echo '<h4 style="color:' . $font_color3 . ';">' . $osusume[2]['description'] . '</h4>';

        }else{

            echo '<h4 style="color:' . $font_color3 . ';">' . $osusume[2]['description'] . '</h4>';
        //    echo '<h4 style="color:' . $font_color3 . ';">' . $caption3 . '</h4>';

        }

        ?>

        <?php

        if ($recommend3_btn_url == null){
            // 固定ページ$recommend3_btn_urlが無い場合の処理

                echo '<a href="recommend3" class="btn btn-danger" style="background-color:' . $recommend3_btn_color . ';">詳細を見る</a>';

            }else{

                echo '<a href="' . $recommend3_btn_url . '/" class="btn btn-danger" style="background-color:' . $recommend3_btn_color . ';">'. $recommend1_btn_name .'</a>';
            }

        ?>


    </div><!-- /.carousel-caption -->

</div><!-- /.item bgImage -->

<!-- Controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="icon-prev"></span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="icon-next"></span>
</a>

</div><!-- /.carousel-inner -->

</div><!-- /#myCarousel -->

</section><!-- #section branding -->

</article>
