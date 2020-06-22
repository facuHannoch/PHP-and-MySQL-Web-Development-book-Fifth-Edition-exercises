// Since JavaScript itself is an asynchronous programming language (meaning the logic of the program does not necessarily execute in the same order every time), events are critical to ensuring the meaning of your application is not lost when the order changes.

// Typically in jQuery, a selector is first used to identify the relevant HTML elements in question and then the on() method is used to listen for and consequently perform logic when that event is triggered. One of the simplest versions of this is listening for the ready event, triggered by jQuery upon full loading of the HTML document and its resources:

$(document).on('ready', function(event) {
    // Code to execute when the document is ready
});
// Like most jQuery methods, the on() method can be used on any given selector.
$('a').on('click', function(event){
    // Do something evcery time an <a> HTML element is clicked
});
// The on() method is a universal way to bind an event listener to a given event, but for both convenience and historic reasons, jQuery also provides a number of alias methods mapping directly to the event name. For example, $(document).on('ready', ...) and $(document).ready(...) are identical in function.



// Depending on the nature of your original selector, you may find yourself wanting to create a single event for a set of many HTML elements, but when fired act only on the specific element that triggered the event. You will note in the last two examples the closure provided to handle the event accepted a single parameter event. This event parameter is the event object created when the event fired, and contains within its target property the specific element that fired this specific event. Thus, if you wanted to act on a specific button when clicked you could do as follows:

$('button').on('click', function(event) {
    var button = $(event.target);

    // Do something with the especific button that was clicked
});

$('a').on('click', function(event) {
    var link = $(event.target).attr(href);
    
    console.log("The link clicked had a URL of: " + link);
});
// Logically speaking, you could use this snippet of code to listen for a click event, extract the href attribute from the source of that click event using the attr() method, and then display the value of that attribute in the browser’s console. You would be right, however, if you think the code would not function as expected because there is a default behavior associated with clicking on this element (changing the browser’s location to the specified URL). This result is because although you correctly listened for the event, the event continued to bubble up through the HTML document, and the default behavior of the event in the browser was eventually triggered. To prevent this outcome, you must prevent the event from continuing to bubble up through the document by using the preventDefault() method available in every event object.


    


$('a').on('click', function(event) {
    event.preventDefault();
    var link = $(event.target).attr(href);
    console.log("The link clicked had a URL of: " + link);
});