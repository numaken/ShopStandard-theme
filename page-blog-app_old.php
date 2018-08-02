<?php
/**
 The template name:ブログOLD（App）
 */
get_header(); ?>


<style>

    
#menu {
    position: fixed;
    top: 145px;
    left: 0;
    z-index: 70;
    width: 100%;
    padding: 0;
    margin: 0;
}


    
#menu li {
    display: inline-block;
    margin: 0 5px;
    /* background: #fff; */
    background: rgba(000,000,000, 0.05); 
    -webkit-border-radius: 0px;
    border-radius: 0px; 
}
    
#menu li.active a {
    color: #5f451c;
    font-weight: 700;
}

#menu li a, #menu li.active a {
    padding: 0 0;
    display: block;
}
    
#menu li a {
    text-decoration: none;
    color: #000;
}
    
	/* Fixed header and footer.
	* --------------------------------------- */
	#header, #footer{
		position:fixed;
		height: 200px;
		display:block;
		width: 100%;
		background: #333;
		z-index:9;
		text-align:center;
		color: #f2f2f2;
		padding: 0 0 0 0;
	}
    

	#header{
		top:0px;
	}
	#footer{
		bottom:0px;
	}
    
.intro p {
    width: 90%;
    margin: 0 auto;
    font-size: 1.2em;
}    

    /* Bottom menu
    * --------------------------------------- */
    #infoMenu li a {
        color: #fff;
    }

.carousel-indicators {
    position: absolute;
    bottom: 0;
    left: 50%;
    z-index: 15;
    width: 60%;
    margin-left: -30%;
    padding-left: 0;
    list-style: none;
    text-align: center;
}    
    
.panel {
    padding: 250px 25px;
    background-color: #ffffff;
    border: 1px solid transparent;
    border-radius: 0;
    -webkit-box-shadow: 0 1px 1px rgba(0,0,0,0.05);
    box-shadow: 0 1px 1px rgba(0,0,0,0.05);
}
    
.panel span {
    margin: 25px 0;
}
    
h4, .h4, h5, .h5, h6, .h6 {
    margin-top: 5px;
    margin-bottom: 5px;
}    
    

.carousel-caption {
    position: absolute;
    left: 15%;
    right: 15%;
    bottom: 20px;
    z-index: 10;
    padding-top: 10px;
    padding-bottom: 20px;
    color: #ffffff;
    text-align: center;
    text-shadow: 0 1px 2px rgba(0,0,0,0.6);
}    

a {
    color: #fff;
    text-decoration: none;
    text-shadow: 0px 1px 1px #333;
}
    
a:hover {
    color: #c00;
    text-decoration: none;
    text-shadow: 0px 1px 1px #333;
}
    
.blog-link a {
    color: #5f451c;
    text-decoration: none;
    text-shadow: 0px 0px 0px #333;
}
    
    
</style>    

<div id="header">


            <!-- Full Page Image Background Carousel Header -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">

                        <?php

                            $post_counter = null;

                            $args = array(
                            'posts_per_page' => 5,        //表示（取得）する記事の数
                            'post_type' => 'blogs'    //投稿タイプの指定
                        ); ?>

                        <?php $loop = new WP_Query( $args ); ?>
                        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


                        <?php if($post_counter ==0): ?>

                            <li data-menuanchor="firstPage" data-target="#myCarousel" data-slide-to="0" class="active"><a href="#firstPage"></a></li>

                        <?php elseif($post_counter ==1): ?>

                            <li data-target="#myCarousel" data-slide-to="1"></li>

                        <?php elseif($post_counter ==2): ?>

                            <li data-target="#myCarousel" data-slide-to="2"></li>

                        <?php elseif($post_counter ==3): ?>

                            <li data-target="#myCarousel" data-slide-to="3"></li>

                        <?php elseif($post_counter ==4): ?>

                            <li data-target="#myCarousel" data-slide-to="4"></li>

                        <?php endif; ?>
                        <?php $post_counter++; ?>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>            


                </ol>

            <!-- Wrapper for Slides -->
                <!-- Wrapper for Slides -->
                <div class="carousel-inner" role="listbox">

                    <?php

                        $post_counter = null;

                        $args = array(
                        'posts_per_page' => 5,        //表示（取得）する記事の数
                        'post_type' => 'blogs'    //投稿タイプの指定
                    ); ?>

                    <?php $loop = new WP_Query( $args ); ?>
                    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>


                    <?php if($post_counter ==0): ?>

                        <div data-menuanchor="firstPage" class="item active">

                            <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id(); 

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'garaly_size'); 
                                if ($imgurl == null){
                                // 画像が無い場合の処理

                                    echo '<div class="fill" style="background-image:url(\'' . $obj['logo_icon_url'] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';
                                    
                                }else{ ?>

                                <?

                                    echo '<div class="fill" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                                ?>

                            <?  } ?>  
                            <a href="#firstPage"></a></div>
                    

                            <div class="carousel-caption" style="bottom: 0;background-color: rgba(0, 0, 0, 0.4);left:0;right:0;">
                                <h3 class="h5"><a href="#firstPage"><?php the_title(); ?></a></h3>
                                
                            </div>                    

                        </div><!-- /.item active -->     
                    
                    

                    <?php elseif($post_counter ==1): ?>

                        <div data-menuanchor="secondPage" class="item">

                            <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id(); 

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'garaly_size'); 
                                if ($imgurl == null){
                                // 画像が無い場合の処理

                                    echo '<div class="fill" style="background-image:url(\'' . $obj['logo_icon_url'] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';
                                    
                                }else{ ?>

                                <?

                                    echo '<div class="fill" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                                ?>

                            <?  } ?>  
                                <a href="#secondPage"></a></div>

                
                            <div class="carousel-caption" style="bottom: 0;height: 70px;background-color: rgba(0, 0, 0, 0.4);left:0;right:0;">
                                <h3 class="h5"><a href="#secondPage"><?php the_title(); ?></a></h3>
                            </div>                    

                        </div><!-- /.item -->    
                    
                    

                    <?php elseif($post_counter ==2): ?>

                        <div data-menuanchor="3rdPage" class="item">

                            <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id(); 

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'garaly_size'); 
                                if ($imgurl == null){
                                // 画像が無い場合の処理

                                    echo '<div class="fill" style="background-image:url(\'' . $obj['bottom_patch_url'] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';
                                    
                                }else{ ?>

                                <?

                                    echo '<div class="fill" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                                ?>

                            <?  } ?>  
                                <a href="#3rdPage"></a></div>

    
                            <div class="carousel-caption" style="bottom: 0;height: 70px;background-color: rgba(0, 0, 0, 0.4);left:0;right:0;">
                                <h3 class="h5"><a href="#3rdPage"><?php the_title(); ?></a></h3>
                            </div>                    

                        </div><!-- /.item -->  
                    
                    

                    <?php elseif($post_counter ==3): ?>

                        <div data-menuanchor="4thPage" class="item">

                            <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id(); 

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'garaly_size'); 
                                if ($imgurl == null){
                                // 画像が無い場合の処理

                                    echo '<div class="fill" style="background-image:url(\'' . $obj['bottom_patch_url'] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';
                                    
                                }else{ ?>

                                <?

                                    echo '<div class="fill" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                                ?>

                            <?  } ?>  
                                <a href="#4thPage"></a></div>


                            <div class="carousel-caption" style="bottom: 0;height: 70px;background-color: rgba(0, 0, 0, 0.4);left:0;right:0;">
                                <h3 class="h5"><a href="#4thPage"><?php the_title(); ?></a></h3>
                            </div>                    

                        </div><!-- /.item --> 
                    
                    

                    <?php elseif($post_counter ==4): ?>

                        <div data-menuanchor="5thPage" class="item">

                            <?

                                // アイキャッチ画像のIDを取得
                                $thumbnail_id = get_post_thumbnail_id(); 

                                //画像(返り値は「画像ID」)
                                $imgurl = wp_get_attachment_image_src($thumbnail_id , 'garaly_size'); 
                                if ($imgurl == null){
                                // 画像が無い場合の処理

                                    echo '<div class="fill" style="background-image:url(\'' . $obj['bottom_patch_url'] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';
                                    
                                }else{ ?>

                                <?

                                    echo '<div class="fill" style="background-image:url(\'' . $imgurl[0] . '\'); background-size:cover;"' .  'alt="' . $obj['title'] . '">';

                                ?>

                            <?  } ?>  
                                <a href="#5thPage"></a></div>


                            <div class="carousel-caption" style="bottom: 0;height: 70px;background-color: rgba(0, 0, 0, 0.4);left:0;right:0;">
                                <h3 class="h5"><a href="#5thPage"><?php the_title(); ?></a></h3>
                            </div>                    

                        </div><!-- /.item -->                  



                    <?php endif; ?>
                    <?php $post_counter++; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>



                </div><!-- /.carousel-inner -->

                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>

            </div><!-- /.myCarousel -->

<div class="col-xs-12">
    <div class="blog-link pull-right text-primary">

<!--    <a href="<?php echo home_url(); ?>/blogs/" target="_blank" style="text-decoration: none;">一覧を見る</a>
-->        
    </div>
    
</div>

</div><!-- /.header -->
    
    
    




    
    
<div id="fullpage">
    
    
        <?php

            $post_counter = null;

            $args = array(
            'posts_per_page' => 5,        //表示（取得）する記事の数
            'post_type' => 'blogs'    //投稿タイプの指定
        ); ?>

        <?php $loop = new WP_Query( $args ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    

    

            <?php if($post_counter ==0): ?>

                <div class="section " id="section0">

                    <div class="intro">

                            <div id="post-<?php the_ID(); ?>">

                                <div class="panel">
                                    <h3 class="h4 page-header"><?php the_title(); ?></h3>
                                    <span><?php the_content(); ?></span>
                                </div>

                            </div> 

                    </div>

                </div>


            <?php elseif($post_counter ==1): ?>


                <div class="section " id="section1">

                    <div class="intro">

                            <div id="post-<?php the_ID(); ?>">

                                <div class="panel">
                                    <h3 class="h4 page-header"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>

                            </div> 

                    </div>

                </div>


            <?php elseif($post_counter ==2): ?>


                <div class="section " id="section2">

                    <div class="intro">

                            <div id="post-<?php the_ID(); ?>">

                                <div class="panel">
                                    <h3 class="h4 page-header"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>

                            </div> 

                    </div>

                </div>


            <?php elseif($post_counter ==3): ?>


                <div class="section " id="section3">

                    <div class="intro">

                            <div id="post-<?php the_ID(); ?>">

                                <div class="panel">
                                    <h3 class="h4 page-header"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>

                            </div> 

                    </div>

                </div>


            <?php elseif($post_counter ==4): ?>


                <div class="section " id="section4">

                    <div class="intro">

                            <div id="post-<?php the_ID(); ?>">

                                <div class="panel">
                                    <h3 class="h4 page-header"><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>

                            </div> 

                    </div>

                </div>





        <?php endif; ?>
        <?php $post_counter++; ?>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>         


    
</div>    


        
    
    
<?php get_footer(); ?>