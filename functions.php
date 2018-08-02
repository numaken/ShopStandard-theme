<?php

////////////////////////////////////////////////////////////////////////////
//管理画面で独自のCSS、JavaScript を読み込む
////////////////////////////////////////////////////////////////////////////

    //管理画面のhead内にCSSを設定する（コードを直接書き込む）
    function my_admin_style(){
        wp_enqueue_style( 'my_admin_style', get_template_directory_uri().'/css/my_admin_style.css' );
    }
    add_action( 'admin_enqueue_scripts', 'my_admin_style' );


    //管理画面のhead内にJavaScriptを設定する（コードを直接書き込む）
    function my_admin_script() {
        echo '<script>
      //ここにスクリプトを記入する
      </script>'.PHP_EOL;
    }
    add_action('admin_print_scripts', 'my_admin_script');


    //投稿画面など特定のページでCSS、JavaScriptを読み込む

        // ファイルを読み込む
        add_action('admin_head-ページファイル名', 'my_admin_script');

        // スタイルを直接書き込む
        add_action('admin_print_styles-ページファイル名', 'my_admin_style');

        // スクリプトを直接書き込む
        add_action('admin_print_scripts-ページファイル名', 'my_admin_script');


        //「ページファイル名」の部分に、CSSやJavaScriptを読み込みたいページのファイル名を指定します。例えば、新規投稿画面の場合は、「admin_print_styles-post-new.php」になります。
        /*
        function my_admin_style() {
            if(get_post_type() === 'post'){
                echo '<style>
            //ここのスタイルを記入する
            </style>'.PHP_EOL;
            }
        }
        add_action('admin_print_styles-post-new.php', 'my_admin_style');
        */


////////////////////////////////////////////////////////////////////////////
//投稿一覧の表示項目にスラッグ、アイキャッチ画像、記事の文字数、記事のIDを追加する
////////////////////////////////////////////////////////////////////////////

    //投稿一覧の表示項目にスラッグ、アイキャッチ画像、記事の文字数、記事のIDを追加する
    function add_posts_columns($columns) {
        //表示項目を定義
        $columns['slug'] = 'スラッグ';
        $columns['thumbnail'] = 'アイキャッチ画像';
        $columns['count'] = '文字数';
        $columns['postid'] = 'ID';

        //スタイルを定義
        $style = '
        <style type="text/css">
          .fixed .column-slug {width: auto !important;}
        </style>
      ';
        echo $style;

        return $columns;
    }
    //表示項目を出力
    function add_posts_columns_row($column_name, $post_id) {
        if('slug' == $column_name) { //スラッグを出力
            $slug = get_post($post_id)->post_name;
            echo $slug;
        } elseif('thumbnail' == $column_name) { //アイキャッチ画像を出力
            $thumb = get_the_post_thumbnail($post_id, array(100,100), 'thumbnail');
            echo ( $thumb ) ? $thumb : '－';
        } elseif('count' == $column_name) { //文字数を出力
            $count = mb_strlen(strip_tags(get_post_field('post_content', $post_id)));
            echo $count;
        } elseif('postid' == $column_name) { //IDを出力
            echo $post_id;
        }
    }
    add_filter( 'manage_posts_columns', 'add_posts_columns' );
    add_action( 'manage_posts_custom_column', 'add_posts_columns_row', 99, 2 );



////////////////////////////////////////////////////////////////////////////
//投稿一覧の表示項目にカスタムタクソノミー（カスタム分類）、カスタムフィールドの値を追加する
////////////////////////////////////////////////////////////////////////////
//スラッグ、アイキャッチ画像、記事の文字数、記事のIDと同様の方法で、カスタムタクソノミー（カスタム分類）、カスタムフィールドの値を管理画面の投稿一覧ページの表示項目に追加することが可能です。

    //投稿一覧の表示項目にカスタムタクソノミー（カスタム分類）、カスタムフィールドを追加する
/*
    function add_posts_columns($columns) {
        //表示項目を定義
        $columns['cattype'] = 'キャットタイプ（カスタムタクソノミー）';
        $columns['yomi'] = 'ヨミガナ（カスタムフィールドの値）';

        //スタイルを定義
        $style = '
        <style type="text/css">
          .fixed .column-slug {width: auto !important;}
        </style>
      ';
        echo $style;

        return $columns;
    }
    //表示項目を出力
    function add_posts_columns_row($column_name, $post_id) {
        if('cattype' == $column_name) { //キャットタイプ（カスタムタクソノミー）を出力
            $cattype = get_the_term_list($post_id, 'cattype', '', ', ');
            echo $cattype;
        } elseif('yomi' == $column_name) { //ヨミガナ（カスタムフィールドの値）を出力
            $yomi = get_post_meta($post_id, 'yomi', true);
            echo esc_html($yomi);
        }
    }
    add_filter( 'manage_posts_columns', 'add_posts_columns' );
    add_action( 'manage_posts_custom_column', 'add_posts_columns_row', 99, 2 );

*/

////////////////////////////////////////////////////////////////////////////
//<head>内のWordPressのバージョンを消す
////////////////////////////////////////////////////////////////////////////

remove_action('wp_head','wp_generator');



////////////////////////////////////////////////////////////////////////////
//管理画面 > 記事編集画面のカスタマイズ
////////////////////////////////////////////////////////////////////////////


    function mySetup() {

        // カスタムメニュー
        /*
        <?php wp_nav_menu(); ?> で表示
        http://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/wp_nav_menu
        */
        add_theme_support( 'menus' );
        register_nav_menus( array(
            'topnav' => 'トップナビゲーション',
            'primary-left'     => __( 'Primary Menu Left', 'L' ),
            'primary-right'    => __( 'Primary Menu Right', 'L' ),
            'sidebar'          => __( 'Sidebar Menu', 'L' ),
        ) );



        //記事編集画面でアイキャッチ画像を使えるようにする
        /*
        <?php the_post_thumbnail(); ?> で表示
        http://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/the_post_thumbnail
        */

        add_theme_support( 'post-thumbnails' ); //テーマをサムネイル表示に対応させる
        set_post_thumbnail_size(1200, 630, true);//サムネイルの画像サイズを設定（trueで切り抜き）

        add_image_size( 'garaly_size', 240, 240, true ); //ギャラリー用の画像サイズ
        add_image_size( 'archive_size', 150, 150, true ); //アーカイブ用の画像サイズ
        add_image_size( 'sidebar_size', 100, 100, true ); //サイドバー最新記事用の画像サイズ
        add_image_size( 'mini_size', 50, 50, true ); //サイドバー最新記事用の画像サイズ

        add_image_size( 'gd_xxs_size', 160, 99, true ); //黄金比
        add_image_size( 'gd_xs_size', 320, 198, true ); //黄金比
        add_image_size( 'gd_sm_size', 480, 297, true ); //黄金比
        add_image_size( 'gd_md_size', 960, 593, true ); //黄金比
        add_image_size( 'gd_lg_size', 1920, 1187, true ); //黄金比


        add_image_size( 'vga_xxs_size', 160, 120, true ); //4:3 VGAサイズ
        add_image_size( 'vga_xs_size', 320, 240, true ); //4:3 VGAサイズ
        add_image_size( 'vga_sm_size', 480, 360, true ); //4:3 VGAサイズ
        add_image_size( 'vga_md_size', 640, 480, true ); //4:3 VGAサイズ
        add_image_size( 'vga_lg_size', 1600, 1200, true ); //4:3 2Mサイズ

        add_image_size( 'hd_xxs_size', 160, 90, true ); //16:9 HDサイズ
        add_image_size( 'hd_xs_size', 320, 180, true ); //16:9 HDサイズ
        add_image_size( 'hd_sm_size', 480, 270, true ); //16:9 HDサイズ
        add_image_size( 'hd_md_size', 960, 540, true ); //16:9 HDサイズ
        add_image_size( 'hd_lg_size', 1920, 1080, true ); //16:9 FullHDサイズ
    }

    add_action( 'after_setup_theme', 'mySetup' );



// リサイズされる画像の画質を100%にする
    function change_jpeg_quality($quality) {
        return 100;
    }
    add_filter('jpeg_quality', 'change_jpeg_quality');


////////////////////////////////////////////////////////////////////////////
//Boostrap導入
////////////////////////////////////////////////////////////////////////////



        //ナビゲーションメニューを表示させるwp_nav_menu()タグにBoostrapを組み込むためのクラス。上のリンクからダウンロードし、wp_bootstrap_navwalker.phpをテーマフォルダに入れておく。
        // Bootstrap Navwalkerを使えるようにする
        require_once('wp_bootstrap_navwalker.php');

            //headタグ内に以下のタグを記述してBootstrapのCSSファイルを読み込み。
            /*
            <link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css">
            */

            //bodyタグ内、ヘッダーのナビゲーションメニューを表示させたい部分に以下のコードを記述する。
            /*
            <nav>
                <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                </div>

                <?php if( has_nav_menu( 'primary' ) ){
                    wp_nav_menu ( array (
                        'menu' => 'primary',
                        'theme_location' => 'primary',
                        'depth' => 2,
                        'container' => 'div',
                        'container_class'  => 'mainmenu',
                        'menu_class' => 'nav navbar-nav collapse navbar-collapse',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker()
                    ));
                } ?>
            </nav>
            */

            //footer.phpに記述すること
            /*
            <script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
            */

            //出力されるHTMLタグの例
            /*
            <div class="mainmenu">
                <ul id="menu-header-menu" class="nav navbar-nav collapse navbar-collapse">
                    <li id="menu-item-93" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-92 current_page_item menu-item-93 active">
                        <a title="HOME" href="http://xxx.com/">HOME</a>
                    </li>
                    <li id="menu-item-196" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-196">
                        <a title="Blog" href="http://xxx.com/blog/">Blog</a>
                    </li>
                    <li id="menu-item-53" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-53">
                        <a title="About" href="http://xxx.com/about/">About</a>
                    </li>
                    <li id="menu-item-71" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-71 dropdown">
                        <a title="Product" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-haspopup="true">Product
                        <span class="caret"></span>
                        </a>
                        <ul role="menu" class=" dropdown-menu">
                            <li id="menu-item-193" class="menu-item menu-item-type-taxonomy menu-item-object-md_category menu-item-193">
                            <a title="Product1" href="http://xxx.com/product/procuct1">Product1</a>
                            </li>
                            <li id="menu-item-195" class="menu-item menu-item-type-taxonomy menu-item-object-md_category menu-item-195">
                            <a title="Product2" href="http://xxx.com/product/procuct2">Product2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            */

// クラスを削除して、表示中メニューに 'current' クラスを付与する
add_filter( 'nav_menu_css_class', 'remove_to_currentClass', 10, 2 );
function remove_to_currentClass( $classes, $item ) {
    $classes = array();
    if( $item -> current == true ) {
        $classes[] = 'current';
    }
    return $classes;
}

// ID を削除する
add_filter('nav_menu_item_id', 'removeId', 10);
function removeId( $id ){
    return $id = array();
}


// ダッシュボード管理バーを消す
add_filter( 'show_admin_bar', '__return_false' );
add_action('widgets_init', function() {
    register_sidebar(array('id' => 'sidebar-1', 'name' => 'Main Sidebar', 'description' => 'Main Sidebar', 'before_widget' => '<aside id="%1$s" class="widget %2$s">', 'after_widget' => '</aside>', 'before_title' => '<div class="widgettitle">', 'after_title' => '</div>'));
});



//　改行の時に自動的にPタグが挿入されるのを防ぐ
remove_filter('the_content', 'wpautop');
remove_filter('the_excerpt', 'wpautop');


// has_post_thumbnail() が true ならアイキャッチ画像を、falseならば「No Post Thumbnail」の画像表示
function post_thumbnail_set () {
    if( has_post_thumbnail() ) {
        echo '<p class="thumbnail-wrap">'; the_post_thumbnail(); echo '</p>'; echo "\n";
    } else {
        echo '<p class="thumbnail-wrap"><img src="'; get_bloginfo('template_url') . '/img/nowprinting.png" alt="No Post Thumbnail" /></p>'; echo "\n";
    }
}


// カスタムヘッダー画像を設置する
$custom_header_defaults = array(
    'default-image'          => get_bloginfo('template_url') . '/img/logo.png',
    'width'                  => 320,
    'height'                 => 70,
    'header-text'            => false,  //ヘッダー画像上にテキストをかぶせる
);
add_theme_support( 'custom-header', $custom_header_defaults );


//カスタムヘッダー機能を有効にする
add_theme_support( 'custom-header', $custom_header_defaults );
add_theme_support('menus');


// カスタム背景画像を設置する
 $custom_background_defaults = array(
     'default-color' => 'ffffff',
     'default-image' => get_bloginfo('template_url') . '/img/background.gif',
 );

// カスタム背景画像機能を有効にする
add_theme_support( 'custom-background', $custom_background_defaults );



//カスタム投稿タイプを登録
add_action('init', 'new_post_type'); // 2016.07.06

function new_post_type() {

    register_post_type(
        'blogs',//投稿タイプ名（識別子）
        array(
            'label' => 'ブログ',
            'labels' => array(
                'add_new_item' => '新規Blogを追加',
                'edit_item' => 'blogを編集',
                'view_item' => 'blogを表示',
                'search_items' => 'blogを検索',
            ),
            'public' => true,// 管理画面に表示しサイト上にも表示する
            'hierarchicla' => true,//コンテンツを階層構造にするかどうか(投稿記事と同様に時系列に)
            'has_archive' => true,//trueにすると投稿した記事のアーカイブページを生成
            'supports' => array(//記事編集画面に表示する項目を配列で指定することができる
                'title',//タイトル
                'editor',//本文（の編集機能）
                'thumbnail',//アイキャッチ画像
                'excerpt'//抜粋
            ),
            'menu_position' => 5//「投稿」の下に追加

        )
    );



      register_post_type(
          'menus',//投稿タイプ名（識別子）
        array(
          'label' => 'メニュー',
          'labels' => array(
            'add_new_item' => '新規メニューを追加',
              'edit_item' => 'メニューを編集',
              'view_item' => 'メニューを表示',
              'search_items' => 'メニューを検索',
          ),
          'public' => true,// 管理画面に表示しサイト上にも表示する
          'hierarchicla' => true,//コンテンツを階層構造にするかどうか(投稿記事と同様に時系列に)
          'has_archive' => true,//trueにすると投稿した記事のアーカイブページを生成
          'supports' => array(//記事編集画面に表示する項目を配列で指定することができる
            'title',//タイトル
            'editor',//本文（の編集機能）
            'thumbnail',//アイキャッチ画像
            'custom-fields',
            'excerpt'//抜粋
          ),
          'menu_position' => 5//「投稿」の下に追加

        )
      );



    register_taxonomy(
        'blogs_cat',
        'blogs',
        array(
            'label' =>  'ブログカテゴリー',
            'labels' => array(
                'popular_items' => 'よく使うブログカテゴリー',
                'edit_item' => 'ブログカテゴリーを編集',
                'add_new_item' => '新規ブログカテゴリーを追加',
                'search_items' =>  'ブログカテゴリーを検索',
            ),
            'public' => true,
            'hierarchical' => true,
            'rewrite' => array('slug' => 'blogs/cat')  //blogs_cat の代わりに blogs/cat でアクセス（URL)
        )
    );



  register_taxonomy(
      'menus_cat',
      'menus',
    array(
        'label' =>  'メニューカテゴリー',
      'labels' => array(
          'popular_items' => 'よく使うメニューカテゴリー',
          'edit_item' => 'メニューカテゴリーを編集',
          'add_new_item' => '新規メニューカテゴリーを追加',
          'search_items' =>  'メニューカテゴリーを検索',
      ),
      'public' => true,
      'hierarchical' => true,
        'rewrite' => array('slug' => 'menus/cat')  //blogs_cat の代わりに blogs/cat でアクセス（URL)
    )
  );



    register_taxonomy(
        'blogs_tag',
        'blogs',
        array(
            'label' => 'ブログタグ',
            'labels' => array(
                'popular_items' =>  'よく使うブログタグ',
                'edit_item' =>'ブログタグを編集',
                'add_new_item' => '新規ブログタグを追加',
                'search_items' =>  'ブログタグを検索',
            ),
            'public' => true,
            'hierarchical' => false,
            'rewrite' => array('slug' => 'blogs/tag')
        )
    );



  register_taxonomy(
      'menus_tag',
      'menus',
    array(
        'label' => 'メニュータグ',
      'labels' => array(
          'popular_items' =>  'よく使うメニュータグ',
          'edit_item' =>'メニュータグを編集',
          'add_new_item' => '新規メニュータグを追加',
          'search_items' =>  'メニュータグを検索',
      ),
      'public' => true,
      'hierarchical' => false,
      'rewrite' => array('slug' => 'menus/tag')
    )
  );



    flush_rewrite_rules();
}

//カテゴリーとタグの URL のリライトルールを設定
add_rewrite_rule('blogs/cat/([^/]+)/?$', 'index.php?blogs_cat=$matches[1]', 'top');
add_rewrite_rule('blogs/tag/([^/]+)/?$', 'index.php?blogs_tag=$matches[1]', 'top');

add_rewrite_rule('customs/cat/([^/]+)/?$', 'index.php?menus_cat=$matches[1]', 'top');
add_rewrite_rule('customs/tag/([^/]+)/?$', 'index.php?menus_tag=$matches[1]', 'top');



global $my_archives_post_type;
add_filter( 'getarchives_where', 'my_getarchives_where', 10, 2 );
function my_getarchives_where( $where, $r ) {
    global $my_archives_post_type;
    if ( isset($r['post_type']) ) {
        $my_archives_post_type = $r['post_type'];
        $where = str_replace( '\'post\'', '\'' . $r['post_type'] . '\'', $where );
    } else {
        $my_archives_post_type = '';
    }
    return $where;
}

add_filter( 'get_archives_link', 'my_get_archives_link' );
function my_get_archives_link($link_html) {
    global $my_archives_post_type;
    if ($my_archives_post_type != '') {
        $add_link = '?post_type=' . $my_archives_post_type;
        $link_html = preg_replace("/href='(.+)'/", "href='$1" . $add_link. "'", $link_html);
    }
    return $link_html;
}



//  外部リンク用のメニューを追加します (クーポン発行メニュー)

add_action ( 'admin_menu', 'artist_add_pages' );
function artist_add_pages () {
    add_menu_page('アプリ管理', 'アプリ管理', '7', 'link', 'link');
}

function add_side_menu_manual() {
    //urlを設定
    $link_url = 'http://mozart.panolabo.com/users/sign_in';
?>
<script type="text/javascript">
    jQuery( function( $ ) {
        $ ("#toplevel_page_link a").attr("href","<?php echo $link_url; ?>");
        $ ("#toplevel_page_link a").attr("target","_blank");
    } );
</script>
<?php
}
add_action('admin_footer', 'add_side_menu_manual');







//function.phpに検索ワードが0や未入力のときにもsearch.phpを使う
function custom_search($search, $wp_query  ) {
    //query['s']があったら検索ページ表示
    if ( isset($wp_query->query['s']) ) $wp_query->is_search = true;
    return $search;
}
add_filter('posts_search','custom_search', 10, 2);




//抜粋の文字制限
function custom_excerpt_length( $length ) {
    return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// 文末文字を変更する
function custom_excerpt_more($more) {
    return ' ... ';
}
add_filter('excerpt_more', 'custom_excerpt_more');




//Wordpressの投稿時にアイキャッチを自動設定
//http://nelog.jp/auto-post-thumbnail-custum

//WP_Filesystemの利用
require_once(ABSPATH . '/wp-admin/includes/image.php');

//イメージファイルがサーバー内にない場合は取得する
function fetch_thumbnail_image($matches, $key, $post_content, $post_id){
    //サーバーのphp.iniのallow_url_fopenがOnでないとき外部サーバーから取得しない
    if ( !ini_get('allow_url_fopen') )
        return null;
    //正しいタイトルをイメージに割り当てる。IMGタグから抽出
    $imageTitle = '';
    preg_match_all('/<\s*img [^\>]*title\s*=\s*[\""\']?([^\""\'>]*)/i', $post_content, $matchesTitle);

    if (count($matchesTitle) && isset($matchesTitle[1])) {
        if ( isset($matchesTitle[1][$key]) )
            $imageTitle = $matchesTitle[1][$key];
    }

    //処理のためのURL取得
    $imageUrl = $matches[1][$key];

    //ファイル名の取得
    $filename = substr($imageUrl, (strrpos($imageUrl, '/'))+1);

    if (!(($uploads = wp_upload_dir(current_time('mysql')) ) && false === $uploads['error'])){
        return null;
    }

    //ユニック（一意）ファイル名を生成
    $filename = wp_unique_filename( $uploads['path'], $filename );

    //ファイルをアップロードディレクトリに移動
    $new_file = $uploads['path'] . "/$filename";

    if (!ini_get('allow_url_fopen')) {
        return null;
        //$file_data = curl_get_file_contents($imageUrl);
    } else {
        if ( WP_Filesystem() ) {//WP_Filesystemの初期化
            global $wp_filesystem;//$wp_filesystemオブジェクトの呼び出し
            //$wp_filesystemオブジェクトのメソッドとしてファイルを取得する
            $file_data = @$wp_filesystem->get_contents($imageUrl);
        }
    }

    if (!$file_data) {
        return null;
    }

    if ( WP_Filesystem() ) {//WP_Filesystemの初期化
        global $wp_filesystem;//$wp_filesystemオブジェクトの呼び出し
        //$wp_filesystemオブジェクトのメソッドとしてファイルに書き込む
        $wp_filesystem->put_contents($new_file, $file_data);
    }

    //ファイルのパーミッションを正しく設定
    $stat = stat( dirname( $new_file ));
    $perms = $stat['mode'] & 0000666;
    @ chmod( $new_file, $perms );

    //ファイルタイプの取得。サムネイルにそれを利用
    $mimes = null;
    $wp_filetype = wp_check_filetype( $filename, $mimes );

    extract( $wp_filetype );

    //ファイルタイプがない場合、これ以上進めない
    if ( ( !$type || !$ext ) && !current_user_can( 'unfiltered_upload' ) ) {
        return null;
    }

    //URLを作成
    $url = $uploads['url'] . "/$filename";

    //添付（attachment）配列を構成
    $attachment = array(
        'post_mime_type' => $type,
        'guid' => $url,
        'post_parent' => null,
        'post_title' => $imageTitle,
        'post_content' => '',
    );

    $file = false;
    $thumb_id = wp_insert_attachment($attachment, $file, $post_id);
    if ( !is_wp_error($thumb_id) ) {
        //attachmentのアップデート
        wp_update_attachment_metadata( $thumb_id, wp_generate_attachment_metadata( $thumb_id, $new_file ) );
        update_attached_file( $thumb_id, $new_file );

        return $thumb_id;
    }

    return null;
}

//投稿内の最初の画像をアイキャッチに設定する（Auto Post Thumnailプラグイン的な機能）
function auto_post_thumbnail_image() {
    global $wpdb;
    global $post;
    //$postが空の場合は終了
    if ( isset($post) && isset($post->ID) ) {
        $post_id = $post->ID;

        //アイキャッチが既に設定されているかチェック
        if (get_post_meta($post_id, '_thumbnail_id', true) || get_post_meta($post_id, 'skip_post_thumb', true)) {
            return;
        }

        $post = $wpdb->get_results("SELECT * FROM {$wpdb->posts} WHERE id = $post_id");

        //正規表現にマッチしたイメージのリストを格納する変数の初期化
        $matches = array();

        //投稿本文からすべての画像を取得
        preg_match_all('/<\s*img [^\>]*src\s*=\s*[\""\']?([^\""\'>]*).+?\/?>/i', $post[0]->post_content, $matches);
        //var_dump($matches);
        //YouTubeのサムネイルを取得（画像がなかった場合）
        if (empty($matches[0])) {
            preg_match('%(?:youtube\.com/(?:user/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $post[0]->post_content, $match);
            if (!empty($match[1])) {
                $matches=array(); $matches[0]=$matches[1]=array('http://img.youtube.com/vi/'.$match[1].'/mqdefault.jpg');
            }
        }

        if (count($matches)) {
            foreach ($matches[0] as $key => $image) {
                $thumb_id = null;
                //画像がイメージギャラリーにあったなら、サムネイルIDをCSSクラスに追加（イメージタグからIDを探す）
                preg_match('/wp-image-([\d]*)/i', $image, $thumb_id);
                if ( isset($thumb_id[1]) )
                    $thumb_id = $thumb_id[1];

                //サムネイルが見つからなかったら、データベースから探す
                if (!$thumb_id &&
                    //画像のパスにサイト名が含まれているとき
                    ( strpos($image, site_url()) !== false ) ) {
                    //$image = substr($image, strpos($image, '"')+1);
                    preg_match('/src *= *"([^"]+)/i', $image, $m);
                    $image = $m[1];
                    if ( isset($m[1]) ) {
                        //wp_postsテーブルからguidがファイルパスのものを検索してIDを取得
                        $result = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$image."'");
                        //IDをサムネイルをIDにセットする
                        if ( isset($result[0]) )
                            $thumb_id = $result[0]->ID;
                    }

                    //サムネイルなどで存在しないときはフルサイズのものをセットする
                    if ( !$thumb_id ) {
                        //ファイルパスの分割
                        $path_parts = pathinfo($image);
                        //サムネイルの追加文字列(-680x400など)を取得
                        preg_match('/-\d+x\d+$/i', $path_parts["filename"], $m);
                        //画像のアドレスにサイト名が入っていてサムネイル文字列が入っているとき
                        if ( isset($m[0]) ) {
                            //サムネイルの追加文字列(-680x400など)をファイル名から削除
                            $new_filename = str_replace($m[0], '', $path_parts["filename"]);
                            //新しいファイル名を利用してファイルパスを結語
                            $new_filepath = $path_parts["dirname"].'/'.$new_filename.'.'.$path_parts["extension"];
                            //wp_postsテーブルからguidがファイルパスのものを検索してIDを取得
                            $result = $wpdb->get_results("SELECT ID FROM {$wpdb->posts} WHERE guid = '".$new_filepath."'");
                            //IDをサムネイルをIDにセットする
                            if ( isset($result[0]) )
                                $thumb_id = $result[0]->ID;
                        }
                    }
                }


                //それでもサムネイルIDが見つからなかったら、画像をURLから取得する
                if (!$thumb_id) {
                    $thumb_id = fetch_thumbnail_image($matches, $key, $post[0]->post_content, $post_id);
                }

                //サムネイルの取得に成功したらPost Metaをアップデート
                if ($thumb_id) {
                    update_post_meta( $post_id, '_thumbnail_id', $thumb_id );
                    break;
                }
            }
        }
    }
}
//新しい投稿で自動設定する場合
add_action('save_post', 'auto_post_thumbnail_image');
add_action('draft_to_publish', 'auto_post_thumbnail_image');
add_action('new_to_publish', 'auto_post_thumbnail_image');
add_action('pending_to_publish', 'auto_post_thumbnail_image');
add_action('future_to_publish', 'auto_post_thumbnail_image');
add_action('xmlrpc_publish_post', 'auto_post_thumbnail_image');


// パンくずリスト
/**
 * パンくずナビゲーションを出力します。
 *
 * @param array $args {
 *      オプションです。パンくずリストの出力を配列型の引数で変更できます。
 *
 *      @type string    $container          パンくずリスト囲むタグを指定。デフォルトは'div'。
 *      @type string    $container_class    パンくずリストを囲むタグのClassを指定。デフォルトは'breadcrumb-section'。
 *      @type string    $container_id       パンくずリストを囲むタグのIDを指定。デフォルトは無し。
 *      @type string    $crumb_tag          パンくずリスト自体のタグを指定。デフォルトは'ul'で、他に指定できるのは'ol'のみ。
 *      @type string    $crumb_class        パンくずリスト自体のタグにClassを指定。デフォルトは'crumb-lists'。
 *      @type string    $crumb_id           パンくずリスト自体のタグにIDを指定。デフォルトは無し。
 *      @type bool      $echo               パンくずリストのHTMLを変数に格納する場合は'false'を指定。デフォルトは'true'なので直接出力する。
 *      @type string    $home_class         パンくずリストのホームの階層を示すタグにClassを指定。デフォルトは'crumb-home'。
 *      @type string    $home_text          パンくずリストのホームの階層を示すタグのテキストを指定。デフォルトは'ホーム'。
 *      @type string    $delimiter          パンくずリストの区切り文字を指定。デフォルトは'<li>&nbsp;&gt;&nbsp;</li>'。
 *      @type string    $crumb_microdata    パンくずリストタグ['ul' または 'ol']に指定するリッチスニペット。デフォルトは' itemprop="breadcrumb"'。
 *      @type string    $li_microdata       パンくずリストのliタグに指定するリッチスニペット。デフォルトは' itemscope itemtype="http://data-vocabulary.org/Breadcrumb"'。
 *      @type string    $url_microdata      パンくずリストのaタグに指定するリッチスニペット。デフォルトは' itemprop="url"'。
 *      @type string    $title_microdata    パンくずリストのspanタグに指定するリッチスニペット。デフォルトは' itemprop="title"'。
 * }
 *
 * @return string 各ページに合致するパンくずナビゲーションのHTMLを吐き出します。
 *
 * @version 1.3
 */


function breadcrumb( $args = array() ) {
    $defaults = array(
        'container'         => 'div',
        'container_class'   => 'breadcrumb-section',
        'container_id'      => 'breadcrumb',
        'crumb_tag'         => 'ul',
        'crumb_class'       => 'breadcrumb',
        'crumb_id'          => '',
        'echo'              => 'true',
        'home_class'        => 'crumb-home',
        'home_text'         => '&nbsp;トップ',
        'delimiter'         => '&nbsp;&nbsp;',
        'crumb_microdata'   => ' itemprop="breadcrumb"',
        'li_microdata'      => ' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"',
        'url_microdata'     => ' itemprop="url"',
        'title_microdata'   => ' itemprop="title"'
);




    $args = wp_parse_args( $args, $defaults );
    $args = (object) $args;
    $breadcrumb_html      = '';
    //region Rich Snippets (microdata) Setting
    $crumb_microdata    = $args->crumb_microdata ? $args->crumb_microdata : '';
    $li_microdata       = $args->li_microdata ? $args->li_microdata : '';
    $url_microdata      = $args->url_microdata ? $args->url_microdata : '';
    $title_microdata    = $args->title_microdata ? $args->title_microdata : '';
    //endregion
    //region Nested Function
    /**
     * 現在のページのパンくずリスト用タグを作成します。
     *
     * @param $current_permalink : current crumb permalink
     * @param string $current_text : current crumb text
     * @param string $current_class : class name
     * @param array $args : microdata settings
     *
     * @return string
     */
    /*
     * Nest Function [current_crumb_tag()] Argument
     */
    $current_microdata = array(
        'li_microdata'      => $li_microdata,
        'url_microdata'     => $url_microdata,
        'title_microdata'   => $title_microdata
    );
    function current_crumb_tag( $current_permalink, $current_text = '', $args = array(), $current_class = 'current-crumb' ) {
        $defaults = array(
            'li_microdata'      => ' itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb"',
            'url_microdata'     => ' itemprop="url"',
            'title_microdata'   => ' itemprop="title"'
        );
        $args = wp_parse_args( $args, $defaults );
        $args = (object) $args;
        $current_class      = $current_class ? ' class="' . esc_attr( $current_class ) . '"' : '';
        $start_anchor_tag   = $current_permalink ? '<a href="' . $current_permalink . '"' . $args->url_microdata . '>' : '<span class="crumb-no-link">';
        $end_anchor_tag     = $current_permalink ? '</a>' : '</span>';
        $current_before     = '<li' . $current_class . $args->li_microdata . '>' . $start_anchor_tag . '<span' . $args->title_microdata . '><strong>';
        $current_crumb_tag  = $current_text;
        $current_after      = '</strong></span>' . $end_anchor_tag . '</li>';
        if ( get_query_var( 'paged' ) ) {
            if ( is_paged() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) {
                $current_after = ' (ページ' . get_query_var( 'paged' ) . ')' . $current_after;
            }
        } elseif ( ( is_page() || is_single() ) && get_query_var( 'page' ) ) {
            $current_after = ' (ページ' . get_query_var( 'page' ) . ')' . $current_after;
        }
        return $current_before . $current_crumb_tag . $current_after;
    }
    //endregion
    if (
        ( ! is_home() && ! is_front_page() )
        || ( is_home() && ! is_front_page() )
        || is_paged()
    ) {
        // Breadcrumb Container Start Tag
        if ( $args->container ) {
            $class = $args->container_class ? ' class="' . esc_attr( $args->container_class ) . '"' : ' class="' . $defaults['container_class'] . '"';
            $id = $args->container_id ? ' id="' . esc_attr( $args->container_id ) . '"' : '';
            $breadcrumb_html .= '<'. $args->container . $id . $class . '>';
        }
        // Breadcrumb Start Tag
        if ( $args->crumb_tag ) {
            $crumb_tag_allowed_tags = apply_filters( 'crumb_tag_allowed_tags', array( 'ul', 'ol' ) );
            if ( in_array( $args->crumb_tag, $crumb_tag_allowed_tags ) ) {
                $id = $args->crumb_id ? ' id="' . esc_attr( $args->crumb_id ) . '"' : '';
                $class = $args->crumb_class ? ' class="' . esc_attr( $args->crumb_class ) . '"' : '';
                $breadcrumb_html .= '<' . $args->crumb_tag . $id . $class . $crumb_microdata . '>';
            }
        } else {
            $breadcrumb_html .= '<' . $defaults['crumb_tag'] .  $crumb_microdata . '>';
        }
        global $post;
        // Home Crumb Item
        $home_class = $args->home_class ? ' class="'. esc_attr( $args->home_class ) . '"' : '';
        $breadcrumb_html .= '<li'. $home_class . $li_microdata . '><a href="' . home_url() . '"' . $url_microdata . '><span ' . $title_microdata . '><i class="fa fa-home"></i>' . $args->home_text . '</span></a></li>' . $args->delimiter;
        if ( is_home() && ! is_front_page() ) {
            $home_ID = get_option('page_for_posts');
            $breadcrumb_html .= current_crumb_tag( get_the_permalink( $home_ID ), get_the_title( $home_ID ), $current_microdata );
        } else if ( is_paged() ) {
            if ( 'post' == get_post_type() ) {
                $breadcrumb_html .= current_crumb_tag( get_pagenum_link( get_query_var( 'paged' ) ), '投稿一覧', $current_microdata );
            }
            elseif ( 'page' == get_post_type() ) {
                $breadcrumb_html .= current_crumb_tag( get_pagenum_link( get_query_var( 'paged' ) ), get_the_title(), $current_microdata );
            }
            //            else {
            //                $breadcrumb_html .= $current_before . get_post_type_object( get_post_type() )->label . $current_after;
            //            }
        } elseif ( is_category() ) {
            $cat = get_queried_object();
            if ( $cat->parent != 0 ) {
                $ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
                foreach ( $ancestors as $ancestor ) {
                    $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_category_link( $ancestor ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_cat_name( $ancestor ) . '</span></a></li>' . $args->delimiter;
                }
            }
            $breadcrumb_html .= current_crumb_tag( get_category_link( $cat->term_id ), single_cat_title( '', false ), $current_microdata );
        } elseif ( is_day() ) {
            $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_year_link( get_the_time( 'Y' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_time( 'Y' ) . '年</span></a></li>' . $args->delimiter;
            $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_time( 'F' ) . '</span></a></li>' . $args->delimiter;
            $breadcrumb_html .= current_crumb_tag( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ), get_the_time( 'd' ) . '日', $current_microdata );
        } elseif ( is_month() ) {
            $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_year_link( get_the_time( 'Y' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_time( 'Y' ) . '年</span></a></li>' . $args->delimiter;
            $breadcrumb_html .= current_crumb_tag( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ), $current_microdata );
        } elseif ( is_year() ) {
            $breadcrumb_html .= current_crumb_tag( get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) . '年', $current_microdata );
        } elseif ( is_single() && ! is_attachment() ) {
            $single = get_queried_object();
            if ( get_post_type() == 'post' ) {
                if ( get_option( 'page_for_posts' ) ) {
                    $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_page_link( get_option( 'page_for_posts' ) ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_title( get_option( 'page_for_posts' ) ) . '</span></a></li>' . $args->delimiter;
                }
                $categories = get_the_category( $post->ID );
                $cat        = $categories[0];
                if ( $cat->parent != 0 ) {
                    $ancestors = array_reverse( get_ancestors( $cat->cat_ID, 'category' ) );
                    foreach ( $ancestors as $ancestor ) {
                        $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_category_link( $ancestor ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_cat_name( $ancestor ) . '</span></a></li>' . $args->delimiter;
                    }
                }
                $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_category_link( $cat->cat_ID ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_cat_name( $cat->cat_ID ) . '</span></a></li>' . $args->delimiter;
                $breadcrumb_html .= current_crumb_tag( get_the_permalink( $single->ID ), get_the_title( $single->ID ), $current_microdata );
            } else {
                $post_type_object = get_post_type_object( get_post_type() );
                $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_post_type_archive_link( get_post_type() ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . $post_type_object->label . '</span></a></li>' . $args->delimiter;
                $taxonomies =  get_object_taxonomies( get_post_type() );
                $category_term = '';
                foreach ( $taxonomies as $taxonomy ) {
                    $taxonomy_obj = get_taxonomy( $taxonomy );
                    if ( true == $taxonomy_obj->hierarchical ) {
                        $category_term = $taxonomy_obj;
                        break;
                    }
                }
                if ( $category_term ) {
                    $terms = get_the_terms( $post->ID, $category_term->name );
                    if ( $terms ) {
                        if ( ! $terms || is_wp_error( $terms ) )
                            $terms = array();
                        $terms = array_values( $terms );
                        $term = $terms[0];
                        if ( $term->parent != 0 ) {
                            $ancestors = array_reverse( get_ancestors( $term->term_id, $term->taxonomy ) );
                            foreach ( $ancestors as $ancestor ) {
                                $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_term_link( $ancestor, $term->taxonomy ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_term( $ancestor, $term->taxonomy )->name . '</span></a></li>' . $args->delimiter;
                            }
                        }
                        $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_term_link( $term, $term->taxonomy ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . $term->name . '</span></a></li>' . $args->delimiter;
                    }
                }
                $breadcrumb_html .= current_crumb_tag( get_the_permalink( $single->ID ), get_the_title( $single->ID ), $current_microdata );
            }
        } elseif ( is_attachment() ) {
            $attachment = get_queried_object();
            if ( ! empty( $post->post_parent ) ) {
                $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_permalink( $post->post_parent ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_title( $post->post_parent ) . '</span></a></li>' . $args->delimiter;
            }
            $breadcrumb_html .= current_crumb_tag( get_the_permalink( $attachment->ID ), get_the_title( $attachment->ID ), $current_microdata );
        } elseif ( is_page() ) {
            $page = get_queried_object();
            if ( $post->post_parent ) {
                $ancestors = array_reverse( get_post_ancestors( $post->ID ) );
                foreach ( $ancestors as $ancestor ) {
                    $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_permalink( $ancestor ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_the_title( $ancestor ) . '</span></a></li>' . $args->delimiter;
                }
            }
            $breadcrumb_html .= current_crumb_tag( get_the_permalink( $page->ID ), get_the_title( $page->ID ), $current_microdata );
        } elseif ( is_search() ) {
            $breadcrumb_html .= current_crumb_tag( get_search_link(), get_search_query() . '" の検索結果', $current_microdata );
        } elseif ( is_tag() ) {
            $tag = get_queried_object();
            $breadcrumb_html .= current_crumb_tag( get_term_link( $tag->term_id, $tag->taxonomy ), single_tag_title( '', false ), $current_microdata );
        } elseif ( is_tax() ) {
            $taxonomy_name  = get_query_var( 'taxonomy' );
            $post_types = get_taxonomy( $taxonomy_name )->object_type;
            $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_post_type_archive_link( $post_types[0] ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_post_type_object( $post_types[0] )->label . '</span></a></li>' . $args->delimiter;
            $tax = get_queried_object();
            if ( $tax->parent != 0 ) {
                $ancestors = array_reverse( get_ancestors( $tax->term_id, $tax->taxonomy ) );
                foreach ( $ancestors as $ancestor ) {
                    $breadcrumb_html .= '<li' . $li_microdata . '><a href="' . get_term_link( $ancestor, $tax->taxonomy ) . '"' . $url_microdata . '><span' . $title_microdata . '>' . get_term( $ancestor, $tax->taxonomy )->name . '</span></a></li>' . $args->delimiter;
                }
            }
            $breadcrumb_html .= current_crumb_tag( get_term_link( $tax->term_id, $tax->taxonomy ), single_tag_title( '', false ), $current_microdata );
        } elseif ( is_author() ) {
            $author = get_queried_object();
            $breadcrumb_html .= current_crumb_tag( get_author_posts_url( $author->ID ), get_the_author_meta( 'display_name' ), $current_microdata );
        } elseif ( is_404() ) {
            $breadcrumb_html .= current_crumb_tag( null, '404 Not found' );
        } elseif ( is_post_type_archive( get_post_type() ) ) {
            // elseif ( ! is_single() && ! is_page() && get_post_type() != 'post' && ! is_search() )
            if ( false == get_post_type() ) {
                $post_type_obj = get_queried_object();
                $breadcrumb_html .= current_crumb_tag( $post_type_obj->name, $post_type_obj->label, $current_microdata );
            } else {
                $post_type_obj = get_post_type_object( get_post_type() );
                $breadcrumb_html .= current_crumb_tag( get_post_type_archive_link( get_post_type() ), $post_type_obj->label, $current_microdata );
            }
        } else {
            $breadcrumb_html .= current_crumb_tag( site_url(), wp_title( '', true ), $current_microdata );
        }
    }
    // Breadcrumb End Tag
    if ( $args->crumb_tag ) {
        $crumb_tag_allowed_tags = apply_filters( 'crumb_tag_allowed_tags', array( 'ul', 'ol' ) );
        if ( in_array( $args->crumb_tag, $crumb_tag_allowed_tags ) ) {
            $breadcrumb_html .= '</' . $args->crumb_tag . '>';
        }
    } else {
        $breadcrumb_html .= '</' . $defaults['crumb_tag'] . '>';
    }
    // Breadcrumb Container End Tag
    if ( $args->container ) {
        $breadcrumb_html .= '</' . $args->container . '>';
    }
    if ( $args->echo )
        echo $breadcrumb_html;
    else
        return $breadcrumb_html;
}




//Pagenation
function pagination($pages = '', $range = 2)
{
    $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

    global $paged;//現在のページ値
    if(empty($paged)) $paged = 1;//デフォルトのページ

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;//全ページ数を取得
        if(!$pages)//全ページ数が空の場合は、１とする
        {
            $pages = 1;
        }
    }

    if(1 != $pages)//全ページが１でない場合はページネーションを表示する
    {
        echo "<div class=\"pagenation\">\n";
        echo "<ul>\n";
        //Prev：現在のページ値が１より大きい場合は表示
        if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
        }
        //Next：総ページ数より現在のページ値が小さい場合は表示
        if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
        echo "</ul>\n";
        echo "</div>\n";
    }
}




// ログイン画面のカスタマイズ

// ロゴ変更
function custom_login_logo() {
    echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/img/logo_colorful.png) no-repeat !important; }</style>';
}
add_action('login_head', 'custom_login_logo');

// CSS変更
function custom_login() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_bloginfo('template_directory').'/login.css" />';
}
add_action('login_head', 'custom_login');

// 管理画面左上の「W」ロゴマークを変更 32x32px
add_action('admin_head', 'my_custom_logo');
function my_custom_logo() {
    echo '<style type="text/css">#header-logo { background-image:url('.get_bloginfo('template_directory').'/img/admin-logo-image.gif) !important; }</style>';
}


// フッターのWordPressリンクを非表示

function custom_admin_footer() {
    echo '<a href="mailto:kashiwa@legcent.com">お問い合わせ</a>';
}
add_filter('admin_footer_text', 'custom_admin_footer');


// 管理バーの項目を非表示
function remove_admin_bar_menu( $wp_admin_bar ) {
    $wp_admin_bar->remove_menu( 'wp-logo' ); // WordPressシンボルマーク
    $wp_admin_bar->remove_menu('my-account'); // マイアカウント
}
add_action( 'admin_bar_menu', 'remove_admin_bar_menu', 70 );

// 管理バーのヘルプメニューを非表示にする
function my_admin_head(){
    echo '<style type="text/css">#contextual-help-link-wrap{display:none;}</style>';
}
add_action('admin_head', 'my_admin_head');

// 管理バーにログアウトを追加
function add_new_item_in_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->add_menu(array(
        'id' => 'new_item_in_admin_bar',
        'title' => __('ログアウト'),
        'href' => wp_logout_url()
    ));
}
add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');


// ダッシュボードウィジェット非表示
function example_remove_dashboard_widgets() {
    if (!current_user_can('administrator')) { //level10以下のユーザーの場合ウィジェットをunsetする
        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
        unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
        unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
    }
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');


// メニューを非表示にする
function remove_menus () {
    if (!current_user_can('administrator')) { //level10以下のユーザーの場合メニューをunsetする
        remove_menu_page('wpcf7'); //Contact Form 7
        global $menu;
        unset($menu[2]); // ダッシュボード
        unset($menu[4]); // メニューの線1
        unset($menu[5]); // 投稿
        unset($menu[10]); // メディア
        unset($menu[15]); // リンク
        unset($menu[20]); // ページ
        unset($menu[25]); // コメント
        unset($menu[59]); // メニューの線2
        unset($menu[60]); // テーマ
        unset($menu[65]); // プラグイン
        unset($menu[70]); // プロフィール
        unset($menu[75]); // ツール
        unset($menu[80]); // 設定
        unset($menu[90]); // メニューの線3
    }
}
add_action('admin_menu', 'remove_menus');

// 投稿画面の項目を非表示にする
function remove_default_post_screen_metaboxes() {
    if (!current_user_can('administrator')) { // level10以下のユーザーの場合メニューをremoveする
        remove_meta_box( 'postcustom','post','normal' ); // カスタムフィールド
        remove_meta_box( 'postexcerpt','post','normal' ); // 抜粋
        remove_meta_box( 'commentstatusdiv','post','normal' ); // ディスカッション
        remove_meta_box( 'commentsdiv','post','normal' ); // コメント
        remove_meta_box( 'trackbacksdiv','post','normal' ); // トラックバック
        remove_meta_box( 'authordiv','post','normal' ); // 作成者
        remove_meta_box( 'slugdiv','post','normal' ); // スラッグ
        remove_meta_box( 'revisionsdiv','post','normal' ); // リビジョン
    }
}
add_action('admin_menu','remove_default_post_screen_metaboxes');



/* Color Customizer additions setting */
//管理画面のカスタマイズにテーマカラーの設定セクションを追加
function gemstone_customize_register($wp_customize) {

    // Link Color
    $wp_customize->add_setting( 'gemstone_backgound_color', array( 'default' => '#ffffff','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_backgound_color', array(
        'label' => __( '背景色', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_backgound_color',
    ) ) );

    // Link Color
    $wp_customize->add_setting( 'gemstone_menu_color', array( 'default' => '#fff','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_menu_color', array(
        'label' => __( 'headerNavi｜リンク色', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_menu_color',
    ) ) );

    $wp_customize->add_setting( 'gemstone_menu_backgound_color', array( 'default' => '#333333','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_menu_backgound_color', array(
        'label' => __( 'headerNavi｜背景色', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_menu_backgound_color',
    ) ) );

    $wp_customize->add_setting( 'gemstone_link_color', array( 'default' => '#199ece','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_link_color', array(
        'label' => __( 'Body｜リンク色(normal & visited)', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_link_color',
    ) ) );

    $wp_customize->add_setting( 'gemstone_hover_color', array( 'default' => '#c00','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_hover_color', array(
        'label' => __( 'Body｜リンク色(hover)', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_hover_color',
    ) ) );

    $wp_customize->add_setting( 'gemstone_title_color', array( 'default' => '#333','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_title_color', array(
        'label' => __( 'タイトル色', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_title_color',
    ) ) );

    $wp_customize->add_setting( 'gemstone_text_color', array( 'default' => '#666','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_text_color', array(
        'label' => __( 'テキスト色', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_text_color',
    ) ) );

    $wp_customize->add_setting( 'gemstone_subtext_color', array( 'default' => '#ddd','sanitize_callback' => 'sanitize_text_field', ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'gemstone_subtext_color', array(
        'label' => __( 'サブテキスト色', 'gemstone' ),
        'section' => 'colors',
        'settings' => 'gemstone_subtext_color',
    ) ) );

}

add_action('customize_register', 'gemstone_customize_register');



// OGP
function ogp_prefix() {
    if (!is_admin()) {
        $ogp_ns = 'og: http://ogp.me/ns#';
        $fb_ns  = 'fb: http://ogp.me/ns/fb#';

        if (!is_singular()) {
            $type_ns = 'website: http://ogp.me/ns/website#';
        } else {
            $type_ns = 'article: http://ogp.me/ns/article#';
        }
        printf('prefix="%1$s %2$s %3$s"', $ogp_ns, $fb_ns, $type_ns);
    }
}

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

        //Appleアプリタイトル
        global $app_title;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $app_title =  get_post_meta($get_page_id,'app_title' ,true); //ページIDを元にカスタムフィールドの値取得

        //Appleアプリ説明文
        global $app_description;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $app_description =  get_post_meta($get_page_id,'app_description' ,true); //ページIDを元にカスタムフィールドの値取得

        //Googleアプリurl
        global $app_url_android;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $app_url_android     =  get_post_meta($get_page_id,'gapp' ,true); //ページIDを元にカスタムフィールドの値取得


        //Appleアプリurl
        global $app_url_iphone;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $app_url_iphone     =  get_post_meta($get_page_id,'iapp' ,true); //ページIDを元にカスタムフィールドの値取得



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


    // 備考情報

        //予約システム利用可否
        global $remarks;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $remarks     =  get_post_meta($get_page_id,'remarks' ,true); //ページIDを元にカスタムフィールドの値取得



    // インスタグラム Api

        //インスタグラム連携利用可否
        global $insta_sw;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $insta_sw     =  get_post_meta($get_page_id,'instaconnect' ,true); //ページIDを元にカスタムフィールドの値取得

        //インスタグラムアクセストークン
        global $insta_token;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $insta_token     =  get_post_meta($get_page_id,'insta_token' ,true); //ページIDを元にカスタムフィールドの値取得

        //インスタグラムユーザー名
        global $insta_username;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $insta_username     =  get_post_meta($get_page_id,'insta_username' ,true); //ページIDを元にカスタムフィールドの値取得

        //インスタグラムキャッチコピー
        global $insta_catchcopy;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $insta_catchcopy     =  get_post_meta($get_page_id,'insta_catchcopy' ,true); //ページIDを元にカスタムフィールドの値取得

        //インスタグラム説明文
        global $insta_description;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $insta_description     =  get_post_meta($get_page_id,'insta_description' ,true); //ページIDを元にカスタムフィールドの値取得

        //ビルボードに設定するタイトル
        global $billboard_insta_title1;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_insta_title1     =  get_post_meta($get_page_id,'billboard_insta_title1' ,true); //ページIDを元にカスタムフィールドの値取得

        //ビルボードに設定するキャプション
        global $billboard_insta_caption1;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_insta_caption1     =  get_post_meta($get_page_id,'billboard_insta_caption1' ,true); //ページIDを元にカスタムフィールドの値取得

        //ビルボードに設定する背景画像
        global $billboard_insta_img1;
        $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_insta_img1     =  get_post_meta($get_page_id,'billboard_insta_img1' ,true); //ページIDを元にカスタムフィールドの値取得


    //　TOPビルボードエリア設定

        //ビルボードに設定する背景画像1
        global $billboard_bg_img1;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_bg_img1     =  get_post_meta($get_page_id,'billboard_bg_img1' ,true); //ページIDを元にカスタムフィールドの値取得

        //ビルボードに設定する背景画像2
        global $billboard_bg_img2;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_bg_img2     =  get_post_meta($get_page_id,'billboard_bg_img2' ,true); //ページIDを元にカスタムフィールドの値取得

        //ビルボードに設定する背景画像3
        global $billboard_bg_img3;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_bg_img3     =  get_post_meta($get_page_id,'billboard_bg_img3' ,true); //ページIDを元にカスタムフィールドの値取得

    //　フッター

        //フッターロゴ画像
        global $footer_logo_img;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $footer_logo_img  =  get_post_meta($get_page_id,'footer_logo_img' ,true); //ページIDを元にカスタムフィールドの値取得

        //フッター背景画像
        global $footer_bg_img1;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $footer_bg_img1     =  get_post_meta($get_page_id,'footer_bg_img1' ,true); //ページIDを元にカスタムフィールドの値取得


        //フリーワード
        global $remarks;
        $get_page_id = get_page_by_path("about"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $remarks     =  get_post_meta($get_page_id,'remarks' ,true); //ページIDを元にカスタムフィールドの値取得


    //　ブログ情報

        global $billboard_title1_event1;
        $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $billboard_title1_event1 =  get_post_meta($get_page_id,'billboard_title1_event1' ,true); //ページIDを元にカスタムフィールドの値取得

        global $image_event1;
        $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $image_event1 =  get_post_meta($get_page_id,'image_event1' ,true); //ページIDを元にカスタムフィールドの値取得

        global $caption_event1;
        $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $caption_event1 =  get_post_meta($get_page_id,'caption_event1' ,true); //ページIDを元にカスタムフィールドの値取得

        global $background_image5;
        $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $background_image5 =  get_post_meta($get_page_id,'background_image5' ,true); //ページIDを元にカスタムフィールドの値取得

        global $background_color5;
        $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $background_color5 =  get_post_meta($get_page_id,'background_color5' ,true); //ページIDを元にカスタムフィールドの値取得

        global $title_color5;
        $get_page_id = get_page_by_path("blogs"); //スラッグ名からページのパス取得
        $get_page_id = $get_page_id->ID; //ページパスからページidを取得
        $title_color5 =  get_post_meta($get_page_id,'title_color5' ,true); //ページIDを元にカスタムフィールドの値取得

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


/**
 * Twitterのアカウントをリンクに変換します
https://lab.maro-log.net/post-2826/
*/
function add_twitter_link($content) {
    $pattern= '/(?<=^|(?<=[^a-zA-Z0-9-_\.]))@([A-Za-z]+[A-Za-z0-9_]+)/i';
    $replace= '<span><i class="fab fa-twitter" style="color: #55ACEE;"></i></span><a href="https://www.twitter.com/$1">&ensp;@$1</a>';
    $content= preg_replace($pattern, $replace, $content);
    return $content;
}

add_filter( "the_content", "add_twitter_link" );




// RSSフィードに画像を追加
//function add_thumb_to_RSS($content) {
//    global $post;
//    if ( has_post_thumbnail( $post->ID )) {
//        $content = '<p>' . get_the_post_thumbnail( $post->ID) . '<p>' . $content;
//    }
//    return $content;
//}
//add_filter('the_excerpt_rss', 'add_thumb_to_RSS');
//add_filter('the_content_feed', 'add_thumb_to_RSS');

//　複数にまたがる投稿タイプを一つのRSSでまとめて吐き出す
function mysite_feed_request($vars) {
    if ( isset($vars['feed']) && !isset($vars['post_type']) ){
        $vars['post_type'] = array(
            'post',
            'blogs',
            'menus'
        );
    }
    return $vars;
}
add_filter( 'request', 'mysite_feed_request' );




// 記事に含まれる1枚目の画像を表示する
/* <img src="<?php echo catch_that_image(); ?>"> */
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){
        $first_img = "/images/default.jpg";
    }
    return $first_img;
}

// SVGファイルをアップロード
function my_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'my_upload_mimes');


// ユーザープロフィールの項目を追加
//「$contactmethods['コードの中に使うテキスト'] = ‘管理画面に表示されるテキスト’;」を増やせばいくつでも増やせます。
/* 表示は、投稿者の Twitter ID: <?php the_author_meta('twitter'); ?>*/
/* <?php the_author_meta('twitter'); ?> */
function my_new_contactmethods( $contactmethods ) {
    $contactmethods['twitter'] = 'Twitter';
    $contactmethods['facebook'] = 'Facebook';
    return $contactmethods;
}
add_filter('user_contactmethods','my_new_contactmethods',10,1);



//CSS、JSファイルに編集時間をバージョンとして付加する（ファイル編集後のブラウザキャッシュ対策）
add_filter( 'style_loader_src', 'add_file_ver_to_css_js_demo');
add_filter( 'script_loader_src', 'add_file_ver_to_css_js_demo');
if ( !function_exists( 'add_file_ver_to_css_js_demo' ) ):
function add_file_ver_to_css_js_demo( $src ) {
    //サーバー内のファイルの場合
    if (strpos( $src, site_url() ) !== false) {
        // //Wordpressのバージョンを除去する場合
        // if ( strpos( $src, 'ver=' ) )
        //   $src = remove_query_arg( 'ver', $src );

        //クエリーを削除したファイルURLを取得
        $removed_src = preg_replace('{\?.+$}i', '', $src);
        //URLをパスに変換
        $resource_file = str_replace(site_url('/'), ABSPATH, $removed_src );
        //ファイルの編集時間バージョンを追加
        $src = add_query_arg( 'fver', date('Ymdhis', filemtime($resource_file)), $src );
    }
    return $src;
}
endif;


////////////////////////////////////////////////////////////////////////////
//管理画面メニューに固定ページ一覧表示
////////////////////////////////////////////////////////////////////////////


add_action( 'admin_menu', 'add_pages_sub_menu' );
function add_pages_sub_menu() {
    $pages = get_pages();
    foreach( $pages as $page ) {
        add_pages_page( '', $page->post_title, 'manage_options', 'post.php?post=' . $page->ID . '&action=edit' );
    }
}

add_filter( 'parent_file', 'set_current_menu' );
function set_current_menu( $parent_file ) {
    global $submenu_file, $current_screen, $pagenow, $action, $post;
    $page_IDs = [];
    $pages = get_pages();
    foreach( $pages as $page ) {
        $page_IDs[] = $page->ID;
    }

    $post_type = $current_screen->post_type;
    if ( $pagenow == 'post.php' && $post_type == 'page' && $action == 'edit' && in_array( $post->ID, $page_IDs ) ) {
        $pageFlag = true;
        $submenu_file = 'post.php?post=' . $post->ID . '&action=edit';
        $parent_file = 'edit.php?post_type=page';
    }
    return $parent_file;
}




?>
