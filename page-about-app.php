<?php
/**
 The template name:店舗情報（App）
 */
get_header(); ?>

<div id="wrapper">

    <main id="main">

        <article>

            <!-- Page Content -->
            <div class="container">

                <!-- Heading Row -->
                <div class="row">

                    <span class="content_top"></span>

                    <section id="shop" class="about-app">

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9" style="margin-bottom:1rem">
                                <iframe class="embed-responsive-item" src="<?php echo $obj['authored_index_url']; ?>"></iframe>
                            </div><!-- 16:9 aspect ratio -->


                                <div class="panel panel-default">
                                    <div class="panel-body">

                                        <header class="entry-header">
                                            <h2 class="page-header"><?php echo $obj['title']; ?></h2>
                                        </header>
                                        <p><?php echo $obj['description']; ?></p>

                                        <?php if ( have_posts() ) : ?>
                                        <?php while ( have_posts() ) : the_post() ?>
                                        <hr>
                                        <p>
                                            <?php the_content(); ?>
                                        </p>

                                    </div>
                                </div>
                        </div><!-- /.col-md-5 -->

                        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">


                        <!-- gmap -->

                        <script  async defer
                                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5uH8cR4XUJSgMigiJKkXxwDlGEv3zvDQ&callback=initMap">
                        </script>

                        <script>

                            function initMap() {
                                var map = new google.maps.Map(document.getElementById('map'), {
                                  zoom: 15,
                                  center: {lat: <?php echo $obj['lat'] ?>, lng: <?php echo $obj['lng'] ?>}
                                });

                                marker = new google.maps.Marker({
                                  map: map,
                                  draggable: true,
                                  disableDefaultUI: false,
                                  animation: google.maps.Animation.DROP,
                                  position: {lat: <?php echo $obj['lat'] ?>, lng: <?php echo $obj['lng'] ?>}
                                });
                                marker.addListener('click', toggleBounce);
                              }

                              function toggleBounce() {
                                if (marker.getAnimation() !== null) {
                                  marker.setAnimation(null);
                                } else {
                                  marker.setAnimation(google.maps.Animation.BOUNCE);
                                }
                              }

                        </script>

                            <div class="panel panel-default">
                                <div class="panel-body">

                                <table class="company">
                                    <tbody>
                                        <tr>
                                            <th class="arrow_box">店名</th>
                                            <td style="font-weight:700;"><?php echo $obj['title']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="arrow_box">TEL</th>
                                            <td style="font-weight:700;">
                                                <span data-action="call" data-tel="<?php echo $obj['tel']; ?>">&nbsp;<?php echo $obj['tel']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="arrow_box">住所</th>
                                            <td><?php echo $obj['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="arrow_box">営業時間</th>

                                                <?php
                                                    $num1 = $obj['business_hour_from'];
                                                    $from = substr($num1,0,5);
                                                    $num2 = $obj['business_hour_to'];
                                                    $to = substr($num2,0,5);
                                                ?>

                                            <td><?php echo $from; ?> 〜 <?php echo $to; ?><br>
                                                <span><?php echo $obj['business_hour_remarks']; ?></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="arrow_box">定休日</th>
                                            <td><?php echo $obj['regular_holiday']; ?></td>
                                        </tr>
                                        <tr>
                                            <th class="arrow_box">HP</th>
                                            <td>
                                                <a href="<?php echo $obj['site_url']; ?>"><?php echo $obj['site_url']; ?></a></td>
                                        </tr>
                                    </tbody>
                                </table>

                            <?php

                            global $sms_sw;
                            $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                            $sms_sw     =  get_post_meta($get_page_id,'sms_switch' ,true); //ページIDを元にカスタムフィールドの値取得

                            global $sms;
                            $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                            $sms     =  get_post_meta($get_page_id,'sms_no' ,true); //ページIDを元にカスタムフィールドの値取得

                            global $e_mail;
                            $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                            $e_mail      = get_post_meta($get_page_id,'email' ,true); //ページIDを元にカスタムフィールドの値取得




                            if ($sms_sw == null){

                            }else{

                                echo '<button type="button" class="btn btn-primary btn-lg btn-block hidden-md hidden-lg" style="padding: 8px 20px; border-radius: 4px;">';
                                echo '<a href="sms:' . $sms . '&body=お問合せ: " style="color:#fff;font-weight: 700;">SMSでお問合せ・ご相談</a>';
                                echo '</button>';
                                echo '<small class="ta-center" style="font-size:10px;">';
                                echo '※SMS送信の場合、送信文字数に応じて1回あたり3～30円掛かります。（ご利用の機種またはアプリにより1回に送信可能な文字数が異なります）';
                                echo '</small>';

                            }

                            ?>

                            <!-- 地図のキャンパス -->
                            <div class="map-embed" style="width: 100%; height: 225px;">
                                <div id="map">ここに地図が表示されます</div>

                            </div>


                            <button type="button" class="btn btn-success btn-lg btn-block hidden-md hidden-lg" style="padding: 8px 20px; border-radius: 4px; margin-top: 20px;"><a href="http://maps.apple.com/maps?q=<?php echo $obj['address']; ?>" style="color:#fff;font-weight: 700;">経路を調べる</a></button>

                            <div class="content">

                               <h4 class="ta-center" style="margin:2em 0;">ご利用可能な電子マネー</h4>
                               <div class="pure-pad pure-g mm-container mm-pad-small">
                                    <div class="pure-u-1 pure-u-sm-1 pure-u-md-1 pure-u-lg-1 pure-u-xl-1 same-height ta-center">
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                    <ul class="list-inline emoney">

                                    <?php

                                        global $e_waon;
                                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                                        $e_waon     =  get_post_meta($get_page_id,'waon' ,true); //ページIDを元にカスタムフィールドの値取得

                                        global $e_nanaco;
                                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                                        $e_nanaco     =  get_post_meta($get_page_id,'nanaco' ,true); //ページIDを元にカスタムフィールドの値取得

                                        global $e_suica;
                                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                                        $e_suica     =  get_post_meta($get_page_id,'suica' ,true); //ページIDを元にカスタムフィールドの値取得

                                        global $e_rakutenedy;
                                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                                        $e_rakutenedy     =  get_post_meta($get_page_id,'rakutenedy' ,true); //ページIDを元にカスタムフィールドの値取得

                                        global $e_id;
                                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                                        $e_id     =  get_post_meta($get_page_id,'id' ,true); //ページIDを元にカスタムフィールドの値取得

                                        global $e_pasmo;
                                        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                                        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                                        $e_pasmo     =  get_post_meta($get_page_id,'pasmo' ,true); //ページIDを元にカスタムフィールドの値取得


                                        if ($e_waon == null){

                                            }else{

                                            echo '<li><img src="' . get_template_directory_uri() . '/img/emoney/waon.png" alt="..."></li>';

                                            }


                                        if ($e_nanaco == null){

                                            }else{

                                            echo '<li><img src="' . get_template_directory_uri() . '/img/emoney/nanaco.png" alt="..."></li>';

                                            }


                                        if ($e_suica == null){

                                            }else{

                                            echo '<li><img src="' . get_template_directory_uri() . '/img/emoney/suica.png" alt="..."></li>';

                                            }


                                        if ($e_rakutenedy == null){

                                            }else{

                                            echo '<li><img src="' . get_template_directory_uri() . '/img/emoney/edy.png" alt="..."></li>';

                                            }


                                        if ($e_id == null){

                                            }else{

                                            echo '<li><img src="' . get_template_directory_uri() . '/img/emoney/id.png" alt="..."></li>';

                                            }


                                        if ($e_pasmo == null){

                                            }else{

                                            echo '<li><img src="' . get_template_directory_uri() . '/img/emoney/pasmo.png" alt="..."></li>';

                                            }

                                    ?>

                                    </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                            </div>


                    </div><!-- /.col-md-4 col-xs-12 -->

                        </section>

                        <span class="content_bottom"></span>

                </div><!-- /.row -->

            </div><!-- /.container -->

            <?php endwhile; ?>
            <?php else : ?>
            <div>記事が見つかりませんでした。</div>
            <?php endif; ?>

        </article>

    </main>


<?php get_footer(); ?>
