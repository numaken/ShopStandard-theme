<?php
/**
 The template name:おすすめ情報OLD（App）
 */
get_header(); ?>


    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">

                <section id="info" class="info-app">

                    <div class="col-xs-12">


                        <? $osusume = $obj['recommendations']; ?>

                        <?php

                            $imgurl = wp_get_attachment_image_src($img1, 'garaly_size'); //サイズは自由に変更してね
                            if ($imgurl == null){
                            // 画像が無い場合の処理

                                echo '<img class="content-box-player img-responsive" src="' . $osusume[0]['image'] . '"  width="100%" alt="' . $osusume[0]['title'] . '">';

                            }else{ ?>

                            <?php

                                echo '<img class="content-box-player img-responsive" src="' . $imgurl[0] . '"  width="100%" alt="' . $osusume[0]['title'] . '">';

                            ?>

                        <?php  } ?>

                    </div><!-- /.col-xs-12 -->

                    <div class="col-xs-12">

                        <div class="content-box">

                            <header class="entry-header">
                                <h2 class="page-header"><? echo $osusume[0]['title']; ?></h2>
                            </header>
                            <p><? echo $osusume[0]['description']; ?></p>

                        </div>

                    </div><!-- /.col-xs-12 -->

                    <div class="col-xs-12">

                        <?php

                            $imgurl = wp_get_attachment_image_src($img2, 'garaly_size'); //サイズは自由に変更してね
                            if ($imgurl == null){
                            // 画像が無い場合の処理

                                echo '<img class="content-box-player img-responsive" src="' . $osusume[1]['image'] . '"  width="100%" alt="' . $osusume[1]['title'] . '">';

                            }else{ ?>

                            <?php

                                echo '<img class="content-box-player img-responsive" src="' . $imgurl[0] . '"  width="100%" alt="' . $osusume[1]['title'] . '">';

                            ?>

                        <?php  } ?>

                    </div><!-- /.col-xs-12 -->

                    <div class="col-xs-12">

                        <div class="content-box">

                            <header class="entry-header">
                                <h2 class="page-header"><? echo $osusume[1]['title']; ?></h2>
                            </header>
                            <p><? echo $osusume[1]['description']; ?></p>

                        </div>

                    </div><!-- /.col-xs-12 -->

                    <div class="col-xs-12">

                        <?php

                            $imgurl = wp_get_attachment_image_src($img3, 'garaly_size'); //サイズは自由に変更してね
                            if ($imgurl == null){
                            // 画像が無い場合の処理

                                echo '<img class="content-box-player img-responsive" src="' . $osusume[2]['image'] . '"  width="100%" alt="' . $osusume[2]['title'] . '">';

                            }else{ ?>

                            <?php

                                echo '<img class="content-box-player img-responsive" src="' . $imgurl[0] . '"  width="100%" alt="' . $osusume[2]['title'] . '">';

                            ?>

                        <?php  } ?>

                    </div><!-- /.col-xs-12 -->

                    <div class="col-xs-12">

                        <div class="content-box">

                            <header class="entry-header">
                                <h2 class="page-header"><? echo $osusume[2]['title']; ?></h2>
                            </header>
                            <p><? echo $osusume[2]['description']; ?></p>

                        </div>

                    </div><!-- /.col-md-5 -->

                </section>

                <span class="content_bottom"></span>

        </div><!-- /.row -->


<?php get_footer(); ?>
