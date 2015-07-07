<style> .warning { color:red;}</style>
<div class='warning'> <?=display_warnings()?></div>
<form action='index.php' method='post'>
<input type='hidden' name='action' value='<?= $action;?>'>
<input type='hidden' name='feature_request_id' value='<?=exst($frm['feature_request_id']) ?>'>

Name: <input type='text' name='name' value='<?=exst($frm['name']) ?>'></br>
Description: <input type='text' name='description' value='<?=exst($frm['description']) ?>'></br>


Estimated Time: <input type='text' name='hours' maxlength='45' value='<?=exst($frm['hours']) ?>'></br>
Rank: <input type='text' name='rank' maxlength='45' value='<?=exst($frm['rank']) ?>'></br>

<!-- This should only be viewable by the developer -->
Points: <input type='text' name='points' maxlength='45' value='<?=exst($frm['points']) ?>'></br>
Status: <input type='text' name='status' maxlength='45' value='<?=exst($frm['status']) ?>'></br>

<input type='submit' name='submit' value='Submit'>
</form>
