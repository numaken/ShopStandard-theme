<?php
/**
 The template name:page-about
 */
get_header(); ?>

<header>

    <!-- top nav -->
    <nav class="navbar navbar-default">

        <div class="container"><!-- 無くても良い -->

            <div class="navbar-header">

                <!-- logo img -->
                <?php

                $url = home_url();

                $imgurl = wp_get_attachment_image_src($logo, 'full');//サイズは自由に変更してね
                //サイズは自由に変更してね
                if ($imgurl == null){
                    // 画像が無い場合の処理

                    echo '<a class="navbar-brand hidden-xs hidden-sm" href="' . $url . '" style="background-color:' . $back_color4 . '"><img class="brand-logo" src="' . $obj['bottom_patch_url'] . '" height="" width="" alt="" />' . '</a>';
                    echo '<h1><a class="navbar-brand" href="' . $url . '" style="background-color:' . $back_color4 . '">' . $obj['title'] . '</a></h1>';


                }else{ ?>

                <?php
                    echo '<a class="navbar-brand hidden-xs hidden-sm" href="' . $url . '" style="background-color:' . $back_color4 . '"><img class="brand-logo" src="' . $imgurl[0] . '" height="" width="" alt="" />' . $obj['title'] . '</a>';

                ?>

                <?php  } ?>

                <!-- toggle -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- top menu -->
            <div class="collapse navbar-collapse" id="top-nav">

                <!-- main navbar -->
                <!--リンクのリスト メニューリスト-->
                <?php get_template_part( 'navi' ); ?>


                <!-- right navbar
<ul class="nav navbar-nav navbar-right">
<li>
<a href=""><i class="fa fa-sign-in"></i> お問合せはこちら</a>
</li>
</ul>-->
            </div>
        </div>
        <!-- end container -->
    </nav>
    <!-- end nav -->

</header>

<body>
<!--[if lt IE 7]><p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p><![endif]-->
<div class="bg_loader"><div class="loader"></div></div>

    <div id="page" class="hfeed site">

<?php get_template_part( 'side-menu' ); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">

                <div id="upperbar-selector">

<?php get_template_part( 'navi' ); ?>


                </div><!-- #upperbar-selector -->

                <div class="pure-pad pure-g">

                   <div class="pure-u-1  pure-u-sm-1 pure-u-md-1 pure-u-lg-1 pure-u-xl-1 mm-pad-small ta-center mm-line-color-three">
                         <h5>弊社連絡先番号変更のお知らせ</h5>
                      <span class="line_break_two"><i class="ion-more"></i></span>
                         <h5>新 TEL 03-4283-6196／
FAX 03-4285-3568</h5>お手数ではございますが、ご変更の程、宜しくお願い申し上げます。</p>
<!--                         <a class="mm-btn mm-btn-small mm-ripple" href="#" title="">Order Now <i class="ion-chevron-right"></i></a> -->
                   </div>

                </div>





                 <div class="pure-pad pure-g mm-container">

                    <div class="pure-u-1 pure-u-sm-2-5 pure-u-md-2-5pure-u-lg-2-5  pure-u-xl-2-5 mm-color-one same-height mm-pad-big">
                        <h4>ご注文・お問い合わせは</h4>
                        <span>全国どこでも１本からでも業販・通販いたします。 尚、FAXでのご注文は24時間受け付けております。 製品に付いてのご質問・御要望などお気軽にお問い合わせてください。
                        <br>
                        〒161-0032<br>
                        東京都新宿区中落合4-5-4<br>
                        TEL 03-4283-6196<br>
                        FAX 03-4285-3568<br>
                        E-MAIL:info@mac-mrd.com
                        </span>

                    </div>
                    <div class="pure-u-1 pure-u-sm-3-5 pure-u-md-3-5 pure-u-lg-3-5 pure-u-xl-3-5 full-image same-height">
<img src="<?php echo get_template_directory_uri(); ?>/images/ev.jpg" alt="">
                    </div>

                 </div>

            </main>
        </div><!-- #primary -->

<?php get_footer(); ?>
