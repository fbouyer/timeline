/**
 * hide alerts
 */
function hideAlert() {
    $('.alert').on('click', function (e) {
        $(this).fadeOut();
    });
}

function generateError(error){
    $('.alerts').html('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span `aria-hidden="true">&times;</span></button>'+error+'</div>');
}

function generateMsg(msg){
    $('.alerts').html('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span `aria-hidden="true">&times;</span></button>'+msg+'</div>');
}

$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /**
     * Function calls
     */
    hideAlert();
})