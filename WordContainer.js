D.log('WordContainer.js');

/*
 * Create a word container, which holds a word list and a  * certain set of letters. Constructed with options obj.
 * @param   options {Object} options ojb
 *      -   id  {string}    selector for word container
 */ 
function WordContainer(options){
    var self = this;

    this.id = options.id; 

    this.setup = function(){
        this.letter_drop = $('.letter_holder', this.id); 
        $(this.letter_drop).droppable({
            drop: self.letter_dropped,      
            hoverClass: 'droppable'
        });
    }

    this.letter_dropped = function(e, ui){
        D.log("letter dropped");
        D.log(e);
        D.log(ui);
        D.log($(ui.draggable));
    }

    this.setup();

    D.log(this);
}
