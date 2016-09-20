<?PHP
include('tutor.php');
if(!$logged)
	if($action == "logout")
		$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Logout Successful</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>You have logged out of your '.$config['server']['serverName'].' account. In order to view your account you need to <a href="?subtopic=accountmanagement" >log in</a> again.</td></tr>          </table>        </div>  </table></div></td></tr>';
	else
		
$main_content .= 'Please enter your account name and your password.<br /><a href="?subtopic=createaccount" >Create an account</a> if you do not have one yet.<br /><br /><form action="?subtopic=accountmanagement" method="post" ><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Account Login</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >Account Name:</span></td><td style="width:100%;" ><input type="password" name="account_login" SIZE="10" maxlength="30" ></td></tr><tr><td class="LabelV" ><span >Password:</span></td><td><input type="password" name="password_login" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br /><table width="100%" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=lostaccount" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Account lost?" alt="Account lost?" src="'.$layout_name.'/images/buttons/_sbutton_accountlost.gif" ></div></div></td></tr></form></table></td></tr></table>';
else
{
	//########### ACCOUNT MANAGER ##########
	if($action == "")
	{
		$account_reckey = $account_logged->getRecoveryKey();
		if(!$account_logged->isPremium())
			$account_status = '<strong><font color="red">Free Account</font></strong>';
		else
			$account_status = '<strong><font color="green">Premium Account, '.$account_logged->getPremDays().' days left</font></strong>';
		if(empty($account_reckey))
			$account_registred = '<strong><font color="red">No</font></strong>';
		else
			if($config['site']['generate_new_reckey'] && $config['site']['send_emails'])
				$account_registred = '<strong><font color="green">Yes&nbsp;(<a href="?subtopic=accountmanagement&action=newreckey">Buy new Rec key</a>)</font></strong>';
			else
				$account_registred = '<strong><font color="green">Yes</font></strong>';
		$account_created = $account_logged->getCreated();
		$account_email = $account_logged->getEMail();
		$account_email_new_time = $account_logged->getCustomField("email_new_time");
		if($account_email_new_time > 1)
			$account_email_new = $account_logged->getCustomField("email_new");
		$account_rlname = $account_logged->getRLName();
		$account_location = $account_logged->getLocation();

		$welcome_msg = 'Welcome to your account!';

		$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" ><div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div><div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div><div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div><div class="Message" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div><div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div><table><td width="100%" align="center">';
		$main_content .= '<a href="#general" >General Information</a>, <a href="#public" >Public Information</a>, <a href="#billing" >Billing Information</a>, <a href="#characters" >Characters</a>.';
		$main_content .= '</td><td width=50%><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=logout" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Logout" alt="Logout" src="'.$layout_name.'/images/buttons/_sbutton_logout.gif" ></div></div></td></tr></form></table></td></tr></table>    </div><div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br /><center><table><tr><td><img src="'.$layout_name.'/images/content/headline-bracer-left.gif" /></td><td style="text-align:center;vertical-align:middle;horizontal-align:center;font-size:17px;font-weight:bold;" >'.$welcome_msg.'<br /></td><td><img src="'.$layout_name.'/images/content/headline-bracer-right.gif" /></td></tr></table><br /></center>';
	//show account premium_points
		if($logged)
        {
        $user_premium_points = $account_logged->getCustomField('premium_points');
        }
        else
        {
        $user_premium_points = 'Login first';
        }
//if account dont have recovery key show hint
		if(empty($account_reckey))
			$main_content .= '<div class="SmallBox" ><div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div><div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div><div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div><div class="Message" ><div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div><div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div><table><tr><td class="LabelV" >Hint:</td><td style="width:100%;" >You can register your account for increased protection. Click on "Register Account" and get your free recovery key today!</td></tr></table><div align="center" ><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=registeraccount" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Register Account" alt="Register Account" src="'.$layout_name.'/images/buttons/_sbutton_registeraccount.gif" ></div></div></td></tr></form></table></div></div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div><div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div><div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br />';
		if($account_email_new_time > 1)
			if($account_email_new_time < time())
				$account_email_change = '<br>(You can accept <strong>'.$account_email_new.'</strong> as a new email.)';
			else
			{
				$account_email_change = ' <br>You can accept <strong>new e-mail after '.date("j F Y", $account_email_new_time).".</strong>";
				$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="Message" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div><table><tr><td class="LabelV" >Note:</td><td style="width:100%;" >A request has been submitted to change the email address of this account to <strong>'.$account_email_new.'</strong>. After <strong>'.date("j F Y, G:i:s", $account_email_new_time).'</strong> you can accept the new email address and finish the process. Please cancel the request if you do not want your email address to be changed! Also cancel the request if you have no access to the new email address!</td></tr></table><div align="center" ><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Edit" alt="Edit" src="'.$layout_name.'/images/buttons/_sbutton_edit.gif" ></div></div></td></tr></form></table></div>    </div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br /><br />';
			}
		$main_content .= '<a name="general" ></a><div class="TopButtonContainer" ><div class="TopButton" ><a href="#top"><image style="border:0px;" src="'.$layout_name.'/images/content/back-to-top.gif" /></a></div></div><div class="TableContainer" ><table class="Table3" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >General Information</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div><tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" ><div class="TableContentContainer" >    <table class="TableContent" width="100%" >
			<tr style="background-color:'.$config['site']['darkborder'].';" ><td class="LabelV">Account Name:</td><td>'.$account_logged->getCustomField("name").'</td></tr>
			<tr style="background-color:'.$config['site']['lightborder'].';" ><td class="LabelV">Email Address:</td><td style="width:90%;" >'.$account_email.''.$account_email_change.'</td></tr>
			<tr style="background-color:'.$config['site']['darkborder'].';" ><td class="LabelV">Created:</td><td>'.date("j F Y, G:i:s", $account_created).'</td></tr>
			<tr style="background-color:'.$config['site']['lightborder'].';" ><td class="LabelV">Last Login:</td><td>'.date("j F Y, G:i:s", time()).'</td></tr>
			<tr style="background-color:'.$config['site']['darkborder'].';" ><td class="LabelV">Account Status:</td><td>'.$account_status.'<br><small>(Premium time expired at '.date("j F Y, G:i:s", $account_logged->getCustomField("premdays")).' CEST)</small></td></tr>
			<tr style="background-color:'.$config['site']['lightborder'].';" ><td class="LabelV">Registered:</td><td>'.$account_registred.'</td></tr>
<tr style="background-color:'.$config['site']['darkborder'].';" ><td class="LabelV" >Premium Points:</td><td>You have <b>'.$user_premium_points.'</b> premium points</td></tr>
		</table></div></div><div class="TableShadowContainer" ><div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" ><div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div><div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  </div></div></td></tr><tr><td><table class="InnerTableButtonRow" cellpadding="0" cellspacing="0" ><tr><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=changepassword" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Change Password" alt="Change Password" src="'.$layout_name.'/images/buttons/_sbutton_changepassword.gif" ></div></div></td></tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><tr><td style="border:0px;" ><input type="hidden" name=newemail value="" ><input type="hidden" name=newemaildate value=0 ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Change Email" alt="Change Email" src="'.$layout_name.'/images/buttons/_sbutton_changeemail.gif" ></div></div></td></tr></form>      </table></td><td width="100%"></td>';
		$main_content .= '<td style="position:absolute; right:120px">
											<table border="0" cellspacing="0" cellpadding="0" >
												<form action="?subtopic=accountmanagement&action=tutor" method="post" >
													<input type="hidden" name="step" value="1">
													<tr>
														<td style="border:0px;" >
															<div class="Button" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
																<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
																	<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" >
																	</div>
																	<input class="ButtonText" type="image" name="Become Tutor" alt="Become Tutor" src="'.$layout_name.'/images/buttons/tutor.gif" >
																</div>
															</div>
														</td>
													</tr>
												</form>      
											</table>
										</td>';
									
									$main_content .= '<td width="100%"></td>';
//show button "register account"
		if(empty($account_reckey))
			$main_content .= '<td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=registeraccount" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Register Account" alt="Register Account" src="'.$layout_name.'/images/buttons/_sbutton_registeraccount.gif" ></div></div></td></tr></form></table></td>';
		$main_content .= '</tr></table></td></tr></table></div></table></div></td></tr><br /><a name="public" ></a><div class="TopButtonContainer" ><div class="TopButton" ><a href="#top" ><image style="border:0px;" src="'.$layout_name.'/images/content/back-to-top.gif" /></a></div></div><div class="TableContainer" >  <table class="Table5" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Public Information</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" ><div class="TableContentContainer" >    <table class="TableContent" width="100%" ><tr><td><table style="width:100%;"><tr><td class="LabelV" >Real Name:</td><td style="width:90%;" >'.$account_rlname.'</td></tr><tr><td class="LabelV" >Location:</td><td style="width:90%;" >'.$account_location.'</td></tr></table></td><td align=right><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=changeinfo" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Edit" alt="Edit" src="'.$layout_name.'/images/buttons/_sbutton_edit.gif" ></div></div></td></tr></form></table></td></tr>    </table>  </div></div><div class="TableShadowContainer" >  <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >    <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>    <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  </div></div></td></tr>          </table>        </div>  </table></div></td></tr><br /><br />';
		$main_content .= '<a name="billing" ></a><div class="TopButtonContainer"><div class="TopButton"><a href="#top"><img style="border:0px;" src="'.$layout_name.'/images/content/back-to-top.gif"></a></div></div><div class="TableContainer" >  <table class="Table3" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Billing Information</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" ><div class="TableContentContainer" >
		<table class="TableContent" width="100%" >
			<tr>
				<td>
				<table border="0" cellspacing="0" cellpadding="0"><tbody><tr><td style="border:0px;"><form action="?subtopic=donate" method="post"><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)"><div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif); visibility: hidden; "></div><input class="ButtonText" type="image" name="Add Premium Time" alt="Add Premium Time" src="'.$layout_name.'/images/buttons/_sbutton_addpremiumtime.gif"></div></div></form></td><td style="border:0px;">Buy premium time to benefit from all premium features.</td></tr></tbody></table></td>
			</tr>
		</table>
		</div></div><div class="TableShadowContainer" >  <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >    <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>    <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  </div></div></td></tr>          </table>        </div> 
		<div class="InnerTableContainer" ><table style="width:100%;"><tr><td><div class="TableShadowContainerRightTop"><div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);"></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);"><div class="TableContentContainer">
		<table class="TableContent" width="100%" >
			<tr class="LabelH">
				<td>Date</td><td>Description</td><td>Days</td><td>Start</td><td>End</td>
			</tr>';
			$history_pacc = $SQL->query('SELECT * FROM '.$SQL->tableName('z_shop_history_pacc').' WHERE to_account = '.$SQL->quote($account_logged->getId()).'');
			$counter = 0;
			foreach($history_pacc as $pacc)
			{
				if(is_int($counter / 2))
					$bgcolor = $config['site']['lightborder'];
				else
					$bgcolor = $config['site']['darkborder'];
				$counter++;
				$main_content .= '<tr bgcolor='.$bgcolor.'><td>'.date("M j Y", $pacc['trans_start']).'</td><td>Premium Time ('.$pacc['pacc_days'].' days)</td><td>'.$pacc['pacc_days'].'</td><td>'.date("M j Y", $pacc['trans_start']).'</td><td>'.date("M j Y", $pacc['trans_real']).'</td></tr>';
			}
		$main_content .= '</table>
		</div></div><div class="TableShadowContainer" >  <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >    <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>    <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  </div></div></td></tr>          </table>        </div> 
		</table></div></td></tr><br /><br />';
		$main_content .= '<a name="characters" ></a><div class="TopButtonContainer" ><div class="TopButton" ><a href="#top" ><image style="border:0px;" src="'.$layout_name.'/images/content/back-to-top.gif" /></a></div></div><div class="TableContainer" >  <table class="Table3" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" ><div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Characters</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>   <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" ><div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" ><div class="TableContentContainer" >    <table class="TableContent" width="100%" ><tr class="LabelH" ><td style="width:65%" >Name</td><td style="width:15%" >Level</td><td style="width:7%">Status</td><td style="width:5%"></td></tr>';
		$account_players = $account_logged->getPlayersList();
		$account_players->orderBy('name');
		//show list of players on account
		foreach($account_players as $account_player)
		{
			$player_number_counter++;
			$main_content .= '<tr style="background-color:';
			if(is_int($player_number_counter / 2))
				$main_content .= $config['site']['darkborder'];
			else
				$main_content .= $config['site']['lightborder'];
			$main_content .= ';" ><td><NOBR>'.$player_number_counter.'.&#160;'.$account_player->getName();
			if($account_player->isDeleted())
				$main_content .= '<font color="red"><strong> [ DELETED ] </strong> <a href="?subtopic=accountmanagement&action=undelete&name='.urlencode($account_player->getName()).'">>> UNDELETE <<</a></font>';
			if($account_player->isNameLocked())
				if($account_player->getOldName())
					$main_content .= '<font color="red"><strong> [ NAMELOCK:</strong> Wait for GM, new name: <strong>'.$account_player->getOldName().' ]</strong></font>';
				else
					$main_content .= '<font color="red"><strong> [ NAMELOCK: <form action="" method="GET"><input name="subtopic" type="hidden" value="accountmanagement" /><input name="action" type="hidden" value="newnick" /><input name="name" type="hidden" value="'.$account_player->getName().'" /><input name="name_new" type="text" value="Enter here new nick" size="16" /><input type="submit" value="Set new nick" /></form> ]</strong></font>';
			$main_content .= '</NOBR></td><td><NOBR>'.$account_player->getLevel().' '.$vocation_name[$account_player->getWorld()][$account_player->getPromotion()][$account_player->getVocation()].'</NOBR></td>';
			if(!$account_player->isOnline())
				$main_content .= '<td><font color="red"><strong>Offline</strong></font></td>';
			else
				$main_content .= '<td><font color="green"><strong>Online</strong></font></td>';
			$main_content .= '<td>[<a href="?subtopic=accountmanagement&action=changecomment&name='.urlencode($account_player->getName()).'" >Edit</a>]</td></tr>';
		}
		$main_content .= '</table>  </div></div><div class="TableShadowContainer" >  <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >    <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>    <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  </div></div></td></tr><tr><td><table class="InnerTableButtonRow" cellpadding="0" cellspacing="0" ><tr><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=createcharacter" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Create Character" alt="Create Character" src="'.$layout_name.'/images/buttons/_sbutton_createcharacter.gif" ></div></div></td></tr></form></table></td><td style="width:100%;" ></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=deletecharacter" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Delete Character" alt="Delete Character" src="'.$layout_name.'/images/buttons/_sbutton_deletecharacter.gif" ></div></div></td></tr></form></table></td></tr></table></td></tr>          </table>        </div>  </table></div></td></tr><br /><br />';
	}
	//########### CHANGE PASSWORD ##########
	if($action == "changepassword") 
	{
		$new_password = trim($_POST['newpassword']);
		$new_password2 = trim($_POST['newpassword2']);
		$old_password = trim($_POST['oldpassword']);
		if(empty($new_password) && empty($new_password2) && empty($old_password))
			$main_content .= 'Please enter your current password and a new password. For your security, please enter the new password twice.<br /><br /><form action="?subtopic=accountmanagement&action=changepassword" method="post" ><div class="TableContainer" ><table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" ><div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Change Password</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >New Password:</span></td><td style="width:90%;" ><input type="password" name="newpassword" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >New Password Again:</span></td><td><input type="password" name="newpassword2" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >Current Password:</span></td><td><input type="password" name="oldpassword" size="30" maxlength="29" ></td></tr></table>        </div>  </table></div></td></tr><br /><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		else
		{
			if(empty($new_password) || empty($new_password2) || empty($old_password))
				$show_msgs[] = "Please fill in form.";
			if($new_password != $new_password2) 
				$show_msgs[] = "The new passwords do not match!";
			if(empty($show_msgs)) 
			{
				if(!check_password($new_password)) 
					$show_msgs[] = "New password contains illegal chars (a-z, A-Z and 0-9 only!) or lenght.";
				$old_password = password_ency($old_password);
				if($old_password != $account_logged->getPassword()) 
					$show_msgs[] = "Current password is incorrect!";
			}
			if(!empty($show_msgs))
			{
				//show errors
				$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><strong>The Following Errors Have Occurred:</strong><br />';
				foreach($show_msgs as $show_msg) 
					$main_content .= '<li>'.$show_msg;
				$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br />';
				//show form
				$main_content .= 'Please enter your current password and a new password. For your security, please enter the new password twice.<br /><br /><form action="?subtopic=accountmanagement&action=changepassword" method="post" ><div class="TableContainer" ><table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" ><div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Change Password</div><span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >New Password:</span></td><td style="width:90%;" ><input type="password" name="newpassword" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >New Password Again:</span></td><td><input type="password" name="newpassword2" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >Current Password:</span></td><td><input type="password" name="oldpassword" size="30" maxlength="29" ></td></tr></table>        </div>  </table></div></td></tr><br /><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
			else
			{
				$org_pass = $new_password;
				$new_password = password_ency($new_password);
				$account_logged->setPassword($new_password);
				$account_logged->save();
				$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Password Changed</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your password has been changed.';
				if($config['site']['send_emails'] && $config['site']['send_mail_when_change_password'])
				{
					$mailBody = '<html>
						<body>
							<h3>Password to account changed!</h3>
							<p>You or someone else changed password to your account on server <a href="'.$config['server']['url'].'"><strong>'.$config['server']['serverName'].'</strong></a>.</p>
							<p>New password: <strong>'.$org_pass.'</strong></p>
						</body>
					</html>';
					require("phpmailer/class.phpmailer.php");
					$mail = new PHPMailer();
					if ($config['site']['smtp_enabled'] == "yes")
					{
						$mail->IsSMTP();
						$mail->Host = $config['site']['smtp_host'];
						$mail->Port = (int)$config['site']['smtp_port'];
						$mail->SMTPAuth = ($config['site']['smtp_auth'] ? true : false);
						$mail->Username = $config['site']['smtp_user'];
						$mail->Password = $config['site']['smtp_pass'];
					}
					else
						$mail->IsMail();
					$mail->IsHTML(true);
					$mail->From = $config['site']['mail_address'];
					$mail->AddAddress($account_logged->getEMail());
					$mail->Subject = $config['server']['serverName']." - Changed password";
					$mail->Body = $mailBody;
					if($mail->Send())
						$main_content .= '<br /><small>Your new password were send on email address <strong>'.$account_logged->getEMail().'</strong>.</small>';
					else
						$main_content .= '<br /><small>An error occorred while sending email with password!</small>';
				}
				$main_content .= '</td></tr>          </table>        </div>  </table></div></td></tr><br /><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				$_SESSION['password'] = $new_password;
			}
		}
	}
	//############# TUTOR TEST ###################
	if($action == 'tutor') 
	{
		$step = $_REQUEST['step'];
		
		if ($step == 1)
		{
			$asd = $SQL->query("SELECT * FROM accounts WHERE id = ". $account_logged->getId() .";")->fetch();
			if((time() - $asd['last_test']) < 60 * 60 * 24 * 30)
			{
				$main_content .= 'You cant try now <br><br>'. $back;
				return;
			}
			
			$main_content .= '
			Tutors are experienced players who volunteer to help other players by answering questions about the game. 
			Only players with extensive knowledge about all aspects of the game may become tutors. 
			This includes knowledge of the game manual, the Tibia Rules, FAQs, security hints and of course the tutor guide. 
			If you fulfil the formal criteria for becoming a tutor, you may take the tutor exam to prove your qualification.<br><br>
				
			<a name="Account+Analysed" ></a>
			<div class="TableContainer" >  
				<table class="Table5" cellpadding="0" cellspacing="0" >    
					<div class="CaptionContainer" >      
						<div class="CaptionInnerContainer" >
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
							<div class="Text" >
								Account Analysed
							</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
						</div>    
					</div>    
					<tr>      
						<td>       
							<div class="TableContentContainer" >   
								<table class="TableContent" width="100%" >
									<tr>
										<td>
											You meet all formal requirements to become a tutor. 
											If you want to proceed make sure that you have read and understood all available documentation about the game. 
											Then click on the "Start Exam" button to take the tutor exam. Note, 
											that you cannot cancel the exam once you have started and that you are only allowed to take the exam once every two months.
											<br>
										</td>
									</tr>													
								</table>
							</div>
						</td>
					</tr>          
				</table>       
			</div>
			<br>
			<table class="TableContent" width="100%" >
				<tr>
					<td style="width:50%">
						<center>
							<form action="?subtopic=accountmanagement&action=tutor" method="post" >
								<input type="hidden" name="step" value="2">
								<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
										<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" >
										</div>
										<input class="ButtonText" type="image" name="Start Exam" alt="Start Exam" src="'.$layout_name.'/images/buttons/start_exam.gif" >
									</div>
								</div>
							</form>
						</center>
					</td>
					<td style="width:50%">
						'. $back .'
					</td>
				</tr>
			</table>
			';
		}
		elseif ($step == 2)
		{
			$asd = $SQL->query("SELECT * FROM accounts WHERE id = ". $account_logged->getId() .";")->fetch();
			if((time() - $asd['last_test']) < 60 * 60 * 24 * 30)
			{
				$main_content .= 'You cant try now <br><br>'. $back;
				return;
			}
			$SQL->query("UPDATE accounts SET last_test = ". time() ." WHERE id = ". $account_logged->getId() .";");
			
			$main_content .= '
			Please answer all questions below by selecting the appropriate answers. 
			Note, that none, one, several or all answers may be correct. You have 45 minutes to answer all questions. Good luck!
			<br><br>
			<form action="?subtopic=accountmanagement&action=tutor" method="post" >
				<input type="hidden" name="step" value="3">';
			$useds = array();
			for ($ii = 1; $ii <= 15; $ii++) 
			{
				$continue_a = true;
				$total_a = count($question);
				while ($continue_a)
				{
					$this_jeje_a = rand(1, $total_a);
					if(!array_key_exists($this_jeje_a, $useds))
					{
						$useds[$this_jeje_a] = true;
						$continue_a = false;
					}
				}
				
				$turn = $question[$this_jeje_a];
				
				$main_content .= '
				<div class="TableContainer" >  
					<table class="Table5" cellpadding="0" cellspacing="0" >    
						<div class="CaptionContainer" >      
							<div class="CaptionInnerContainer" >
								<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
								<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
								<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
								<div class="Text" >'. $turn['question'] .'	</div>
								<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
								<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
								<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
								<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							</div>    
						</div>    
						<tr>      
							<td>       
								<div class="TableContentContainer" >   
									<table class="TableContent" width="100%" >
										<input type="hidden" name="real_id_'. $ii .'" value="'. $this_jeje_a .'">';
				$used_answers = array();
				$corrects = 0;
				for ($i = 1; $i <= 3; $i++) 
				{
					$continue = true;
					$total = count($turn['answers']);
					while ($continue)
					{
						$this_jeje = rand(0, $total - 1);
						if(!array_key_exists($this_jeje, $used_answers))
						{
							$used_answers[$this_jeje] = true;
							$continue = false;
						}
					}
					if (in_array($turn['answers'][$this_jeje], $turn['correct']))
					{
						$corrects++;
					}
					$main_content .= '	
										<tr>
											<td style="width:1%">
												<input name="answers_to_'. $ii .'[]" value="'. $turn['answers'][$this_jeje] .'" type="checkbox">
											</td>
											<td style="width:99%">
												'. $turn['answers'][$this_jeje] .'
											</td>
										</tr>';	
				}
					$main_content .= '
										<input type="hidden" name="encrypt_1d5f'. $ii .'dshgas" value="'. $corrects .'">			
									</table>
								</div>
							</td>
						</tr>          
					</table>       
				</div><br>';	
			}
			$main_content .= '
				<table class="TableContent" width="100%" >
					<tr>
						<td style="width:50%">
							<center>
								<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
									<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
										<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" >
										</div>
										<input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" >
									</div>
								</div>
							</center>
						</td>
					</tr>
				</table>
			</form>';
		}
		elseif ($step == 3)
		{
			for ($i = 1; $i <= 15; $i++) 
			{
				$real_id = $_POST['real_id_'. $i];
				$real_corrects = $_POST['encrypt_1d5f'. $i .'dshgas'];
				$answers = $_POST['answers_to_'. $i];
				$count = count($answers);
				if ($real_corrects == $count)
				{
					if($count != 0)
					{
						foreach ($answers as $v)
						{
							if (!in_array($v, $question[$real_id]['correct']))
							{
								$main_content .= '
								Thank you for completing the tutor exam. Here is the evaluation of your submission:<br><br>
								<div class="TableContainer" >  
									<table class="Table5" cellpadding="0" cellspacing="0" >    
										<div class="CaptionContainer" >      
											<div class="CaptionInnerContainer" >
												<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
												<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
												<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
												<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
												<div class="Text" >
													Exam not Passed
												</div>
												<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
												<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
												<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
												<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
											</div>    
										</div>    
										<tr>      
											<td>       
												<div class="TableContentContainer" >   
													<table class="TableContent" width="100%" >
														<tr>
															<td>
																Sorry, you did not pass the tutor exam. The following question has been answered wrongly:<br><br>
																<b>'. $question[$real_id]['question'] .'</b><br><br>
																You may repeat the exam in one month. Until then use the time to study the documentation again. We hope to welcome you as tutor in the future.<br>
															</td>
														</tr>													
													</table>
												</div>
											</td>
										</tr>          
									</table>       
								</div><br>
								'.$back;
								return;
							}
						}
					}
				}
				else
				{
					$main_content .= '
					Thank you for completing the tutor exam. Here is the evaluation of your submission:<br><br>
					<div class="TableContainer" >  
						<table class="Table5" cellpadding="0" cellspacing="0" >    
							<div class="CaptionContainer" >      
								<div class="CaptionInnerContainer" >
									<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
									<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
									<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
									<div class="Text" >
										Exam not Passed
									</div>
									<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
									<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
									<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
									<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
								</div>    
							</div>    
							<tr>      
								<td>       
									<div class="TableContentContainer" >   
										<table class="TableContent" width="100%" >
											<tr>
												<td>
													Sorry, you did not pass the tutor exam. The following question has been answered wrongly:<br><br>
													<b>'. $question[$real_id]['question'] .'</b><br><br>
													You may repeat the exam in one month. Until then use the time to study the documentation again. We hope to welcome you as tutor in the future.<br>
												</td>
											</tr>													
										</table>
									</div>
								</td>
							</tr>          
						</table>       
					</div><br>
					'.$back;
					return;
				}
			}
			$main_content .= '
			Thank you for completing the tutor exam. Here is the evaluation of your submission:<br><br>
			<div class="TableContainer" >  
				<table class="Table5" cellpadding="0" cellspacing="0" >    
					<div class="CaptionContainer" >      
						<div class="CaptionInnerContainer" >
							<span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
							<span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
							<div class="Text" >
								Exam not Passed
							</div>
							<span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>
							<span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>
							<span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
							<span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>
						</div>    
					</div>    
					<tr>      
						<td>       
							<div class="TableContentContainer" >   
								<table class="TableContent" width="100%" >
									<tr>
										<td>
											Congratulations! you have passed the tutor exam and proven your knowledge about the game.
										</td>
									</tr>													
								</table>
							</div>
						</td>
					</tr>          
				</table>       
			</div><br>
			<center>
			<form action="?subtopic=accountmanagement" method="post" >
				<div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" >
					<div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" >
						<div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" >
						</div>
						<input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/continue.gif" >
					</div>
				</div>
			</form>
		</center>';
		
		$SQL->query("UPDATE players SET group_id = 2 WHERE account_id = ". $account_logged->getId() ." AND group_id < 1;");
		}
		}
	
	//############# CHANGE E-MAIL ###################
	if($action == "changeemail") 
	{
		$account_email_new_time = $account_logged->getCustomField("email_new_time");
		if($account_email_new_time > 10) 
			$account_email_new = $account_logged->getCustomField("email_new"); 
		if($account_email_new_time < 10)
		{
			if($_POST['changeemailsave'] == 1) 
			{
				$account_email_new = trim($_POST['new_email']);
				$post_password = trim($_POST['password']);
				if(empty($account_email_new))
					$change_email_errors[] = "Please enter your new email address.";
				else
					if(!check_mail($account_email_new)) 
						$change_email_errors[] = "E-mail address is not correct.";
				if(empty($post_password)) 
					$change_email_errors[] = "Please enter password to your account.";
				else
				{
					$post_password = password_ency($post_password);
					if($post_password != $account_logged->getPassword()) 
						$change_email_errors[] = "Wrong password to account.";
				}
				if(empty($change_email_errors)) 
				{
					$account_email_new_time = time() + $config['site']['email_days_to_change'] * 24 * 3600;
					$account_logged->setCustomField("email_new", $account_email_new);
					$account_logged->setCustomField("email_new_time", $account_email_new_time);
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >New Email Address Requested</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>You have requested to change your email address to <strong>'.$account_email_new.'</strong>. The actual change will take place after <strong>'.date("j F Y, G:i:s", $account_email_new_time).'</strong>, during which you can cancel the request at any time.</td></tr>          </table>        </div>  </table></div></td></tr><br /><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				}
				else
				{
					//show errors
					$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><strong>The Following Errors Have Occurred:</strong><br />';
					foreach($change_email_errors as $change_email_error)
						$main_content .= '<li>'.$change_email_error;
					$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br />';
					//show form
					$main_content .= 'Please enter your password and the new email address. Make sure that you enter a valid email address which you have access to. <strong>For security reasons, the actual change will be finalised after a waiting period of '.$config['site']['email_days_to_change'].' days.</strong><br /><br /><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ></tr><td class="LabelV" ><span >New Email Address:</span></td>  <td style="width:90%;" ><input name="new_email" value="'.$_POST['new_email'].'" size="30" maxlength="50" ></td><tr></tr><td class="LabelV" ><span >Password:</span></td>  <td><input type="password" name="password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br /><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name=changeemailsave value=1 ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
				}
			}
			else
				$main_content .= 'Please enter your password and the new email address. Make sure that you enter a valid email address which you have access to. <strong>For security reasons, the actual change will be finalised after a waiting period of '.$config['site']['email_days_to_change'].' days.</strong><br /><br /><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ></tr><td class="LabelV" ><span >New Email Address:</span></td>  <td style="width:90%;" ><input name="new_email" value="'.$_POST['new_email'].'" size="30" maxlength="50" ></td><tr></tr><td class="LabelV" ><span >Password:</span></td>  <td><input type="password" name="password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br /><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name=changeemailsave value=1 ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
		else
		{
			if($account_email_new_time < time()) 
			{
				if($_POST['changeemailsave'] == 1) 
				{
					$account_logged->setCustomField("email_new", "");
					$account_logged->setCustomField("email_new_time", 0);
					$account_logged->setEmail($account_email_new);
					$account_logged->save();
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Accepted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>You have accepted <strong>'.$account_logged->getEmail().'</strong> as your new email adress.</td></tr>          </table>        </div>  </table></div></td></tr><br /><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				}
				else
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Accepted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Do you accept <strong>'.$account_email_new.'</strong> as your new email adress?</td></tr>          </table>        </div>  </table></div></td></tr><br /><table width="100%"><tr><td width="30">&nbsp;</td><td align=left><form action="?subtopic=accountmanagement&action=changeemail" method="post"><input type="hidden" name="changeemailsave" value=1 ><INPUT TYPE=image NAME="I Agree" SRC="'.$layout_name.'/images/buttons/sbutton_iagree.gif" BORDER=0 WIDTH=120 HEIGHT=17></FORM></td><td align=left><form action="?subtopic=accountmanagement&action=changeemail" method="post"><input type="hidden" name="emailchangecancel" value=1 ><input type=image name="Cancel" src="'.$layout_name.'/images/buttons/sbutton_cancel.gif" BORDER=0 WIDTH=120 HEIGHT=17></form></td><td align=right><form action="?subtopic=accountmanagement" method="post" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></form></td><td width="30">&nbsp;</td></tr></table>';
			}
			else
				$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change of Email Address</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>A request has been submitted to change the email address of this account to <strong>'.$account_email_new.'</strong>.<br />The actual change will take place on <strong>'.date("j F Y, G:i:s", $account_email_new_time).'</strong>.<br>If you do not want to change your email address, please click on "Cancel".</td></tr>          </table>        </div>  </table></div></td></tr><br /><table style="width:100%;" ><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement&action=changeemail" method="post" ><tr><td style="border:0px;" ><input type="hidden" name="emailchangecancel" value=1 ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Cancel" alt="Cancel" src="'.$layout_name.'/images/buttons/_sbutton_cancel.gif" ></div></div></td></tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
		if($_POST['emailchangecancel'] == 1) 
		{
			$account_logged->setCustomField("email_new", "");
			$account_logged->setCustomField("email_new_time", 0);
			$main_content = '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Email Address Change Cancelled</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your request to change the email address of your account has been cancelled. The email address will not be changed.</td></tr>          </table>        </div>  </table></div></td></tr><br /><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
		}
	}
	//########### CHANGE PUBLIC INFORMATION (about account owner) ######################
	if($action == "changeinfo") 
	{
		$new_rlname = htmlspecialchars(stripslashes(trim($_POST['info_rlname'])));
		$new_location = htmlspecialchars(stripslashes(trim($_POST['info_location'])));
		if($_POST['changeinfosave'] == 1) 
		{
			//save data from form
			$account_logged->setRLName($new_rlname);
			$account_logged->setLocation($new_location);
			$account_logged->save();
			$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Public Information Changed</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>Your public information has been changed.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
		}
		else
		{
			//show form
			$account_rlname = $account_logged->getRLName();
			$account_location = $account_logged->getLocation();
			$main_content .= 'Here you can tell other players about yourself. This information will be displayed alongside the data of your characters. If you do not want to fill in a certain field, just leave it blank.<br /><br /><form action="?subtopic=accountmanagement&action=changeinfo" method=post><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Change Public Information</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" >Real Name:</td><td style="width:90%;" ><input name="info_rlname" value="'.$account_rlname.'" size="30" maxlength="50" ></td></tr><tr><td class="LabelV" >Location:</td><td><input name="info_location" value="'.$account_location.'" size="30" maxlength="50" ></td></tr></table>        </div>  </table></div></td></tr><br /><table width="100%"><tr align="center"><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name="changeinfosave" value="1" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
	}
	//############## GENERATE RECOVERY KEY ###########
	if($action == "registeraccount")
	{
		$reg_password = password_ency(trim($_POST['reg_password']));
		$old_key = $account_logged->getRecoveryKey("key");
		if($_POST['registeraccountsave'] == "1")
		{
			if($reg_password == $account_logged->getPassword())
			{
				if(empty($old_key))
				{
					$dontshowtableagain = 1;
					$acceptedChars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
					$max = strlen($acceptedChars)-1;
					$new_rec_key = NULL;
					// 10 = number of chars in generated key
					for($i=0; $i < 10; $i++) 
					{
						$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
						$new_rec_key .= $cnum[$i];
					}
					$account_logged->setRecoveryKey($new_rec_key);
					$account_logged->save();
					$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Account Registered</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" >Thank you for registering your account! You can now recover your account if you have lost access to the assigned email address by using the following<br /><br /><font size="5">&nbsp;&nbsp;&nbsp;<strong>Recovery Key: '.$new_rec_key.'</strong></font><br /><br /><br /><strong>Important:</strong><ul><li>Write down this recovery key carefully.</li><li>Store it at a safe place!</li>';
					if($config['site']['send_emails'] && $config['site']['send_mail_when_generate_reckey'])
					{
						$mailBody = '<html>
							<body>
								<h3>New recovery key!</h3>
								<p>You or someone else generated recovery key to your account on server <a href="'.$config['server']['url'].'"><strong>'.$config['server']['serverName'].'</strong></a>.</p>
								<p>Recovery key: <strong>'.$new_rec_key.'</strong></p>
							</body>
						</html>';
						require("phpmailer/class.phpmailer.php");
						$mail = new PHPMailer();
						if ($config['site']['smtp_enabled'] == "yes")
						{
							$mail->IsSMTP();
							$mail->Host = $config['site']['smtp_host'];
							$mail->Port = (int)$config['site']['smtp_port'];
							$mail->SMTPAuth = ($config['site']['smtp_auth'] ? true : false);
							$mail->Username = $config['site']['smtp_user'];
							$mail->Password = $config['site']['smtp_pass'];
						}
						else
							$mail->IsMail();
						$mail->IsHTML(true);
						$mail->From = $config['site']['mail_address'];
						$mail->AddAddress($account_logged->getEMail());
						$mail->Subject = $config['server']['serverName']." - recovery key";
						$mail->Body = $mailBody;
						if($mail->Send())
							$main_content .= '<br /><small>Your recovery key were send on email address <strong>'.$account_logged->getEMail().'</strong>.</small>';
						else
							$main_content .= '<br /><small>An error occorred while sending email with recovery key! You will not receive e-mail with this key.</small>';
					}
					$main_content .= '</ul>          </table>        </div>  </table></div></td></tr><br /><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
				}
				else
					$reg_errors[] = 'Your account is already registred.';
			}
			else
				$reg_errors[] = 'Wrong password to account.';
		}
		if($dontshowtableagain != 1)
		{
			//show errors if not empty
			if(!empty($reg_errors))
			{
				$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><strong>The Following Errors Have Occurred:</strong><br />';
				foreach($reg_errors as $reg_error)
					$main_content .= '<li>'.$reg_error;
				$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br />';
			}
			//show form
			$main_content .= 'To generate recovery key for your account please enter your password.<br /><br /><form action="?subtopic=accountmanagement&action=registeraccount" method="post" ><input type="hidden" name="registeraccountsave" value="1"><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Generate recovery key</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >Password:</td><td><input type="password" name="reg_password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br /><table style="width:100%" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
	}
	//############## GENERATE NEW RECOVERY KEY ###########
	if($action == "newreckey")
	{
		$reg_password = password_ency(trim($_POST['reg_password']));
		$reckey = $account_logged->getRecoveryKey();
		if((!$config['site']['generate_new_reckey'] || !$config['site']['send_emails']) || empty($reckey))
			$main_content .= 'You cant get new rec key';
		else
		{
			$points = $account_logged->getPremiumPoints();
			if($_POST['registeraccountsave'] == "1")
			{
				if($reg_password == $account_logged->getPassword())
				{
					if($points >= $config['site']['generate_new_reckey_price'])
					{
						$dontshowtableagain = 1;
						$acceptedChars = 'ABCDEFGHIJKLMNPQRSTUVWXYZ123456789';
						$max = strlen($acceptedChars)-1;
						$new_rec_key = NULL;
						// 10 = number of chars in generated key
						for($i=0; $i < 10; $i++) 
						{
							$cnum[$i] = $acceptedChars{mt_rand(0, $max)};
							$new_rec_key .= $cnum[$i];
						}
						$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Account Registered</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><ul>';
						$mailBody = '<html>
							<body>
								<h3>New recovery key!</h3>
								<p>You or someone else generated recovery key to your account on server <a href="'.$config['server']['url'].'"><strong>'.$config['server']['serverName'].'</strong></a>.</p>
								<p>Recovery key: <strong>'.$new_rec_key.'</strong></p>
							</body>
						</html>';
						require("phpmailer/class.phpmailer.php");
						$mail = new PHPMailer();
						if ($config['site']['smtp_enabled'] == "yes")
						{
							$mail->IsSMTP();
							$mail->Host = $config['site']['smtp_host'];
							$mail->Port = (int)$config['site']['smtp_port'];
							$mail->SMTPAuth = ($config['site']['smtp_auth'] ? true : false);
							$mail->Username = $config['site']['smtp_user'];
							$mail->Password = $config['site']['smtp_pass'];
						}
						else
							$mail->IsMail();
						$mail->IsHTML(true);
						$mail->From = $config['site']['mail_address'];
						$mail->AddAddress($account_logged->getEMail());
						$mail->Subject = $config['server']['serverName']." - new recovery key";
						$mail->Body = $mailBody;
						if($mail->Send())
						{
							$account_logged->setRecoveryKey(new_rec_key);
							$account_logged->setPremiumPoints($account_logged->getPremiumPoints()-$config['site']['generate_new_reckey_price']);
							$account_logged->save();
							$main_content .= '<br />Your recovery key were send on email address <strong>'.$account_logged->getEMail().'</strong> for '.$config['site']['generate_new_reckey_price'].' premium points.';
						}
						else
							$main_content .= '<br />An error occorred while sending email ( <strong>'.$account_logged->getEMail().'</strong> ) with recovery key! Recovery key not changed. Try again.';
						$main_content .= '</ul>          </table>        </div>  </table></div></td></tr><br /><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
					}
					else
						$reg_errors[] = 'You need '.$config['site']['generate_new_reckey_price'].' premium points to generate new recovery key. You have <strong>'.$points.'<strong> premium points.';
				}
				else
					$reg_errors[] = 'Wrong password to account.';
			}
			if($dontshowtableagain != 1)
			{
				//show errors if not empty
				if(!empty($reg_errors))
				{
					$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><strong>The Following Errors Have Occurred:</strong><br />';
					foreach($reg_errors as $reg_error)
					$main_content .= '<li>'.$reg_error;
					$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br />';
				}
				//show form
				$main_content .= '<center><h3>To generate New recovery key for your account please enter your password.</h3></center><br /><font color="red"><strong>New recovery key cost '.$config['site']['generate_new_reckey_price'].' Premium Points.</font><br />You have <font color="green">'.$points.'</font> premium points.<br />You will receive e-mail with this recovery key.</strong><br /><br /><form action="?subtopic=accountmanagement&action=newreckey" method="post" ><input type="hidden" name="registeraccountsave" value="1"><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Generate recovery key</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >Password:</td><td><input type="password" name="reg_password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br /><table style="width:100%" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
		}
	}
	//###### CHANGE CHARACTER COMMENT ######
	if($action == "changecomment") 
	{
		$player_name = stripslashes($_REQUEST['name']);
		$new_comment = htmlspecialchars(stripslashes(substr(trim($_POST['comment']),0,2000)));
		$new_hideacc = (int) $_POST['accountvisible'];
		if(check_name($player_name)) 
		{
			$player = $ots->createObject('Player');
			$player->find($player_name);
			if($player->isLoaded()) 
			{
				$player_account = $player->getAccount();
				if($account_logged->getId() == $player_account->getId()) 
				{
					if($_POST['changecommentsave'] == 1) 
					{
						$player->setCustomField("hide_char", $new_hideacc);
						$player->setCustomField("comment", $new_comment);
						$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Information Changed</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character information has been changed.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
					}
					else
					{
						$main_content .= 'Here you can see and edit the information about your character.<br />If you do not want to specify a certain field, just leave it blank.<br /><br /><form action="?subtopic=accountmanagement&action=changecomment" method="post" ><div class="TableContainer" >  <table class="Table5" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Edit Character Information</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  <div class="TableContentContainer" >    <table class="TableContent" width="100%" ><tr><td class="LabelV" >Name:</td><td style="width:80%;" >'.$player_name.'</td></tr><tr><td class="LabelV" >Hide Account:</td><td>';
						if($player->getHideChar() == 1) 
							$main_content .= '<input type="checkbox" name="accountvisible"  value="1" checked="checked">';
						else
							$main_content .= '<input type="checkbox" name="accountvisible"  value="1" >';
						$main_content .= ' check to hide your account information</td></tr>    </table>  </div></div><div class="TableShadowContainer" >  <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" >    <div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div>    <div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div>  </div></div></td></tr><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  <div class="TableContentContainer" >    <table class="TableContent" width="100%" ><tr><td class="LabelV" ><span >Comment:</span></td><td style="width:80%;" ><textarea name="comment" rows="10" cols="50" wrap="virtual" >'.$player->getComment().'</textarea><br>[max. length: 2000 chars, 50 lines]</td></tr>    </table>  </div></div><div class="TableShadowContainer" >  <div class="TableBottomShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bm.gif);" ><div class="TableBottomLeftShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-bl.gif);" ></div><div class="TableBottomRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-br.gif);" ></div></div></div></td></tr></td></tr>          </table>        </div>  </table></div></td></tr><br /><table style="width:100%" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><input type="hidden" name="name" value="'.$player->getName().'"><input type="hidden" name="changecommentsave" value="1"><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
					}
				}
				else
					$main_content .= "<h3><center>Error.<br />Character with name: ".$player_name." is not on your account.</center></h3>";
			}
			else
				$main_content .= "<h3><center>Error.<br />Character with name: ".$player_name." doesn't exist.</center></h3>";
		}
		else
			$main_content .= "<h3><center>Error.<br />Name contain illegal characters.</center></h3>";
	}
	//### NEW NICK - set new nick proposition ###
	if($action == "newnick")
	{
		$name = $_GET['name'];
		$name_new = stripslashes(ucwords(strtolower(trim($_GET['name_new']))));
		if(!empty($name) && !empty($name_new))
		{
			if(check_name_new_char($name_new))
			{
				$player = $ots->createObject('Player');
				$player->find($name);
				if($player->isLoaded() && $player->isNameLocked())
				{
					$player_account = $player->getAccount();
					if($account_logged->getId() == $player_account->getId())
					{
						if(!$player->getOldName())
							if(!$player->isOnline())
							{
								$player->setCustomField('old_name', $name_new);
								$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >New nick proposition</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character <strong>'.$name.'</strong> new nick proposition <strong>'.$name_new.'</strong> has been set. Now you must wait for acceptation from GM.</td></tr>          </table>        </div>  </table></div></td></tr>';
							}
							else
								$main_content .= 'This character is online.';
						else
							$main_content .= 'You already set new name for this character ( <strong>'.$player->getOldName().'</strong> ). You must wait until GM accept/reject your proposition.';
					}
					else
						$main_content .= 'Character <strong>'.$player_name.'</strong> is not on your account.';
				}
				else
					$main_content .= 'Character with this name doesn\'t exist or isn\'t name locked.';
			}
			else
				$main_content .= 'Name contain illegal characters. Invalid format or lenght.';
		}
		else
			$main_content .= 'Please enter new char name.';
		$main_content .= '<br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
	}
	//### DELETE character from account ###
	if($action == "deletecharacter") 
	{
		$player_name = stripslashes(trim($_POST['delete_name']));
		$password_verify = trim($_POST['delete_password']);
		$password_verify = password_ency($password_verify);
		if($_POST['deletecharactersave'] == 1) 
		{
			if(!empty($player_name) && !empty($password_verify)) 
			{
				if(check_name($player_name)) 
				{
					$player = $ots->createObject('Player');
					$player->find($player_name);
					if($player->isLoaded()) 
					{
						$player_account = $player->getAccount();
						if($account_logged->getId() == $player_account->getId()) 
						{
							if($password_verify == $account_logged->getPassword()) 
							{
								if(!$player->isOnline())
								{
									//dont show table "delete character" again
									$dontshowtableagain = 1;
									//delete player
									$player->setCustomField('deleted', 1);
									$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Deleted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character <strong>'.$player_name.'</strong> has been deleted.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
								}
								else
									$delete_errors[] = 'This character is online.';
							}
							else
								$delete_errors[] = 'Wrong password to account.';
						}
						else
							$delete_errors[] = 'Character <strong>'.$player_name.'</strong> is not on your account.';
					}
					else
						$delete_errors[] = 'Character with this name doesn\'t exist.';
				}
				else
					$delete_errors[] = 'Name contain illegal characters.';
			}
			else
				$delete_errors[] = 'Character name or/and password is empty. Please fill in form.';
		}
		if($dontshowtableagain != 1) 
		{
			if(!empty($delete_errors)) 
			{
				$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><strong>The Following Errors Have Occurred:</strong><br />';
				foreach($delete_errors as $delete_error) {
					$main_content .= '<li>'.$delete_error;
				}
				$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br />';
			}
			$main_content .= 'To delete a character enter the name of the character and your password.<br /><br /><form action="?subtopic=accountmanagement&action=deletecharacter" method="post" ><input type="hidden" name="deletecharactersave" value="1"><div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Delete Character</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td class="LabelV" ><span >Character Name:</td><td style="width:90%;" ><input name="delete_name" value="" size="30" maxlength="29" ></td></tr><tr><td class="LabelV" ><span >Password:</td><td><input type="password" name="delete_password" size="30" maxlength="29" ></td></tr>          </table>        </div>  </table></div></td></tr><br /><table style="width:100%" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
		}
	}
	//### UNDELETE character from account ###
	if($action == "undelete")
	{
		$player_name = stripslashes(trim($_GET['name']));
		if(!empty($player_name))
		{
			if(check_name($player_name))
			{
				$player = $ots->createObject('Player');
				$player->find($player_name);
				if($player->isLoaded())
				{
					$player_account = $player->getAccount();
					if($account_logged->getId() == $player_account->getId())
					{
						if(!$player->isOnline())
						{
							$player->setCustomField('deleted', 0);
							$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Undeleted</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character <strong>'.$player_name.'</strong> has been undeleted.</td></tr>          </table>        </div>  </table></div></td></tr><br><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
						}
						else
							$delete_errors[] = 'This character is online.';
					}
					else
						$delete_errors[] = 'Character <strong>'.$player_name.'</strong> is not on your account.';
				}
				else
					$delete_errors[] = 'Character with this name doesn\'t exist.';
			}
			else
				$delete_errors[] = 'Name contain illegal characters.';
		}
	}
	//## CREATE CHARACTER on account ###
	if($action == "createcharacter")
	{
		if(count($config['site']['worlds']) > 1)
		{
			if(isset($_REQUEST['world']))
				$world_id = (int) $_REQUEST['world'];
		}
		else
			$world_id = 0;
		if(!isset($world_id))
		{
			$main_content .= '<h3><center>Before you can create character you must select world:</center></h3><br />';
			foreach($config['site']['worlds'] as $id => $world_n)
				$main_content .= '<h4><a href="?subtopic=accountmanagement&action=createcharacter&world='.$id.'">'.$world_n.'</a></h4>';
        $main_content .= '<center><form action="?subtopic=accountmanagement" METHOD=post><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></form></center>';
		}
		else
		{
			$main_content .= '<script type="text/javascript">
				var nameHttp;
				function checkName()
				{
					if(document.getElementById("newcharname").value=="")
					{
						document.getElementById("name_check").innerHTML = \'<strong><font color="red">Please enter new character name.</font></strong>\';
						return;
					}
					nameHttp=GetXmlHttpObject();
					if (nameHttp==null)
					{
						return;
					}
					var newcharname = document.getElementById("newcharname").value;
					var url="ajax/check_name.php?name=" + newcharname + "&uid="+Math.random();
					nameHttp.onreadystatechange=NameStateChanged;
					nameHttp.open("GET",url,true);
					nameHttp.send(null);
				}
				function NameStateChanged()
				{
					if (nameHttp.readyState==4)
					{
						document.getElementById("name_check").innerHTML=nameHttp.responseText;
					}
				}
			</script>';
			$newchar_name = stripslashes(ucwords(strtolower(trim($_POST['newcharname']))));
			$newchar_sex = $_POST['newcharsex'];
			$newchar_vocation = $_POST['newcharvocation'];
			$newchar_town = $_POST['newchartown'];
			if($_POST['savecharacter'] != 1)
			{
				$main_content .= 'Please choose a name';
				if(count($config['site']['newchar_vocations'][$world_id]) > 1)
					$main_content .= ', vocation';
				$main_content .= ' and sex for your character. <br />In any case the name must not violate the naming conventions stated in the <a href="?subtopic=tibiarules" target="_blank" >'.$config['server']['serverName'].' Rules</a>, or your character might get deleted or name locked.';
				if($account_logged->getPlayersList()->count() >= $config['site']['max_players_per_account'])
					$main_content .= '<strong><font color="red"> You have maximum number of characters per account on your account. Delete one before you make new.</font></strong>';
				$main_content .= '<br /><br /><form action="?subtopic=accountmanagement&action=createcharacter" method="post" ><input type="hidden" name="world" value="'.$world_id.'" ><input type="hidden" name=savecharacter value="1" ><div class="TableContainer" >  <table class="Table3" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Create Character</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div><tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  <div class="TableContentContainer" ><table class="TableContent" width="100%" ><tr class="LabelH" ><td style="width:50%;" ><span >Name</td><td><span >Sex</td></tr><tr class="Odd" ><td><input id="newcharname" name="newcharname" onkeyup="checkName();" value="'.$newchar_name.'" size="30" maxlength="29" ><BR><font size="1" face="verdana,arial,helvetica"><div id="name_check">Please enter your character name.</div></font></td><td>';
				$main_content .= '<input type="radio" name="newcharsex" value="1" ';
				if($newchar_sex == 1)
					$main_content .= 'checked="checked" ';
				$main_content .= '>male<br />';
				$main_content .= '<input type="radio" name="newcharsex" value="0" ';
				if($newchar_sex == "0")
					$main_content .= 'checked="checked" ';
				$main_content .= '>female<br /></td></tr></table></div></div></table></div>';
				if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
					$main_content .= '<div class="InnerTableContainer" >          <table style="width:100%;" ><tr>';
				if(count($config['site']['newchar_vocations'][$world_id]) > 1)
				{
					$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><strong>Select your vocation:</strong></td><td><table class="TableContent" width="100%" >';
					foreach($config['site']['newchar_vocations'][$world_id] as $char_vocation_key => $sample_char)
					{
						$main_content .= '<tr><td><input type="radio" name="newcharvocation" value="'.$char_vocation_key.'" ';
						if($newchar_vocation == $char_vocation_key)
							$main_content .= 'checked="checked" ';
						$main_content .= '>'.$vocation_name[$world_id][0][$char_vocation_key].'</td></tr>';
					}
					$main_content .= '</table></table></td>';
				}
				if(count($config['site']['newchar_towns'][$world_id]) > 1)
				{
					$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><strong>Select your city:</strong></td><td><table class="TableContent" width="100%" >';
					foreach($config['site']['newchar_towns'][$world_id] as $town_id)
					{
						$main_content .= '<tr><td><input type="radio" name="newchartown" value="'.$town_id.'" ';
						if($newchar_town == $town_id)
							$main_content .= 'checked="checked" ';
						$main_content .= '>'.$towns_list[$world_id][$town_id].'</td></tr>';
					}
					$main_content .= '</table></table></td>';
				}
				if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
					$main_content .= '</tr></table></div>';
				$main_content .= '</table></div></td></tr><br /><table style="width:100%;" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
			}
			else
			{      
				if(strlen($newchar_name > 20))
					$newchar_errors[] = 'Character name can not be logner then 20 characters.';
				if(empty($newchar_name))
					$newchar_errors[] = 'Please enter a name for your character!';
				if(empty($newchar_sex) && $newchar_sex != "0")
					$newchar_errors[] = 'Please select the sex for your character!';
				if(count($config['site']['newchar_vocations'][$world_id]) > 1)
				{
					if(empty($newchar_vocation))
						$newchar_errors[] = 'Please select a vocation for your character.';
				}
				else
					$newchar_vocation = $config['site']['newchar_vocations'][$world_id][0];
				if(count($config['site']['newchar_towns'][$world_id]) > 1)
				{
					if(empty($newchar_town))
						$newchar_errors[] = 'Please select a town for your character.';
				}
				else
					$newchar_town = $config['site']['newchar_towns'][$world_id][0];
				if(empty($newchar_errors))
				{
					if(!check_name_new_char($newchar_name))
						$newchar_errors[] = 'This name contains invalid letters, words or format. Please use only a-Z, - , \' and space.';
					if($newchar_sex != 1 && $newchar_sex != "0")
						$newchar_errors[] = 'Sex must be equal <strong>0 (female)</strong> or <strong>1 (male)</strong>.';
					if(!in_array($newchar_town, $config['site']['newchar_towns'][$world_id]))
						$newchar_errors[] = 'Please select valid town.';
					if(count($config['site']['newchar_vocations'][$world_id]) > 1)
					{
						$newchar_vocation_check = FALSE;
						foreach($config['site']['newchar_vocations'][$world_id] as $char_vocation_key => $sample_char)
							if($newchar_vocation == $char_vocation_key)
								$newchar_vocation_check = TRUE;
						if(!$newchar_vocation_check)
							$newchar_errors[] = 'Unknown vocation. Please fill in form again.';
					}
					else
						$newchar_vocation = 0;
				}
				if(empty($newchar_errors))
				{
					$check_name_in_database = $ots->createObject('Player');
					$check_name_in_database->find($newchar_name);
					if($check_name_in_database->isLoaded())
						$newchar_errors[] .= 'This name is already used. Please choose another name!';
					$number_of_players_on_account = $account_logged->getPlayersList()->count();
					if($number_of_players_on_account >= $config['site']['max_players_per_account'])
						$newchar_errors[] .= 'You have too many characters on your account <strong>('.$number_of_players_on_account.'/'.$config['site']['max_players_per_account'].')</strong>!';
				}
				if(empty($newchar_errors))
				{
					$char_to_copy_name = $config['site']['newchar_vocations'][$world_id][$newchar_vocation];
					$char_to_copy = new OTS_Player();
					$char_to_copy->find($char_to_copy_name);
					if(!$char_to_copy->isLoaded())
						$newchar_errors[] .= 'Wrong characters configuration. Try again or contact with admin. ADMIN: Edit file config/config.php and set valid characters to copy names. Character to copy'.$char_to_copy_name.'</strong> doesn\'t exist.';
				}
				if(empty($newchar_errors))
				{
					if($newchar_sex == "0")
						$char_to_copy->setLookType(136);
					$player = $ots->createObject('Player');
					$player->setName($newchar_name);
					$player->setAccount($account_logged);
					$player->setGroup($char_to_copy->getGroup());
					$player->setSex($newchar_sex);
					$player->setVocation($char_to_copy->getVocation());
					$player->setConditions($char_to_copy->getConditions());
					$player->setRank($char_to_copy->getRank());
					$player->setLookAddons($char_to_copy->getLookAddons());
					$player->setTownId($newchar_town);
					$player->setExperience($char_to_copy->getExperience());
					$player->setLevel($char_to_copy->getLevel());
					$player->setMagLevel($char_to_copy->getMagLevel());
					$player->setHealth($char_to_copy->getHealth());
					$player->setHealthMax($char_to_copy->getHealthMax());
					$player->setMana($char_to_copy->getMana());
					$player->setManaMax($char_to_copy->getManaMax());
					$player->setManaSpent($char_to_copy->getManaSpent());
					$player->setSoul($char_to_copy->getSoul());
					$player->setDirection($char_to_copy->getDirection());
					$player->setLookBody($char_to_copy->getLookBody());
					$player->setLookFeet($char_to_copy->getLookFeet());
					$player->setLookHead($char_to_copy->getLookHead());
					$player->setLookLegs($char_to_copy->getLookLegs());
					$player->setLookType($char_to_copy->getLookType());
					$player->setCap($char_to_copy->getCap());
					$player->setPosX(0);
					$player->setPosY(0);
					$player->setPosZ(0);
					$player->setLossExperience($char_to_copy->getLossExperience());
					$player->setLossMana($char_to_copy->getLossMana());
					$player->setLossSkills($char_to_copy->getLossSkills());
					$player->setLossItems($char_to_copy->getLossItems());
					$player->save();
					unset($player);
					$player = $ots->createObject('Player');
					$player->find($newchar_name);
					if($player->isLoaded())
					{
						$player->setCustomField('world_id', (int) $world_id);
						$player->setSkill(0,$char_to_copy->getSkill(0));
						$player->setSkill(1,$char_to_copy->getSkill(1));
						$player->setSkill(2,$char_to_copy->getSkill(2));
						$player->setSkill(3,$char_to_copy->getSkill(3));
						$player->setSkill(4,$char_to_copy->getSkill(4));
						$player->setSkill(5,$char_to_copy->getSkill(5));
						$player->setSkill(6,$char_to_copy->getSkill(6));
						$player->save();
						$loaded_items_to_copy = $SQL->query("SELECT * FROM player_items WHERE player_id = ".$char_to_copy->getId()."");
						foreach($loaded_items_to_copy as $save_item)
							$SQL->query("INSERT INTO `player_items` (`player_id` ,`pid` ,`sid` ,`itemtype`, `count`, `attributes`) VALUES ('".$player->getId()."', '".$save_item['pid']."', '".$save_item['sid']."', '".$save_item['itemtype']."', '".$save_item['count']."', '".$save_item['attributes']."');");
						$main_content .= '<div class="TableContainer" >  <table class="Table1" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" >        <span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <div class="Text" >Character Created</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span>        <span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span>        <span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>        <span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span>      </div>    </div>    <tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td>The character <strong>'.$newchar_name.'</strong> has been created.<br />Please select the outfit when you log in for the first time.<br /><br /><strong>See you on '.$config['server']['serverName'].'!</strong></td></tr>          </table>        </div>  </table></div></td></tr><br /><center><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></center>';
					}
					else
					{
						echo "Error. Can\'t create character. Probably problem with database. Try again or contact with admin.";
						exit;
					}
				}
				else
				{
					$main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><strong>The Following Errors Have Occurred:</strong><br />';
					foreach($newchar_errors as $newchar_error)
						$main_content .= '<li>'.$newchar_error;
					$main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br />';
					$main_content .= 'Please choose a name';
					if(count($config['site']['newchar_vocations'][$world_id]) > 1)
						$main_content .= ', vocation';
					$main_content .= ' and sex for your character. <br />In any case the name must not violate the naming conventions stated in the <a href="?subtopic=tibiarules" target="_blank" >'.$config['server']['serverName'].' Rules</a>, or your character might get deleted or name locked.<br /><br /><form action="?subtopic=accountmanagement&action=createcharacter" method="post" ><input type="hidden" name="world" value="'.$world_id.'" ><input type="hidden" name=savecharacter value="1" ><div class="TableContainer" >  <table class="Table3" cellpadding="0" cellspacing="0" >    <div class="CaptionContainer" >      <div class="CaptionInnerContainer" ><span class="CaptionEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionBorderTop" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><div class="Text" >Create Character</div>        <span class="CaptionVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></span><span class="CaptionBorderBottom" style="background-image:url('.$layout_name.'/images/content/table-headline-border.gif);" ></span><span class="CaptionEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span><span class="CaptionEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></span></div>    </div><tr>      <td>        <div class="InnerTableContainer" >          <table style="width:100%;" ><tr><td><div class="TableShadowContainerRightTop" >  <div class="TableShadowRightTop" style="background-image:url('.$layout_name.'/images/content/table-shadow-rt.gif);" ></div></div><div class="TableContentAndRightShadow" style="background-image:url('.$layout_name.'/images/content/table-shadow-rm.gif);" >  <div class="TableContentContainer" ><table class="TableContent" width="100%" ><tr class="LabelH" ><td style="width:50%;" ><span >Name</td><td><span >Sex</td></tr><tr class="Odd" ><td><input id="newcharname" name="newcharname" onkeyup="checkName();" value="'.$newchar_name.'" size="30" maxlength="29" ><BR><font size="1" face="verdana,arial,helvetica"><div id="name_check">Please enter your character name.</div></font></td><td>';
					$main_content .= '<input type="radio" name="newcharsex" value="1" ';
					if($newchar_sex == 1)
						$main_content .= 'checked="checked" ';
					$main_content .= '>male<br />';
					$main_content .= '<input type="radio" name="newcharsex" value="0" ';
					if($newchar_sex == "0")
						$main_content .= 'checked="checked" ';
					$main_content .= '>female<br /></td></tr></table></div></div></table></div>';
					if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
						$main_content .= '<div class="InnerTableContainer" >          <table style="width:100%;" ><tr>';
					if(count($config['site']['newchar_vocations'][$world_id]) > 1)
					{
						$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><strong>Select your vocation:</strong></td><td><table class="TableContent" width="100%" >';
						foreach($config['site']['newchar_vocations'][$world_id] as $char_vocation_key => $sample_char)
						{
							$main_content .= '<tr><td><input type="radio" name="newcharvocation" value="'.$char_vocation_key.'" ';
							if($newchar_vocation == $char_vocation_key)
								$main_content .= 'checked="checked" ';
							$main_content .= '>'.$vocation_name[$world_id][0][$char_vocation_key].'</td></tr>';
						}
						$main_content .= '</table></table></td>';
					}
					if(count($config['site']['newchar_towns'][$world_id]) > 1)
					{
						$main_content .= '<td><table class="TableContent" width="100%" ><tr class="Odd" valign="top"><td width="160"><br /><strong>Select your city:</strong></td><td><table class="TableContent" width="100%" >';
						foreach($config['site']['newchar_towns'][$world_id] as $town_id)
						{
							$main_content .= '<tr><td><input type="radio" name="newchartown" value="'.$town_id.'" ';
							if($newchar_town == $town_id)
								$main_content .= 'checked="checked" ';
							$main_content .= '>'.$towns_list[$world_id][$town_id].'</td></tr>';
						}
						$main_content .= '</table></table></td>';
					}
					if(count($config['site']['newchar_towns'][$world_id]) > 1 || count($config['site']['newchar_vocations'][$world_id]) > 1)
						$main_content .= '</tr></table></div>';
					$main_content .= '</table></div></td></tr><br /><table style="width:100%;" ><tr align="center" ><td><table border="0" cellspacing="0" cellpadding="0" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Submit" alt="Submit" src="'.$layout_name.'/images/buttons/_sbutton_submit.gif" ></div></div></td><tr></form></table></td><td><table border="0" cellspacing="0" cellpadding="0" ><form action="?subtopic=accountmanagement" method="post" ><tr><td style="border:0px;" ><div class="BigButton" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif)" ><div onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" ><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);" ></div><input class="ButtonText" type="image" name="Back" alt="Back" src="'.$layout_name.'/images/buttons/_sbutton_back.gif" ></div></div></td></tr></form></table></td></tr></table>';
				}
			}
		}
	}
}
?>