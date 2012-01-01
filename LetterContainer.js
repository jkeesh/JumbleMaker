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
        D.log("Letter brough back");

        var letter_elem = $(ui.draggable);
        D.log(letter_elem);
    }

    this.setup = function(){
        $('.letter').draggable(); 
        $('#letter_container').droppable({
            drop: self.letter_dropped,
            hoverClass: 'droppable'
        });
    }


    this.setup();
    D.log(this);
}
