<h2>コメント</h2>
<!-- 参考URL: https://wpdocs.osdn.jp/%E3%83%86%E3%83%B3%E3%83%97%E3%83%AC%E3%83%BC%E3%83%88%E3%82%BF%E3%82%B0/wp_list_comments -->
<?php $args = array(
	'walker'            => null,
	'max_depth'         => '',
	'style'             => 'ul',
	'callback'          => null,
	'end-callback'      => null,
	'type'              => 'all',
	'reply_text'        => 'Reply',
	'page'              => '',
	'per_page'          => '',
	'avatar_size'       => 80,
	'reverse_top_level' => null,
	'reverse_children'  => '',
	'format'            => 'html5', // テーマが 'HTML5' をサポートしないなら 'xhtml'
	'short_ping'        => false,   // バージョン3.6以降
	'echo'              => true     // 真偽値、デフォルトが true
); ?>

<?php wp_list_comments( $args, $comments ); ?>

<?php
$form_args  = array(
  'label_submit' => '送信する',
  'title_reply' => 'コメントがあればどうぞ！',
  'comment_notes_after' => '',
  'commnet_field' => '<p class="comment__form-comment"><label for="comment">'. _x( 'Comment', 'noun' ) . '</label><br><textarea id="commnet" name="comment" area-required="true" cols="45" row="8"></textarea></p>',
);
comment_form($form_args);