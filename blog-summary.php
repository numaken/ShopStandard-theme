<?php
/**
 The template name:ブログ一覧
 */
get_header(); ?>

        <h4 class="heading">お知らせ一覧</h4>

        <ul>
            <?php
            $wp_query = new WP_Query();
            $param = array(
                'posts_per_page' => '10', //表示件数。-1なら全件表示
                'post_type' => 'blogs', //カスタム投稿タイプの名称を入れる
                'post_status' => 'publish', //取得するステータス。publishなら一般公開のもののみ
                'orderby' => 'ID', //ID順に並び替え
                'order' => 'DESC'
            );
            $wp_query->query($param);
            if($wp_query->have_posts()): while($wp_query->have_posts()) : $wp_query->the_post();
            ?>
            <li class="blogs">
                <span class="label label-default"><?php the_time( 'Y/m/d' ); ?></span>
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </li>

            <?php endwhile; endif; ?>
            <?php wp_reset_query(); ?>
            <li class="text-right blogs"><a href="/wp/blogs/">お知らせ一覧に戻る</a></li>
        </ul>
