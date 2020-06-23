<?php
function filled_out($form_vars) {

  // test that each variable has a value
  foreach ($form_vars as $key => $value) {
     if ((!isset($key)) || ($value == '')) {
        return false;
     }
  }
  return true;
}

function valid_email($address) {
  // check an email address is possibly valid
  if (preg_match('/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $address)) {
    return true;
  } else {
    return false;
  }
}

// These functions serve as an extra protection for validating form input on the server side, and go beyond any client-side validation handled by the browser. If you are collecting important information in a web form, you should always validate both on the client side and the server side.
?>
