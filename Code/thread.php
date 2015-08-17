<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);

$replies = mysql_query("SELECT * FROM `replies` WHERE `thread_id` = " . $_GET['id']);

$thread = mysql_query("SELECT * FROM `threads` WHERE `id` = " . $_GET['id']);
$t = mysql_fetch_array($thread);
?>
<?php
if ( @$_SESSION['role'] == 'admin' || @$_SESSION['user_id'] == $t['author']) {
    ?>
    <a href="editThread.php?thread_id=<?=$_GET['id']?>">Edit this thread</a>
    <a href="deleteThread.php?thread_id=<?=$_GET['id']?>">Delete this thread</a>
<?php
}
?>
<h3><?=$t['title']?></h3>
<p><?=$t['post']?></p>
<b><?=$t['author']?></b>

<h2>Replies</h2>
<?php while($reply = mysql_fetch_array($replies)):?>
<b><?=$reply['author']?></b>
    <?php if( @$_SESSION['user_id'] == $reply['author'] OR @$_SESSION['role'] == 'admin' ):?>
    <br>
    <a href="editReply.php?id=<?=$reply['id']?>">edit</a>
        <br>
        <a href="deleteReply.php?id=<?=$reply['id']?>">delete</a>
        <?php endif;?>
<p><?=$reply['reply']?></p>
<br><br>
<?php endwhile;?>
<?php
if ( isset($_SESSION['user_id']) ){
?>
<a href="reply.php?thread_id=<?=$_GET['id']?>">Reply to this thread</a>
<?php }?>
<a href="index.php">Main page</a>