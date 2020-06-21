<!DOCTYPE html>

<html>

<head>
    <title>Site Submission Results</title>
</head>

<body>
    <h1>Site Submission Results</h1>

    <?php
    /**
     * PHP offers a set of “lookup” functions that can be used to check information about hostnames, IP addresses, and mail exchanges.
     * 
     * 
     * First, you take the URL from the $_POST superglobal and apply the parse_url() function to it. This function returns an associative array of the different parts of an URL. The available pieces of information are the scheme, user, pass, host, port, path, query, and fragment. Typically, you don’t need all these pieces.
     * 
     * For example, given the following URL:
     * http://nobody:secret@example.com:80/script.php?variable=value#anchor.
     * 
     * The values of each part of the array are:
     * 
     * scheme: http
     * user: nobody 
     * pass: secret
     * host: example.com
     * port: 80
     * path: /script.php
     * query: variable=value
     * fragment: anchor
     * 
     */


    // Extract form fields

    $url = $_POST['url'];
    $email = $_POST['email'];



    // Check the URL

    $url = parse_url($url); //First, you take the URL from the $_POST superglobal and apply the parse_url() function to it.
    // This function returns an associative array of the different parts of an URL. The available pieces of information are the scheme, user, pass, host, port, path, query, and fragment.
    $host = $url['host']; // In the directory_submit.php script, you want only the host information, so you pull it out of the array.

    if (!($ip = gethostbyname($host))) { // After you’ve done this, you can get the IP address of that host, if it is in the domain name service (DNS). You can do this by using the gethostbyname() function, which returns the IP if there is one or false if not.
        // You can also go the other way by using the gethostbyaddr() function, which takes an IP as a parameter and returns the hostname. If you call these functions in succession, you might well end up with a different hostname from the one you began with. This can mean that a site is using a virtual hosting service where one physical machine and IP address host more than one domain name.
        echo 'Host for URL does not have valid IP address.';
        exit;
    }

    echo 'Host (' . $host . ') is at IP ' . $ip . '<br/>';



    // Check the email address

    $email = explode('@', $email); // If the URL is valid, you then go on to check the email address. First, you split it into username and hostname with a call to explode().
    $emailhost = $email[1];

    // When you have the host part of the address, you can check to see whether there is a place for that mail to go by using the getmxrr() function
    if (!getmxrr($emailhost, $mxhostsarr)) { // This function returns the set of Mail Exchange (MX) records for an address in the array you supply at $mxhostsarr.
        // An MX record is stored at the DNS and is looked up like a hostname. The machine listed in the MX record isn’t necessarily the machine where the email will eventually end up. Instead, it’s a machine that knows where to route that email. (There can be more than one; hence, this function returns an array rather than a hostname string.) If you don’t have an MX record in the DNS, there’s nowhere for the mail to go.
        echo 'Email address is not at valid host.';
        exit;
    }


    echo 'Email is delivered via: <br/>
<ul>';

    foreach ($mxhostsarr as $mx) {
        echo '<li>' . $mx . '</li>';
    }
    echo '</ul>';

    // If reached here, all ok
    echo '<p>All submitted details are ok.</p>'; // If all these checks are okay, you could put this form data in a database for later review by a staff member.
    echo '<p>Thank you for submitting your site.
      It will be visited by one of our staff members soon.</p>';
    // In real case, add to db of waiting sites...


    /**
      In addition to the functions you just used, you can use the more generic function checkdnsrr(), which takes a hostname and simply returns true if any record of it appears in the DNS. The output of this function would not give you anything to directly display to the user, as with the getmxrr() function used in the script, but would be simple to use for quick checks of validity.
     */
    
    ?>
</body>

</html>