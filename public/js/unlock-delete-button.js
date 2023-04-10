var isLocked = true;
$('#unlock').click(function(){
    unlock();
});

function unlock() {
    if(isLocked) {
        $('.delete-form').removeClass('d-none');
        $('.delete-form').addClass('d-block');
        $('#unlock').addClass('--unlock');
    }
    else {
        $('.delete-form').removeClass('d-block');
        $('.delete-form').addClass('d-none');
        $('#unlock').removeClass('--unlock');
    }
    isLocked = !isLocked
}