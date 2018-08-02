<?php
/**
 The template name:オブジェクト-インスタグラム
 */
get_header(); ?>

<section id="instagram" class="instagram">

    <div class="container">

        <div class="row"><!-- #copy-area space -->


           <?php

            global $insta_token;
            $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
            $insta_token     =  get_post_meta($get_page_id,'insta_token' ,true); //ページIDを元にカスタムフィールドの値取得

            if ($insta_token == null) {

                echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">';
                echo '<h2 class="ta-center">アクセストークンが設定されていません。</h2>';
                echo '<h4 class="ta-center">インスタグラム連携がONになっていますが、アクセストークンが設定されていないため表示されません。</h4>';
                echo '</div>';

            }else{

                echo '<h2 class="gemstone_title page-title ta-center"><i class="fab fa-instagram fa-2x"></i>&nbsp;Instagram</h2>';

            }

            ?>


            <?php

            global $insta_catchcopy;
            $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
            $insta_catchcopy     =  get_post_meta($get_page_id,'insta_catchcopy' ,true); //ページIDを元にカスタムフィールドの値取得

            if ($insta_catchcopy == null) {


            }else{

                echo '<h3 class="gemstone_subtext ta-center mm-pad-small">' . $insta_catchcopy . '</h3>';

            }

            ?>

            <?php

            global $insta_description;
            $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
            $insta_description     =  get_post_meta($get_page_id,'insta_description' ,true); //ページIDを元にカスタムフィールドの値取得

            if ($insta_description == null) {


            }else{

                echo '<h4 class="gemstone_subtext ta-center mm-pad-small">' . $insta_description . '</h4>';

            }

            ?>

            <div class="hidden-xs hidden-sm">

                <?php

            global $insta_username;
            $get_page_id = get_page_by_path("instagram"); //スラッグ名からページのパス取得
            $get_page_id = $get_page_id->ID; //ページパスからページidを取得
            $insta_username     =  get_post_meta($get_page_id,'insta_username' ,true); //ページIDを元にカスタムフィールドの値取得

                $myAccessToken = $insta_token; //実際のアクセストークンを入力

                $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token='.$myAccessToken);

                $insta_obj = json_decode($json);

                foreach($insta_obj->data as $data){

                    echo '<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3 hidden-xs hidden-sm">';
                    echo '<div class="insta_content">';

                    echo '<img class="photo" src="'.$data->images->low_resolution->url.'" alt="photo">';
                    echo '<div class="fav"><i class="fa fa-heart" aria-hidden="true" style="color:#ec1717"></i>&nbsp;'.$data->likes->count.'</div>';
                    foreach($data->tags as $tags){
                        echo '<span class="tag">'.$tags.'</span>';
                    }
                    echo '</div>';
                    echo '</div>';
                }

                echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-xs hidden-sm">';
                echo '<h3 class="insta-usrname ta-center"><img class="ta-center thumb" src="'.$data->user->profile_picture. '" height="50px" alt="USER NAME" style="border-radius:50%;border:4px solid #fff;"><span class="username">'.$data->user->username.'</span></h3>';
                echo '<div class="ta-center"><a href="https://www.instagram.com/' . $insta_username . '?ref=badge" class="insta_btn">';
                echo '<span class="insta">';
                echo '<i class="fab fa-instagram"></i>';
                echo '</span>';
                echo '&nbsp;Follow Me';
                echo '</a>';
                echo '</div>';

                echo '</div>';

                ?>

            </div><!-- /.col-xs-12 col-sm-12 col-md-12 col-lg-12 -->

            <div class="hidden-md hidden-lg">

                <?php

                $myAccessToken = $insta_token; //実際のアクセストークンを入力

                $json = file_get_contents('https://api.instagram.com/v1/users/self/media/recent/?access_token='.$myAccessToken);

                $insta_obj = json_decode($json);

                foreach($insta_obj->data as $data){

                    echo '<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3" style="padding-right: 0; padding-left: 0;">';
                    echo '<div class="insta_content">';

                    echo '<img class="photo" src="'.$data->images->low_resolution->url.'" alt="photo">';
                    echo '<div class="fav"><i class="fa fa-heart" aria-hidden="true" style="color:#ec1717"></i>&nbsp;'.$data->likes->count.'</div>';
                    echo '</div>';
                    echo '</div>';
                }

                echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 hidden-md hidden-lg">';
                echo '<h3 class="ta-center"><img class="ta-center thumb" src="'.$data->user->profile_picture. '" height="50px" alt="USER NAME" style="border-radius:50%;border:4px solid #fff;"><span class="username">'.$data->user->username.'</span></h3>';
                echo '<div class="ta-center"><a href="https://www.instagram.com/' . $insta_username . '?ref=badge" class="insta_btn">';
                echo '<span class="insta">';
                echo '<i class="fab fa-instagram"></i>';
                echo '</span>';
                echo '&nbsp;Follow Me';
                echo '</a>';
                echo '</div>';

                echo '</div>';

                ?>

            </div><!-- /.col-xs-12 col-sm-12 col-md-12 col-lg-12 -->

        </div>

    </div>

    <div class="clearfix"></div>

</section>
