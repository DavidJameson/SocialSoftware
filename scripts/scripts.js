// JavaScript Document
//add additional input box to add quesiton
$(function() {
        var questionDiv = $('#p_questions');
        var i = $('#p_questions p').size() + 1;
        
        $('#addQuestion').live('click', function() {
                $('<p><label for="p_questions"><input type="text" id="quest" size="20" name="quest_' + i +'" value="" class="question" placeholder="Add Another Question" /></label> <a href="#" class="remove" id="removeQuestion">Remove</a></p>').appendTo(questionDiv);
                i++;
                return false;
        });
        
        $('#removeQuestion').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
});
