$(document).ready( function() {

    $('button').click(function() {
        var u = $('#usr').val();
        var p = $('#pwd').val();

        u.trim();
        p.trim();

        if ( u == '' || p == '' ) {
            alert('Empty fields not allowed');
            return false;
        }
        else
        { return true; }
    });
});