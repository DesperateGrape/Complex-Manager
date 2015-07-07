<?php //Header 

?>

Welcome user <?php echo $_SESSION['beyond']['user']['user_id'];?>; <?= $_SESSION['beyond']['user']['username'];?><br>
<a href='/beyond/user/index.php?action=register_account'>Register a new Account</a>
<a href='/beyond/user/index.php?action=logout'>Logout</a>

<ul>
<li><a href='/beyond/news/'>News</a></li>
<li><a href='/beyond/explore/'>Explore</a></li>
<li><a href='/beyond/features/'>Features</a></li>
<li><a href='/beyond/research/'>Research</a></li>
<li><a href='/beyond/stronghold/'>Stronghold</a></li>
</ul>

