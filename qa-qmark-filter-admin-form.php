<?php

/*

*/

	class qa_qmark_filter_admin_form {
		
		function option_default($option)
		{
			if ($option=='qmark_question_mark_on') return true;
		}
	
	
		function admin_form(&$qa_content)
		{
			$saved=false;
			
			if (qa_clicked('qmark_save_button')) {
				
				qa_opt('qmark_question_mark_on', (int)qa_post_text('qmark_question_mark_on_field'));
				$saved=true;
			}
			

			
			return array(
				'ok' => $saved ? 'Qmark filter settings saved' : null,
				
				'fields' => array(
					
					array(
						'label' => 'Add a question mark at the end of the question title if not present.',
						'type' => 'checkbox',
						'value' => qa_opt('qmark_question_mark_on'),
						'tags' => 'name="qmark_question_mark_on_field" id="qmark_question_mark_on_field"',
					),

				),
				
				'buttons' => array(
					array(
						'label' => 'Save Changes',
						'tags' => 'name="qmark_save_button"',
					),
				),
			);
		}
		
	}
	

/*
	Omit PHP closing tag to help avoid accidental output
*/
