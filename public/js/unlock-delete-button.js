var isLocked = true;
$('#unlock').click(function(){
    unlock();
});


function unlock() {
    if(isLocked) {
        $('.delete-lesson-button').removeClass('d-none');
        $('.delete-lesson-button').addClass('d-block');
    }
    else {
        $('.delete-lesson-button').removeClass('d-block');
        $('.delete-lesson-button').addClass('d-none');
    }
    isLocked = !isLocked
}