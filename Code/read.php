<?php
session_start();
$db = @mysql_connect('localhost','root','');
mysql_select_db('eim',$db);

$replies = mysql_query("SELECT * FROM `replies` WHERE `thread_id` = " . $_GET['id']);
$r = mysql_fetch_array($replies);

$thread = mysql_query("SELECT * FROM `threads` WHERE `id` = " . $_GET['id']);
$t = mysql_fetch_array($thread);
?>
<h3><?=$t['title']?></h3>
<p><?=$t['post']?></p>
<b><?=$t['author']?></b>

<h2>Replies</h2>
<?php foreach($r as $reply):?>
<b><?=$reply['author']?></b>
<p><?=$reply['reply']?></p>
<br><br>
<?php endforeach;?>