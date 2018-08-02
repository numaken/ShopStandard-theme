<?php
/**
 The template name:予約完了（App）
 */
get_header(); ?>

<?php get_header(); ?>

<script type="text/javascript">

    function disp(url){

        window.open(url, "window_name", "width=640,height=1136,scrollbars=1,resizable=1");

    }

</script>

<!-- Page Content -->
<div class="container">

    <!-- Heading Row -->
    <div class="row">

        <span class="content_top"></span>

        <section id="info" class="contentarea clearfix">

            <div class="col-xs-12">

                <?php if (have_posts()) : // WordPress ループ
                while (have_posts()) : the_post(); // 繰り返し処理開始 ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>

                    <div class="contentarea" style="padding: 50px 20px;">

                        <h4><?php the_content(); ?></h4>

                    </div>

                </div>

                <?php endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理 ?>

                <div class="post">

                    <h2>記事はありません</h2>

                    <p>お探しの記事は見つかりませんでした。</p>

                </div>

                <?php endif; ?>

            </div>

            <?php echo '<div class="col-md-12 col-xs-12">'; ?>

            <?php echo '<div class="container">'; ?>
            <?php echo '<div class="row">'; ?>

            <?php echo '<div style="text-align: center; margin: 50px 0 50px 0;">'; ?>
            <?php echo '<button type="button" class="btn btn-primary btn-sm btn-block hidden-md hidden-lg" style="padding: 10px 20px; margin-top: 20px;"><target="window_name" onClick="disp(\'/wp/about-app/\')" style="color:#fff;font-weight: 700;">画面を閉じる</button>'; ?>
            <?php echo '</div>'; ?>

            <?php echo '</div>'; ?>
            <?php echo '</div>'; ?>
            <?php echo '</div>'; ?>

        </section>



        <span class="content_bottom"></span>

    </div><!-- /.row -->

    <a href="#0" class="cd-top">Top</a>


</div><!-- /.container -->
