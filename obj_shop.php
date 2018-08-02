<?php
/**
 The template name:ショップ
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

<!-- shop -->


<section id="shop" class="shop">

    <div class="container"><!-- .container -->

        <div class="row"><!-- .row -->


            <div class="ta-center">

                <?php
                    //フッターロゴ画像
                    global $footer_logo_img;
                    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                    $footer_logo_img  =  get_post_meta($get_page_id,'footer_logo_img' ,true); //ページIDを元にカスタムフィールドの値取得
                ?>

                <!-- フッターロゴ -->

                <?php

                $url = home_url();

                $imgurl = wp_get_attachment_image_src($footer_logo_img, 'full');//サイズは自由に変更してね
                //サイズは自由に変更してね
                if ($imgurl == null){
                    // 画像が無い場合の処理
                    echo '<img class="shop_logoImg img-responsive center-block" src="' . get_header_image() . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt="ロゴイメージ" />';


                }else{ ?>

                <?php
                    echo '<img class="shop_logoImg img-responsive center-block" src="' . $imgurl[0] . '" height="' . get_custom_header()->height . '" width="' . get_custom_header()->width . '" alt="ロゴイメージ" />';

                ?>

                <?php  } ?>

                <!-- フッターロゴ -->





                    <?php
                    $num1 = $obj['business_hour_from'];
                    $from = substr($num1,0,5);
                    $num2 = $obj['business_hour_to'];
                    $to = substr($num2,0,5);
                    ?>



                    <?php
                    global $remarks;
                    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
                    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
                    $remarks     =  get_post_meta($get_page_id,'remarks' ,true); //ページIDを元にカスタムフィールドの値取得
                    ?>
                    <?php echo $remarks; ?>


            </div>


        </div><!-- /.row -->

    </div><!-- /.container -->

    <div class="container">

        <div class="row">

            <hr>

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

                    echo '<li><a href="http://www.waon.net/index.html"><img src="' . get_template_directory_uri() . '/img/emoney/waon.png" alt="..."></a></li>';

                }


                if ($e_nanaco == null){

                }else{

                    echo '<li><a href="https://www.nanaco-net.jp/index_pc.html"><img src="' . get_template_directory_uri() . '/img/emoney/nanaco.png" alt="..."></a></li>';

                }


                if ($e_suica == null){

                }else{

                    echo '<li><a href="http://www.jreast.co.jp/suica/"><img src="' . get_template_directory_uri() . '/img/emoney/suica.png" alt="..."></a></li>';

                }


                if ($e_rakutenedy == null){

                }else{

                    echo '<li><a href="http://edy.rakuten.co.jp/"><img src="' . get_template_directory_uri() . '/img/emoney/edy.png" alt="..."></a></li>';

                }


                if ($e_id == null){

                }else{

                    echo '<li><a href="http://id-credit.com/index.html"><img src="' . get_template_directory_uri() . '/img/emoney/id.png" alt="..."></a></li>';

                }


                if ($e_pasmo == null){

                }else{

                    echo '<li><a href="http://www.pasmo.co.jp/"><img src="' . get_template_directory_uri() . '/img/emoney/pasmo.png" alt="..."></a></li>';

                }


                ?>

            </ul>

        </div><!-- /.row -->

    </div><!-- /.container -->

</section>
