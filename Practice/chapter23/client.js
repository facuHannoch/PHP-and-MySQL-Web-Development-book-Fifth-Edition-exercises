var pollServer = function () {
    // Fundamentally the pollServer() function does two things: it performs an asynchronous HTTP GET request to the backend PHP script to request new messages, and then it calls the setTimeout() function to schedule the pollServer() function to be called again in 5 seconds. Throughout the execution of the pollServer() function, the HTTP GET request is triggered and completed, and the closure passed into the jQuery $.get() method is executed. This closure will examine the result, loop through each message, and add it to our web interface using the proper CSS classes.
    $.get('chat.php', function (result) {
        if (!result.success) {
            console.log("Error polling server for new messages!");
            return;
        }
        $.each(result.messages, function (idx) {
            var chatBubble;
            if (this.sent_by == 'self') {
                chatBubble = $('<div class="row bubble-sent pull-right">' +
                    this.message +
                    '</div><div class="clearfix"></div>');
            } else {
                chatBubble = $('<div class="row bubble-recv">' +
                    this.message +
                    '</div><div class="clearfix"></div>');
            }
            $('#chatPanel').append(chatBubble);
        });
        setTimeout(pollServer, 5000);
    });
}


// The pollServer() function only needs to be called once to begin the cycle of polling for new chat messages, and this is best done once the HTML document is fully loaded. Thus, we attach a handler to the jQuery ready event to trigger the start of the polling process. Just to add a bit of flair to the user interface, we have also added a handler to the click event of all buttons on the page, which toggles the active class on and off when clicked.
$(document).on('ready', function () {
    pollServer();
    $('button').click(function () {
        $(this).toggleClass('active');
    });
});



$('#sendMessageBtn').on('click', function (event) {
    // Finally, we see the code responsible for sending a message to our backend PHP script. This code is part of the click handler for the send button on our HTML interface, which sends the message to the backend PHP script via HTTP POST for distribution to other polling clients.
    event.preventDefault();
    var message = $('#chatMessage').val();
    $.post('chat.php', {
        'message': message
    }, function (result) {
        $('#sendMessageBtn').toggleClass('active');
        if (!result.success) {
            alert("There was an error sending your message");
        } else {
            console.log("Message sent!");
            $('#chatMessage').val('');
        }
    });

});