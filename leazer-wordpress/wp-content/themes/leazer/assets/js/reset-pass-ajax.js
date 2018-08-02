jQuery(document).ready(function($) {
    // Perform AJAX login on form submit
    $('form#resetpass').on('submit', function(e){
        $('form#resetpass p.status_pass').show().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_reset_object.ajaxurl,
            data: { 
                'action': 'ajaxresetpass', //calls wp_ajax_nopriv_ajaxlogin
                'email': $('form#resetpass #email').val(), 
                'security': $('form#resetpass #security_key').val() },
            success: function(data){
                $('form#resetpass p.status_pass').text(data.message);
				$('form#resetpass #email').val('')
            }
        });
        e.preventDefault();
    });

});
