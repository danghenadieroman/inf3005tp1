<?php
session_start();

$db = mysql_connect('localhost', 'root');
mysql_select_db('db_hd791183', $db);

$id = $_SESSION['currentId'];
$sql = "SELECT * FROM commandes WHERE id = '$id'";
$req = mysql_query($sql) or die('Erreur SQL !<br>' . $sql . '<br>' . mysql_error());
?>
<html>
    <head>
        <title>Facture</title>
    </head>
    <link rel="stylesheet" type="text/css" href="css/principal.css"  />
    <body>
        <p>
            <a href="Autorisation.html"><img src="img/home-icon-white.png" alt="acceuil" height="42" width="42"></a>
        </p>
        <h3>La facture a ete envoyee</h3><br>
            <table border="1" width="100%">
                <tr>
                    <th>login</th><th>password</th><th>telephone</th><th>adresse</th><th>email</th>
                    <th>dimentions</th><th>materiel</th><th>profondeurMarges</th><th>largeurMarges</th><th>topcolor</th>
                    <th>bottomcolor</th><th>rightcolor</th><th>leftcolor</th>
                </tr>
                <?php
                while ($data = mysql_fetch_assoc($req)) {
                    echo '<tr><td>' . $data['login'] . '</td>';
                    echo '<td>' . $data['password'] . '</td>';
                    echo '<td>' . $data['telephone'] . '</td>';
                    echo '<td>' . $data['adresse'] . '</td>';
                    echo '<td>' . $data['email'] . '</td>';
                    echo '<td>' . $data['dimentions'] . '</td>';
                    echo '<td>' . $data['materiel'] . '</td>';
                    echo '<td>' . $data['profondeurMarges'] . '</td>';
                    echo '<td>' . $data['largeurMarges'] . '</td>';
                    echo '<td>' . $data['topcolor'] . '</td>';
                    echo '<td>' . $data['bottomcolor'] . '</td>';
                    echo '<td>' . $data['rightcolor'] . '</td>';
                    echo '<td>' . $data['leftcolor'] . '</td>' . '</tr>';
                }
                ?>
            </table>

        <?php
        mysql_close();
        ?>
    </body>
</html>


