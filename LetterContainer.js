window.D = window.console;

D.log('test');

/*
 * Construct a new LetterContainer, which holds the main
 * letters for the final word.
 * @param   options {Object}    the options obj
 *      -   word    {string}    the final word, formatted
 */
function LetterContainer(options){

    this.word = options.word;
    this.letters = [];

    D.log(this);
}
