window.D = window.console;

D.log('test');

function Letter(options){
    this.id = options.id;
    this.letter = options.letter;
    this.container; // initially undefined
}


/*
 * Construct a new LetterContainer, which holds the main
 * letters for the final word.
 * @param   options {Object}    the options obj
 *      -   word    {string}    the final word, formatted
 */
function LetterContainer(options){
    var self = this;

    this.word = options.word;
    this.letters = [];

    this.get_by_index = function(idx){
        return this.letters[idx];
    }

    this.get_by_elem = function(elem){
        var idx = $(elem).attr('data-id');
        return this.get_by_index(idx);
    }

    this.reset_letter = function(e, ui){
        var letter_elem = $(this);
        var letter = self.get_by_elem(letter_elem);
        if(letter.container == undefined){
            D.log("Container undefined");
            return;
        }

        letter.container.remove_letter(letter.id);
        letter.container = undefined;
        D.log(letter);
    }

    this.setup = function(){
        $('.letter').each(function(idx, elem){
            self.letters.push(new Letter({
                id: idx,
                letter: Utils.get_letter(elem) 
            }));    
        });

        $('.letter').draggable({
            drag: self.reset_letter
        }); 
        $('#letter_container').droppable({
            hoverClass: 'droppable',
            disabled: false 
        });
    }


    this.setup();
    D.log(this);
}

var Utils = {};
Utils.get_letter = function(elem){
    return $.trim($(elem).html());
}

Utils.all_containers = {};
Utils.get_container = function(sel){
    return Utils.all_containers[sel];
}
