<?php
/**
 The template name:店舗情報
 */
get_header(); ?>

<? $osusume = $obj['recommendations'] ?>

<?php

//固定ページ おすすめ情報1 のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

    global $billboard_about_title1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$billboard_about_title1 =  get_post_meta($get_page_id,'billboard_about_title1' ,true); //ページIDを元にカスタムフィールドの値取得

global $img_about1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$img_about1 =  get_post_meta($get_page_id,'image_about1' ,true); //ページIDを元にカスタムフィールドの値取得

global $caption_about1;
$get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
$get_page_id = $get_page_id->ID; //ページパスからページidを取得
$caption_about1 =  get_post_meta($get_page_id,'caption_about1' ,true); //ページIDを元にカスタムフィールドの値取得

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
                $imgback_url = wp_get_attachment_image_src($img_about1, 'full'); //サイズは自由に変更してね
                if ($imgback_url == null){
                    // 画像が無い場合の処理
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }else{
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }
                ?>

                <div class="billboard-caption">

                    <?php
                    if ($billboard_about_title1 == null){
                        // 画像が無い場合の処理
                        echo '<h2 class="ta-center">'. get_the_title() .'</h2>';
                    }else{
                        echo '<h3 class="ta-center">' . $billboard_about_title1 . '</h3>';
                    }
                    ?>

                    <?php
                    if ($caption_about1 == null){
                        // 画像が無い場合の処理
                    }else{
                        echo '<h4 class="ta-center">' . $caption_about1 . '</h4>';
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

            <section id="about" class="about">

                <div class="container">

                    <div class="col-xs-12"><!-- col-xs-12 -->

                        <div class="row"><!-- row -->

                            <!-- 16:9 aspect ratio -->
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="<?php echo $obj['authored_index_url']; ?>"></iframe>
                            </div><!-- 16:9 aspect ratio -->

                            <div class="content-box">

                                <div class="col-xs-12">

                                    <h3 class="gemstone_title ta-center" style="color:<? echo $title_color4; ?>"><?php echo $obj['title']; ?></h3>
                                    <div class="gemstone_subtext ta-center"><?php echo $obj['description']; ?></div>

                                </div>

                            </div>

                        </div><!-- ./row -->

                    </div><!-- ./col-xs-12 -->

                    <div class="col-xs-12"><!-- col-xs-12 -->

                        <div class="row"><!-- row -->

                            <div class="panel panel-default"><!-- panel panel-default -->

                                <div class="panel-body">

                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><!-- col-xs-12 col-sm-6 col-md-6 col-lg-6 -->

                                        <div class="row">

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


                                            <!-- 地図のキャンパス -->
                                            <div class="map-embed">
                                                <div id="map">ここに地図が表示されます</div>
                                            </div>

                                        </div>

                                    </div><!-- ./col-xs-12 col-sm-6 col-md-6 col-lg-6 -->

                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><!-- col-xs-12 col-sm-6 col-md-6 col-lg-6 -->

                                        <div class="row">

                                            <table class="company">
                                                <tbody>
                                                    <tr>
                                                        <th class="arrow_box"><small>店名</small></th>
                                                        <td><?php echo $obj['title']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="arrow_box"><small>TEL</small></th>
                                                        <td>
                                                            <span data-action="call" data-tel="<?php echo $obj['tel']; ?>"><i class="fas fa-phone-square"></i>&nbsp;<?php echo $obj['tel']; ?></span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="arrow_box"><small>住所</small></th>
                                                        <td><?php echo $obj['address']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="arrow_box"><small>営業時間</small></th>

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
                                                        <th class="arrow_box"><small>定休日</small></th>
                                                        <td><?php echo $obj['regular_holiday']; ?></td>
                                                    </tr>
                                                    <!--
                                                    <tr>
                                                    <th class="arrow_box">HP</th>
                                                    <td>
                                                    <a href="<?php echo $obj['site_url']; ?>"><?php echo $obj['site_url']; ?></a></td>
                                                    </tr>
                                                    -->
                                                </tbody>
                                            </table>

                                        </div>

                                    </div><!-- ./col-xs-12 col-sm-6 col-md-6 col-lg-6 -->

                                </div><!-- ./panel-body -->

                            </div><!-- ./panel panel-default -->

                        </div><!-- ./row -->

                    </div><!-- col-xs-12 -->

                </div><!-- ./container -->

            </section>


<?php get_footer(); ?>
