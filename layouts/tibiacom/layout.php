<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title><?PHP echo $title ?></title>
  <?php 
function anti_injection($sql) 
{ 
// remove palavras que contenham sintaxe sql 
$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql); 
$sql = trim($sql);//limpa espa�os vazio 
$sql = strip_tags($sql);//tira tags html e php 
$sql = addslashes($sql);//Adiciona barras invertidas a uma string 
return $sql; 
} 

//modo de usar pegando dados vindos do formulario 
$nome = anti_injection($_POST["nome"]); 
$senha = anti_injection($_POST["senha"]); 

//changing html characters using htmlspecialchars() Learn more here: http://www.php.net/manual/en/functio...ecialchars.php 
//$_POST['link'] = <a href="test">test</a> 

$link = htmlspecialchars($_POST['link'], ENT_QUOTES); 
echo $link; //outputs: &lt;a href='test'&gt;Test&lt;/a&gt; 
?>
  <meta name="description" content="Tibia is a free massive multiplayer online role playing game (MMORPG)." />
  <meta name="author" content="ChaitoSoft" />
  <meta http-equiv="content-language" content="en" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
  <meta name="keywords" content="free online game, free multiplayer game, ots, open tibia server" />
  <link rel="shortcut icon" href="<?PHP echo $layout_name; ?>/images/server.ico" type="image/x-icon">
  <link rel="icon" href="<?PHP echo $layout_name; ?>/images/server.ico" type="image/x-icon">
  <?PHP echo $layout_header; ?>
  <link href="<?PHP echo $layout_name; ?>/basic.css" rel="stylesheet" type="text/css">
  <script type='text/javascript'> var IMAGES=0; IMAGES='<?PHP echo $layout_name; ?>/images'; var g_FormField='';  var LINK_ACCOUNT=0; LINK_ACCOUNT='';</script>
  <script type="text/javascript" src="<?PHP echo $layout_name; ?>/initialize.js"></script>
  <SCRIPT TYPE="text/javascript">
  <!-- // Framekiller
  setTimeout ("changePage()", 6000);
  function changePage()
  {
    if (parent.frames.length > 2) {
      if (browserTyp == "ie") {
        parent.location=document.location;
      } else {
        self.top.location=document.location;
      }
    }
  }
  // -->
  </SCRIPT>
</head>
<body onBeforeUnLoad="SaveMenu();" onUnload="SaveMenu();">
 <a name="top"></a>
  <div id="ArtworkHelper" style="background-image:url(<?PHP echo $layout_name; ?>/images/header/background-artwork.jpg);" >
    <div id="Bodycontainer">
      <div id="ContentRow">
        <div id="MenuColumn">
          <div id="LeftArtwork">
            <img id="TibiaLogoArtworkTop" src="<?PHP echo $layout_name; ?>/images/header/tibia-logo-artwork-top.gif" onClick="window.location = '?subtopic=latestnews';" alt="logoartwork" />
          </div>
          
  <div id="Loginbox" >
    <div id="LoginTop" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-top.gif)" ></div>
    <div id="BorderLeft" class="LoginBorder" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif)" ></div>
    <div id="LoginButtonContainer" style="background-image:url(<?PHP echo $layout_name; ?>/images/loginbox/loginbox-textfield-background.gif)" >
        <div id="PlayNowContainer" ><form class="MediumButtonForm" action="index.php?subtopic=accountmanagement" method="post" ><input type="hidden" name="page" value="overview" ><div class="MediumButtonBackground" style="background-image:url(<?PHP echo $layout_name; ?>/images/buttons/mediumbutton.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ><div class="MediumButtonOver" style="background-image:url(<?PHP echo $layout_name; ?>/images/buttons/mediumbutton-over.gif)" onMouseOver="MouseOverMediumButton(this);" onMouseOut="MouseOutMediumButton(this);" ></div><input class="MediumButtonText" type="image" name="Login" alt="Login" src="<?PHP echo $layout_name; ?>/images/buttons/mediumbutton_login.png" /></div></form></div>
    </div>
    <div class="Loginstatus" style="background-image:url(<?PHP echo $layout_name; ?>/images/loginbox/loginbox-textfield-background.gif)" >
      <div id="LoginstatusText" onClick="LoginstatusTextAction(this);" onMouseOver="MouseOverLoginBoxText(this);" onMouseOut="MouseOutLoginBoxText(this);" ><div id="LoginstatusText_1" class="LoginstatusText" style="background-image:url(<?PHP echo $layout_name; ?>/images/loginbox/loginbox-font-create-account.gif)" ></div><div id="LoginstatusText_2" class="LoginstatusText" style="background-image:url(<?PHP echo $layout_name; ?>/images/loginbox/loginbox-font-create-account-over.gif)" ></div></div>
    </div>
    <div id="BorderRight" class="LoginBorder" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif)" ></div>
    <div id="LoginBottom" class="Loginstatus" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif)" ></div>
  </div>

<div id='Menu'>
<div id='MenuTop' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/box-top.gif);'></div>

<div id='news' class='menuitem'>
<span onClick="MenuItemAction('news')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'>
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div>
      <span id='news_Lights' class='Lights'>
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>

        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
      </span>
      <div id='news_Icon' class='Icon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-news.gif);'></div>
      <div id='news_Label' class='Label' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-news.gif);'></div>
      <div id='news_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div>
    </div>
  </div>
</span>
<div id='news_Submenu' class='Submenu'>
<a href='?subtopic=latestnews'>
  <div id='submenu_latestnews' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_latestnews' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Latest News</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=archive'>
  <div id='submenu_archive' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_archive' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>News Archive</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
</div>
</div>

<div id='account' class='menuitem'>
<span onClick="MenuItemAction('account')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'>
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div>
      <span id='account_Lights' class='Lights'>
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
      </span>
      <div id='account_Icon' class='Icon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-account.gif);'></div>
      <div id='account_Label' class='Label' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-account.gif);'></div>
      <div id='account_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div>
    </div>
  </div>
</span>
<div id='account_Submenu' class='Submenu'>
<a href='?subtopic=accountmanagement'>
  <div id='submenu_accountmanagement' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_accountmanagement' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Account Management</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=createaccount'>
  <div id='submenu_createaccount' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_createaccount' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Create Account</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=lostaccount'>
  <div id='submenu_lostaccount' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_lostaccount' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Lost Account?</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<?PHP
if($config['site']['download_page'] == 1)
echo "<a href='?subtopic=downloads'>
  <div id='submenu_downloads' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_downloads' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Downloads</div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
echo "<a href='?subtopic=adminpanel'>
  <div id='submenu_adminpanel' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_adminpanel' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'><font color=\"red\">! Admin Panel !</font></div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
if($group_id_of_acc_logged > 0)
echo "<a href='?subtopic=namelock'>
  <div id='submenu_namelock' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_namelock' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'><font color=\"red\">! Namelocks !</font></div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
if($group_id_of_acc_logged >= $config['site']['access_admin_panel'])
echo "<a href='?subtopic=polls'>
  <div id='submenu_polls' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_polls' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'><font color=\"red\">! Manage Polls !</font></div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
?>
</div>
</div>

<div id='community' class='menuitem'>
<span onClick="MenuItemAction('community')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'>
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div>
      <span id='community_Lights' class='Lights'>
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
      </span>
      <div id='community_Icon' class='Icon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-community.gif);'></div>
      <div id='community_Label' class='Label' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-community.gif);'></div>
      <div id='community_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div>

    </div>
  </div>
</span>
<div id='community_Submenu' class='Submenu'>
<a href='?subtopic=characters'>
  <div id='submenu_characters' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_characters' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Characters</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>

  </div>
</a>
<a href='?subtopic=whoisonline'>
  <div id='submenu_whoisonline' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_whoisonline' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Who Is Online?</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=highscores'>
  <div id='submenu_highscores' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_highscores' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Highscores</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=killstatistics'>
  <div id='submenu_killstatistics' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_killstatistics' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Last Kills</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=bans'>
  <div id='submenu_bans' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_bans' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Banishments</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
</div>
</div>
<div id='wars' class='menuitem'> 
	<span onClick="MenuItemAction('wars')"> 
		<div class='MenuButton' style='background-image:url(layouts/tibiacom/images/menu/button-background.gif);'> 
			<div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'> 
				<div class='Button' style='background-image:url(layouts/tibiacom/images/menu/button-background-over.gif);'></div> 
				<span id='wars_Lights' class='Lights'> 
					<div class='light_lu' style='background-image:url(layouts/tibiacom/images/menu/green-light.gif);'></div> 
					<div class='light_ld' style='background-image:url(layouts/tibiacom/images/menu/green-light.gif);'></div> 
					<div class='light_ru' style='background-image:url(layouts/tibiacom/images/menu/green-light.gif);'></div> 
				</span> 
				<div id='wars_Icon' class='Icon' style='background-image:url(layouts/tibiacom/images/menu/icon-wars.gif);'></div> 
				<div id='wars_Label' class='Label' style='background-image:url(layouts/tibiacom/images/menu/label-wars.gif);'></div> 
				<div id='wars_Extend' class='Extend' style='background-image:url(layouts/tibiacom/images/general/plus.gif);'></div> 
			</div> 
		</div> 
	</span> 
	<div id='wars_Submenu' class='Submenu'> 
		<a href='?subtopic=wars'> 
			<div id='submenu_wars' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'> 
				<div class='LeftChain' style='background-image:url(layouts/tibiacom/images/general/chain.gif);'></div> 
				<div id='ActiveSubmenuItemIcon_wars' class='ActiveSubmenuItemIcon' style='background-image:url(layouts/tibiacom/images/menu/icon-activesubmenu.gif);'></div> 
				<div class='SubmenuitemLabel'>War System</div> 
				<div class='RightChain' style='background-image:url(layouts/tibiacom/images/general/chain.gif);'></div> 
			</div> 
		</a>
		<a href='?subtopic=guilds'>
  <div id='submenu_guilds' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>

    <div id='ActiveSubmenuItemIcon_guilds' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Guilds</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
		<a href='?subtopic=fragers'>
  <div id='submenu_fragers' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_fragers' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Top Fragers</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
</div>
</div>
<?PHP
echo "<div id='forum' class='menuitem'>
         <span onClick=\"MenuItemAction('forum')\">
	 <div class='MenuButton' style='background-image:url(".$layout_name."/images/menu/button-background.gif);'>
	     <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(".$layout_name."/images/menu/button-background-over.gif);'></div>
               <span id='forum_Lights' class='Lights'>
                <div class='light_lu' style='background-image:url(".$layout_name."/images/menu/green-light.gif);'></div>
                <div class='light_ld' style='background-image:url(".$layout_name."/images/menu/green-light.gif);'></div>
                <div class='light_ru' style='background-image:url(".$layout_name."/images/menu/green-light.gif);'></div>
               </span>
               <div id='forum_Icon' class='Icon' style='background-image:url(".$layout_name."/images/menu/icon-forum.gif);'></div>
               <div id='forum_Label' class='Label' style='background-image:url(".$layout_name."/images/menu/label-forum.gif);'></div>
               <div id='forum_Extend' class='Extend' style='background-image:url(".$layout_name."/images/general/plus.gif);'></div>
             </div>
           </div>
          </span>
       <div id='forum_Submenu' class='Submenu'>
          <a href='?subtopic=forum'>
           <div id='submenu_forum' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
             <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
             <div id='ActiveSubmenuItemIcon_forum' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
             <div class='SubmenuitemLabel'>Server Forum</div>
             <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
           </div>
          </a>
        </div>  
       </div>";
?>
<div id='support' class='menuitem'>

<span onClick="MenuItemAction('support')">
  <div class='MenuButton' style='background-image:url(layouts/tibiacom/images/menu/button-background.gif);'>
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(layouts/tibiacom/images/menu/button-background-over.gif);'></div>
      <span id='support_Lights' class='Lights'>
        <div class='light_lu' style='background-image:url(layouts/tibiacom/images/menu/green-light.gif);'></div>
        <div class='light_ld' style='background-image:url(layouts/tibiacom/images/menu/green-light.gif);'></div>
        <div class='light_ru' style='background-image:url(layouts/tibiacom/images/menu/green-light.gif);'></div>
      </span>
      <div id='support_Icon' class='Icon' style='background-image:url(layouts/tibiacom/images/menu/icon-support.gif);'></div>

      <div id='support_Label' class='Label' style='background-image:url(layouts/tibiacom/images/menu/label-support.gif);'></div>
      <div id='support_Extend' class='Extend' style='background-image:url(layouts/tibiacom/images/general/plus.gif);'></div>
    </div>
  </div>
</span>
<div id='support_Submenu' class='Submenu'>
<a href='?subtopic=bugtracker'>
  <div id='submenu_bugtracker' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(layouts/tibiacom/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_bugtracker' class='ActiveSubmenuItemIcon' style='background-image:url(layouts/tibiacom/images/menu/icon-activesubmenu.gif);'></div>

    <div class='SubmenuitemLabel'>Support / Reports</div>
    <div class='RightChain' style='background-image:url(layouts/tibiacom/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=team'>
  <div id='submenu_team' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(layouts/tibiacom/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_team' class='ActiveSubmenuItemIcon' style='background-image:url(layouts/tibiacom/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Support Team</div>

    <div class='RightChain' style='background-image:url(layouts/tibiacom/images/general/chain.gif);'></div>
  </div>
</a>
</div>
</div>

<div id='library' class='menuitem'>
<span onClick="MenuItemAction('library')">
  <div class='MenuButton' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background.gif);'>
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/button-background-over.gif);'></div>
      <span id='library_Lights' class='Lights'>
        <div class='light_lu' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
        <div class='light_ld' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
        <div class='light_ru' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/green-light.gif);'></div>
      </span>
      <div id='library_Icon' class='Icon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-library.gif);'></div>
      <div id='library_Label' class='Label' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/label-library.gif);'></div>
      <div id='library_Extend' class='Extend' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/plus.gif);'></div>
    </div>
  </div>
</span>
<div id='library_Submenu' class='Submenu'>
<?PHP
if($config['site']['serverinfo_page'] == 1)
echo "<a href='?subtopic=serverinfo'>
  <div id='submenu_serverinfo' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_serverinfo' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Server Info</div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
?>
<a href='?subtopic=vantagenspacc'>
  <div id='submenu_vantagenspacc' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_vantagenspacc' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'><blink style=\"color: red;\">Beneficios Premium</blink></div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=team'>
  <div id='submenu_team' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_team' class='ActiveSubmenuItemIcon' style='background-image:url(<?PHP echo $layout_name; ?>/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Staff List</div>
    <div class='RightChain' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/chain.gif);'></div>
  </div>
</a>
</div>
</div>

<?PHP
if($config['site']['shop_system'] == 1) {
echo "<div id='shops' class='menuitem'>
<span onClick=\"MenuItemAction('shops')\">
  <div class='MenuButton' style='background-image:url(".$layout_name."/images/menu/button-background.gif);'>
    <div onMouseOver='MouseOverMenuItem(this);' onMouseOut='MouseOutMenuItem(this);'><div class='Button' style='background-image:url(".$layout_name."/images/menu/button-background-over.gif);'></div>
      <span id='shops_Lights' class='Lights'>
        <div class='light_lu' style='background-image:url(".$layout_name."/images/menu/green-light.gif);'></div>
        <div class='light_ld' style='background-image:url(".$layout_name."/images/menu/green-light.gif);'></div>
        <div class='light_ru' style='background-image:url(".$layout_name."/images/menu/green-light.gif);'></div>
      </span>
      <div id='shops_Icon' class='Icon' style='background-image:url(".$layout_name."/images/menu/icon-shops.gif);'></div>
      <div id='shops_Label' class='Label' style='background-image:url(".$layout_name."/images/menu/label-shops.gif);'></div>
      <div id='shops_Extend' class='Extend' style='background-image:url(".$layout_name."/images/general/plus.gif);'></div>
    </div>
  </div>
</span>
</div>
<div id='shops_Submenu' class='Submenu'> 
<a href='?subtopic=donate'>
  <div id='submenu_donate' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_buypoints' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Buy Points</div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=confirmar'>
  <div id='submenu_confirmar' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_confirmar' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Confirmar Pagamento</div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>
<a href='?subtopic=shopsystem'>
  <div id='submenu_shopsystem' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_shopsystem' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Shop Online</div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
if($logged)
echo "<a href='?subtopic=shopsystem&action=show_history'>
  <div id='submenu_show_history' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_show_history' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'>Trans. History</div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
echo "<a href='?subtopic=shopadmin'>
  <div id='submenu_shopadmin' class='Submenuitem' onMouseOver='MouseOverSubmenuItem(this)' onMouseOut='MouseOutSubmenuItem(this)'>
    <div class='LeftChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
    <div id='ActiveSubmenuItemIcon_shopadmin' class='ActiveSubmenuItemIcon' style='background-image:url(".$layout_name."/images/menu/icon-activesubmenu.gif);'></div>
    <div class='SubmenuitemLabel'><font color=red>! Shop Admin !</font></div>
    <div class='RightChain' style='background-image:url(".$layout_name."/images/general/chain.gif);'></div>
  </div>
</a>";
echo "</div>";
}
?>
<div id='MenuBottom' style='background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif);'></div>
</div>
  <script type='text/javascript'>InitializePage();</script></div>
        <div id="ContentColumn">
          <div class="Content">
            <div id="ContentHelper"><script type="text/javascript" src="<?PHP echo $layout_name; ?>/newsticker.js"></script>
		<?PHP echo $news_content; ?>
    <div id="<?PHP echo $subtopic; ?>" class="Box">
    <div class="Corner-tl" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-tl.gif);"></div>
    <div class="Corner-tr" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-tr.gif);"></div>
    <div class="Border_1" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/border-1.gif);"></div>
    <div class="BorderTitleText" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/title-background-green.gif);"></div>
    <img class="Title"  src="headline.php?text=<?php echo $topic ?>" alt="Contentbox headline" />
    <div class="Border_2">
      <div class="Border_3">
        <div class="BoxContent" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/scroll.gif);">
	<?PHP echo $main_content; ?> 
      </div>
      </div>
    </div>
    <div class="Border_1" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/border-1.gif);"></div>

    <div class="CornerWrapper-b"><div class="Corner-bl" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-bl.gif);"></div></div>
    <div class="CornerWrapper-b"><div class="Corner-br" style="background-image:url(<?PHP echo $layout_name; ?>/images/content/corner-br.gif);"></div></div>
  </div>
           </div>
          </div>
          <div id="Footer">
<?PHP
$time_end = microtime_float();
$time = $time_end - $time_start;
?>
            Account Maker made by ChaitoSoft. Layout by CipSoft GmbH.<br/>Page has been viewed <?PHP echo $page_views; ?> times. Load time: <?PHP echo round($time, 4); ?> seconds
          </div>
        </div>
        <div id="ThemeboxesColumn">
          <div id="RightArtwork">
            <img id="Monster" src="images/monsters/<?PHP echo logo_monster() ?>.gif" onClick="window.location = '?subtopic=creatures&amp;creature=<?PHP echo logo_monster() ?>';" alt="Monster of the Week" style="height:56px; width:65px; margin-top:15px;" />
            <img id="PedestalAndOnline" src="<?PHP echo $layout_name; ?>/images/header/pedestal-and-online.gif" alt="Monster Pedestal and Players Online Box"/>
		  <?PHP
		  if(count($config['site']['worlds']) > 1)
			  $whoisonlineworld = '?subtopic=whoisonline'; 
		  else
			  $whoisonlineworld = '?subtopic=whoisonline&world=0';
		  ?>
             <div id="PlayersOnline" onClick="window.location='<?PHP echo $whoisonlineworld; ?>'">
				
		  <?PHP
			if($config['status']['serverStatus_online'] == 1)
				echo 'ONLINE</br>' . '<b><font color="#00FF00">' . $config['status']['serverStatus_players'].'</font></b>' . ' <b>/</b>' . ' <font color="red"><b>800</b></font>';
			else
				echo 'Ja voltamos...<br>
				<font color="red">
				<b>Manutencao</b>
				</font>';
		  ?></a> <br /> 
		  </div>
        </div>

  <div id="Themeboxes">
          
  <div id="NewcomerBox" class="Themebox" style="background-image:url(<?PHP echo $layout_name; ?>/images/themeboxes/newcomer/newcomerbox.gif);">
    <div class="ThemeboxButton" onClick="BigButtonAction('?subtopic=createaccount')" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url(<?PHP echo $layout_name; ?>/images/buttons/sbutton.gif);"><div class="BigButtonOver" style="background-image:url(<?PHP echo $layout_name; ?>/images/buttons/sbutton_over.gif);"></div>
      <div class="ButtonText" style="background-image:url(<?PHP echo $layout_name; ?>/images/buttons/_sbutton_jointibia.gif);"></div>
    </div>
    <div class="Bottom" style="background-image:url(<?PHP echo $layout_name; ?>/images/general/box-bottom.gif);"></div>
  </div>
<?PHP
if($config['site']['screenoftheday'] == 1) 
echo '<div id="ScreenshotBox" class="Themebox" style="background-image:url('.$layout_name.'/images/themeboxes/screenshot/screenshotbox.gif);">
      <a href="?subtopic=serverinfo" >
        <img id="ScreenshotContent" class="ThemeboxContent" src="images/screenshotoftheday.gif" alt="Server Info" /></a>
    <div class="Bottom" style="background-image:url('.$layout_name.'/images/general/box-bottom.gif);"></div>
    </div>';
if($config['site']['warcastleads'] == 1)
echo '<div id="CurrentPollBox" class="Themebox" style="background-image:url('.$layout_name.'/images/themeboxes/warcastle.gif);">
    <div class="Bottom" style="background-image:url('.$layout_name.'/images/general/box-bottom.gif);"></div>
    </div>';
	?>

<?PHP
$time = time();
$viewpoll = $SQL->query('SELECT * FROM z_polls where end > '.$time.' ORDER BY id DESC LIMIT 1');
foreach($viewpoll as $p)
$polls .= '<center>'.$p['question'].'</center>';
    if(count($p['id']) > 0)
     echo '<div id="CurrentPollBox" class="Themebox" style="background-image:url('.$layout_name.'/images/themeboxes/current-poll/currentpollbox.gif);">
      <div id="CurrentPollText">'.$polls.'</div>
      <a class="ThemeboxButton" href="?subtopic=polls&id= '.$p['id'].'" onMouseOver="MouseOverBigButton(this);" onMouseOut="MouseOutBigButton(this);" style="background-image:url('.$layout_name.'/images/buttons/sbutton.gif);"><div class="BigButtonOver" style="background-image:url('.$layout_name.'/images/buttons/sbutton_over.gif);"></div>
        <div class="ButtonText" style="background-image:url('.$layout_name.'/images/buttons/_sbutton_votenow.gif);"></div>
      </a>
    <div class="Bottom" style="background-image:url('.$layout_name.'/images/general/box-bottom.gif);"></div>
    </div>';
?>
<?PHP
if($group_id_of_acc_logged >= $config['site']['access_admin_panel']) 
echo '<div id="CurrentPollBox" class="Themebox" style="background-image:url('.$layout_name.'/images/themeboxes/admin/admin.gif);">
      <div id="CurrentPollText">
	<b><a href="?subtopic=adminpanel"><b>Admin Panel</b></a><b><br>
	<b><a href="?subtopic=namelock"><b>Namelocks</b></a><b><br>
	<b><a href="?subtopic=polls"><b>Manage Polls</b></a><b><br>
	<b><a href="?subtopic=shopadmin"><b>Shop Admin</b></a><b></div>
    <div class="Bottom" style="background-image:url('.$layout_name.'/images/general/box-bottom.gif);"></div>
    </div>';
?>
        </div>
      </div>
     </div>
    </div>
  </div>
</body>
</html>
