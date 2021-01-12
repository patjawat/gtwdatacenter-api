$( document ).ready(function() {

$('.loading-page').hide()

$('body').on('click', '.loadscreen', function(e) {
    $('.loading-page').show()    

});

$('body').on('submit','form',function() { 
    $('.loading-page').show();
}); 

function loadWait(){
    $('.label-header').html('<i class="far fa-clock"></i> กรุณารอสักครู่');
    $('#mediumBody').html('<img src="/image/loading-gif.gif" width="200px" style=" margin: auto;display: block"/>');
}

});
