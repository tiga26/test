$('document').ready(function(){

    var table = $('#chat-table');
    var raw = table.find('.table-row').first();
 
    var getData = function(){
        $.ajax({
            url: '/all',
            method:	'GET',
        }).done(function(response) {

            if(response.messages.length){
                $.each(response.messages, function (i, message) {

                    var new_raw = raw.clone(false);

                    new_raw.find('.text').text(message.text);
                    new_raw.find('.date').text(message.date);

                    new_raw.removeClass('hidden');
                    table.find('tbody').append(new_raw);
                    table.find('.empty-row').addClass('hidden');
                })
            } else {
                table.find('tbody tr').not('.empty-row').addClass('hidden');
                table.find('.empty-row').removeClass('hidden');
            }
        });
    };

    var showErrors = function (text) {
        swal({
            title:'Message',
            customClass: 'm-frame-container',
            text: text,
            confirmButtonText: "Close"
        });
    }

    if(window.location.pathname.indexOf('/') !==-1) {
        getData();
    }

    $('#send-message').on('click', function(e){
        e.preventDefault();

        var text = $( '#text').val(),
            data = {text:text};

        $.ajax({
            url: '/',
            method:	'POST',
            data:data
        }).done(function(message) {

            if(message.status === -1){
                showErrors(message.text);
                return false;
            }

            table.find('tbody').empty();
            $( '#text').val('');
            getData();

        }).fail(function (response) {
            if(response.status === 422){
                var response_text = JSON.parse(response.responseText);
                var swal_text = response_text.text.join(',');
                showErrors(swal_text);
            }
        });
    });

});