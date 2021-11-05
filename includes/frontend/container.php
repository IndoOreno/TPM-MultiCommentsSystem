<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

if ( post_password_required() ) {
	echo "<p class='nocomments'>This post is password protected.</p>";
	return;
}

$options = get_option( "tpm-comments-system" );
if ( empty( $options['tab_order'] ) ) {
	$options['tab_order'] = TPM_COMMENTS_SYSTEM_DEFAULT_TAB_ORDER;
}
if ( !isset( $options['disqus_shortname'] ) ) {
	$options['disqus_shortname'] = '';
}
if ( !isset( $options['comment_area_label'] ) ) {
	$options['comment_area_label'] = '';
}
if ( !isset( $options['hide_icons'] ) ) {
	$options['hide_icons'] = 0;
}
if ( !isset( $options['amp_only_label'] ) ) {
	$options['amp_only_label'] = 0;
}
if ( !isset( $options['wordpress_label'] ) ) {
	$options['wordpress_label'] = '';
}
if ( !isset( $options['facebook_label'] ) ) {
	$options['facebook_label'] = '';
}
if ( !isset( $options['disqus_label'] ) ) {
	$options['disqus_label'] = '';
}
?>

<script type="text/javascript">
jQuery(document).ready(function($) {
	window.comment_tab_width = $('#tpm-comments-system-tabs').innerWidth();
});
</script>

<div id="tpm-comments-system-tabs">
	<a name="comments"></a>

	<?php
	if( !empty( $options['comment_area_label'] ) ) {
		echo "<h4 id='tpm-comments-system-tabs-label'>".$options['comment_area_label']."</h4>";
	}

	$tab_order = explode(',',$options['tab_order']);
	?>

	<ul>
    	<?php
		if( empty( $options['icon_theme'] ) ) {
			$options['icon_theme'] = 'default';
		}

		$active = ' class="active"';
		foreach( $tab_order as &$tab ) {
			$tab = trim ($tab );
			if( empty( ${$tab . '_count'} ) ) {
				${$tab . '_count'} = 0;
			}
			echo "<li" . $active . " id='tpm-comments-system-".$tab."-control'><a href='#tpm-comments-system-".$tab."-tab'>";
			if( !$options['hide_icons'] ) {
				echo "<img id='tpm-comments-system-" . $tab . "-icon' src='" . TPM_COMMENTS_SYSTEM_IMAGES . "/icons/" . $options['icon_theme'] . "/" . $tab . ".png'>";
			}
			if( !$options['amp_only_label'] ) {
				echo "<span id='tpm-comments-system-" . $tab . "-label'>" . $options[$tab . '_label'] . "</span>";
			}
			echo "</a></li>" . PHP_EOL;
			$active = '';
		}
		?>
	</ul>

	<?php
	foreach( $tab_order as &$tab ) {
		echo "<div id='tpm-comments-system-" . $tab . "-tab'>" . PHP_EOL;
		require_once TPM_COMMENTS_SYSTEM_FRONTEND . '/partials/' . $tab . '.php';
		echo "</div>" . PHP_EOL;
	}
	?>
</div>
