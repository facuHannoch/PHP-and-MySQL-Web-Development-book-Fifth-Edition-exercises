// jQuery selectors are plural in nature, meaning a selector with a single element is considered a set of one rather than a single element. Thus, you can perform actions on the whole set regardless of if it is one or one hundred individual elements in that set.

var myInput = $('#first_name');

// the val() method allows the developer to get or set the value attribute of an input element
console.log("The value of the input element with id #first_name is: "+myInput.val());
myInput.val('Jonh');
console.log("The value of #first_name has been changed to: "+myInput.val());

// In this example we are only selecting a single HTML element by the ID of that element, which in this case is first_name. However, because the selector always returns a set of elements the same method could have been used. 



var nameFields = $('.name');
nameFields.addClass('form-control');
// This example finds all HTML elements that have the existing class name, and applies a new class to them called form-control.


var nameFields = $('.name');

if(nameFields.length > 0){
    console.log("We found some elements with the 'name' class ");
} else {
    console.log("We found zero some elements with the 'name' class ");
}