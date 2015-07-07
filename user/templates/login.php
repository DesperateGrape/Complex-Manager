<style> .warning { color:red;}</style>
<div class='warning'> <?=display_warnings()?></div>
<form action='index.php' method='post'>
<input type='hidden' name='action' value='<?php echo $action;?>'>
<input type='text' name='user_name' maxlength='45'>
<input type='password' name='password' maxlength='45'>
<input type='submit' name='submit' value='Submit'>
</form>