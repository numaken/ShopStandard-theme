<?php get_header(); ?>
<h1>taxonomy-blogs_cat</h1>
<header>

    <!-- top nav -->
    <nav class="navbar navbar-default">

        <div class="container"><!-- 無くても良い -->

            <div class="navbar-header">

                <!-- logo img -->
                <?php

                $url = home_url();

                $imgurl = wp_get_attachment_image_src($logo, 'full');//サイズは自由に変更してね
                //サイズは自由に変更してね
                if ($imgurl == null){
                    // 画像が無い場合の処理

                    echo '<a class="navbar-brand hidden-xs hidden-sm" href="' . $url . '" style="background-color:' . $back_color4 . '"><img class="brand-logo" src="' . $obj['bottom_patch_url'] . '" height="" width="" alt="" />' . '</a>';
                    echo '<h1><a class="navbar-brand" href="' . $url . '" style="background-color:' . $back_color4 . '">' . $obj['title'] . '</a></h1>';


                }else{ ?>

                <?php
                    echo '<a class="navbar-brand hidden-xs hidden-sm" href="' . $url . '" style="background-color:' . $back_color4 . '"><img class="brand-logo" src="' . $imgurl[0] . '" height="" width="" alt="" />' . $obj['title'] . '</a>';

                ?>

                <?php  } ?>

                <!-- toggle -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top-nav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <!-- top menu -->
            <div class="collapse navbar-collapse" id="top-nav">

                <!-- main navbar -->
                <!--リンクのリスト メニューリスト-->
                <?php get_template_part( 'navi' ); ?>


                <!-- right navbar
<ul class="nav navbar-nav navbar-right">
<li>
<a href=""><i class="fa fa-sign-in"></i> お問合せはこちら</a>
</li>
</ul>-->
            </div>
        </div>
        <!-- end container -->
    </nav>
    <!-- end nav -->

</header>

<div id="main">

    <!-- Page Content -->
    <div class="container">

<?php if(have_posts()): while(have_posts()): the_post(); ?>
<div class="events_contents">

<h2 class="<?php echo esc_attr(get_post_type()); ?>"><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
<?php if(has_post_thumbnail()): ?>
<p><a href="<?php the_permalink(); ?>" ><?php the_post_thumbnail('full'); ?></a></p>
<?php endif; ?>

</div><!-- end of .events_contents -->
<?php endwhile; endif; ?>

    </div><!-- /.container -->

</div><!--/#main -->
<?php get_sidebar(); ?>


<?php get_footer(); ?>
