// var wordArray = [];
var selectedWordObject ;
var isUKWord = true;
var viewLanguage;
var hiddenLanguage
var viewLanguageOptions = ["UK", "IT"];
var finalRoundComplete = false;
var wordbundleRaw = $('#data-holder').text();
var wordBundle = wordbundleRaw;
wordBundle = $('#data-holder').text();
var incompleteWords;
var allDone;
var words;
var wordsJS = JSON.parse(wordBundle);
var correctAnswersTarget;
var amountIncompleteInRound;
var currentCorrectAnswers;

initialiseMarkersAndWords();

swapLanguage(isUKWord);

deal();

$('#input-field').focus(function(){
    $('#input-field').val('');
});

$('#check-word-button').click(function(){
    if(!finalRoundComplete) {
        progressGame();
    }
});

$("body").keyup(function(event) {
    if (event.keyCode === 13) {
        $('#check-word-button').click();
    }
});

function progressGame() {
    console.clear();
    if($('#input-field').val() == selectedWordObject[hiddenLanguage]) {
        selectedWordObject["ROUND-COMPLETE"] = true;
        selectedWordObject[hiddenLanguage+'-CORRECT'] = true;

        if(viewLanguage == "UK") {
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__native').addClass('--correct');
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__native').removeClass('--wrong');
            currentCorrectAnswers++;
        }
        else {
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__foreign').addClass('--correct');
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__foreign').removeClass('--wrong');
            currentCorrectAnswers++;
        }
        
        showAnswerFeedback(true, selectedWordObject);
    }

    else {
        if(viewLanguage == "UK") {
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__native').addClass('--wrong');
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__native').removeClass('--correct');
        }
        else {
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__foreign').addClass('--wrong');
            $('#PB-'+selectedWordObject["ID"]).find('.progress-bar__foreign').removeClass('--correct');
        }

        selectedWordObject[hiddenLanguage+'-CORRECT'] = false;
        selectedWordObject["CAN-COMPLETE"] = false;
        finalRoundComplete = false;
        showAnswerFeedback(false, selectedWordObject);
    }
    $('#input-field').val('');
    selectedWordObject["ROUND-COMPLETE"] = true;

    amountIncompleteInRound--;
    allDone = words.length;
    $(words).each(function(index, value){
        if(value["ID"] == selectedWordObject["ID"]) {
            value = selectedWordObject;
        }
        if(value["ROUND-COMPLETE"] == true) {
            allDone--;
        }
        if (allDone == 0) {
            //checkGameComplete();
            swapLanguage(isUKWord);
            resetRound();
        }
    });
    // console.table(words);
    deal();
    checkGameAndRound();
}

function initialiseMarkersAndWords(){
    $('.game-area__progress-bars-container').html('');
    $(wordsJS["WORDS"]).each(function(index, value){
        value["ID"] = index +1;
        value["BUCKET"] = 1;
        value["IT-CORRECT"] = false;
        value["UK-CORRECT"] = false;
        value["ROUND-COMPLETE"] = false;
        value["CAN-COMPLETE"] = false;

        $('.game-area__progress-bars-container').append('<div id="PB-'+value["ID"] +'" class="progress-bar"><div class="progress-bar__foreign"></div><div class="progress-bar__native"></div><div class="progress-bar__baseline">'+ value["ID"] +'</div></div>');
    });
    console.table(wordsJS["WORDS"]);
    words = wordsJS["WORDS"];    
    correctAnswersTarget =  words.length * 2;
    amountIncompleteInRound = words.length * 2;
    currentCorrectAnswers = 0;

     $('.progress-bar').css('width', 'calc('+(100/ words.length )+'% - 20px)');
    //$('.progress-bar').css('width', 'calc(10% - 20px)');
}

function showAnswerFeedback(answer, obj) {
    $('#helper-area').html('');
    if (answer == true) {
        $('#helper-area').append('<p class="chalk-3">' + obj[viewLanguage] + " = " + obj[hiddenLanguage] + '</p><br><em class="chalk-4">' + obj["HELPER"] + '</em>');
        $('#result-underline').html("correct");
        $('#result-underline').css('color', '#56eb56');
        $('#your-answer').text('');
    }
    if ( answer == false ) {
        $('#helper-area').append('<p class="chalk-3"> ' + obj[viewLanguage] + " = " + obj[hiddenLanguage] + '</p><br><em class="chalk-4">' + obj["HELPER"] + '</em>');
        $('#result-underline').html("incorrect");
        $('#result-underline').css('color', '#f14f39');
        $('#your-answer').text("Your answer: " + $('#input-field').val() );
    }
    if( answer == "win") {
        $('#helper-area').append('<h1 class="green blink">YOU WIN!</h1>');
        $('.input-assembly').css('display', 'none');
        $('#back-button').css('display', 'block');
        $('.game-area__completion-form').fadeIn("slow");
        $('#your-answer').text('');
    }
}

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

function resetRound() {
    $(words).each(function(index,value) {
        value["ROUND-COMPLETE"] = false;
    });
}

function deal() {
    var wordsRandomised = words.slice().sort(function(a, b) { return 0.5 - Math.random() }); // returns a new sorted array
    
    $(wordsRandomised).each(function(index, value){
        if(value["ROUND-COMPLETE"] == false) {
            selectedWordObject = value;
            $('#current-word').text(selectedWordObject[viewLanguage]);
            return false;
        }
    });
}

function checkGameAndRound(){
    if(amountIncompleteInRound == 0) {
        if( currentCorrectAnswers == correctAnswersTarget) {
            showAnswerFeedback( "win", null);
            finalRoundComplete = true;
        }
        else {
            initialiseMarkersAndWords();
        }
    }
}

function checkGameComplete(){
    incompleteWords = words.length;
    $(words).each(function(index, value){
        if(value["CAN-COMPLETE"] == true  && finalRoundComplete == true) {
            incompleteWords--;
        }
        if(incompleteWords == 0 ) {
            showAnswerFeedback( "win", null);
        }
    });
}