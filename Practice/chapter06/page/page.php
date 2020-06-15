<?php
class Page // The main purpose of this class is to display a page of HTML
{
    public $content; // The main contents of the page, which are a combination of HTML tags and text, are called $content.
    public $title = "TLA Consulting Pty Ltd";
    public $keywords = "TLA Consulting, Three Letter Abbreviation, 
    some of my best friends are search engines";
    public $buttons = array(
        "Home" => "home.php",
        "Contact" => "contact.php",
        "Services" => "services.php",
        "Site Map" => "map.php"
    );
    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    // Because it is unlikely that you will be requesting any of these values from outside the class, you can elect not to provide a __get() function, as done here.

    public function Display() // Breaking up functions like this is not compulsory. All these separate functions might simply have been combined into one big function. But each function should have a defined task to perform. The simpler this task is, the easier writing and testing the function will be. Don’t go too far; if you break up your program into too many small units, it might be hard to read.
    {
        echo "<html>\n<head>\n";
        $this->DisplayTitle();
        $this->DisplayKeywords();
        $this->DisplayStyles();
        echo "</head>\n<body>\n";
        $this->DisplayHeader();
        $this->DisplayMenu($this->buttons);
        echo $this->content;
        $this->DisplayFooter();
        echo "</body>\n</html>\n";
    }
    // Using inheritance, you can override operations. You can replace one large Display() function, but it is unlikely that you will want to change the way the entire page is displayed. It will be much better to break up the display functionality into a few self-contained tasks and be able to override only the parts that you want to change.

    function DisplayTitle()
    {
        echo '<title>' . $this->title . '</title>';
    }
    function DisplayKeywords()
    {
        echo "<meta name='keywords' content='" . $this->keywords . "'/>";
    }
    function DisplayStyles()
    {
?>
        <link href="styles.css" type="text/css" rel="stylesheet">
    <?php
    }
    function DisplayHeader()
    {
    ?>
        <!-- page header -->
        <header>
            <img src="logo.gif" alt="TLA logo" height="70" width="70" />
            <h1>TLA Consulting</h1>
        </header>
        <?php
    }
    function DisplayMenu()
    {
        echo "<!-- menu -->
        <nav>";
        // while (list($name, $url) = each($buttons)) {
        foreach ($this->buttons as $name => $url) {
            $this->DisplayButton(
                $name,
                $url,
                !$this->IsURLCurrentPage($url)
            );
        }
        echo "</nav>\n";
    }

    public function IsURLCurrentPage($url)
    {
        if (strpos($_SERVER['PHP_SELF'], $url) === false) {
            return false;
        } else {
            return true;
        }
    }


    public function DisplayButton($name, $url, $active = true)
    {
        if ($active) { ?>
            <div class="menuitem">
                <a href="<?= $url ?>">
                    <img src="s-logo.gif" alt="" height="20" width="20" />
                    <span class="menutext"><?= $name ?></span>
                </a>
            </div>
        <?php
        } else { ?>
            <div class="menuitem">
                <img src="side-logo.gif">
                <span class="menutext"><?= $name ?></span>
            </div>
        <?php
        }
    }

    function DisplayFooter()
    {
        ?>
        <!-- page footer -->
        <footer>
            <p>&copy; TLA Consulting Pty Ltd.<br />
                Please see our
                <a href="legal.php">legal information page</a>.</p>
        </footer>
<?php
    }
}
