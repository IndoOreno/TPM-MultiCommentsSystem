<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>

<script async custom-element="amp-facebook-comments" src="https://cdn.ampproject.org/v0/amp-facebook-comments-0.1.js"></script>
<amp-facebook-comments width=486 height=657 layout="responsive" data-numposts="5" data-href="<?php echo the_permalink(); ?>">
	<noscript>Please enable JavaScript to view the <a href="https://www.facebook.com">comments powered by Facebook.</a></noscript>
</amp-facebook-comments>
