<?php
require_once get_template_directory() . '/includes/options-config.php';
require_once get_template_directory() . '/admin/control-icon-picker.php';

	if( ! class_exists('Fin_Relief_Customizer_API_Wrapper') ) {
			require_once get_template_directory() . '/admin/class.finrelief-customizer-api-wrapper.php';
	}


Fin_Relief_Customizer_API_Wrapper::getInstance($options);
