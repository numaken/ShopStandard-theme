<?php
/**
 The template name:オブジェクト−ナビバー
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


<!-- Navigation -->

<?php

$url = home_url();

$imgurl = wp_get_attachment_image_src($head_image, 'full');//サイズは自由に変更してね
//サイズは自由に変更してね
if ($imgurl == null){
    // 画像が無い場合の処理

    echo '<nav class="navbarHeader" role="navigation">';


}else{ ?>

<?php
    echo '<nav class="navbarHeader" role="navigation" style="background: url(\'' . $imgurl[0] . '\') repeat center top;">';

?>

<?php  } ?>

<!-- top nav -->


<?php echo '<a class="navbar-brand" href="' . $url . '">'; ?>
<img class="MainVisual__logoImg img-responsive" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</a>


<ul class="nav navbar-right nav-address">

    <li><h4 class="pull-right hidden-xs" style="color:#fff;"><?php echo $obj['address']; ?></h4></li>
    <li><h3 class="pull-right" style="color:#fff;"><span data-action="call" data-tel="<?php echo $obj['tel']; ?>"><i class="fas fa-phone-square"></i>&nbsp;<?php echo $obj['tel']; ?></span></h3></li>

</ul>

</nav>

<!-- end nav -->
