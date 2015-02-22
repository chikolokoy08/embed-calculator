<?php

/*****************************

* Display Functions

*****************************/

//[foobar]
function emcal_func( $atts, $content = null ) {
    global $emcal_options;
    $pluginDocumentation = 'http://jumpstartcreatives.com/plugins/embed-calculator-plugin';
    $emcalType = ['custom', 'measurement', 'mass'];
    $a = shortcode_atts( array(
        'type' => '',
        'caltitle' => '',
        'subtotaltitle' => '',
        'firstrange' => '',
        'currunit' => '',
        'curmin' => '',
        'curmax' => '',
        'secondrange' => '',
        'datetimeunit' => '',
        'dtmin' => '',
        'dtmax' => '',
        'dtdisplay' => '',
        'interest' => '',
        'ratedisplay' => '',

    ), $atts );
	ob_start();
	?>
        <div id="emcal-ui" class="<?php echo $emcal_options["emcalFont"]; ?>">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Lato|PT+Sans|Slabo+27px|Open+Sans|Oswald|Roboto|Roboto+Condensed|Montserrat' rel='stylesheet' type='text/css'>            
        <?php if($a['type'] == ''): ?>
            <div id="emcal-basic-calc" class="<?php echo ($emcal_options["emcalTheme"] == '' ? 'white' : $emcal_options["emcalTheme"]); ?> calc">
                <input type="text" name="emcal-bc-input" id="emcal-input" placeholder="C">
                <table class="emcal-bc-typepad" width="100" cellpadding="0" cellspacing="0">                   
                    <tr>
                        <td><a href="#">1</a></td>
                        <td><a href="#">2</a></td>
                        <td><a href="#">3</a></td>
                        <td><a href="#">/</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">4</a></td>
                        <td><a href="#">5</a></td>
                        <td><a href="#">6</a></td>
                        <td><a href="#">x</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">7</a></td>
                        <td><a href="#">8</a></td>
                        <td><a href="#">9</a></td>
                        <td><a href="#">-</a></td>
                    </tr>
                    <tr>
                        <td><a href="#">C</a></td>
                        <td><a href="#">0</a></td>
                        <td class="emcal-equals"><a href="#" class="emcal-eqlbtn">=</a></td>
                        <td><a href="#">+</a></td>
                    </tr>                    
                </table>
                <div class="emcal-clearfix"></div>
            </div>
            <small class="emcal-authorbox">Embed Calculator by <a href="<?php echo $pluginDocumentation; ?>">Jumpstart Creatives</a></small>
        <?php else: ?>
            <?php if(in_array($a['type'], $emcalType)): ?>
                <?php if( ($emcal_options['emcalCalculatorTitle'] || $a['caltitle']) && ($emcal_options['emcalSubtotalTitle'] || $a['subtotaltitle']) && ($emcal_options['emcalFirstRangeTitle'] || $a['firstrange']) && ($emcal_options['emcalCurrencyUnit'] || $a['currunit']) && ($emcal_options['emcalMinUnit'] || $a['curmin']) && ($emcal_options['emcalMaxUnit'] || $a['curmax']) && ($emcal_options['emcalSecondRangeTitle'] || $a['secondrange']) && ($emcal_options['emcalDateTimeUnit'] || $a['datetimeunit']) && ($emcal_options['emcalDateTimeMinUnit'] || $a['dtmin']) && ($emcal_options['emcalDateTimeMaxUnit'] || $a['dtmax']) && ($emcal_options['emcalDateTimeUnitPresentation'] || $a['dtdisplay']) ): ?>
                    <div class="emcal-range-converter onload">
                        <h3 class="emcal-maintitle"><?php echo $emcal_options['emcalCalculatorTitle']; ?></h3>
                        <div class="emcal-range-wrapper">
                            <div class="emcal-money emcal-unit">
                                <p class="emcal-range-title"><?php echo $emcal_options['emcalFirstRangeTitle']; ?></p>
                                <div class="nstSlider" data-range_min="<?php echo $emcal_options['emcalMinUnit']; ?>" data-range_max="<?php echo $emcal_options['emcalMaxUnit']; ?>" data-cur_min="<?php echo $emcal_options['emcalMaxUnit'] / 2; ?>" data-cur_max="0">
                                    <div class="bar"></div>
                                    <div class="leftGrip"></div>
                                </div>
                                <div class="emcal-unit-min"><?php echo $emcal_options['emcalMinUnit']; ?></div><div class="emcal-unit-max"><?php echo $emcal_options['emcalMaxUnit']; ?></div>
                                <div class="emcal-clearfix"></div>
                                <div class="emcal-unit-container"><span class="unit"><?php echo $emcal_options['emcalCurrencyUnit']; ?></span><span class="unit-val"><div class="leftLabel"></div></span></div>
                            </div>
                            <div class="emcal-datetime emcal-unit">
                                <p class="emcal-range-title"><?php echo $emcal_options['emcalSecondRangeTitle']; ?></p>
                                <div class="nstSlider" data-range_min="<?php echo $emcal_options['emcalDateTimeMinUnit']; ?>" data-range_max="<?php echo $emcal_options['emcalDateTimeMaxUnit']; ?>" data-cur_min="<?php echo $emcal_options['emcalDateTimeMaxUnit'] / 2; ?>" data-cur_max="0">
                                    <div class="bar"></div>
                                    <div class="leftGrip"></div>
                                </div>
                                <div class="emcal-unit-min"><?php echo $emcal_options['emcalDateTimeMinUnit']; ?></div><div class="emcal-unit-max"><?php echo $emcal_options['emcalDateTimeMaxUnit']; ?></div>
                                <div class="emcal-clearfix"></div>
                                <div class="emcal-unit-container"><span class="unit"><?php echo $emcal_options['emcalDateTimeUnit']; ?></span><span class="unit-val"><div class="leftLabel"></div></span></div>
                            </div>
                        </div>
                        <div class="emcal-range-result">
                            <div class="emcal-result">
                                <h4 class="emcal-subtotal">Subtotal</h3>
                                <div class="emcal-amt">$<span class="emcal-sub-val">45</span> / <span class="sub-divider">week</span></div>
                                <h4 class="emcal-total">Total</h3>
                                <div class="emcal-amt">$<span class="emcal-total-val">45</span></div>
                                <?php if($emcal_options['emcalInterestRate'] != ''): ?>
                                    <?php if($emcal_options['emcalDisplayRate'] == 'yes'): ?>
                                        <small class="emcal-percentage">With <span class="emcal-percent"><?php echo $emcal_options['emcalInterestRate']; ?></span> % intereset</small>
                                    <?php else: ?>
                                        <small style="display: none;" class="emcal-percentage">With <span class="emcal-percent"><?php echo $emcal_options['emcalInterestRate']; ?></span> % intereset</small>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="emcal-clearfix"></div>
                    </div>
                    <?php else: ?>
                        <div class="prompt error">Please fill necessary variable for this plugin to work. Check <a href="/wp-admin/options-general.php?page=emcal-options" target="_blank">Global Setup</a>.</div>
                    <?php endif; ?>
            <?php else: ?>
                <div class="prompt error">Invalid "type". Choose only from "custom", "measurement" and "mass".</div>
            <?php endif; ?>
        <?php endif; ?>
		<div class="emcal-clearfix"></div>
        </div>
        <div class="emcal-clearfix"></div>

    <?PHP
	return ob_get_clean();
}

add_shortcode( 'emcal', 'emcal_func' );
