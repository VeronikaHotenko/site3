<?php
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);


    $source = getenv('HTTP_REFERER');
    $subject = 'Тема письма';
    $message = "Текст письма :
        <br><br>
        Имя: $name<br>
        Email: $email<br>
        Телефон: $phone<br>
        Источник (ссылка): $source";

    $headers = "From: $email\r\nReply-To: $email\r\nContent-type: text/html; charset=utf-8\r\n";

    $success = mail("admin@yoursite.com", $subject, $message, $headers);
    
    $date = date("d.m.y");
    $time = date("H:i");

    $f = fopen("leads.xls", "a+");
    fwrite($f, " <tr>");
    fwrite($f, "<td>$email</td> <td>$name</td> <td>$phone</td>");
    fwrite($f, "<td>$source</td>");
    fwrite($f, "</tr>");
    fwrite($f, "\n ");
    fclose($f);

?>
