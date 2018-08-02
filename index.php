<?php get_header(); ?>

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->


<? $osusume = $obj['recommendations']; ?>

<div id="wrapper">

    <main id="main" class="site-main" role="main">

            <!-- ビルボード -->

            <?php get_template_part( 'obj_ billboard' ); ?>

            <!-- Navigation -->

            <?php get_template_part( 'header-navi' ); ?>


        <!-- scrollbox1 -->
        <div class="parallax scrollbox1">

            <!-- /.おすすめ -->
            <?php get_template_part('obj_recommend' ); ?>

        </div>


<!-- Palalax Start-->

<?php

$imgurl = null;
$imgurl = wp_get_attachment_image_src($custom1_bg_image, 'full'); //サイズは自由に変更してね
if ($imgurl == null){
    // 画像が無い場合の処理

    echo '<div class="parallax parallax-bg img-bg-01 bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); background-color:' . $custom1_bg_color . '; height:600px;" alt="' . $osusume[0]['title'] . '" >';

}else{

    echo '<div class="parallax parallax-bg img-bg-01 bgImage" style="background-image:url(\'' . $imgurl[0] . '\'); background-color:' . $custom1_bg_color . '; height:600px;" alt="' . $osusume[0]['title'] . '" >';

}

?>

<!-- custom-page1 -->
    <?php get_template_part('obj_custompage1' ); ?>


</div>
<!-- Palalax End-->


        <?php

        //背景画像
        global $billboard_insta_img1;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_insta_img1 =  get_post_meta($get_page_id,'billboard_insta_img1' ,true); //ページIDを元にカスタムフィールドの値取得


        $imgurl = null;
        $imgurl = wp_get_attachment_image_src($billboard_insta_img1, 'full'); //サイズは自由に変更してね
        if ($imgurl == null){
            // 画像が無い場合の処理

        }else{

            echo '<div class="parallax scrollbox2" style="background:url(\'' . $imgurl[0] . '\') center repeat;">';
        }

        ?>


            <!-- instagram Start-->
            <?php

            global $instacheck;
            $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
            $instacheck  =  get_post_meta($get_page_id,'instaconnect' ,true); //ページIDを元にカスタムフィールドの値取得

            if ($instacheck == null) {

            }else{

                echo get_template_part('obj_instagram' );

            }

            ?>
            <!-- instagram End-->

        </div>



<!-- Palalax Start-->

<?php

$imgurl = null;
$imgurl = wp_get_attachment_image_src($custom2_bg_image, 'full'); //サイズは自由に変更してね
if ($imgurl == null){
    // 画像が無い場合の処理

    echo '<div class="parallax parallax-bg img-bg-02 bgImage" style="background-image:url(\'' . $osusume[1]['image'] . '\'); background-color:' . $custom2_bg_color . '; height:600px;" alt="' . $osusume[1]['title'] . '" >';

}else{

    echo '<div class="parallax parallax-bg img-bg-02 bgImage" style="background-image:url(\'' . $imgurl[0] . '\'); background-color:' . $custom2_bg_color . '; height:600px;" alt="' . $osusume[1]['title'] . '" >';

}

?>

<!-- custom-page1 -->
<?php get_template_part('obj_custompage2' ); ?>


</div>
<!-- Palalax End-->






            <?php

            //背景画像
            global $background_image_menus;
            $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
            $background_image_menus =  get_post_meta($get_page_id,'background_image_menus' ,true); //ページIDを元にカスタムフィールドの値取得


            $imgurl = null;
            $imgurl = wp_get_attachment_image_src($background_image_menus, 'full'); //サイズは自由に変更してね
            if ($imgurl == null){
                // 画像が無い場合の処理


            }else{

                echo '<div class="parallax scrollbox3" style="background:url(\'' . $imgurl[0] . '\') center repeat;">';
            }

            ?>

            <!-- menu -->
            <?php get_template_part('obj_menu' ); ?>

        </div>
        <div class="parallax parallax-bg img-bg-03">



        </div>



        <?php

        //背景画像
        global $background_image5;
        $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $background_image5 =  get_post_meta($get_page_id,'background_image5' ,true); //ページIDを元にカスタムフィールドの値取得


        $imgurl = null;
        $imgurl = wp_get_attachment_image_src($background_image5, 'full'); //サイズは自由に変更してね
        if ($imgurl == null){
            // 画像が無い場合の処理


        }else{

            echo '<div class="parallax scrollbox4" style="background:url(\'' . $imgurl[0] . '\') center repeat;">';
        }

        ?>

            <!-- blog -->

            <?php get_template_part('obj_blog' ); ?>

        </div>

<?php get_footer(); ?>
