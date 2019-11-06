
<?php
require_once(__DIR__.'/query_runner.php');

    session_start();

    $queryRunner = new QueryRunner();
    $_SESSION["form_completers"] = $queryRunner->get_form();

?>

<html>
    <head> 
        <title>Contact form</title>
        <style>
            h1 {
                text-align: center;
                color: firebrick;
            }
            body {
                padding: 50px;
            }
            table {
                margin-left:auto;
                margin-right:auto;
                text-align:center;
                border-collapse: collapse;
            }
            thead {
                font-weight: bold;
                background-color: aqua;
            }
            td {
                padding: 5px;
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <h1>Contact form </h1>
        <table>
            <thead>
                <td>ID</td>
                <td>Name</td>
                <td>Surname</td>
                <td>Email</td>
                <td>Phone number</td>
                <td>Message</td>
            </thead>
            <tbody>
                <?php foreach($_SESSION["form_completers"] as $form_c) : ?>
                    <tr>
                        <td><?=$form_c["id"]?></td>
                        <td><?=$form_c["name"]?></td>
                        <td><?=$form_c["surname"]?></td>
                        <td><?      =$form_c["email"]?></td>
                        <td><?=$form_c["phone_number"]?></td>
                        <td><?=$form_c["message"]?></td>
                       
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </body>

</html>
<?php

session_unset();
session_destroy();
?>
