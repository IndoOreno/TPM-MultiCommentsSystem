<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>

<div id="fb-comments">Loading Facebook Comments ...</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('#fb-comments').html('<div class="fb-comments" data-width="'+window.comment_tab_width+'" data-href="<?php echo the_permalink(); ?>" data-num-posts="5" data-width=""100%></div>');
	});
</script>
<noscript>Please enable JavaScript to view the <a href="https://www.facebook.com">comments powered by Facebook.</a></noscript>
