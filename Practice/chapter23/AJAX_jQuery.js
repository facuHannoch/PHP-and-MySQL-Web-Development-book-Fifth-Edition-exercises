// Fundamentally, the following AJAX methods are all simplified versions of a single API method—the $.ajax() method.

// prototype of the $.ajax() method
//$.ajax(string url, object settings);

// The first parameter of the method is the URL against which you want to perform the asynchronous request, and the second parameter includes any settings for that request.




// Perform a HTTP GET request

$newJQuery.ajax('/example.php', {
    'method' : 'GET',
    'success' : function(data, tectStatus, jqXHR) {
        console.log(data);
    }
});
// The success property is a function that is called upon success of the request, and is populated with the data retrieved during the request, the textual status of the request, and the jQuery request object itself.




// The next example performs a HTTP POST request that includes some data sent to the server. Upon success, just as was true with our earlier GET request, the function attached to the success property is called. However, in this case, we also have a function attached to the error property. This function is called in the event of an error (such as the server returning a HTTP 500 status), and its results can be used to inform the user interface:


// Perform an HTTP POST request with eror handling

$.ajax('/example.php', {
    'method': 'POST',
    'data': {
        'myBoolean' : true,
        'myString' : 'This is some simple data.'
    },
    'success' : function(data, textStatus, jqXHR) {
        console.log(data);
    }, 'error' : function (jqXHR, textStatus, errorThrown) {
        console.log("An error occured: " + errorThrown);
    }
});




// If you would like to add headers to your HTTP request, such as to add authentication values, you can do so as well by using the headers setting and specifying the key / value pairs of the headers you wish to send, as below:

// Sending headers with a GET request 
$newJQuery.ajax('/example.php', {
    'method' : 'GET',
    'headers' : {
        'X-my-auth' : 'SomeAuthValue'
    },
    success : function(data, textStatus, jqXHR) {
        console.log(data);
    }
});




// Make a request using HTTP Auth
$newJQuery.ajax('/example.php', {
    'method' : 'GET',
    'username' : 'myusername',
    'password' : 'mypassword',
    'success' : function(data, textStatus, jqXHR) {
        console.log(data);
    }
});

// Depending on the complexity of your AJAX requests, and how closely you want to control the request itself, you may be able to use one of the various AJAX helper-methods instead of the complexity of the $.ajax() method and all of its settings.











// jQuery AJAX Helper Methods

// In many cases the flexibility and complexity provided by the $.ajax() method described above are a bit of an overkill for the needs of the developer. For this reason, jQuery provides several AJAX helper methods that encapsulate common use cases. The ease of use of these methods does come at a price, as they sometimes lack useful functionality like error handling that is built in to the $.ajax() method.


// The following is a considerably more straightforward way to perform a HTTP GET request for a resource on the server:


// Simplified GET requests

$.get('/example.php', {
    'queryParams' : 'paramValue'
}, function(data, textStatus, jqXHR) {
    console.log(data);
});
// Using the $.get() method, we simply pass the URL we are requesting, any query parameters (in the form of a generic JavaScript object), and the callback to use when the request returns successfully. If an error occurs while performing the request, the $.get() method silently fails.



// Simplified POST requests

$.post('/example.php', {
    'queryParams' : 'paramValue'
}, function(data, textStatus, jqXHR) {
    console.log(data);
});



// There are two additional methods that can be useful under certain circumstances beyond the simple HTTP GET and HTTP POST. The first is the $.getScript() method, which dynamically loads a JavaScript document from the server and executes it in a single command:

$.getScript('/path/to/my.js', function(){
    // my.js has been loaded and any functions / objects defined can now be used
});


// In a similar fashion, the $.getJSON() method performs an HTTP GET request to the specified URI, parses the return value as a JSON document, and then makes it available to the callback specified:

// Load a JSON document via HTTP GET

$.getJSON('/example.php', {
    'jsonParam' : 'paramValue',
}, function(data, textStatus, jqXHR) {
    console.log(data.status);
});