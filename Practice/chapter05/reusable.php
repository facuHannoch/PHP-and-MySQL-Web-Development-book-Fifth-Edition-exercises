<?php
echo 'Here is a very simple PHP statement. <br/>';
function hello()
{
?>
    <div>
        <p>Helloooo</p>
    </div>
<?php
}
function create_table1($data)
{
?>
    <table>
        <?php
        foreach ($data as $value) {
        ?>
            <tr>
                <td><?php echo $value ?></td>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
}

function create_table2($data)
{
    echo '<table>';
    reset($data);
    $value = current($data);
    while ($value) {
        echo "<tr><td>$value</td></tr>\n";
        $value = next($data);
    }
    echo '</table>';
}


function create_table($data, $header = NULL, $caption = NULL)
{
    echo '<table>';
    if ($caption) {
        echo "<caption>$caption</caption>";
    }
    if ($header) {
        echo "<tr><th>$header</th></tr>";
    }
    reset($data);
    $value = current($data);
    while ($value) {
        echo "<tr><td>$value</td></tr>\n";
        $value = next($data);
    }
    echo '</table>';
}

// function increment($value, $amount = 1)
// {
//     $value = $value + $amount;
// }

function increment(&$value, $amount = 1) // the $value variable is passed by reference, so the value assinged to it ($value), will also change the value of the variable which was passed as the first parameter.
{
    $value = $value + $amount;
}

?>