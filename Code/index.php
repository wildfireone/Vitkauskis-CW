<?php
session_start();
$db = @mysql_connect('localhost','root','');
@mysql_select_db('eim',$db);

$threads = mysql_query("SELECT * FROM `threads`");
?>
<?php if(!isset($_SESSION['user_id'])):?>
<a href="register.php">Register</a>
<a href="login.php">Login</a>
<?php else:?>
    <p>HI,<?=$_SESSION['user_id']?></p>
    <a href="postThread.php">Post a thread</a>
    <br>
    <a href="logout.php">logout</a>
<?php endif;?>

<table>
    <tr>
        <th>ID</th>
        <th>Thread</th>
        <th>Author</th>
    </tr>
    <?php while($thread = mysql_fetch_array($threads)):?>
    <tr>
        <td><?=$thread['id']?></td>
        <td><a href="thread.php?id=<?=$thread['id']?>"><?=$thread['title']?></a></td>
        <td><?=$thread['author']?></td>
    </tr>
    <?php endwhile;?>
</table>