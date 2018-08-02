<?php

/**
 * ogp options
 */
function get_ogp_options() {
    // facebookのアプリID
    $options['fb_app_id'] = '201350509905718';
    // ツイッターアカウントのID(@を除く)
    $options['twitter_account_name'] = 'numaken_jp';
    // ツイッターカードの種類
    $options['twitter_card'] = 'summary';
    // meta title カスタムフィールド名
    $options['meta_title'] = 'meta_title';
    // meta description カスタムフィールド名
    $options['meta_description'] = 'meta_description';

    return $options;
}

/**
 * ogp tag output
 */
ogp();

/**
 * ogp image
 */
function og_image() {
    global $post;
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $image = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
    list($src, $width, $height) = $image;

    if ( has_post_thumbnail() ) {
        echo esc_attr($src);
    } else if ( preg_match( '/<img.*?src=(["\'])(.+?)\1.*?>/i', $post->post_content, $imgurl ) && !is_archive() ) {
        echo esc_attr($imgurl[2]);
    } else {
        echo get_stylesheet_directory_uri() . '/images/ogp_logo.png';
    }
}

/**
 * twitter cards image
 */
function twitter_image() {
    global $post;
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $image = wp_get_attachment_image_src( $post_thumbnail_id, 'full');
    list($src, $width, $height) = $image;

    if ( has_post_thumbnail() ) {
        echo esc_attr($src);
    } else if ( preg_match( '/<img.*?src=(["\'])(.+?)\1.*?>/i', $post->post_content, $imgurl ) && !is_archive() ) {
        echo esc_attr($imgurl[2]);
    } else {
        echo get_stylesheet_directory_uri() . '/images/twitter_cards_logo.png';
    }
}

/**
 * meta title
 */
function seo_title() {
    global $post;

    $options = get_ogp_options();

    // meta title カスタムフィールドがある場合
    if ( is_single() && get_post_meta($post->ID,$options['meta_title'],true) or is_page() && get_post_meta($post->ID,$options['meta_title'],true) ) {
        $trim_content = post_custom($options['meta_title']);
        $trim_content = str_replace(array("\r\n", "\r", "\n"), "", $trim_content);
        $trim_content = htmlspecialchars($trim_content);
        echo $trim_content;
    } else {
        the_title();
    }
}

/**
 * meta description
 */
function seo_description() {
    global $post;

    $options = get_ogp_options();

    // meta description カスタムフィールドがある場合
    if ( is_single() && get_post_meta($post->ID,$options['meta_description'],true) or is_page() && get_post_meta($post->ID,$options['meta_description'],true) ) {
        $trim_content = post_custom($options['meta_description']);
        $trim_content = str_replace(array("\r\n", "\r", "\n"), "", $trim_content);
        $trim_content = htmlspecialchars($trim_content);
        echo $trim_content;
    }

    // 抜粋がある場合
    else if ( is_single()&&has_excerpt() or is_page()&&has_excerpt() ) {
        $trim_content = get_the_excerpt();
        $trim_content = str_replace(array("\r\n", "\r", "\n"), "", $trim_content);
        echo $trim_content;
    }

    // カスタムフィールド及び抜粋がない場合（本文から取得）
    else if ( is_single() or is_page() ) {
        $base_content = $post->post_content;
        $base_content = preg_replace('!<style.*?>.*?</style.*?>!is', '', $base_content);
        $base_content = preg_replace('!<script.*?>.*?</script.*?>!is', '', $base_content);
        $base_content = preg_replace('/\[.+\]/','', $base_content);
        $base_content = strip_tags($base_content);
        $trim_content = mb_substr($base_content, 0, 120 ,"utf-8");
        $trim_content = str_replace(']]>', ']]&gt;', $trim_content);
        $trim_content = str_replace(array("\r\n", "\r", "\n"), "", $trim_content);
        $trim_content = htmlspecialchars($trim_content);

        if ( preg_match("/。/", $trim_content) ) { //fix number for japanese content
            mb_regex_encoding("UTF-8");
            $trim_content = mb_ereg_replace('。[^。]*$', '。', $trim_content);
            echo $trim_content;
        } else {
            echo $trim_content . '...';
        };

    // トップページの場合
    } else if ( is_home() || is_front_page() ) {
        echo get_bloginfo('description');
    // その他（アーカイブページなど）
    } else {
        echo get_bloginfo('description');
    };
};

/**
 * ogp meta tag
 */
function ogp() {
    global $post;

    $options = get_ogp_options();

?><?php if(is_home() || is_front_page()) { ?>
<meta property="og:type" content="blog">
<meta property="og:url" content="<?php echo esc_url("http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']); ?>">
<meta property="og:title" content="<?php echo get_bloginfo('name'); ?>">
<meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">
<meta property="og:locale" content="ja_JP" />
<meta property="og:image" content="<?php og_image(); ?>">
<meta property="fb:app_id" content="<?php echo $options['fb_app_id']; ?>">
<meta name="twitter:card" content="<?php echo $options['twitter_card']; ?>">
<meta name="twitter:site" content="@<?php echo $options['twitter_account_name']; ?>">
<meta name="twitter:creator" content="@<?php echo $options['twitter_account_name']; ?>">
<meta name="twitter:title" content="<?php echo get_bloginfo('name'); ?>">
<meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>">
<meta name="twitter:image:src" content="<?php twitter_image(); ?>">
<?php } else { ?>
<meta property="og:type" content="article">
<meta property="og:url" content="<?php echo esc_url("http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']); ?>">
<meta property="og:title" content="<?php seo_title(); ?>">
<meta property="og:description" content="<?php seo_description(); ?>">
<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>">
<meta property="og:locale" content="ja_JP" />
<meta property="og:image" content="<?php og_image(); ?>">
<meta property="fb:app_id" content="<?php echo $options['fb_app_id']; ?>">
<meta name="twitter:card" content="<?php echo $options['twitter_card']; ?>">
<meta name="twitter:site" content="@<?php echo $options['twitter_account_name']; ?>">
<meta name="twitter:creator" content="@<?php echo $options['twitter_account_name']; ?>">
<meta name="twitter:title" content="<?php seo_title(); ?>">
<meta name="twitter:description" content="<?php seo_description(); ?>">
<meta name="twitter:image:src" content="<?php twitter_image(); ?>">
<?php }; ?>

<?php }; ?>