window.D = window.console;

D.log('test');

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

    this.letter_dropped = function(e, ui){
        var letter_elem = $(ui.draggable);
        var letter = Utils.get_letter(letter_elem);
        var container_id = letter_elem.data('container');
        var container = Utils.get_container(container_id);
        container.remove_letter(letter);
    }

    this.setup = function(){
        $('.letter').draggable(); 
        $('#letter_container').droppable({
            drop: self.letter_dropped,
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
