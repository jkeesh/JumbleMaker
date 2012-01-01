D.log('WordContainer.js');

/*
 * Create a word container, which holds a word list and a  * certain set of letters. Constructed with options obj.
 * @param   options {Object} options ojb
 *      -   id  {string}    selector for word container
 */ 
function WordContainer(options){
    var self = this;

    this.id = options.id; 
    this.letters = [];

    this.setup = function(){
        this.letter_drop = $('.letter_holder', this.id); 
        $(this.letter_drop).droppable({
            drop: self.letter_dropped,      
            hoverClass: 'droppable'
        });
    }

    /* 
     * Make a call to the server to update the 
     * wordlist based on the current letters in 
     * this word container.
     */
    this.update = function(){
        D.log("UPDATE"); 
        var letters = self.letters.join(',');
        D.log(letters);
        $.ajax({
            url: 'get_words.php',
            data: {
                letters: letters 
            },
            type: 'GET',
            dataType: 'JSON',
            success: function(result){
                D.log(result);
            }
        });
    }

    this.letter_dropped = function(e, ui){
        var elem = ui.draggable;
        $(elem).data('container', self.id);
        var letter = Utils.get_letter(elem);
        self.add_letter(letter);
    }

    this.add_letter = function(letter){
        this.letters.push(letter);    
        D.log(this);
        this.update();
    }

    this.remove_letter = function(letter){
        for(var i = 0; i < this.letters.length; i++){
            var cur = this.letters[i];
            if(cur == letter){
                this.letters.splice(i, 1);
                break;
            }
        }    
        this.update();
        D.log(this);
    }

    this.setup();

    D.log(this);
    Utils.all_containers[this.id] = this;
}
