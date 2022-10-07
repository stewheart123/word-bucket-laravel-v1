$(document).ready(function(){
    $('#burger-menu').click(function(){
        console.log('click');
        $('#mobile-side-menu').toggleClass('active');
    });
});