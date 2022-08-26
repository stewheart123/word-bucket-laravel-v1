var arrayOfJson = [];
var nativeLang = '"' + $('#native-select').val() + '"'; 
var foreignLang = '"' + $('#foreign-select').val() + '"';

$('#native-select').change(function(){
    nativeLang = '"' + $('#native-select').val() + '"'; 
    console.log(nativeLang);
});

$('#foreign-select').change(function(){
    foreignLang = '"' + $('#foreign-select').val() + '"'; 
    console.log(foreignLang);
});
//separate function for building a json object..

$('#add-word-button').click(function() {
   // buildJSONword();
    newInputRow();
});

$('.remove-word-button').click(function() {
    //updateJSON();
    RemoveRow($(this));
});

$('#ready-button').click(function() {
    //loops over each input row somehow..
    var isLast = false;
    $('.input-flex').each(function(index){
        //setup vars using selectors, pass them to the function arguments
        var inputNative = $(this).find('.native-input').val();
        var inputForeign = $(this).find('.foreign-input').val();
        var inputHelper = $(this).find('.helper-input').val();
        // console.log( inputHelper);
        if(index == $('.input-flex').length-1 ) {
            isLast = true;
        }
            buildJSONword(inputNative, inputForeign, inputHelper, isLast);
    });

    updateJSON();
    $('#submit').removeClass('d-none');
});

function RemoveRow(obj) {
    console.log(obj);
    $(obj).parent().remove();
    arrayOfJson.pop();
}

function newInputRow() {
    var inputRowMarkupString = ' <div class="d-flex input-flex"><div class="field-inner"><label> native word</label><input type="text" value="" class="native-input"></div><span class="mt-4">=</span><div class="field-inner"><label> foreign word</label><input type="text" value="" class="foreign-input"></div><div class="field-inner"><label>helper</label><input type="text" value="" class="helper-input"></div><div id="remove-word-button" class="remove-word-button btn btn-warning btn-lg">Remove Word</div></div>';
    $('.d-flex.input-flex').last().after(inputRowMarkupString);

    
    $('.remove-word-button').click(function() {
        //updateJSON();
        RemoveRow($(this));
    });
}

function buildJSONword(nativeInput, foreignInput, helperInput, last) {
    var endBracket = '},';
    if(last == true) {
        endBracket = '}';
    }
    var buildJSON = '';

    var nativeWord = '"'+ nativeInput + '"';
    var foreignWord = '"' + foreignInput + '"';
    var helperText = '"'+ helperInput + '"';
     buildJSON = '{' + nativeLang + ':' +
     nativeWord + ',' + foreignLang + ':' + 
     foreignWord + ',' + '"HELPER"' + ':' +
     helperText + endBracket;
     arrayOfJson.push(buildJSON)
     //console.log(buildJSON);
    // updateJSON();
     
}

function updateJSON() {
    $('#gmc-text-area').empty();
    
    var buildStringFinal = '';
     buildStringFinal = '{ "WORDS" : [';
    $(arrayOfJson).each(function(index, value){
        buildStringFinal += value;
    });
    buildStringFinal += ']}';
    //buildString = buildString.trim(0, -1);
    console.log(buildStringFinal);
    $('#gmc-text-area').val(buildStringFinal);
    arrayOfJson.length = 0;
}