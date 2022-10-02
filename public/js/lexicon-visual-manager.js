var identitiy;
$('.lexicon__completed-individual').each(function(index, value) {
    identitiy = $(value).html();
    $('#tile-'+identitiy).css('background-color', '#4cda82');
});