<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( post_password_required() ) {
	echo "<p class='nocomments'>This post is password protected.</p>";
	return;
}

$options = get_option( "tpm-comments-system" );
if ( empty( $options['amp_order'] ) ) {
	$options['amp_order'] = TPM_COMMENTS_SYSTEM_DEFAULT_AMP_ORDER;
}
//if ( !isset( $options['disqus_shortname'] ) ) {
//	$options['disqus_shortname'] = '';
//}
if ( !isset( $options['comment_area_label'] ) ) {
	$options['comment_area_label'] = '';
}
if ( !isset( $options['wordpress_label'] ) ) {
	$options['wordpress_label'] = '';
}
if ( !isset( $options['facebook_label'] ) ) {
	$options['facebook_label'] = '';
}
//if ( !isset( $options['disqus_label'] ) ) {
//	$options['disqus_label'] = '';
//}
?>

<div id="tpm-comments-system-amp">
	<a name="comments"></a>

	<?php
	if( !empty( $options['comment_area_label'] ) ) {
		echo "<h4 id='tpm-comments-system-amp-label'>".$options['comment_area_label']."</h4>";
	}

	$amp_order = explode(',',$options['amp_order']);
	foreach( $amp_order as &$amp ) {
		echo "<div id='tpm-comments-system-" . $amp . "-amp' class='tpm-comments-system-amp-comment'>" . PHP_EOL;
			echo "<span id='tpm-comments-system-" . $amp . "-label' class='tpm-comments-system-amp-comment-label'>" . $options[$amp . '_label'] . "</span>";
			require_once TPM_COMMENTS_SYSTEM_FRONTEND . '/partials-amp/' . $amp . '.php';
		echo "</div>" . PHP_EOL;
	}
	?>
</div>
