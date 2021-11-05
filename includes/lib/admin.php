<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>

<div class="wrap">
	<h2>Multi Comments System</h2>
	<form method="POST" action="options.php">
		<?php
		settings_fields( 'tpm-comments-system-options' );
		$options = get_option( 'tpm-comments-system' );

		if ( empty( $options['tab_order'] ) ) {
			$options['tab_order'] = TPM_COMMENTS_SYSTEM_DEFAULT_TAB_ORDER;
		}
		if ( empty( $options['amp_order'] ) ) {
			$options['amp_order'] = TPM_COMMENTS_SYSTEM_DEFAULT_AMP_ORDER;
		}
		if ( !isset( $options['disqus_shortname'] ) ) {
			$options['disqus_shortname'] = '';
		}
		if ( !isset( $options['hide_icons'] ) ) {
			$options['hide_icons'] = 0;
		}
		if ( !isset( $options['comment_area_label'] ) ) {
			$options['comment_area_label'] = '';
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
		<div>
			<table>
				<tr>
					<td>Tab Order</td>
					<td><input type="text" name="tpm-comments-system[tab_order]" value="<?php echo $options['tab_order'];?>"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<strong>Notes:</strong> Comma Separated List, First listed is the default, <br>
						If left empty it will use default value below, only tabs listed will be shown.<br><br>
						<strong>Possible Values:</strong> wordpress,disqus,facebook<br>
						<strong>Default Value:</strong> <?php echo TPM_COMMENTS_SYSTEM_DEFAULT_TAB_ORDER; ?><br>
					</td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>AMP Order</td>
					<td><input type="text" name="tpm-comments-system[amp_order]" value="<?php echo $options['amp_order'];?>"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<strong>Notes:</strong> Comma Separated List, First listed is the default, <br>
						If left empty it will use default value below, only tabs listed will be shown.<br><br>
						<strong>Possible Values:</strong> wordpress,facebook<br>
						<strong>Default Value:</strong> <?php echo TPM_COMMENTS_SYSTEM_DEFAULT_AMP_ORDER; ?><br>
					</td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>Disqus Shortname</td>
					<td><input type="text" name="tpm-comments-system[disqus_shortname]" value="<?php echo $options['disqus_shortname'];?>" /></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>
						<strong>Notes:</strong> Required if showing the Disqus Tab
					</td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>Icon Theme</td>
					<td>
						<select name="tpm-comments-system[icon_theme]">
							<option selected="selected" value="default">Default</option>
							<option value="monotone">Monotone</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Hide Icons</td>
					<td><input type="checkbox" name="tpm-comments-system[hide_icons]" value="1" <?php checked( '1', $options['hide_icons']);?>></td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>Comment Area Label</td>
					<td><input type="text" name="tpm-comments-system[comment_area_label]" value="<?php echo $options['comment_area_label'];?>"></td>
				</tr>
				<tr>
					<td colspan="2"><hr></td>
				</tr>
				<tr>
					<td>AMP Only Label</td>
					<td><input type="checkbox" name="tpm-comments-system[amp_only_label]" value="1" <?php checked( '1', $options['amp_only_label']);?>></td>
				</tr>
				<tr>
					<td>WordPress Comment Label</td>
					<td><input type="text" name="tpm-comments-system[wordpress_label]" value="<?php echo $options['wordpress_label'];?>"></td>
				</tr>
				<tr>
					<td>Facebook Comment Label</td>
					<td><input type="text" name="tpm-comments-system[facebook_label]" value="<?php echo $options['facebook_label'];?>"></td>
				</tr>
				<tr>
					<td>Disqus Comment Label</td>
					<td><input type="text" name="tpm-comments-system[disqus_label]" value="<?php echo $options['disqus_label'];?>"></td>
				</tr>
			</table>
			<?php submit_button(); ?>
		</div>
	</form>
</div>
