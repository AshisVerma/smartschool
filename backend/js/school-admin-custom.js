$(document).ready(function() {
    if ($('.purchasemodal').length == 0) {
        $("#activelicmodal").modal('hide');
    }
    $(document).on('click', '.purchasemodal', function() {
        $("#activelicmodal").modal('hide');
    })
});
