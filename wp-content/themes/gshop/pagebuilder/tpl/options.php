<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<h2><?php _e('Page Builder', 'so-panels') ?></h2>

	<form action="options.php" method="POST">
		<?php do_settings_sections( 'rox-panels' ); ?>
		<?php settings_fields( 'rox-panels' ); ?>
		<?php submit_button(); ?>
	</form>
</div>