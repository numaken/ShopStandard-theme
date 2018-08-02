<!doctype html>
<html lang="ja">

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
    
    <? $osusume = $obj['recommendations'] ?>

    <?php

    global $seoword;
    $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
    $get_page_id = $get_page_id->ID; //ページパスからページidを取得
    $seoword =  get_post_meta($get_page_id,'seo_word' ,true); //ページIDを元にカスタムフィールドの値取得

    ?>



    <?php if (is_home() || is_front_page()) : ?>

        <head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# website: https://ogp.me/ns/website#">

    <?php else: ?>

        <head prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb# article: https://ogp.me/ns/article#">

    <?php endif; ?>
        
    
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <?php

        global $seoword;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $seoword =  get_post_meta($get_page_id,'seo_word' ,true); //ページIDを元にカスタムフィールドの値取得

        echo '<meta name="Keywords" content="' . $seoword . '" />';

        ?>

        <title><? echo $obj['title']; echo '｜'; echo $seoword; ?></title>



    <?php if (is_home() || is_front_page()) : ?>
        <meta name="description" content="<? echo $obj['description']; ?>">
    <?php else: ?>
    <?php endif; ?>


    <?php if(is_page( array( 'recommend1' ) ) ): ?>
        <meta name="description" content="<? echo $osusume[0]['description']; ?>">
    <?php else: ?>
    <?php endif; ?>

    <?php if(is_page( array( 'recommend2' ) ) ): ?>
        <meta name="description" content="<? echo $osusume[1]['description']; ?>">
    <?php else: ?>
    <?php endif; ?>

    <?php if(is_page( array( 'recommend3' ) ) ): ?>
        <meta name="description" content="<? echo $osusume[2]['description']; ?>">
    <?php else: ?>
    <?php endif; ?>

    <?php if(is_page( array( 'about' ) ) ): ?>
        <meta name="description" content="<?php echo $obj['description']; ?>">
    <?php else: ?>
    <?php endif; ?>


    <?php if (is_single()): ?>
        <meta name="description" content="<?php echo mb_substr(strip_tags(apply_filters('the_content', $post->post_content)), 0, 120); ?>">
    <?php else: ?>
    <?php endif; ?>
            
            
            <meta name="viewport" content="width=device-width, initial-scale=1">
           
            <link rel="apple-touch-icon" href="<?php echo $obj['bottom_patch_url']; ?>">

            <!-- Add to homescreen for Chrome on Android -->
            <meta name="mobile-web-app-capable" content="yes">
            <link rel="icon" sizes="192x192" href="<?php echo $obj['bottom_patch_url']; ?>">

            <!-- Remove Tap Highlight on Windows Phone IE -->
            <meta name="msapplication-tap-highlight" content="no">

            <!-- Add to homescreen for Safari on iOS -->
            <meta name="apple-mobile-web-app-capable" content="yes">
            <meta name="apple-mobile-web-app-status-bar-style" content="black">
            <meta name="apple-mobile-web-app-title" content="Title">
            <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo $obj['logo_icon_url']; ?>">

            <!-- Tile icon for Win8 (144x144 + tile color) -->
            <meta name="msapplication-TileImage" content="<?php echo $obj['logo_icon_url']; ?>">
            <meta name="msapplication-TileColor" content="#3372DF">


            <!-- OGP設定 -->
            <meta property="og:locale" content="ja_JP">
            <meta property="fb:app_id" content="1787926928117947">
            <meta property="og:site_name" content="<?php bloginfo('name'); ?>">           
           

            <?php if(is_home()): ?>
            <!-- ←でブログのトップページを判定 -->

            <meta property="og:url" content="<?php echo home_url( ); ?>">
            <meta property="og:type" content="website">
            <meta property="og:title" content="<?php bloginfo('name'); ?>">
            <meta property="og:description" content="<?php bloginfo('description'); ?>">
            <!--<meta property="og:image" content="表示させたい画像URL">-->
            <meta property="og:image" content="<?php echo $obj['logo_icon_url']; ?>">

            <?php elseif(is_page()): ?>
            <!-- ←で固定ページを判定 -->

            <meta property="og:url" content="<?php echo get_permalink(); ?>">
            <meta property="og:type" content="website">
            <meta property="og:title" content="<?php bloginfo('name'); ?>-<?php the_title(); ?>">
            <meta property="og:description" content="<?php the_excerpt(); ?>">
            <!--<meta property="og:image" content="表示させたい画像URL">-->
            <meta property="og:image" content="<?php echo $image_url[0] ?>">

            <?php else: ?>
            <!-- ←上記の条件にもれたページ（記事ページ） -->

            <meta property="og:url" content="<?php echo get_permalink(); ?>">
            <meta property="og:type" content="article">
            <meta property="og:title" content="<?php the_title(); ?>">
            <meta property="og:description" content="<?php echo mb_substr(strip_tags(apply_filters('the_content', $post->post_content)), 0, 120); ?>">
            <!--<meta property="og:image" content="表示させたい画像URL">-->
            <meta property="og:image" content="<?php echo $image_url[0] ?>">

            <?php endif; ?>


            <?php
            /* 画像の設定 */
            $str = $post->post_content;
            $searchPattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i'; //投稿にイメージがあるか調べる
            if (is_single()){ //単一記事ページの場合
                if (has_post_thumbnail()){ //投稿にサムネイルがある場合の処理
                    $image_id = get_post_thumbnail_id(); $image = wp_get_attachment_image_src( $image_id, 'full');
                    echo '<meta property="og:image" content="'.$image[0].'">';echo "\n"; } else if ( preg_match( $searchPattern, $str, $imgurl ) && !is_archive()) { //投稿にサムネイルは無いが画像がある場合の処理
                    echo '<meta property="og:image" content="'.$imgurl[2].'">';echo "\n"; } else { //投稿にサムネイルも画像も無い場合の処理
                    echo '<meta property="og:image" content="'.$obj['logo_icon_url'].'">';echo "\n"; } } else { //単一記事ページ以外の場合（アーカイブページやホームなど）
                    echo '<meta property="og:image" content="'.$obj['logo_icon_url'].'">';echo "\n"; }
            ?>

            <meta name="twitter:card" content="summary_large_image">
            <meta name="twitter:site" content="@Twitterアカウント">


            <!--        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">-->
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
            <!--<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/animsition.css">-->
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/back-top.css">

            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/magic.min.css">

            <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css">



            <?php if ( is_page(array('recommend-app','blog-app','about-app' )) ) ://特定のカテゴリーの場合 ?>

                <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/app.css">
                <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/3dportfolio.css">

            <?php else://通常ページの場合 ?>


            <?php endif; ?>

            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/parallax.css">
            <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/custom.css">



            <?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>

            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->

            <?php wp_head(); ?>

            <!-- gemstone_menu_color    : メニューリンク色 #fff -->
            <!-- gemstone_menu_backgound_color    : メニューリンク背景色 #eee -->
            <!-- gemstone_link_color    : リンク色(normal & visited) #199ece -->
            <!-- gemstone_hover_color   : リンク色(hover) #c00 -->
            <!-- gemstone_title_color   : タイトル色 #333 -->
            <!-- gemstone_text_color    : テキスト色 #666 -->
            <!-- gemstone_subtext_color : サブテキスト色 #ddd -->

            <style>

                /* 背景色 */

                body {
                    background-color:<?php echo get_theme_mod('gemstone_backgound_color'); ?>;
                }

                /* ヘッダ メニューリンク色 */

                navbar-toggle , .icon-bar {
                    border: 2px solid <?php echo get_theme_mod('gemstone_menu_color'); ?>;
                }
                .navbar-nav>li>a, a.navbar-text, section.blog a.btn.btn-success, a.btn.btn-black.btn-lg.btn-block, .nav>li, .credits p {
                    color:<?php echo get_theme_mod('gemstone_menu_color'); ?>;
                }

                /* ヘッダ メニュー背景色 */

                .navbar, footer, table.company th, .pagenation li.active {
                     background-color:<?php echo get_theme_mod('gemstone_menu_backgound_color'); ?>;
                }
                table.company th:after {
                     border-left-color: <?php echo get_theme_mod('gemstone_menu_backgound_color'); ?>;
                }
                /* タイトル色 */

                .gemstone_title {
                    color:<?php echo get_theme_mod('gemstone_title_color'); ?>;
                }


                /* リンク色(normal & visited) */

                a {
                    color:<?php echo get_theme_mod('gemstone_link_color'); ?>;

                }

                .woocommerce-pagination ul li .page-numbers {
                border: 3px solid <?php echo get_theme_mod('gemstone_link_color'); ?>;
                }
                .pagenation li a  {
                    border: 1px solid <?php echo get_theme_mod('gemstone_link_color'); ?>;
                }

                /* リンク色(hover) */

                a:hover, .menu ul li a:hover, .text a:hover, .pagenation li a:hover {
                    color:<?php echo get_theme_mod('gemstone_hover_color'); ?>;
                }
                /* テキスト色 */

                .item_box .detail p {
                    color:<?php echo get_theme_mod('gemstone_text_color'); ?>;
                }


                /* サブテキスト色 */

                .menu h2, .gemstone_subtext, .entry-content blockquote, .entry-content blockquote p, .tag, .username, .mis-slider li figcaption, .mis-container, .fav, figure {color:<?php echo get_theme_mod('gemstone_subtext_color'); ?>;
                }
                .entry-content span.title-number, .title-number {background-color:<?php echo get_theme_mod('gemstone_subtext_color'); ?>;
                }

            </style>

        </head>



            <body onload="initialize();" <?php body_class(get_option( 'color')); ?>>

                <!-- Load Facebook SDK for JavaScript -->
                <div id="fb-root"></div>
                <script>
                    window.fbAsyncInit = function () {
                        // Facebook JavaScript SDKの初期化
                        FB.init({
                            // ダッシュボードのアプリID
                            appId: '1787926928117947',
                            // クロスドメイン対策用のチャンネルファイル
                            channelUrl: '//WWW.YOUR_DOMAIN.COM/channel.html',
                            // Facebookログインステータスをチェック
                            status: false,
                            // ページ上のソーシャルプラグインを探す
                            xfbml: true
                        });
                        // イベントリスナー追加のような初期化の追加処理をここに書きます
                    };
                    // SDKの非同期読み込み
                    (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) {
                            return;
                        }
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "//connect.facebook.net/ja_JP/all.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));

                    FB.ui({
                        method: 'feed',
                        name: 'The Facebook SDK for Javascript',
                        caption: 'Bringing Facebook to the desktop and mobile web',
                        description: (
                            'A small JavaScript library that allows you to harness ' +
                            'the power of Facebook, bringing the user'
                            s identity, ' +
                            'social graph and distribution power to your site.'
                        ),
                        link: 'https://developers.facebook.com/docs/reference/javascript/',
                        picture: 'https://www.fbrell.com/public/f8.jpg'
                    },
                          function (response) {
                        if (response && response.post_id) {
                            alert('Post was published.');
                        } else {
                            alert('Post was not published.');
                        }
                    }
                         );
                </script>


