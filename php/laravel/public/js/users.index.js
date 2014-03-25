jQuery(document).ready(function ($) {
    var request;
    // bind to the submit event of our form
    $( '#form-user-sendmail' ).on( 'submit', function(e) {
        // abort any pending request
        if (request) {
            request.abort();
        }
        $('#btn-user-sendmail').toggleClass('active');
        // setup some local variables
        var $form = $(this);
        var action = $(this).prop('action');
        // let's select and cache all the fields
        var $inputs = $form.find("input, select, button, textarea");
        // serialize the data in the form
        var serializedData = $form.serialize();

        // let's disable the inputs for the duration of the ajax request
        $inputs.prop("disabled", true);

        // fire off the request to /form.php
        request = $.ajax({
            url: action,
            type: "post",
            data: serializedData
        });

        // callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR) {
            // log a message to the console
            if (response.status == "success"){
                console.log("Start to sending mail... Task id = " + response.msg);
            }
            else console.log("Fail to start sending mail - " + response.msg);
        });

        // callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown) {
            // log the error to the console
            console.error(
                "The following error occured: " +
                    textStatus, errorThrown
            );
        });

        // callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // reenable the inputs
            $inputs.prop("disabled", false);
            $('#btn-user-sendmail').toggleClass('active');
        });

        // prevent default posting of form
        e.preventDefault();
    });
});