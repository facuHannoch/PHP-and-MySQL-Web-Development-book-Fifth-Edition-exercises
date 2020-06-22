<?php

$locale = "en_US";

putenv("LC_ALL=" . $locale); // Use putenv() to set the LC_ALL environment variable for the locale.

setlocale(LC_ALL, $locale); // Use setlocale() to set a value for LC_ALL.

$domain = 'messages';

bindtextdomain($domain, "./locale"); // Use bindtextdomain() to set the location of the translation catalog for the given domain (domain in this case means a name identifying the file that stores your message strings, not a domain like www.mydomain.com).

textdomain($domain);

?>
<!DOCTYPE html>
<html>
<title><?php echo gettext("WELCOME_TEXT"); ?></title> <!-- // Use gettext("some msgid") or _("some msgid") to invoke the GNU gettext translation for that message identifier. -->

<body>
    <h1><?php echo gettext("WELCOME_TEXT"); ?></h1>
    <h2><?php echo gettext("CHOOSE_LANGUAGE"); ?></h2>
    <ul>
        <li><a href="<?php echo $_SERVER['PHP_SELF'] . "?lang=en_US"; ?>">en_US</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF'] . "?lang =ja_JP"; ?>">ja_JP</a></li>
    </ul>
</body>

</html>

<!-- Once you have a handle on the basics of application internationalization and localization, if you are going to develop an application used by speakers of many different languages, it is a good idea looking into a GNU gettext-based localization framework and crowdsourced translation services to handle the creation of your PO files (unless you have a plethora of native language speakers at your disposal or a lot of money to spend on translation services). -->