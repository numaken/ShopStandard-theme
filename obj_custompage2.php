<?php
/**
 The template name:オブジェクト-カスタムページ2
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

<!-- カスタムページ2 -->

    <?php

    //　カスタムページ2

    //カスタム2の画像
    global $custom2_img;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_img =  get_post_meta($get_page_id,'custom2_img' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2のタイトル
    global $custom2_title;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_title =  get_post_meta($get_page_id,'custom2_title' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2の説明文
    global $custom2_description;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_description =  get_post_meta($get_page_id,'custom2_description' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2のボタン色
    global $custom2_btn_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_btn_color =  get_post_meta($get_page_id,'custom2_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2のボタン名
    global $custom2_btn_name;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_btn_name =  get_post_meta($get_page_id,'custom2_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2のボタンリンク先
    global $custom2_btn_url;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_btn_url =  get_post_meta($get_page_id,'custom2_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2の背景画像
    global $custom2_bg_image;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_bg_image =  get_post_meta($get_page_id,'custom2_bg_image' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2の背景色
    global $custom2_bg_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_bg_color =  get_post_meta($get_page_id,'custom2_bg_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2のタイトル色
    global $custom2_title_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_title_color = get_post_meta($get_page_id,'custom2_title_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム2の文字色
    global $custom2_font_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom2_font_color =  get_post_meta($get_page_id,'custom2_font_color' ,true); //ページIDを元にカスタムフィールドの値取得

    ?>

<section id="customs2" class="customs2">

    <div class="parallax-inner">

        <div class="container">

            <div class="parallax-inner-captionR">
                <?php

                if ($custom2_title == null){
                    // 画像が無い場合の処理

                    echo '<h2>タイトルが設定されていません</h2>';

                }else{

                    echo '<h2 style="color:' . $custom2_title_color . ';">' . $custom2_title . '</h2>';

                }

                ?>

                <?php

                if ($custom2_description == null){
                    // 画像が無い場合の処理

                    echo '<h4>文言が設定されていません</h4>';

                }else{

                    $text2 = $custom2_description;
                    $string2 = mb_strimwidth( $text2, 0, 280, "...", "UTF-8" );
                    echo '<h4 style="color:' . $custom2_font_color . ';">' . $string2 . '</h4>';

                }

                ?>

                <?php

                if ($custom2_btn_url == null){


                }else{

                    echo '<a href="' . $custom2_btn_url . '/" class="btn btn-danger" style="background-color:#' . $custom2_btn_color . ';">'.$custom2_btn_name.'</a>';

                }

                ?>

            </div>

            <?php

            $imgurl = wp_get_attachment_image_src($custom2_img, 'full'); //サイズは自由に変更してね
            if ($imgurl == null){
                // 画像が無い場合の処理

                echo '<img src="' . get_template_directory_uri() . '/images/nowprinting_vga_sm.png" class="attachment-imgL" alt="' . $osusume[1]['title'] . '">';

            }else{

                echo '<img src="' . $imgurl[0] . '" class="attachment-imgL" alt="' . $osusume[1]['title'] . '">';
            }

            ?>

        </div><!-- /.container -->

    </div>

</section>
