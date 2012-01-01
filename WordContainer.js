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
    this.size = options.size;

    this.setup = function(){
        this.letter_drop = $('.letter_holder', this.id); 
        $(this.letter_drop).droppable({
            drop: self.letter_dropped,      
            hoverClass: 'droppable'
        });
    }


    this.get_letters = function(){
        var result = "";
        for(var i = 0; i < this.letters.length; i++){
            result += this.letters[i].letter;
        }
        return result;
    }

    /* 
     * Make a call to the server to update the 
     * wordlist based on the current letters in 
     * this word container.
     */
    this.update = function(){
        D.log("update");
        if(this.letters.length == 0){
            D.log("empty");
            var word_list = $('.word_list', self.id);
            word_list.html('');
            return; 
        }
        var letters = this.get_letters(); 
        D.log("Letters: " + letters); 
        $.ajax({
            url: 'get_words.php',
            data: {
                letters: letters, 
                size: self.size
            },
            type: 'GET',
            success: function(result){
                var result_arr = result.split('\n');
                D.log(result_arr);
                
                var html = '';
                for(var i = 0; i < result_arr.length; i++){
                    html += '<div class="w">'+result_arr[i]+'</div>';
                }
                var word_list = $('.word_list', self.id);
                word_list.html(html);
                //word_list.html(result);
            }
        });
        D.log(this);
    }

    this.letter_dropped = function(e, ui){
        var elem = ui.draggable;
        var letter = LetterContainer.get_by_elem(elem);
        letter.container = self;
        self.add_letter(letter); 
    }

    this.add_letter = function(letter){
        this.letters.push(letter);    
        this.update();
    }

    this.remove_letter = function(id){
        for(var i = 0; i < this.letters.length; i++){
            var cur = this.letters[i];
            if(cur.id == id){
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
