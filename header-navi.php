<?php
/**
 The template name:header-navi
 */
get_header(); ?>




<header>

    <!-- Navigation -->

    <?php

    $url = home_url();

    $imgurl = wp_get_attachment_image_src($head_image, 'full');//サイズは自由に変更してね
    //サイズは自由に変更してね
    if ($imgurl == null){
        // 画像が無い場合の処理
        echo '<nav class="navbar" role="navigation">';


    }else{ ?>

    <?php
        echo '<nav class="navbar" role="navigation" style="background: url(\'' . $imgurl[0] . '\') repeat center top;">';

    ?>

    <?php  } ?>

    <!-- top nav -->

        <div class="container"><!-- 無くても良い -->

            <div class="navbar-header">

                <!-- toggle -->
                <button type="button" class="navbar-toggle hidden-sm hidden-md hidden-lg" data-toggle="collapse" data-target="#top-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- top menu -->
            <div class="collapse navbar-collapse" id="top-nav">

                 <div class="list">

                <!-- main navbar -->
                <!--リンクのリスト メニューリスト-->
                <?php get_template_part( 'navi' ); ?>

                </div>

            </div>

        </div>
        <!-- end container -->
    </nav>
    <!-- end nav -->

</header>
