<?php

function emcal_options_page(){

	global $emcal_version;
	global $emcal_options;
	

	$pluginDocumentation = 'http://jumpstartcreatives.com/plugins/embed-calculator-plugin';
		
	ob_start(); ?>
	
	<div class="wrap" id="emcal-admin">
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Lato|PT+Sans|Slabo+27px|Open+Sans|Oswald|Roboto|Roboto+Condensed|Montserrat' />
		<h2><?php _e('Embed Calculator Setup', 'emcal_domain'); ?></h2>
		<form method="post" action="options.php" id="emcal-admin-main">
			
			<?php settings_fields('emcal_settings_group'); ?>
			<ul class="tabs">
				<li><a href="#" class="active">CUSTOM RANGE</a></li>
				<li><a href="#">THEME & LAYOUT</a></li>
			</ul>
			<div class="tabs-wrapper">
				<div class="tabs-wrap">
					<h3><?php _e('Used for money over time computations', 'emcal_domain'); ?>&nbsp;<a href="<?php echo plugin_dir_url( __FILE__ ) . 'img/emcal-custom-range-sample.png'; ?>" target="_blank">See sample</a></h3>
					<p class="label"><?php _e('Calculator Title', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text" type="text" id="emcal_settings[emcalCalculatorTitle]" name="emcal_settings[emcalCalculatorTitle]" placeholder="My Custom Range Calculator" value="<?php echo $emcal_options['emcalCalculatorTitle']; ?>" />
					</p>					
					<p class="label"><?php _e('Subtotal Title', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text" type="text" id="emcal_settings[emcalSubtotalTitle]" name="emcal_settings[emcalSubtotalTitle]" placeholder="Payment Scheme" value="<?php echo $emcal_options['emcalSubtotalTitle']; ?>" />
					</p>
					<h4><?php _e('AMOUNT RANGE', 'emcal_domain'); ?></h4>
					<hr>
					<p class="label"><?php _e('Title', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text" type="text" id="emcal_settings[emcalFirstRangeTitle]" name="emcal_settings[emcalFirstRangeTitle]" placeholder="Amount" value="<?php echo $emcal_options['emcalFirstRangeTitle']; ?>" />
					</p>				
					
					<p class="label"><?php _e('Currency Unit', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text required" type="text" id="emcal_settings[emcalCurrencyUnit]" name="emcal_settings[emcalCurrencyUnit]" placeholder="$" value="<?php echo $emcal_options['emcalCurrencyUnit']; ?>" />
					</p>				
					<p class="label"><?php _e('Minimum Unit', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text required max unit" type="text" id="emcal_settings[emcalMinUnit]" name="emcal_settings[emcalMinUnit]" placeholder="30" value="<?php echo $emcal_options['emcalMinUnit']; ?>" />
					</p>
					<p class="label"><?php _e('Maximum Unit', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text required max unit" type="text" id="emcal_settings[emcalMaxUnit]" name="emcal_settings[emcalMaxUnit]" placeholder="must be greater than min unit" value="<?php echo $emcal_options['emcalMaxUnit']; ?>" />
					</p>

					<h4><?php _e('DATE/TIME RANGE', 'emcal_domain'); ?></h4>
					<hr>
					<p class="label"><?php _e('Title', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text" type="text" id="emcal_settings[emcalSecondRangeTitle]" name="emcal_settings[emcalSecondRangeTitle]" placeholder="Duration" value="<?php echo $emcal_options['emcalSecondRangeTitle']; ?>" />
					</p>				
					<p class="label"><?php _e('DateTime Unit', 'emcal_domain'); ?></p>
					<p>
						<select name="emcal_settings[emcalDateTimeUnit]">
							<option value="year" <?php if ( $emcal_options['emcalDateTimeUnit'] =="year" ) echo 'selected="selected"'; ?>>Year</option>
						    <option value="month" <?php if ( $emcal_options['emcalDateTimeUnit'] =="month" ) echo 'selected="selected"'; ?>>Month</option>
						    <option value="week" <?php if ( $emcal_options['emcalDateTimeUnit'] == "week" ) echo 'selected="selected"'; ?>>Week</option>
						</select>	
					</p>
					<p class="label"><?php _e('Minimum Unit', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text required max unit" type="text" id="emcal_settings[emcalDateTimeMinUnit]" name="emcal_settings[emcalDateTimeMinUnit]" placeholder="30" value="<?php echo $emcal_options['emcalDateTimeMinUnit']; ?>" />
					</p>
					<p class="label"><?php _e('Maximum Unit', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text required max unit" type="text" id="emcal_settings[emcalDateTimeMaxUnit]" name="emcal_settings[emcalDateTimeMaxUnit]" placeholder="must be greater than min unit" value="<?php echo $emcal_options['emcalDateTimeMaxUnit']; ?>" />
					</p>
					<p class="label"><?php _e('Presented by', 'emcal_domain'); ?></p>
					<p>
						<select name="emcal_settings[emcalDateTimeUnitPresentation]">
							<option value="year" <?php if ( $emcal_options['emcalDateTimeUnitPresentation'] =="year" ) echo 'selected="selected"'; ?>>Year</option>
						    <option value="month" <?php if ( $emcal_options['emcalDateTimeUnitPresentation'] =="month" ) echo 'selected="selected"'; ?>>Month</option>
						    <option value="week" <?php if ( $emcal_options['emcalDateTimeUnitPresentation'] == "week" ) echo 'selected="selected"'; ?>>Week</option>
						</select>	
					</p>
					<p class="label"><?php _e('Interest Rate (for loan conversion usage)', 'emcal_domain'); ?></p>
					<p>
						<input class="regular-text required max unit" type="text" id="emcal_settings[emcalInterestRate]" name="emcal_settings[emcalInterestRate]" placeholder="10" value="<?php echo $emcal_options['emcalInterestRate']; ?>" />&nbsp;%
					</p>
					<p class="label"><?php _e('Display interest rate?', 'emcal_domain'); ?></p>
					<p>
						<select name="emcal_settings[emcalDisplayRate]">
							<option value="yes" <?php if ( $emcal_options['emcalDisplayRate'] =="yes" ) echo 'selected="selected"'; ?>>Yes</option>
						    <option value="no" <?php if ( $emcal_options['emcalDisplayRate'] =="no" ) echo 'selected="selected"'; ?>>No</option>
						</select>	
					</p>
				</div>				
				<div class="tabs-wrap">
					<h3><?php _e('Select Theme', 'emcal_domain'); ?></h3>
					<p>
						<select name="emcal_settings[emcalTheme]">
						    <option value="white" <?php if ( $emcal_options['emcalTheme'] == "white" ) echo 'selected="selected"'; ?>>White</option>
						    <option value="dark" <?php if ( $emcal_options['emcalTheme'] == "dark" ) echo 'selected="selected"'; ?>>Dark</option>
						    <option value="neutral" <?php if ( $emcal_options['emcalTheme'] == "neutral" ) echo 'selected="selected"'; ?>>Neutral</option>
						</select>						
					</p>
					<h3><?php _e('Font Awesome', 'emcal_domain'); ?></h3>
					<p>
						<select name="emcal_settings[emcalFont]" id="emcal-font-awesome">
							<option value="" <?php if ( $emcal_options['emcalTheme'] == "" ) echo 'selected="selected"'; ?>>--Select Font--</option>
						    <option class="source-sans-pro" value="source-sans-pro" <?php if ( $emcal_options['emcalTheme'] == "source-sans-pro" ) echo 'selected="selected"'; ?>>Source Sans Pro</option>
						    <option class="lato" value="lato" <?php if ( $emcal_options['emcalTheme'] == "lato" ) echo 'selected="selected"'; ?>>Lato</option>
						    <option class="pt-sans" value="pt-sans" <?php if ( $emcal_options['emcalTheme'] == "pt-sans" ) echo 'selected="selected"'; ?>>PT Sans</option>
						    <option class="slabo" value="slabo" <?php if ( $emcal_options['emcalTheme'] == "slabo" ) echo 'selected="selected"'; ?>>Slabo</option>
						    <option class="open-sans" value="open-sans" <?php if ( $emcal_options['emcalTheme'] == "open-sans" ) echo 'selected="selected"'; ?>>Open Sans</option>
						    <option class="roboto" value="roboto" <?php if ( $emcal_options['emcalTheme'] == "roboto" ) echo 'selected="selected"'; ?>>Roboto</option>
						    <option class="roboto-condensed" value="roboto-condensed" <?php if ( $emcal_options['emcalTheme'] == "roboto-condensed" ) echo 'selected="selected"'; ?>>Roboto Condensed</option>
						    <option class="montserrat" value="montserrat" <?php if ( $emcal_options['emcalTheme'] == "montserrat" ) echo 'selected="selected"'; ?>>Montserrat</option>
						</select>
						&nbsp<span id="emcal-fontsample">e.g. Lorem Ipsum</span>
					</p>					
					<h3><?php _e('Custom CSS', 'emcal_domain'); ?></h3>
					<p>
						<textarea style="width:350px;height:125px;" class="regular-text" type="text" id="emcal_settings[mailCustomCSS]" name="emcal_settings[mailCustomCSS]" ><?php echo $emcal_options['mailCustomCSS']; ?></textarea>
					</p>			

				</div>
				<!--SUBMIT BUTTON-->
				<p id="emcal-submit">
					<input type="submit" value="<?php _e('Save Options', 'emcal_domain'); ?>" class="btn">
				</p>
			</div>

			<div class="clearfix"></div>			
		</form>

		<div id="emcal-admin-side">
			<h3><?php _e('Geared by:', 'emcal_domain'); ?></h3>
			<div id="emcal-authorbox">
				<a href="http://jumpstartcreatives.com" title="Jumpstart Creatives" id="jumpstartlogo">
					<img src="<?php echo plugin_dir_url( __FILE__ ) . 'img/Jumpstart-Logo.png'; ?>">
				</a>
				<div id="details">
					<p><strong>Version:</strong>&nbsp;<?php echo $emcal_version; ?></p>
					<p><strong>Author:</strong>&nbsp;Jumpstart Creatives</p>
					<p><strong>Github:</strong>&nbsp;<a href="https://github.com/chikolokoy08">chikolokoy08</a></p>
				</div>
				<div class="emcal-admin-clearfix"></div>
				<hr>
				<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" style="float: left; background: transparent; padding: 0px;">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIHNwYJKoZIhvcNAQcEoIIHKDCCByQCAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYBmXA4PQYHOCh3Ir0KiPOfBZP/VTqmTx2NL304isr7H6bxO+4UI6E1oM4owR0biObvf/db4OVGq8qkKgKYMgI/+yr2YZ+6JsvQpC9O2hPb7Kryj1evjLOTZ+spfoVVDeE2PS+r+UMXlpZFYdpNqqu+q5C0hjO1T/EUnpxwIApAtdTELMAkGBSsOAwIaBQAwgbQGCSqGSIb3DQEHATAUBggqhkiG9w0DBwQItUTKDwg1sPKAgZBKITUCOCjH3sovlLONnny2oYrWOIgB8IXwatVRf4+5nyVCZ5gG1mX+x84KHVjlTcO6opv6S9Z+x9tdMlBVR5tFT/rPklvnpG0G/Pq7U2+ykJt6x/MX86vQZUDaJ6mgLQUKFTSVtjH69JR+25lgIwln+wohpvKBlYJLXCmGNAuPSf/y4+5wVXzIcjj2D1OvgDWgggOHMIIDgzCCAuygAwIBAgIBADANBgkqhkiG9w0BAQUFADCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wHhcNMDQwMjEzMTAxMzE1WhcNMzUwMjEzMTAxMzE1WjCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20wgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBAMFHTt38RMxLXJyO2SmS+Ndl72T7oKJ4u4uw+6awntALWh03PewmIJuzbALScsTS4sZoS1fKciBGoh11gIfHzylvkdNe/hJl66/RGqrj5rFb08sAABNTzDTiqqNpJeBsYs/c2aiGozptX2RlnBktH+SUNpAajW724Nv2Wvhif6sFAgMBAAGjge4wgeswHQYDVR0OBBYEFJaffLvGbxe9WT9S1wob7BDWZJRrMIG7BgNVHSMEgbMwgbCAFJaffLvGbxe9WT9S1wob7BDWZJRroYGUpIGRMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbYIBADAMBgNVHRMEBTADAQH/MA0GCSqGSIb3DQEBBQUAA4GBAIFfOlaagFrl71+jq6OKidbWFSE+Q4FqROvdgIONth+8kSK//Y/4ihuE4Ymvzn5ceE3S/iBSQQMjyvb+s2TWbQYDwcp129OPIbD9epdr4tJOUNiSojw7BHwYRiPh58S1xGlFgHFXwrEBb3dgNbMUa+u4qectsMAXpVHnD9wIyfmHMYIBmjCCAZYCAQEwgZQwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tAgEAMAkGBSsOAwIaBQCgXTAYBgkqhkiG9w0BCQMxCwYJKoZIhvcNAQcBMBwGCSqGSIb3DQEJBTEPFw0xNTAyMDEwNjA0MzRaMCMGCSqGSIb3DQEJBDEWBBTTUsLmVymzJtZJ3yYIWHB3q6LeYTANBgkqhkiG9w0BAQEFAASBgD7wlUuvTCzcz41kOqt2xqJlEAQ2+cNI8+iuom0JQIUk2I0U4BLhl53Z5haYihdbbKcO1S2n47KBpmDKdkGjwvhVIW4O2d/RuaNjuUfftfJA1EuMkYIRS2k0bL/zLDpTB35AxQ/kJzjnDA2GBVvbtsqUzc62e1LSZsNyaTZxuiCs-----END PKCS7-----
				">
				<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
				</form>
				<a id="gopro" href="<?php echo $pluginDocumentation; ?>" class="btn" style="float: right; width: 290px;">GO PRO? CLICK HERE!</a>
				<div class="emcal-admin-clearfix"></div>
			</div>			
			<h3><?php _e('Basic Documentation', 'emcal_domain'); ?></h3>
			<p>SHORTCODES APPLICABLE TO EMBED CALCULATOR</p>
			<table class="table" cellpadding="0" cellspacing="0">
				<tr>
					<td><strong>Attribute</strong></td>
					<td><strong>Description</strong></td>
					<td><strong>Code Usage</strong></td>
				</tr>
				<tr>
					<td>emcal</td>
					<td>Main shortcode attribute</td>
					<td>[emcal]</td>
				</tr>
				<tr>
					<td>src</td>
					<td>Source path of the media. See supported <a href="<?php echo $pluginDocumentation; ?>">links</a></td>
					<td>[emcal src="https://www.youtube.com/watch?v=64FG1dt8C9s"]</td>
				</tr>					
				<tr>
					<td>button_text</td>
					<td>For custom button text</td>
					<td>[emcal button_text="Put custom button here"]</td>
				</tr>
				<tr>
					<td>text_color</td>
					<td>Custom color for button text</td>
					<td>[emcal text_color="#d876ea"]</td>
				</tr>
				<tr>
					<td>button_color</td>
					<td>For custom button color. Will overwrite the global settings. Provide hexa code only.</td>
					<td>[emcal button_color="#d876ea"]</td>
				</tr>
				<tr>
					<td>button_color</td>
					<td>For custom button color. Provide hexa code only.</td>
					<td>[emcal button_color="#d876ea"]</td>
				</tr>
				<tr>
					<td>modal_btn</td>
					<td>Declare if you need to disable a button and embed the video / audio file.</td>
					<td>[emcal modal_btn="disable"]</td>
				</tr>							
				<tr>
					<td>mm_title</td>
					<td>For custom title. This will be displayed on the modal title holder.</td>
					<td>[emcal mm_title="Custom Title"]</td>
				</tr>					
			</table>
			<p>FOR AUDIO ONLY</p>
			<table class="table" cellpadding="0" cellspacing="0">
				<tr>
					<td style="width: 74px;">mediatype</td>
					<td>Default declaration if you'll be embedding an audio file. (Required for audio embedding). Options: mp3 and wav</td>
					<td>[emcal mediatype="audio"]</td>
				</tr>
				<tr>
					<td>audiotitle</td>
					<td>This will be displayed at the top part of the embed audio file.</td>
					<td>[emcal audiotitle="My embed audio title"]</td>
				</tr>
				<tr>
					<td>audiofull</td>
					<td>This will make the audio embed in full width.</td>
					<td>[emcal audiofull="yes"]</td>
				</tr>
			</table>
			<p><a href="<?php echo $pluginDocumentation; ?>">Click here</a> for full documentation and samples.</p>
		</div>
		<div class="emcal-admin-clearfix"></div>
	</div>
	<?PHP
	echo ob_get_clean();
}

function emcal_add_options_link(){
	add_options_page('Embed Calculator', 'Embed Calculator', 'manage_options', 'emcal-options', 'emcal_options_page');
}


add_action('admin_menu', 'emcal_add_options_link');

function emcal_register_settings(){

	register_setting('emcal_settings_group', 'emcal_settings');
	
}

add_action('admin_init', 'emcal_register_settings');
