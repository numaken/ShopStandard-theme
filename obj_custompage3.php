<?php
/**
 The template name:オブジェクト-カスタムページ3
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

<!-- カスタムページ3 -->

    <?php

    //　カスタムページ3

    //カスタム3の画像
    global $custom3_img;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_img =  get_post_meta($get_page_id,'custom3_img' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3のタイトル
    global $custom3_title;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_title =  get_post_meta($get_page_id,'custom3_title' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3の説明文
    global $custom3_description;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_description =  get_post_meta($get_page_id,'custom3_description' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3のボタン色
    global $custom3_btn_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_btn_color =  get_post_meta($get_page_id,'custom3_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3のボタン名
    global $custom3_btn_name;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_btn_name =  get_post_meta($get_page_id,'custom3_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3のボタンリンク先
    global $custom3_btn_url;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_btn_url =  get_post_meta($get_page_id,'custom3_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3の背景画像
    global $custom3_bg_image;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_bg_image =  get_post_meta($get_page_id,'custom3_bg_image' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3の背景色
    global $custom3_bg_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_bg_color =  get_post_meta($get_page_id,'custom3_bg_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3のタイトル色
    global $custom3_title_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_title_color = get_post_meta($get_page_id,'custom3_title_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム3の文字色
    global $custom3_font_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom3_font_color =  get_post_meta($get_page_id,'custom3_font_color' ,true); //ページIDを元にカスタムフィールドの値取得

    ?>

<section id="customs3" class="customs3">

    <div class="parallax-inner">

        <div class="container">

            <div class="parallax-inner-captionR">
                <?php

                if ($custom3_title == null){
                    // 画像が無い場合の処理

                    echo '<h2>タイトルが設定されていません</h2>';

                }else{

                    echo '<h2 style="color:' . $custom3_title_color . ';">' . $custom3_title . '</h2>';

                }

                ?>

                <?php

                if ($custom3_description == null){
                    // 画像が無い場合の処理

                    echo '<h4>文言が設定されていません</h4>';

                }else{

                    $text3 = $custom3_description;
                    $string3 = mb_strimwidth( $text3, 0, 280, "...", "UTF-8" );
                    echo '<h4 style="color:' . $custom3_font_color . ';">' . $string3 . '</h4>';

                }

                ?>

                <?php


                if ($custom3_btn_url == null){


                }else{

                    echo '<a href="' . $custom3_btn_url . '/" class="btn btn-danger" style="background-color:#' . $custom3_btn_color . ';">'.$custom3_btn_name.'</a>';

                }

                ?>

            </div>

            <?php

            $imgurl = null;
            $imgurl = wp_get_attachment_image_src($custom3_img, 'full'); //サイズは自由に変更してね
            if ($imgurl == null){
                // 画像が無い場合の処理
                var_dump($imgurl);

                echo '<img src="' . get_template_directory_uri() . '/images/nowprinting_vga_sm.png" class="attachment-imgL" alt="' . $osusume[2]['title'] . '">';

            }else{

                echo '<img src="' . $imgurl[0] . '" class="attachment-imgL" alt="' . $osusume[2]['title'] . '">';
            }

            ?>

        </div><!-- /.container -->

    </div>

</section>
