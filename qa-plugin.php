<?php

if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
	header('Location: ../../');
	exit;
} 

    qa_register_plugin_module('filter', 'qa-filter-qmark.php', 'qa_filter_qmark', 'Qmark Filter Plugin');
    qa_register_plugin_module('module', 'qa-qmark-filter-admin-form.php', 'qa_qmark_filter_admin_form', 'Qmark Filter Plugin');

/*
	Omit PHP closing tag to help avoid accidental output
*/    
