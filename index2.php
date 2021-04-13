<html>
    <head>
        <title>Контактна інформація</title>
    </head>
    <body>
        <?php
            function print_form ($f_name, $l_name, $email, $zip, $object)
            {
            echo "<form  action=\"index2.php\" method=\"post\">
                <table cellspasing=\"2\" cellpedding=\"2\" border=\"1\">
                    <tr>
                        <td>Ім'я</td>
                        <td><input name=\"f_name\" type=\"text\" value=\"$f_name\"></td>
                    </tr>
                    <tr>
                        <td>Прізвище<b>*</b></td>
                        <td><input name=\"l_name\" type=\"text\" value=\"$l_name\"></td>
                    </tr>
                    <tr>
                        <td>Email адреса<b>*</b></td>
                        <td><input name=\"email\" type=\"text\" value=\"$email\">
                    </tr>
                    <tr>
                        <td>Поштовий індекс<b>*</b></td>
                        <td><input name=\"zip\" type=\"text\" value=\"$zip\">
                    </tr>
                    <tr>
                        <td>Улюблений предмет</td>
                        <td><input name=\"object\" type=\"text\" value=\"$object\"></td>
                    </tr>
                </table>
                <input name=\"submit\" type=\"submit\" value=\"Надіслати\">
                <input type=\"reset\" value=\"Відмінити\"></form>";
            }
            function check_form ($f_name, $l_name, $email, $zip, $object)
            {
                if (!$l_name||!$email||!$zip):echo "<h3>Помилка у заповненні фор-ми!</h3>";
                if (!$l_name)
                {
                    echo "<h3>Ви не заповнили поле <b>Прізвище</b></h3>";
                }
                if (!$email)
                {
                    echo "<h3>Ви не заповнили поле <b>Email адреса</b></h3>";
                }if (!$zip)
                {
                    echo "<h3>Ви не заповнили поле <b>Поштовий ін-декс</b></h3>";
                }
                print_form ($f_name, $l_name, $email, $zip, $object); 
                else:confirm_form ($f_name, $l_name, $email, $zip, $object); 
                endif;
            }
            function confirm_form ($f_name, $l_name, $email, $zip, $object)
            {
                echo "<h2>Дякуємо! Слідуюча інформація була успішно надіслана</h2>";
                echo "<b>Контактна інформація</b>";
                echo "<br>$f_name $l_name<br>$email<br>Поштовий ін-декс:$zip<br>Улюблений предмет:$object\n";
            }
            
            if($_SERVER["REQUEST_METHOD"] != "POST"):
                echo "<h3>Будь ласка, введіть інформацію про себе</h3>";
                echo "Поля з <b>*</b> обовʼязкові для заповнення.";
                print_form("", "", "", "", "");
            else:
                $f_name = $_POST["f_name"];
                $l_name = $_POST["l_name"];
                $email  = $_POST["email"];
                $zip    = $_POST["zip"];
                $object = $_POST["object"];
                check_form($f_name, $l_name, $email, $zip, $object);
            endif;
            ?>
    </body>
</html>