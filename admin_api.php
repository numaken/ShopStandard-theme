<?php
/** The template name:Api */
get_header(); ?>


<?php

function ogp_meta() {

    //固定ページのカスタムフィールドより入力されたDATAを他ページでも使用可能にする
    //apicode

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


    /* 表示

            echo $obj['id'];
            echo $obj['title'];
            echo $obj['authored_index_url'];
            echo $obj['lat'];
            echo $obj['lng'];
            echo $obj['description'];
            echo $obj['qr_code'];
            echo $obj['thumb'];
            echo $obj['thumb2x'];

            店舗名: echo $obj['title'];
            電話番号: echo $obj['tel'];
            住所: echo $obj['address'];
            営業時間: echo $obj['business_hour_from, business_hour_to'];
            営業時間(備考): echo $obj['business_hour_remarks'];
            定休日: echo $obj['regular_holiday'];
            オフィシャルサイトURL: echo $obj['site_url'];
            ロゴアイコン: echo $obj['logo_icon_url'];
            底面パッチ: echo $obj['bottom_patch_url'];

            */

    //固定ページ おすすめ情報１のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

    //ビルボードに設定するタイトル
    global $billboard_title1;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_title1 =  get_post_meta($get_page_id,'billboard_title1' ,true); //ページIDを元にカスタムフィールドの値取得

    //ページに設定する画像
    global $img1;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $img1 =  get_post_meta($get_page_id,'image1' ,true); //ページIDを元にカスタムフィールドの値取得

    //添付画像のキャプション
    global $caption1;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $caption1 =  get_post_meta($get_page_id,'caption1' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景画像
    global $back_image1;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_image1 =  get_post_meta($get_page_id,'background_image1' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報１のボタン色
    global $recommend1_btn_color;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend1_btn_color =  get_post_meta($get_page_id,'recommend1_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報１のボタン名
    global $recommend1_btn_name;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend1_btn_name =  get_post_meta($get_page_id,'recommend1_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報１のボタンリンク先
    global $recommend1_btn_url;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend1_btn_url =  get_post_meta($get_page_id,'recommend1_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景色
    global $back_color1;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_color1 =  get_post_meta($get_page_id,'background_color1' ,true); //ページIDを元にカスタムフィールドの値取得

    //タイトル色
    global $title_color1;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $title_color1 =  get_post_meta($get_page_id,'title_color1' ,true); //ページIDを元にカスタムフィールドの値取得

    //文字色
    global $font_color1;
    $get_page_id = get_page_by_path("recommend1"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $font_color1 =  get_post_meta($get_page_id,'font_color1' ,true); //ページIDを元にカスタムフィールドの値取得


    //固定ページ おすすめ情報２ のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

    //ビルボードに設定するタイトル
    global $billboard_title2;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_title2 =  get_post_meta($get_page_id,'billboard_title2' ,true); //ページIDを元にカスタムフィールドの値取得

    //ページに設定する画像
    global $img2;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $img2 =  get_post_meta($get_page_id,'image2' ,true); //ページIDを元にカスタムフィールドの値取得

    //添付画像のキャプション
    global $caption2;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $caption2 =  get_post_meta($get_page_id,'caption2' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景画像
    global $back_image2;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_image2 =  get_post_meta($get_page_id,'background_image2' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報２のボタン色
    global $recommend1_btn_color;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend2_btn_color =  get_post_meta($get_page_id,'recommend2_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報２のボタン名
    global $recommend2_btn_name;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend2_btn_name =  get_post_meta($get_page_id,'recommend2_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報２のボタンリンク先
    global $recommend2_btn_url;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend2_btn_url =  get_post_meta($get_page_id,'recommend2_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景色
    global $back_color2;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_color2 =  get_post_meta($get_page_id,'background_color2' ,true); //ページIDを元にカスタムフィールドの値取得

    //タイトル色
    global $title_color2;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $title_color2 =  get_post_meta($get_page_id,'title_color2' ,true); //ページIDを元にカスタムフィールドの値取得

    //文字色
    global $font_color2;
    $get_page_id = get_page_by_path("recommend2"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $font_color2 =  get_post_meta($get_page_id,'font_color2' ,true); //ページIDを元にカスタムフィールドの値取得



    //固定ページ おすすめ情報３ のカスタムフィールドより入力されたDATAを他ページでも使用可能にする


    //ビルボードに設定するタイトル
    global $billboard_title3;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_title3 =  get_post_meta($get_page_id,'billboard_title3' ,true); //ページIDを元にカスタムフィールドの値取得

    //ページに設定する画像
    global $img3;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $img3 =  get_post_meta($get_page_id,'image3' ,true); //ページIDを元にカスタムフィールドの値取得

    //添付画像のキャプション
    global $caption3;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $caption3 =  get_post_meta($get_page_id,'caption3' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景画像
    global $back_image3;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_image3 =  get_post_meta($get_page_id,'background_image3' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報３のボタン色
    global $recommend3_btn_color;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend3_btn_color =  get_post_meta($get_page_id,'recommend3_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報３のボタン名
    global $recommend3_btn_name;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend3_btn_name =  get_post_meta($get_page_id,'recommend3_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //おすすめ情報３のボタンリンク先
    global $recommend3_btn_url;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $recommend3_btn_url =  get_post_meta($get_page_id,'recommend3_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景色
    global $back_color3;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_color3 =  get_post_meta($get_page_id,'background_color3' ,true); //ページIDを元にカスタムフィールドの値取得

    //タイトル色
    global $title_color3;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $title_color3 =  get_post_meta($get_page_id,'title_color3' ,true); //ページIDを元にカスタムフィールドの値取得

    //文字色
    global $font_color3;
    $get_page_id = get_page_by_path("recommend3"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $font_color3 =  get_post_meta($get_page_id,'font_color3' ,true); //ページIDを元にカスタムフィールドの値取得


    //アナリティクス＆SEO設定

    //　SEOキーワード情報
    global $seoword;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $seoword =  get_post_meta($get_page_id,'seo_word' ,true); //ページIDを元にカスタムフィールドの値取得

    //　analytics_id情報
    global $analyticsid;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $analyticsid =  get_post_meta($get_page_id,'analytics_id' ,true); //ページIDを元にカスタムフィールドの値取得



    //　ページデザイン情報

    //ビルボードに設定するタイトル
    global $billboard_about_title1;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_about_title1 =  get_post_meta($get_page_id,'billboard_about_title1' ,true); //ページIDを元にカスタムフィールドの値取得

    //店舗情報添付画像
    global $img_about1;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $img_about1 =  get_post_meta($get_page_id,'image_about1' ,true); //ページIDを元にカスタムフィールドの値取得

    //店舗情報要キャプション
    global $caption_about1;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $caption_about1 =  get_post_meta($get_page_id,'caption_about1' ,true); //ページIDを元にカスタムフィールドの値取得

    //ヘッダ画像
    global $head_image;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $head_image =  get_post_meta($get_page_id,'head_image' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景画像
    global $back_image4;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_image4 =  get_post_meta($get_page_id,'background_image4' ,true); //ページIDを元にカスタムフィールドの値取得

    //ロゴ
    global $optlogo;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $optlogo =  get_post_meta($get_page_id,'opt_logo' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景色
    global $back_color4;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_color4 =  get_post_meta($get_page_id,'background_color4' ,true); //ページIDを元にカスタムフィールドの値取得

    //タイトル色
    global $title_color4;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $title_color4 =  get_post_meta($get_page_id,'title_color4' ,true); //ページIDを元にカスタムフィールドの値取得

    //文字色
    global $font_color4;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $font_color4 =  get_post_meta($get_page_id,'font_color4' ,true); //ページIDを元にカスタムフィールドの値取得

    // 電子マネー選択

    //waon
    global $e_waon;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $e_waon     =  get_post_meta($get_page_id,'waon' ,true); //ページIDを元にカスタムフィールドの値取得

    //nanaco
    global $e_nanaco;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $e_nanaco     =  get_post_meta($get_page_id,'nanaco' ,true); //ページIDを元にカスタムフィールドの値取得

    //suica
    global $e_suica;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $e_suica     =  get_post_meta($get_page_id,'suica' ,true); //ページIDを元にカスタムフィールドの値取得

    //楽天edy
    global $e_rakutenedy;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $e_rakutenedy     =  get_post_meta($get_page_id,'rakutenedy' ,true); //ページIDを元にカスタムフィールドの値取得

    //id
    global $e_id;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $e_id     =  get_post_meta($get_page_id,'id' ,true); //ページIDを元にカスタムフィールドの値取得

    //pasmo
    global $e_pasmo;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $e_pasmo     =  get_post_meta($get_page_id,'pasmo' ,true); //ページIDを元にカスタムフィールドの値取得

    //　AppダウンロードURL情報

    //Googleアプリurl
    global $googleApp;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $googleApp =  get_post_meta($get_page_id,'gapp' ,true); //ページIDを元にカスタムフィールドの値取得

    //Appleアプリurl
    global $iPhoneApp;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $iPhoneApp =  get_post_meta($get_page_id,'iapp' ,true); //ページIDを元にカスタムフィールドの値取得


    // 店舗管理情報

    //予約システム利用可否
    global $reserve_sw;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $reserve_sw     =  get_post_meta($get_page_id,'reserve_switch' ,true); //ページIDを元にカスタムフィールドの値取得

    //メニューページ利用可否
    global $custom_switch;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom_switch     =  get_post_meta($get_page_id,'custom_switch' ,true); //ページIDを元にカスタムフィールドの値取得

    //メニューページ名指定
    global $custom_page_name;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom_page_name     =  get_post_meta($get_page_id,'custom_page_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //メニューページ添付画像
    global $custom_page_img;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom_page_img     =  get_post_meta($get_page_id,'custom_page_img' ,true); //ページIDを元にカスタムフィールドの値取得

    //メニューページキャプション
    global $custom_page_caption;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom_page_caption     =  get_post_meta($get_page_id,'custom_page_caption' ,true); //ページIDを元にカスタムフィールドの値取得

    //SMS(ショートメッセージ)お問合せ利用可否
    global $sms_sw;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $sms_sw     =  get_post_meta($get_page_id,'sms_switch' ,true); //ページIDを元にカスタムフィールドの値取得

    //連絡用メールアドレス
    global $e_mail;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $e_mail      = get_post_meta($get_page_id,'email' ,true); //ページIDを元にカスタムフィールドの値取得

    //SMS用連絡先電話番号
    global $sms;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $sms     =  get_post_meta($get_page_id,'sms_no' ,true); //ページIDを元にカスタムフィールドの値取得


    // インスタグラム Api

    //インスタグラム連携利用可否
    global $insta_sw;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_sw     =  get_post_meta($get_page_id,'instaconnect' ,true); //ページIDを元にカスタムフィールドの値取得

    //アクセストークン
    global $insta_token;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_token     =  get_post_meta($get_page_id,'insta_token' ,true); //ページIDを元にカスタムフィールドの値取得

    //インスタグラムユーザー名
    global $insta_username;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_username     =  get_post_meta($get_page_id,'insta_username' ,true); //ページIDを元にカスタムフィールドの値取得

    //キャッチコピー
    global $insta_catchcopy;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_catchcopy     =  get_post_meta($get_page_id,'insta_catchcopy' ,true); //ページIDを元にカスタムフィールドの値取得

    //説明文
    global $insta_description;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $insta_description     =  get_post_meta($get_page_id,'insta_description' ,true); //ページIDを元にカスタムフィールドの値取得



    //　ブログ情報

    //お知らせページタイトル
    global $billboard_title1_event1;
    $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_title1_event1 =  get_post_meta($get_page_id,'billboard_title1_event1' ,true); //ページIDを元にカスタムフィールドの値取得

    //お知らせページ添付画像
    global $img_event1;
    $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $img_event1 =  get_post_meta($get_page_id,'image_event1' ,true); //ページIDを元にカスタムフィールドの値取得

    //お知らせページ添付画像キャプション
    global $caption_event1;
    $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $caption_event1 =  get_post_meta($get_page_id,'caption_event1' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景画像
    global $back_image5;
    $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_image5 =  get_post_meta($get_page_id,'background_image5' ,true); //ページIDを元にカスタムフィールドの値取得

    //背景色
    global $back_color5;
    $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $back_color5 =  get_post_meta($get_page_id,'background_color5' ,true); //ページIDを元にカスタムフィールドの値取得

    //タイトル色
    global $title_color5;
    $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $title_color5 = get_post_meta($get_page_id,'title_color5' ,true); //ページIDを元にカスタムフィールドの値取得

    //文字色
    global $font_color5;
    $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $font_color5 =  get_post_meta($get_page_id,'font_color5' ,true); //ページIDを元にカスタムフィールドの値取得


    //　企業情報

    //ビルボードに設定するタイトル
    global $billboard_title1_corp1;
    $get_page_id = get_page_by_path("corp"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $billboard_title1_corp1 =  get_post_meta($get_page_id,'billboard_title1_corp1' ,true); //ページIDを元にカスタムフィールドの値取得

    //企業ページに設定する画像
    global $img_corp1;
    $get_page_id = get_page_by_path("corp"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $img_corp1 =  get_post_meta($get_page_id,'image_corp1' ,true); //ページIDを元にカスタムフィールドの値取得

    //添付画像のキャプション
    global $caption_corp1;
    $get_page_id = get_page_by_path("corp"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $caption_corp1 =  get_post_meta($get_page_id,'caption_corp1' ,true); //ページIDを元にカスタムフィールドの値取得

    //会社名
    global $corp_name;
    $get_page_id = get_page_by_path("corp"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $corp_name =  get_post_meta($get_page_id,'corp_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //住所
    global $corp_adress;
    $get_page_id = get_page_by_path("corp"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $corp_adress =  get_post_meta($get_page_id,'corp_adress' ,true); //ページIDを元にカスタムフィールドの値取得

    //電話番号
    global $corp_tel;
    $get_page_id = get_page_by_path("corp"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $corp_tel =  get_post_meta($get_page_id,'corp_tel' ,true); //ページIDを元にカスタムフィールドの値取得

    //代表者名
    global $corp_ceo;
    $get_page_id = get_page_by_path("corp"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $corp_ceo =  get_post_meta($get_page_id,'corp_ceo' ,true); //ページIDを元にカスタムフィールドの値取得


    //　カスタムページ

    //　カスタムページ1

    //カスタム1の画像
    global $custom1_img;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_img =  get_post_meta($get_page_id,'custom1_img' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1のタイトル
    global $custom1_title;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_title =  get_post_meta($get_page_id,'custom1_title' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1の説明文
    global $custom1_description;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_description =  get_post_meta($get_page_id,'custom1_description' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1のボタン色
    global $custom1_btn_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_btn_color =  get_post_meta($get_page_id,'custom1_btn_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1のボタン名
    global $custom1_btn_name;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_btn_name =  get_post_meta($get_page_id,'custom1_btn_name' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1のボタンリンク先
    global $custom1_btn_url;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_btn_url =  get_post_meta($get_page_id,'custom1_btn_url' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1の背景画像
    global $custom1_bg_image;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_bg_image =  get_post_meta($get_page_id,'custom1_bg_image' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1の背景色
    global $custom1_bg_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_bg_color =  get_post_meta($get_page_id,'custom1_bg_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1のタイトル色
    global $custom1_title_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_title_color = get_post_meta($get_page_id,'custom1_title_color' ,true); //ページIDを元にカスタムフィールドの値取得

    //カスタム1の文字色
    global $custom1_font_color;
    $get_page_id = get_page_by_path("customs"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $custom1_font_color =  get_post_meta($get_page_id,'custom1_font_color' ,true); //ページIDを元にカスタムフィールドの値取得


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



    if (!is_admin()) {

        global $post;
        $format = '<meta property="%1$s" content="%2$s">';
        $type = 'website';
        $url = esc_url(home_url('/'));
        $site_name = $obj['title'];
        $title = $site_name;
        $image = 'http://example.com/xxx.png';
        $description = $obj['description'];
        $fb_app_id = '201350509905718';

        if (is_singular()) {
            $type = 'article';
            $url = esc_url(get_permalink($post->ID));
            $title = esc_attr($post->post_title);
            $description  = strip_tags($post->post_excerpt ? $post->post_excerpt : $post->post_content);
            $description  = mb_substr($description, 0, 90) . '...';
            if (function_exists('has_post_thumbnail') AND has_post_thumbnail($post->ID)) {
                $attachment = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
                $image = esc_url($attachment[0]);
            } elseif (preg_match('/<img\s[^>]*src=["\']?([^>"\']+)/i', $post->post_content, $match)) {
                $image = esc_url($match[1]);
            }
            $publisher = 'https://www.facebook.com/example';
            printf($format, 'article:publisher', $publisher);
        }

        $args = array(
            'og:type'  => $type,
            'og:url'   => $url,
            'og:title' => $title,
            'og:image' => $image,
            'og:site_name' => $site_name,
            'og:description' => $description,
            'fb:app_id'      => $fb_app_id
        );
        foreach ($args as $key => $value) {
            printf($format, $key, $value);
        }
    }
}
add_action('wp_head', 'ogp_meta');
?>
