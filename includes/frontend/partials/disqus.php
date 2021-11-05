<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' ); ?>

<div id="comments" class="comments-area">
	<div id="respond" class="comment-respond">
		<?php if( !empty( $options['disqus_shortname'] ) ) : ?>
			<div id="disqus_thread">Loading Disqus Comments ...</div>
			<script>
				var disqus_shortname = '<?php echo $options["disqus_shortname"]; ?>';
				(function() {
					var d = document, s = d.createElement('script');
					s.src = '//' + disqus_shortname + '.disqus.com/embed.js';
					s.defer = true;
					s.setAttribute('data-timestamp', +new Date());
					(d.head || d.body).appendChild(s);
				})();
			</script>
			<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<?php else : ?>
			<h2 style="color: #ff0000;">You must fill in your "Disqus Shortname" in the Multi Comments System <a href="/wp-admin/edit-comments.php?page=tpm-comments-system">plugin options</a>.</h2>
		<?php endif; ?>
	</div>
</div>
