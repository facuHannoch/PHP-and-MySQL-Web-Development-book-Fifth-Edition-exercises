<?php

/**
 * The four basic steps to creating an image in PHP are as follows:
 * 
 * 1. Creating a canvas image on which to work
 * 
 * 2. Drawing shapes or printing text on that canvas
 * 
 * 3. Outputting the final graphic
 * 
 * 4. Cleaning up resources
 * 
 * 
 * 
 * 
 * An alternative way is to read in an existing image file that you can then filter, resize, or add to. You can do this with one of the functions imagecreatefrompng(), imagecreatefromjpeg(), or imagecreatefromgif(), depending on the file format you are reading in. Each of these functions takes the filename as a parameter, as in this example:
 * $im = imagecreatefrompng('baseimage.png');
 */

// set up image canvas 

$height = 200;
$width = 200;

// To begin building or changing an image in PHP, you need to create an image identifier. There are two basic ways to do this. One is to create a blank canvas, which you can do with a call to the imagecreatetruecolor() function:
$im = imagecreatetruecolor($width, $height); // You need to pass two parameters to imagecreatetruecolor(). The first is the width of the new image, and the second is the height of the new image. The function will return an identifier for the new image. These identifiers work a lot like file handles.





// Drawing or printing text on the image really involves two stages. First, you must select the colors in which you want to draw. As you probably already know, colors to be displayed on a computer monitor are made up of different amounts of red, green, and blue light. Image formats use a color palette that consists of a specified subset of all the possible combinations of the three colors. To use a color to draw in an image, you need to add this color to the image’s palette. You must do this for every color you want to use, even black and white.


$white = imagecolorallocate($im, 255, 255, 255); // You can select colors for your image by calling the imagecolorallocate() function. You need to pass your image identifier and the red, green, and blue (RGB) values of the color you want to draw into the function.
// The function returns a color identifier that you can use to access the color later.

$blue = imagecolorallocate($im, 0, 0, 255);







// Second, to actually draw into the image, you can use a number of different functions, depending on what you want to draw—lines, arcs, polygons, or text.
/**
 * The drawing functions generally require the following as parameters:
 * 
 * The image identifier
 * 
 * The start and sometimes the end coordinates of what you want to draw
 * 
 * The color you want to draw in
 * 
 * For text, the font information
 */


// draw on image

imagefill($im, 0, 0, $blue); // First, you paint a blue background on which to draw using the imagefill() function. This function takes the image identifier, the start coordinates of the area to paint (x and y), and the color to fill in as parameters.

imageline($im, 0, 0, $width, $height, $white); // Next, you draw a line from the top-left corner (0, 0) to the bottom-right corner ($width, $height) of the image. This function takes the image identifier, the start point x and y for the line, the end point, and then the color as parameters.

imagestring($im, 4, 50, 150, 'Sales', $white); // Finally, you add a label to the graph
// int imagestring (resource img, int font int x, int y, string s, int color)
// It takes as parameters the image identifier, the font, the x and y coordinates to start writing the text, the text to write, and the color.


// output image
// You can output an image either directly to the browser or to a file.

// In this example, you output the image to the browser. This is a two-stage process.

header('Content-type: image/png'); // First, you need to tell the web browser that you are outputting an image rather than text or HTML. You do this by using the header() function to specify the MIME type of the image.
// An important point to note when using the header() function is that it cannot be executed if content has already been sent for the page, as PHP sends an HTTP header automatically as soon as anything is output to the browser. Hence, if you have any echo statements, or even any whitespace before your opening PHP tag, HTTP headers will be sent and you will get a warning message from PHP when you try to call header(). However, you can send multiple HTTP headers with multiple calls to the header() function in the same script, although they must all still appear before any output is sent to the browser.

imagepng($im); //  you output the image data with this function
imagepng($im, "./graph.png"); // You can also write the image to a file instead of to the browser. You can do this by adding the optional second parameter to imagepng(). All the usual rules about writing to a file from PHP apply


// clean up

imagedestroy($im); // When you’re done with an image, you should return the resources you have been using to the server by destroying the image identifier with the function imagedestroy().

/**
 * The coordinates of the image start from the top-left corner, which is x=0, y=0. The bottom-right corner of the image is x=$width, y=$height. This is normal for computer graphics, but the opposite of typical math graphing conventions, so beware!
 * 
 * The font is a number between 1 and 5. These numbers represent a set of built-in fonts in latin2 encoding, with higher numbers corresponding to larger fonts. As an alternative to these fonts, you can use TrueType fonts or PostScript Type 1 fonts. Each of these font sets has a corresponding function set. We use the TrueType functions in the next example.
 * 
 * A good reason for using one of the alternative font function sets is that the text written by imagestring() and associated functions, such as imagechar() (write a character to the image) is aliased. The TrueType and PostScript functions produce antialiased text.
 * 
 */
?>