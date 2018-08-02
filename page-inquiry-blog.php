<?php get_header(); ?>
<div id="primary" class="site-content">
<div id="content" role="main">
<?php while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', 'page' ); ?>
<?php
$my_comment_fields =  array(
//<span class="font-red">*</span>を削除
'author' => '<p class="comment-form-author">' . '<label for="author">' . 'お名前'. '</label> ' . ( $req ? '' : '' ) .
'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>',
//<span class="font-red">*</span>を削除
'email'  => '<p class="comment-form-email"><label for="email">' . 'Email'. '</label> ' . ( $req ? '' : '' ) .
'<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>',
//ウェブサイト入力欄を廃止            
'url'    => '',
); ?>
<?php $my_comment_args = array(
'fields'               => apply_filters( 'comment_form_default_fields', $my_comment_fields ),
//「コメント」を「お問合せ内容」に変更
'comment_field'        => '<p class="comment-form-comment"><label for="comment">' .'お問い合わせ内容'. '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>',
//「メールアドレスが～必須項目です」を削除
'comment_notes_before' => '',
//コメントフォームの後ろにある、使用できるHTMLについての注釈を削除
'comment_notes_after'  => '',
//「コメントを残す」を削除
'title_reply'          => '',
//「コメントを送信」を「送信」に変更
'label_submit'         => '送信',
);
?>
<div id="comments" class="comments-area">
<?php comment_form($my_comment_args);  ?>
</div><!-- #comments .comments-area -->
<?php endwhile; // end of the loop. ?>
</div><!-- #content -->
</div><!-- #primary -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>