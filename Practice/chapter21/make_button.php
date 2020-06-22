<?php

// Check we have the appropriate variable data
// (the variables are button-text and button-color)

$button_text = $_POST['button_text'];
$button_color = $_POST['button_color']; // The user’s chosen color is stored in the $button-color variable from the form.

if (empty($button_text) || empty($button_color)) { // Before moving on to create that identifier, the script checks to see that there is a value for both button-text and button-color, and if there is not, the script ends and produces a message on the screen.
    echo '<p>Could not create image: form not filled out correctly.</p>';
    exit;
}

// Create an image using the right color of button, and check the size
$im = imagecreatefrompng($button_color . '-button.png'); // The function imagecreatefrompng() takes the filename of a PNG as a parameter and returns a new image identifier for an image containing a copy of that PNG. Note that this does not modify the base PNG in any way. You can use the imagecreatefromjpeg() and imagecreatefromgif() functions in the same way if the appropriate support is installed.

// Print the text send by the user extracted from the POST superglobal that text on the button in the largest font size that will fit. You do this by iteration, or strictly speaking, by iterative trial and error.
$width_image = imagesx($im);
$height_image = imagesy($im);

// Our images need an 18 pixel margin in from the edge of the image
// The second two represent a margin in from the edge of the button. The button images are beveled, so you need to leave room for that around the edges of the text. If you are using different images, this number will be different. In this case, the margin on each side is around 18 pixels:
$width_image_wo_margins = $width_image - (2 * 18);
$height_image_wo_margins = $height_image - (2 * 18);



// Tell GD2 where the font you want to use resides
// With GD2, you need to tell it where your fonts live by setting the environment variable GDFONTPATH

// For Windows, use:
putenv('GDFONTPATH=C:\WINDOWS\Fonts');

// For UNIX, use the full path to the font folder.
// In this example we're using the DejaVu font family:
// putenv('GDFONTPATH=/usr/share/fonts/truetype/dejavu');

$font_name = 'C:\WINDOWS\Fonts\Arial.ttf'; // You also set up the name of the font you want to use. You’re going to use this font with the TrueType functions, which will look for the font file in the preceding location and will append the filename with .ttf (TrueType font):
// At least in Windows, is it necessary to append the .ttf extension at the end of the name of the file



// Work out if the font size will fit and make it smaller until it does
// Start out with the biggest size that will reasonably fit on our buttons

$font_size = 33; // set the font size

do { // Now you use a do...while loop to decrement the font size at each iteration until the submitted text will fit on the button reasonably
    // This code tests the size of the text by looking at what is called the bounding box of the text. You do this by using the imagegetttfbbox() function, which is one of the TrueType font functions. You will, after you have figured out the size, print on the button using a TrueType font and the imagettftext() function.

    $font_size--;
    // Find out the size of the text at that font size
    $bbox = imagettfbbox($font_size, 0, $font_name, $button_text); // This call says, “For given font size $font_size, with text slanted on an angle of zero degrees, using the TrueType font DejaVu, tell me the dimensions of the text in $button_text.”

    $right_text = $bbox[2]; // right co-ordinate
    $left_text = $bbox[0];  // left co-ordinate
    $width_text = $right_text - $left_text;   // how wide is it?
    $height_text = abs($bbox[7] - $bbox[1]);  // how tall is it?

} while (
    $font_size > 8 &&
    ($height_text > $height_image_wo_margins || $width_text > $width_image_wo_margins)
); // You test two sets of conditions here. The first is that the font is still readable; there’s no point in making it much smaller than 8-point type because the button becomes too difficult to read. The second set of conditions tests whether the text will fit inside the drawing space you have available for it.

if (
    $height_text > $height_image_wo_margins ||
    $width_text > $width_image_wo_margins
) { // you check to see whether the iterative calculations found an acceptable font size and report an error if not

    // no readable font size will fit on button
    echo '<p>Text given will not fit on button.</p>';
} else { // If all was okay, you next work out a base position for the start of the text. This is the midpoint of the available space.

    // We have found a font size that will fit.
    // Now work out where to put it.

    $text_x = $width_image / 2.0 - $width_text / 2.0;
    $text_y = $height_image / 2.0 - $height_text / 2.0;

    if ($left_text < 0) {
        $text_x += abs($left_text);     // add factor for left overhang
    }

    $above_line_text = abs($bbox[7]); // how far above the baseline?
    $text_y += $above_line_text;      // add baseline factor
    $text_y -= 2;  // adjustment factor for shape of our template

    // These correction factors allow for the baseline and a little adjustment because the image is a bit “top heavy.”


    $white = imagecolorallocate($im, 255, 255, 255); // You set up the text color, which will be white

    imagettftext($im, $font_size, 0, $text_x, $text_y, $white, $font_name, $button_text); // You can then use the imagettftext() function to actually draw the text onto the button
    // In order, the parameters are the image identifier, the font size in points, the angle you want to draw the text at, the starting x and y coordinates of the text, the text color, the font name, and, finally, the actual text to go on the button.

    // ouput the button to the browser
    header('Content-type: image/png');
    imagepng($im);
}

// Clean up the resources
imagedestroy($im); // Then it’s time to clean up resources and end the script

// Note: The font file needs to be available on the server and is not required on the client’s machine because the client will see it as an image.