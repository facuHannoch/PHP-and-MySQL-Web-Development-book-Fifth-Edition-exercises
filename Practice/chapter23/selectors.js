// if you use jQuery in conjunction with other JavaScript frameworks that also try to make use of the $ symbol as an alias for their framework, you can still use jQuery by setting it up to run in “no conflict” mode. This is done by calling the jQuery.noConflict() method that returns an instance you can assign to any variable or alias you choose
var $newJQuery = JQuery.noConflict();



// Selectors can be thought of as a type of query language that allows you to identify pieces of your HTML documents that, based on criteria, either perform manipulations on or attach logic to events triggered by them. This quasi-language is extremely powerful, allowing you to quickly reference HTML elements of a web page by various attributes of those elements.

// The # operator indicates the string that follows is the id attribute value of the target HTML element.

var last_name = $('#last_name'); // select a single specific element

var nameElements = $('#first_name #lastName'); // eturn into nameElements an array of two nodes that would be the HTML elements with the id attribute of first_name and last_name, respectively.

var nameElements = $('.name'); // Since both input elements in our example HTML document have been assigned the name class (using the class attribute of their respective HTML element), the proceeding two selector examples in this case are equivalent.

var nameElements = $('input[type=\'text\']'); // This selector introduces a new syntax that allows you to search for HTML elements that have an arbitrary value for an arbitrary attribute.

var documentBody = $('body'); // you can also simply select by name elements based on the element type.



// In addition to the ability to select specific elements based on attributes or element name, jQuery supports a number of pseudo-selectors that allow the developer to select elements in a more programmatic fashion.

var firstInput = $('input:first'); // This code returns the first HTML <input> element found in the document.
var firstInput = $('#myForm input:first'); // limit the search to the first <input> element found within our specific HTML form

// Another useful selector, especially working with HTML tables, can be seen in the selectors that allow you to select every other result of a given overall selector. For example, we know from previous examples that the following selector will return every <tr> tag in a given HTML document:
var tableRows = $('tr');
// By adding the pseudo-selector :even or :odd, we can return every other table row into our selector, based on if by counting it was an “even” or “odd” row:
var oddRows = $('tr:odd');
var evenRows = $('tr:even');

// Selectors can also be used on fundamental JavaScript objects such as the document object available by default in an HTML page (representing the entire document). Simply pass the object into jQuery as you would a selector:
var jQueryDocSelector = $(document);


// while not technically a “selector,” this same approach can be used to create brand new HTML elements in memory which can then be manipulated and added to the existing HTML document—essentially changing the contents on the page without refreshing the page. For example, say you wanted to create a new <p> HTML element. You could do so quickly as follows:
var newParagraph = $('<p>');
var newParagraph = $('<p>This is some <strong>Strong Text</strong><p/>');




setTimeout(() => {
    console.log(nameElements);
}, 200);