<?php
/**
 The template name:企業情報
 */
get_header(); ?>

<? $osusume = $obj['recommendations'] ?>

<?php

//固定ページ 企業情報 のカスタムフィールドより入力されたDATAを他ページでも使用可能にする

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
                $imgback_url = wp_get_attachment_image_src($img_corp1, 'full'); //サイズは自由に変更してね
                if ($imgback_url == null){
                    // 画像が無い場合の処理
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $osusume[0]['image'] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }else{
                    echo '<div class="item active bgImage" style="background-image:url(\'' . $imgback_url[0] . '\'); " alt="' . $osusume[0]['title'] . '" >';
                }
                ?>

                <div class="billboard-caption">

                    <?php
                    if ($billboard_title1_corp1 == null){
                        // 画像が無い場合の処理
                        echo '<h2 class="ta-center">'. get_the_title() .'</h2>';
                    }else{
                        echo '<h3 class="ta-center">' . $billboard_title1_corp1 . '</h3>';
                    }
                    ?>

                    <?php
                    if ($caption_corp1 == null){
                        // 画像が無い場合の処理
                    }else{
                        echo '<h4 class="ta-center">' . $caption_corp1 . '</h4>';
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

<section id="shop" class="about">

            <div class="content-box clearfix">

                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">

                    <div class="panel panel-default">

                        <div class="panel-body">

                            <table class="table table-striped table-responsive">
                                <tbody>

                                    <?
                                    $product_id = get_field('corp_name');
                                    if ( $product_id )  {

                                        echo '<tr>';
                                        echo '<th>';
                                        echo '<td class="ta-center"><strong>会社名</strong></td>';
                                        echo '<td>' . $corp_name . '</td>';
                                        echo '</th>';
                                        echo '</tr>';
                                                    }
                                    ?>

                                    <?
                                    $compatible = get_field('corp_adress');
                                    if ( $compatible )  {
                                        echo '<tr>';
                                        echo '<th class="odd">';
                                        echo '<td class="ta-center"><strong>住　所</strong></td>';
                                        echo '<td>' . $corp_adress . '</td>';
                                        echo '</th>';
                                        echo '</tr>';
                                                    }
                                    ?>

                                    <?
                                    $material = get_field('corp_tel');
                                    if ( $material )  {
                                        echo '<tr>';
                                        echo '<th class="even">';
                                        echo '<td class="ta-center"><strong>電話番号</strong></td>';
                                        echo '<td>' . $corp_tel . '</td>';
                                        echo '</th>';
                                        echo '</tr>';
                                                    }
                                    ?>

                                    <?
                                    $exhaust = get_field('corp_ceo');
                                    if ( $exhaust )  {
                                        echo '<tr>';
                                        echo '<th class="odd">';
                                        echo '<td class="ta-center"><strong>代表者名</strong></td>';
                                        echo '<td>' . $corp_ceo . '</td>';
                                        echo '</th>';
                                        echo '</tr>';
                                                    }
                                    ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div><!-- /.col-md-5 -->

</section>

<?php get_footer(); ?>
