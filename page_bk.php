<?php get_header(); ?>

<script type="text/javascript">

    function disp(url){

        window.open(url, "window_name", "width=640,height=1136,scrollbars=1,resizable=1");

    }

</script>
    
<!-- breadcrumb -->

<?php if ( is_page(array('recommend-app','blog-app','about-app','booking-form' )) ) ://特定のカテゴリーの場合 ?>


<?php else://通常ページの場合 ?>
    
        <?php breadcrumb(); // パンくず ?>

<?php endif; ?>

    <div class="container">

        <!-- Example row of columns -->
        <div class="row">

            <div class="col-md-8 col-xs-12">

                <?php if (have_posts()) : // WordPress ループ
                while (have_posts()) : the_post(); // 繰り返し処理開始 ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>

                    <?php the_content(); ?>

                </div>

                <?php endwhile; // 繰り返し処理終了
                else : // ここから記事が見つからなかった場合の処理 ?>

                <div class="post">

                <h2>記事はありません</h2>

                <p>お探しの記事は見つかりませんでした。</p>

                </div>

                <?php endif; ?>

            </div>

<!--
            <div class="col-md-4">
                <div class="background_sidewall">
                <?php get_sidebar(); ?>
                </div>
            </div>
-->
        </div>

    </div>


