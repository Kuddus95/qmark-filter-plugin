<?php


    class qa_filter_qmark {

        var $directory;
        function load_module($directory, $urltoroot)
        {
            $this->directory=$directory;
        }

        function filter_question(&$question, &$errors, $oldquestion) {
            $question['title'] = preg_replace('~(\s|&nbsp;)+~', ' ', $question['title']); // several spaces condensed to one - text: (Big '     ' space) becomes: (Big ' ' space)
            $question['title'] = trim($question['title']);

            if(qa_opt('qmark_question_mark_on')){
                // if not another errors 
                if (empty($errors['title'])){
                    if(mb_substr($question['title'], -1, 1, 'UTF-8') != '?'){ // and question title do not end with question mark
                        $question['title'].='?'; // add a question mark at the end of title (without error)
                    }else{
                        $question['title'] = rtrim($question['title'],'?').'?'; // no more than one question mark at the end
                    }
                }
            }

        } 
        //-------------------------------------------

        function filter_answer(&$answer, &$errors, $question, $oldanswer) {
            // replace empty p tags causing unnecessary line breaks, such as <p>&nbsp;</p>
            $answer['content'] = preg_replace('~\s?<p>(\s|&nbsp;)+</p>\s?~', '', $answer['content']);
        }
        //-------------------------------------------

        function filter_comment(&$comment, &$errors, $question, $parent, $oldcomment){}
    }

/*
	Omit PHP closing tag to help avoid accidental output
*/
