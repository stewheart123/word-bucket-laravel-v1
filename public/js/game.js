var wordArray = [];
var allBuckets = [$('#red-bucket'),$('#yellow-bucket'),$('#green-bucket')];
var selectedWordObject ;
var isUKWord = true;
var viewLanguage;
var hiddenLanguage
var viewLanguageOptions = ["UK", "IT"];
var finalRoundComplete = false;
var wordbundleRaw = $('#data-holder').text();
var wordBundle = wordbundleRaw;
var wordsJS = JSON.parse(wordBundle);
///console.table(wordBundle);
//console.table(JSON.parse(wordbundleRaw));
$(wordsJS["WORDS"]).each(function(index, value){
    value["ID"] = index;
    value["BUCKET"] = 1;
    value["IT-CORRECT"] = false;
    value["UK-CORRECT"] = false;
    value["ROUND-COMPLETE"] = false;
    value["CAN-COMPLETE"] = false;
});
console.table(wordsJS["WORDS"]);
var words = wordsJS["WORDS"];

$('#input-field').focus(function(){
    $('#input-field').val('');
});

swapLanguage(isUKWord);

function swapLanguage(boolChoice) {
    if(boolChoice == true) {
        viewLanguage = viewLanguageOptions[0];
        hiddenLanguage = viewLanguageOptions[1];
    }
    else {
        viewLanguage = viewLanguageOptions[1];
        hiddenLanguage = viewLanguageOptions[0];
    }
    console.log('selected language is now.. ' + viewLanguage );
    if(viewLanguage == "UK") {
        $('#country-holder').addClass('it-flag');
        $('#country-holder').removeClass('uk-flag');
    }
    else {
        $('#country-holder').addClass('uk-flag');
        $('#country-holder').removeClass('it-flag');
    }
    isUKWord = !isUKWord;
}

function visuallyArrangeWordsInBuckets() {
    $(allBuckets).each(function(index,bucket){
        $(bucket).html('');
    });

    $(words).each(function(index,individual) {
        //conditional count
        var correctCount = 0; 
        if(individual["IT-CORRECT"] == true) {
            correctCount++;
        } 
        if(individual["UK-CORRECT"] == true) {
            correctCount++;
        } 


        $(allBuckets)[individual["BUCKET"]].append('<p id="'+individual["ID"]+'" class="color-'+correctCount +'">'+individual["ID"] +'</p>');
    });
}

visuallyArrangeWordsInBuckets();

function qualifyBucketMove(obj){
    if(obj["IT-CORRECT"] == false && obj["UK-CORRECT"] == false){
        if(obj["BUCKET"]-1 != -1 ) {
            obj["BUCKET"] = obj["BUCKET"] -1;
        }
    }
    if(obj["IT-CORRECT"] == true && obj["UK-CORRECT"] == true) {
        if(obj["BUCKET"]+1 != 3 ) {
            obj["BUCKET"] = obj["BUCKET"] +1;
             obj["IT-CORRECT"] = false;
             obj["UK-CORRECT"] = false;
        }

        if(obj["BUCKET"]+1 == 3 ) {
            obj["CAN-COMPLETE"] = true;
            checkGameComplete();
            finalRoundComplete = true;
        }
    }
    return obj;
    
}

function resetRound() {
    $(words).each(function(index,value) {
        value["ROUND-COMPLETE"] = false;
    });
}

function deal() {
    $(words).each(function(index, value){
        var randomItem = words[Math.floor(Math.random()*words.length)];
        if(randomItem["ROUND-COMPLETE"] == false) {
            selectedWordObject = randomItem;
            //console.log(selectedWordObject["IT"]);
            $('#current-word').text(selectedWordObject[viewLanguage]);
            return false;
        }
    });
}

function checkGameComplete(){
    var incompleteWords = words.length;
    $(words).each(function(index, value){
        if(value["CAN-COMPLETE"] == true  && finalRoundComplete == true) {
            incompleteWords--;
        }
        if(incompleteWords == 0 ) {
            visuallyArrangeWordsInBuckets();
            showAnswerFeedback( "win", null);
        }
    });
}

deal();

$('#check-word-button').click(function(){
    console.clear();
    if($('#input-field').val() == selectedWordObject[hiddenLanguage]) {
        console.log('correct!');
        selectedWordObject["ROUND-COMPLETE"] = true;
        selectedWordObject[hiddenLanguage+'-CORRECT'] = true;
        if($('#' +selectedWordObject["ID"]).hasClass('blue')){
            $('#' +selectedWordObject["ID"]).removeClass('blue');    
            $('#' +selectedWordObject["ID"]).addClass('yellow');    
        }
        else {
            $('#' +selectedWordObject["ID"]).addClass('blue');    
        }
        
        showAnswerFeedback(true, selectedWordObject);

    }
    else {
        console.log('wrong');
        selectedWordObject[hiddenLanguage+'-CORRECT'] = false;
        selectedWordObject["CAN-COMPLETE"] = false;
        finalRoundComplete = false;
        if($('#' +selectedWordObject["ID"]).hasClass('yellow')) {
            $('#' +selectedWordObject["ID"]).removeClass('yellow');
            $('#' +selectedWordObject["ID"]).addClass('blue');
        }
        else {
            $('#' +selectedWordObject["ID"]).removeClass('yellow');
            $('#' +selectedWordObject["ID"]).removeClass('blue');
        }
        showAnswerFeedback(false, selectedWordObject);
    }
    $('#input-field').val('');
    selectedWordObject["ROUND-COMPLETE"] = true;
    selectedWordObject = qualifyBucketMove(selectedWordObject);

    var allDone = words.length;
    $(words).each(function(index, value){
        if(value["ID"] == selectedWordObject["ID"]) {
            value = selectedWordObject;

        }
        visuallyArrangeWordsInBuckets();
        if(value["ROUND-COMPLETE"] == true) {
            allDone--;
        }
        if (allDone == 0) {
            //checkGameComplete();
            swapLanguage(isUKWord);
            resetRound();
            // visuallyArrangeWordsInBuckets();
        }
    });
    console.table(words);
    deal();

});

$("body").keyup(function(event) {
    if (event.keyCode === 13) {
        $('#check-word-button').click();
    }
});

function showAnswerFeedback(answer, obj) {
    $('#helper-area').html('');
    if (answer == true) {
        $('#helper-area').append('<p class="green">correct!</p><strong> ' + obj[viewLanguage] + " = " + obj[hiddenLanguage] + "</strong>");
    }
    if ( answer == false ) {
        $('#helper-area').append('<p class="red">incorrect</p><strong> ' + obj[viewLanguage] + " = " + obj[hiddenLanguage] + "</strong>");
    }
    if( answer == "win") {
        $('#helper-area').append('<p class="green blink">YOU WIN!</p><strong> </strong>');
        $('.input-assembly').css('display', 'none');
        $('#back-button').css('display', 'block');
    }
}