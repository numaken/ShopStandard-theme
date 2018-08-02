<?php
/**
 The template name:おすすめ情報（App）
 */
get_header(); ?>

 <? $osusume = $obj['recommendations']; ?>


        <div class="cd-3d-portfolio">

            <div class="projects">
                <ul class="row">
                    <li class="front-face selected">
                        <div class="project-wrapper">

                        <?php

                            $imgurl = wp_get_attachment_image_src($img1, 'garaly_size'); //サイズは自由に変更してね
                            if ($imgurl == null){
                            // 画像が無い場合の処理

                                echo '<div class="project-image" style="background: url(' . $osusume[0]['image'] . '); background-size: cover;height: 25%;" alt="' . $osusume[0]['title'] . '">';

                            }else{ ?>

                            <?php

                                echo '<div class="project-image" style="background: url(' . $imgurl[0] . '); background-size: cover; height: 25%;" alt="' . $osusume[0]['title'] . '">';

                            ?>

                        <?php  } ?>

                                <div class="project-title">
                                    <h2><? echo $osusume[0]['title']; ?></h2>
                                </div>
                            </div> <!-- .project-image -->

                            <div class="project-content">
                                <div>
                                    <p><? echo $osusume[0]['description']; ?></p>
                                </div>
                            </div> <!-- .project-content -->

                            <a href="#0" class="close-project">Close</a>
                        </div> <!-- .project-wrapper -->
                    </li>



                </ul> <!-- .row -->

                <ul class="row">
                    <li class="front-face selected">
                        <div class="project-wrapper">
                        <?php

                            $imgurl = wp_get_attachment_image_src($img2, 'garaly_size'); //サイズは自由に変更してね
                            if ($imgurl == null){
                            // 画像が無い場合の処理

                                echo '<div class="project-image" style="background: url(' . $osusume[1]['image'] . '); background-size: cover;height: 25%;" alt="' . $osusume[0]['title'] . '">';

                            }else{ ?>

                            <?php

                                echo '<div class="project-image" style="background: url(' . $imgurl[1] . '); background-size: cover;height: 25%;" alt="' . $osusume[0]['title'] . '">';

                            ?>

                        <?php  } ?>


                                <div class="project-title">
                                    <h2><? echo $osusume[1]['title']; ?></h2>
                                </div>
                            </div> <!-- .project-image -->

                            <div class="project-content">
                                <div>
                                    <p><? echo $osusume[1]['description']; ?></p>
                                </div>
                            </div> <!-- .project-content -->

                            <a href="#0" class="close-project">Close</a>
                        </div> <!-- .project-wrapper -->
                    </li>


                </ul> <!-- .row -->

                <ul class="row">
                    <li class="front-face selected">
                        <div class="project-wrapper">
                        <?php

                            $imgurl = wp_get_attachment_image_src($img2, 'garaly_size'); //サイズは自由に変更してね
                            if ($imgurl == null){
                            // 画像が無い場合の処理

                                echo '<div class="project-image" style="background: url(' . $osusume[2]['image'] . '); background-size: cover;height: 25%;" alt="' . $osusume[0]['title'] . '">';

                            }else{ ?>

                            <?php

                                echo '<div class="project-image" style="background: url(' . $imgurl[2] . '); background-size: cover;height: 25%;" alt="' . $osusume[0]['title'] . '">';

                            ?>

                        <?php  } ?>

                                <div class="project-title">
                                    <h2><? echo $osusume[2]['title']; ?></h2>
                                </div>
                            </div> <!-- .project-image -->

                            <div class="project-content">
                                <div>
                                    <p><? echo $osusume[2]['description']; ?></p>
                                </div>
                            </div> <!-- .project-content -->

                            <a href="#0" class="close-project">Close</a>
                        </div> <!-- .project-wrapper -->
                    </li>


                </ul> <!-- .row -->
            </div><!-- .projects -->

            <a href="#0" class="cd-top">Top</a>
        </div>

<?php get_footer(); ?>
