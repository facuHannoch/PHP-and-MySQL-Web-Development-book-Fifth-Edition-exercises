<!DOCTYPE html>
<html>

<head>
    <title>What be ye laddie?</title>
</head>

<body>
    <h1>What be ye laddie?</h1>

    <form action="submit_form.php" method="post">
        <p>
            <input type="radio" name="gender" id="gender_m" value="male" />
            <label for="gender_m">male</label><br />

            <input type="radio" name="gender" id="gender_f" value="female" />
            <label for="gender_f">female</label><br />

            <input type="radio" name="gender" id="gender_o" value="other" />
            <label for="gender_o">other</label><br />
        </p>
        <button type="submit" name="submit">Submit Form</button>
    </form>

</body>

</html>