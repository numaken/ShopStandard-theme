<?php

//固定ページのカスタムフィールドより入力されたDATAを他ページでも使用可能にする
global $code;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$code =  get_post_meta($get_page_id,'apicode' ,true); //ページIDを元にカスタムフィールドの値取得

    //　analytics_id情報
global $analyticsid;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$analyticsid =  get_post_meta($get_page_id,'analytics_id' ,true); //ページIDを元にカスタムフィールドの値取得

$json = @file_get_contents($code);
            if($http_response_header[0] == 'HTTP/1.1 404 Not Found'){
            print '404 Not Foundです。';
            }
global $obj;
$obj = json_decode($json, true);

?>

<? $osusume = $obj['recommendations'] ?>


<?php if ( is_page(array('recommend-app','blog-app','about-app' )) ) ://特定のカテゴリーの場合 ?>


<?php else://通常ページの場合 ?>

<!-- Palalax Start-->

<?php

//カスタム3の背景画像

global $custom3_bg_image;
$get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$custom3_bg_image =  get_post_meta($get_page_id,'custom3_bg_image' ,true); //ページIDを元にカスタムフィールドの値取得


$imgurl = null;
$imgurl = wp_get_attachment_image_src($custom3_bg_image, 'full'); //サイズは自由に変更してね
if ($imgurl == null){
    // 画像が無い場合の処理

    echo '<div class="parallax parallax-bg img-bg-04 bgImage" style="background-image:url(\'' . $osusume[2]['image'] . '\'); background-color:' . $custom3_bg_color . '; height:600px;" alt="' . $osusume[2]['title'] . '" >';

}else{

    echo '<div class="parallax parallax-bg img-bg-04 bgImage" style="background-image:url(\'' . $imgurl[0] . '\'); background-color:' . $custom3_bg_color . '; height:600px;" alt="' . $osusume[2]['title'] . '" >';

}

?>

<!-- App DownLoad -->
<?php get_template_part('obj_appstore' ); ?>

</div>
<!-- Palalax End-->

<?php endif; ?>


<?php if ( is_page(array('recommend-app','blog-app','about-app' )) ) ://特定のカテゴリーの場合 ?>


<?php else://通常ページの場合 ?>

<?php

//フッター背景画像
global $footer_bg_img1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$footer_bg_img1     =  get_post_meta($get_page_id,'footer_bg_img1' ,true); //ページIDを元にカスタムフィールドの値取得

$imgurl = null;
$imgurl = wp_get_attachment_image_src($footer_bg_img1, 'full'); //サイズは自由に変更してね
if ($imgurl == null){
    // 画像が無い場合の処理

    echo '<div class="parallax scrollbox5">';

}else{

    echo '<div class="parallax scrollbox5" style="background:url(\'' . $imgurl[0] . '\') center repeat; background-size: cover;">';
}

?>



<!-- shop -->

<?php get_template_part('obj_shop' ); ?>

<?php echo '</div>'; ?>

<?php endif; ?>


<!--
<div class="parallax parallax-bg img-bg-05">


</div>

<div class="parallax scrollbox6">


</div>
-->
</main>



    <footer>

        <?php if(is_page( array( 'about-app' ) ) ): ?>


        <?php

        global $reserve_sw;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $reserve_sw     =  get_post_meta($get_page_id,'reserve_switch' ,true); //ページIDを元にカスタムフィールドの値取得

        if ($reserve_sw == null){

        }else{
            echo '<div class="col-md-12 col-xs-12">';

            echo '<nav class="navbar2 navbar-fixed-bottom hidden-md hidden-lg" role="navigation">';
            echo '<div class="container">';
            echo '<div class="row">';
            //              echo '<button type="button" class="btn btn-success btn-lg btn-block hidden-md hidden-lg" style="padding: 10px 20px; margin-top: -20px;"><a href="' . site_url() . '/book/" style="color:#fff;font-weight: 700;">ご予約は こちらから</a></button>'; //
            echo '<button type="button" class="btn btn-success btn-lg btn-block hidden-md hidden-lg" style="padding: 10px 20px; margin-top: -20px;"><target="window_name" onClick="disp(\'/wp/book/\')" style="color:#fff;font-weight: 700;">ご予約は こちらから</button>';
            echo '</div>';
            echo '</div>';
            echo '</nav>';

            echo '</div>';

        }

        ?>


        <?php else: ?>
        <?php endif; ?>


        <?php if ( is_page(array('recommend-app','blog-app','about-app' )) ) ://特定のカテゴリーの場合 ?>


        <?php else://通常ページの場合 ?>

            <div class="credits">
                <p>Copyright&nbsp;&copy;<?php echo date('Y'); ?>&nbsp;<a href="<?php echo home_url(); ?>" title=""><?php echo $obj['title']; ?></a>&nbsp;All Rights Reserved.</p>
            </div>

        <?php endif; ?>


    </footer>

</div><!-- #wrapper -->





    <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>
    <script src="https://ajax.googleapis.com/ajax/libs/hammerjs/2.0.8/hammer.min.js"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/selectordie.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/owl.carousel.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.matchHeight.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/picturefill.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.imageScroll.min.js"></script>

    <script src="<?php echo get_template_directory_uri(); ?>/js/3dfolding.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/3dportfolio.js"></script>


    <!--<script src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>-->
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/mislider.js"></script>


    <script>

            function disp(url){

            window.open(url, "window_name", "width=640,height=1136,scrollbars=1,resizable=1");

        }

    </script>

    <script>
        jQuery(function ($) {
            var slider = $('.mis-stage').miSlider({
                //  The height of the stage in px. Options: false or positive integer. false = height is calculated using maximum slide heights. Default: false
                //stageHeight: 380,
                //  Number of slides visible at one time. Options: false or positive integer. false = Fit as many as possible.  Default: 1
                slidesOnStage: false,
                //  The number of slides to increment with
                //  Autoplay and Nav Buttons.
                //  Options: positive or negative integer.
                //  Positive integer = Slide left.
                //  Negative integer = Slide right.
                increment: 1,
                //  The location of the current slide on the stage. Options: 'left', 'right', 'center'. Defualt: 'left'
                slidePosition: 'center',
                //  The slide to start on. Options: 'beg', 'mid', 'end' or slide number starting at 1 - '1','2','3', etc. Defualt: 'beg'
                slideStart: 'mid',
                //  The relative percentage scaling factor of the current slide - other slides are scaled down. Options: positive number 100 or higher. 100 = No scaling. Defualt: 100
                slideScaling: 150,
                //  The vertical offset of the slide center as a percentage of slide height. Options:  positive or negative number. Neg value = up. Pos value = down. 0 = No offset. Default: 0
                offsetV: -5,
                //  Center slide contents vertically - Boolean. Default: false
                centerV: true,
                //  Opacity of the prev and next button navigation when not transitioning. Options: Number between 0 and 1. 0 (transparent) - 1 (opaque). Default: .5
                navButtonsOpacity: 1
            });
        });
    </script>


    <!-- Script to Activate the Carousel -->
    <script>
        $('.carousel').carousel({
            interval: 5000 //changes the speed
        })
    </script>

    <!-- スワイプ. -->
    <script>
        $(function()
        {
            var carousel = $('#myCarousel');
            var hammer = new Hammer(carousel[0]);
            hammer.on('swipeleft', function(){ carousel.carousel('next'); });//--- 左にスワイプしたら次の画像に切り替え
            hammer.on('swiperight', function(){ carousel.carousel('prev'); }); //--- 右にスワイプしたら前の画像に切り替え
        });
    </script>


    <!-- page-top. -->
    <script>

        $(function() {
            var topBtn = $('#page-top');
            topBtn.hide();
            //スクロールが100に達したらボタン表示
            $(window).scroll(function () {
                if ($(this).scrollTop() > 500) {
                    topBtn.fadeIn();
                } else {
                    topBtn.fadeOut();
                }
            });
            //スクロールしてトップ
            topBtn.click(function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 500);
                return false;
            });
        });

    </script>

    <script>
        $('.img-holder').imageScroll({
//            image: null,
//            imageAttribute: 'image',
//            container: $('body'),
//            speed: 0.2,
//            coverRatio: 0.75,
//            holderMinHeight: 200,
//            extraHeight: 0,
//            mediaWidth: 1600,
//            mediaHeight: 900,
//            parallax: true,
//            touch: false
        });
    </script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', <?php echo "'" . $analyticsid . "', 'auto');" ?>;
        ga('send', 'pageview');
    </script>


</body>
</html>
