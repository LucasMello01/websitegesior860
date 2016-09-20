<?PHP
function box($a, $b, $_POST=array()) {
$s='
<div class="TableContainer">
        <table class="Table5" cellpadding="0" cellspacing="0">
                <tr>
                        <div class="CaptionContainer">
                                <div class="CaptionInnerContainer">
                                        <span class="CaptionEdgeLeftTop" style="background-image:url(img/content/box-frame-edge.gif);"></span>
                                        <span class="CaptionEdgeRightTop" style="background-image:url(img/content/box-frame-edge.gif);"></span>
                                        <span class="CaptionBorderTop" style="background-image:url(img/content/table-headline-border.gif);">
                                        </span><span class="CaptionVerticalLeft" style="background-image:url(img/content/box-frame-vertical.gif);"></span>
                                        <div class="Text">'.$a.'</div>
                                                <span class="CaptionVerticalRight" style="background-image:url(img/content/box-frame-vertical.gif);"></span>
                                                <span class="CaptionBorderBottom" style="background-image:url(img/content/table-headline-border.gif);"></span>
                                                <span class="CaptionEdgeLeftBottom" style="background-image:url(img/content/box-frame-edge.gif);"></span>
                                                <span class="CaptionEdgeRightBottom" style="background-image:url(img/content/box-frame-edge.gif);"></span>
                                </div>
                        </div>
                </tr>
                <tr>
                        <td>
                                <div class="InnerTableContainer">
                                        <table style="width:100%;">
                                                <tr style="height:22px;">
                                                        <td align="left" valign="top">'.$b.'</td>
                                                </tr>
                                        </table>
                                </div>
                        </td>
                </tr>
        </table>
</div><br/>
<center>
        <table border="0" cellpadding="0" cellspacing="0">';
if($_POST == 1)
$s.='           <form action="?subtopic=accountmanagement" method="post">
                        <tr>
                                <td>
                                        <input type="image" name="Login" alt="Login" src="layouts\tibiacom\images\buttons/_sbutton_login.gif"/>';
else {
$s.='           <form action="?subtopic=lostaccount" method="post">
                <tr>
                        <td>';
        $s.=(isset($_POST['step']) && in_array($_POST['step'], array('problem','password','name','sendconfirmation')) ? '
<input type="hidden" name="step" value="'.$_POST['step'].'"/>' : '');
        foreach(array('character', 'accountname', 'password','recovery','newpass') as $k) {
                $s.=(isset($_POST[$k]) ? '
<input type="hidden" name="'.$k.'" value="'.htmlspecialchars($_POST[$k]).'"/>' : '');
        }
        $s.='                                   <input type="image" name="Back" alt="Back" src="layouts\tibiacom\images\buttons/_sbutton_back.gif"/>';
}
$s.='                           </td>
                        </tr>
                </form>
        </table>
</center>';
return $s;
}

$step=$_POST['step'];
if($step == 'problem'){
        $name=stripslashes(trim(urldecode($_POST['character'])));
        if(empty($name) || strlen($name) < 3 || strlen($name) > 25 || strspn("$name", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM ") != strlen($name)) {
                $main_content .= box('Error', 'Please enter the name of a character on the lost account. If your account does not contain any characters, please create a new account.');
                return;
        }

        $p=$SQL->query('SELECT id FROM players WHERE name=\''.$name.'\' LIMIT 1')->fetch();
        if(!$p || !$p['id']) {
                $main_content .= box('Error', 'Character <b>'.$name.'</b> does not exist. Please make sure to enter the character name correctly. Note that characters are deleted automatically if they have not been used for a long time.');
                return;
        }

$main_content .= 'The Lost Account Interface can help you to solve all problems listed below. Please select your problem and click on "Submit".<br/><br/>

<form action="?subtopic=lostaccount" method="post">
<input type="hidden" name="character" value="'.$name.'"/>
<table cellspacing="1" cellpadding="4" border="0" width="100%">
<tr><td bgcolor="'.$config['site']['vdarkborder'].'" class="white"><b>Specify Your Problem</b></td></tr>
<tr><td bgcolor="'.$config['site']['lightborder'].'">
<input type=radio name="step" value="password"/> I have forgotten my password.<br/>
<input type=radio name="step" value="name"/> I have forgotten my account name.<br/>
</td></tr>
</table>
<br/>
<center><input type="image" name="Submit" alt="Submit" src="layouts\tibiacom\images\buttons/_sbutton_submit.gif"/>
</form></center>';
}
elseif($step == 'password') {
        $name=stripslashes(trim(urldecode($_POST['character'])));
        if(empty($name) || strlen($name) < 3 || strlen($name) > 25 || strspn("$name", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM ") != strlen($name)) {
                $main_content .= box('Error', 'Please enter the name of a character on the lost account. If your account does not contain any characters, please create a new account.');
                return;
        }

        $p=$SQL->query('SELECT id FROM players WHERE name=\''.$name.'\' LIMIT 1')->fetch();
        if(!$p || !$p['id']) {
                $main_content .= box('Error', 'Character <b>'.htmlspecialchars($name).'</b> does not exist. Please make sure to enter the character name correctly. Note that characters are deleted automatically if they have not been used for a long time.');
                return;
        }

$main_content.='<form action="?subtopic=lostaccount" method="post">
<input type="hidden" name="character" value="'.htmlspecialchars($name).'"/>
<input type="hidden" name="step" value="sendconfirmation"/>
<table cellspacing="1" cellpadding="3" border="0" width="100%">
<tr><td bgcolor="'.$config['site']['vdarkborder'].'" class="white"><b>Request New Password</b></td></tr>
<tr><td bgcolor="'.$config['site']['lightborder'].'">
<table style="border: 1px solid '.$config['site']['darkborder'].'" cellpadding="4" cellspacing="2" width="100%">
        <tr bgcolor="'.$config['site']['darkborder'].'">
                <td width="23%">Account Name:</td>
                <td><input type="password" name="accountname" value="'.htmlspecialchars($_POST['accountname']).'"/></td>
        </tr>

        <tr bgcolor="'.$config['site']['lightborder'].'">
                <td width="23%">Recovery key:</td>
                <td><input name="recovery" value="'.htmlspecialchars($_POST['recovery']).'" maxlength="10"/></td>
        </tr>
        <tr bgcolor="'.$config['site']['darkborder'].'">
                <td width="23%">New Password:</td>
                <td><input type="password" name="newpass" value="'.htmlspecialchars($_POST['newpass']).'"/></td>
        </tr>
        
        </table><br/>
        <table align="center"><tr><td><input type="image" name="Submit" alt="Submit" src="layouts\tibiacom\images\buttons/_sbutton_submit.gif"/></td></tr></table>
</td></tr>
</table></form>
';
}
elseif($step == 'sendconfirmation') {
        $name=stripslashes(trim(urldecode($_POST['character'])));
        if(empty($name) || strlen($name) < 3 || strlen($name) > 25 || strspn("$name", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM ") != strlen($name)) {
                $main_content .= box('Error', 'Please enter the name of a character on the lost account. If your account does not contain any characters, please create a new account.');
                return;
        }

        if(!isset($_POST['accountname']) && !isset($_POST['password'])) {
                header('Location: ?subtopic=lostaccount');
                exit();
        }

        $p=$SQL->query('SELECT players.id,accounts.name,accounts.id as `acc`'.(isset($_POST['password']) ? ',accounts.password,`accounts`.`key`' : '').' FROM players,accounts WHERE players.name=\''.$name.'\' AND players.account_id = accounts.id LIMIT 1')->fetch();
        if(!$p || !$p['id']) {
                $main_content .= box('Error', 'Character <b>'.htmlspecialchars($name).'</b> does not exist. Please make sure to enter the character name correctly. Note that characters are deleted automatically if they have not been used for a long time.');
                return;
        }

        if(isset($_POST['accountname'])) {
                $k=strtoupper($_POST['accountname']);
                $v=array('step'=>'password','character'=>$name,'accountname'=>$_POST['accountname'],'recovery'=>$_POST['recovery'],'newpass'=>$_POST['newpass']);
                if(empty($k) || strlen($k) > 25 || !check_account_name($k)){
                        $main_content .= box('Error', 'Please enter a valid account name.', $v);
                        return;}

                $i=strtoupper(trim($_POST['recovery']));
                if(empty($i) || strlen($i) != 10 || strlen($i) != strspn($i, "QWERTYUIOPASDFGHJKLZXCVBNM0123456789")){
                        $main_content .= box('Error', 'Please enter a valid recovery key.', $v);
                        return;}

                $c=$_POST['newpass'];
                if(empty($c) || strlen($c) < 4 || strlen($c) > 29 || strspn("$c", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM1234567890") != strlen($c)){
                        $main_content .= box('Error', 'Please enter a valid password.', $v);
                        return;}

                if($p['name'] != $k || $SQL->query('UPDATE accounts SET password=\''.sha1($c).'\' WHERE id=\''.$p['acc'].'\' AND `key`=\''.$i.'\'  LIMIT 1')->rowCount() == 0){
                        $main_content .= box('Error', 'Incorrect account name or recovery key.', $v);
                        return;}

                $main_content .= box('Recovery Successful', 'Your password has been succesfully updated.', 1);
                return;
        }
        $k=$_POST['password'];
        if(isset($k)) {
                $v=array('step'=>'name','character'=>$name,'password'=>$_POST['password'],'recovery'=>$_POST['recovery']);
                if(empty($k) || !check_password($k)){
                        $main_content .= box('Error', 'Please enter a valid password.', $v);
                        return;}

                $i=strtoupper(trim($_POST['recovery']));
                if(empty($i) || strlen($i) != 10 || strlen($i) != strspn($i, "QWERTYUIOPASDFGHJKLZXCVBNM0123456789")){
                        $main_content .= box('Error', 'Please enter a valid recovery key.', $v);
                        return;}

                if($p['password'] != sha1($k)){
                        $main_content .= box('Error', 'Incorrect password or recovery key.', $v);
                        return;}

                $main_content .= box('Recovery Successful', 'You have successfully recovered your account name.<br/><br/><table border="0" cellspacing="0" cellpadding="0" width="100%"><tr><td width="13%"><b>Account Name:</b></td><td><input type="text" readonly="readonly" size="'.(strlen($p['name'])-1).'" onclick="this.select();" value="'.$p['name'].'"/></td></tr></table>', 1);
                return;
        }
}
elseif($step == 'name') {
        $name=stripslashes(trim(urldecode($_POST['character'])));
        if(empty($name) || strlen($name) < 3 || strlen($name) > 25 || strspn("$name", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM ") != strlen($name)) {
                $main_content .= box('Error', 'Please enter the name of a character on the lost account. If your account does not contain any characters, please create a new account.');
                return;
        }

        $p=$SQL->query('SELECT id FROM players WHERE name=\''.$name.'\' LIMIT 1')->fetch();
        if(!$p || !$p['id']) {
                $main_content .= box('Error', 'Character <b>'.htmlspecialchars($name).'</b> does not exist. Please make sure to enter the character name correctly. Note that characters are deleted automatically if they have not been used for a long time.');
                return;
        }

$main_content.='<form action="?subtopic=lostaccount" method="post">
<input type="hidden" name="character" value="'.htmlspecialchars($name).'"/>
<input type="hidden" name="step" value="sendconfirmation"/>
<table cellspacing="1" cellpadding="3" border="0" width="100%">
<tr><td bgcolor="'.$config['site']['vdarkborder'].'" class="white"><b>Request Account Name</b></td></tr>
<tr><td bgcolor="'.$config['site']['lightborder'].'">
<table style="border: 1px solid '.$config['site']['darkborder'].'" cellpadding="4" cellspacing="2" width="100%">
        <tr bgcolor="'.$config['site']['darkborder'].'">
                <td width="23%">Password:</td>
                <td><input type="password" name="password" value="'.htmlspecialchars($_POST['accountname']).'"/></td>
        </tr>

        <tr bgcolor="'.$config['site']['lightborder'].'">
                <td width="23%">Recovery key:</td>
                <td><input name="recovery" value="'.htmlspecialchars($_POST['recovery']).'" maxlength="10"/></td>
        </tr>

        </table><br/>
        <table align="center"><tr><td><input type="image" name="Submit" alt="Submit" src="layouts\tibiacom\images\buttons/_sbutton_submit.gif"/></td></tr></table>
</td></tr>
</table></form>
';
}
else {
        $name=stripslashes(trim(urldecode($_POST['character'])));
        if(!empty($name) && strlen($name) > 2 && strlen($name) < 26 && strspn("$name", "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM ") == strlen($name)) {
                $main_content .= box('Error', 'Please specify your problem.', array('step'=>'problem','character'=>$name));
                return;
        }
        $main_content .= '<table cellpadding="0" cellspacing="0" border="0" width="100%"><tr>
        <td><img src="img/blank.gif" width="10" height="1" border="0" alt=""/></td>
        <td>
        <b>Welcome to the Lost Account Interface!</b><br/><br/>

        If you have lost access to your account, this interface can help you. Of course, you need to prove that your claim to the account is justified. Enter the requested data and follow the instructions carefully. Please understand there is no way to get access to your lost account if the interface cannot help you.<br/><br/>

        By using the Lost Account Interface you can
        <ul><li>get a new password if you have lost the current password,</li>
        <li>receive your account name if you do not know it anymore,</li></ul><br/>
        As a first step to use the Lost Account Interface please enter the name of a character on the lost account and click on "Submit".<br/><br/></td>
        <td><img src="img/blank.gif" width="10" height="1" border="0" alt=""/></td>
        </tr>
        </table>
        <form action="?subtopic=lostaccount" method="post">
                <input type="hidden" name="step" value="problem"/>
                <table cellspacing="1" cellpadding="4" border="0" width="98%" align="center">
                        <tr><td bgcolor="'.$config['site']['vdarkborder'].'" class="white"><b>Enter Character Name</b></td></tr>
                        <tr><td bgcolor="'.$config['site']['darkborder'].'">Character name: <input name="character" size="30" maxlength="25"/></td></tr>
                </table><br/>
                <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                                <td align="center">
                                        <input type="image" name="Submit" alt="Submit" src="layouts\tibiacom\images\buttons/_sbutton_submit.gif"/>
                                </td>
                        </tr>
                </table>
        </form>';
}
?>