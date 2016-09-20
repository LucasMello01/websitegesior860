<?PHP 
$name = stripslashes(ucwords(strtolower(trim($_REQUEST['name'])))); 
if(empty($name)) { 
    $main_content .= 'Here you can get detailed information about a certain player on '.$config['server']['serverName'].'.<BR>  <FORM ACTION="?subtopic=characters&action=match" METHOD=post><TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=4><TR><TD BGCOLOR="'.$config['site']['vdarkborder'].'" CLASS=white><B>Search Character</B></TD></TR><TR><TD BGCOLOR="'.$config['site']['darkborder'].'"><TABLE BORDER=0 CELLPADDING=1><TR><TD>Name:</TD><TD><INPUT NAME="name" VALUE=""SIZE=29 MAXLENGTH=29></TD><TD><INPUT TYPE=image NAME="Submit" SRC="'.$layout_name.'/images/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></TABLE></TD></TR></TABLE></FORM>'; 
} 
else if($_REQUEST['action'] == "match")  
    { 
    $data = $SQL->query("SELECT * FROM players WHERE name LIKE '%".$name."%'");  
    $main_content .= '<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 WIDTH=100%><TR><TD><IMG SRC="'.$layout_name.'/images/general/blank.gif" WIDTH=10 HEIGHT=1 BORDER=0></TD><TD><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Matches Found - </B>Keyword(s): '.$name.'</TD></TR>'; 
    foreach($data as $r)  
        {  
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD><a href="?subtopic=characters&name='.urlencode($r['name']).'"><b>'.$r['name'].'</b></a></TD><TD> ['.$r['level'].']'.'</TD></TR>'; 
        } 
            $main_content .= '</TD></TR></TABLE></TABLE>';  
    }  
else 
{ 
    if(check_name($name)) { 
        $player = $ots->createObject('Player'); 
        $player->find($name); 
        if($player->isLoaded()) { 
            $account = $player->getAccount(); 
            $main_content .= '<TABLE border=0 cellpadding=0 width=100%><td VALIGN=top><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Character Information</B></TD></TR>'; 
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD width=1><nobr>Name:</TD><TD><font color="'; 
            $main_content .= ($player->isOnline()) ? 'green' : 'red'; 
            $main_content .= '"><b>'.$player->getName().'</b></font>'; 
            if($player->isDeleted()) 
                $main_content .= '<font color="red"> [DELETED]</font>'; 
            if($player->isNameLocked()) 
                $main_content .= '<font color="red"> [NAMELOCK]</font>'; 
            $main_content .= '</TD></TR>'; 
            if($player->getOldName()) 
            { 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                if($player->isNameLocked()) 
                    $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Proposition:</TD><TD>'.$player->getOldName().'</TD></TR>'; 
                else 
                    $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Old name:</TD><TD>'.$player->getOldName().'</TD></TR>'; 
            } 
             
            // BEGIN Position Showing *** Fixed by jerryb1988 from otfans.net 
            $group = $player->getGroup(); 
            if ($group == 2){$group_name = 'Tutor';} 
            if ($group == 3){$group_name = 'Senior Tutor';} 
            if ($group == 4){$group_name = 'Gamemaster';} 
            if ($group == 5){$group_name = 'Community Manager';} 
            if ($group == 6){$group_name = 'GOD';} 

            if($group != 1) 
            { 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Position:</TD><TD>'.$group_name.'</TD></TR>'; 
            } 
            // END Position Showing 
             
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Sex:</TD><TD>'; 
            $main_content .= ($player->getSex() == 0) ? 'female' : 'male'; 
            $main_content .= '</TD></TR>'; 
            if($config['site']['show_marriage_info']) 
            { 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Marital status:</TD><TD>'; 
                $marriage = new OTS_Player(); 
                $marriage->load($player->getMarriage()); 
                if($marriage->isLoaded()) 
                    $main_content .= 'married to <a href="?subtopic=characters&name='.urlencode($marriage->getName()).'"><b>'.$marriage->getName().'</b></a></TD></TR>'; 
                else 
                    $main_content .= 'single</TD></TR>'; 
            } 
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Profession:</TD><TD>'.$vocation_name[$player->getWorld()][$player->getPromotion()][$player->getVocation()].'</TD></TR>'; 
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Level:</TD><TD>'.$player->getLevel().'</TD></TR>'; 
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>World:</TD><TD>'.$config['site']['worlds'][$player->getWorld()].'</TD></TR>'; 
            if(!empty($towns_list[$player->getWorld()][$player->getTownId()])) 
            { 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Residence:</TD><TD>'.$towns_list[$player->getWorld()][$player->getTownId()].'</TD></TR>'; 
            } 
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Balance:</TD><TD>'.$player->getBalance().' Gold Coins.</TD></TR>'; 

            $rank_of_player = $player->getRank(); 
            if(!empty($rank_of_player)) 
            { 
            $guild_id = $rank_of_player->getGuild()->getId(); 
            $guild_name = $rank_of_player->getGuild()->getName(); 
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD><NOBR>Guild Membership:</TD><TD>'.$rank_of_player->getName().' of the <a href="?subtopic=guilds&action=show&guild='.$guild_id.'">'.$guild_name.'</a></TD></TR>'; 
            } 
             
            if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            $lastlogin = $player->getLastLogin(); 
            if(empty($lastlogin)) 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD><NOBR>Char Last login:</TD><TD>Never logged in.</TD></TR>'; 
            else 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD><NOBR>Char Last login:</TD><TD>'.date("j F Y, g:i a", $lastlogin).'</TD></TR>'; 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
            if($config['site']['show_creationdate'] && $player->getCreated()) 
            { 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD><NOBR>Char Created:</TD><TD>'.date("j F Y, g:i a", $player->getCreated()).'</TD></TR>'; 
            } 
            if($config['site']['show_vip_status']) 
            { 
                   $id = $player->getCustomField("id"); 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                    $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Vip Status:</TD>'; 
                         $vip = $SQL->query('SELECT * FROM player_storage WHERE player_id = '.$id.' AND `key` = '.$config['site']['show_vip_storage'].';')->fetch(); 
                    if($vip == false) { 
                    $main_content .= '<TD><span class="red"><B>NOT VIP</B></TD></TR>'; 
                    } 
                    else 
                       { 
                       $main_content .= '<TD><span class="green"><B>VIP</B></TD></TR>'; 
                    } 
                     
            } 
            if($config['site']['show_health_information']) // Modified by Jerryb1988 from otfans.net 
            {     
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $playerhp = $player->getHealth(); 
                $playermaxhp = $player->getHealthMax(); 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><td>Health:</td><td>' .number_format($playerhp). '/' .number_format($playermaxhp). '<div style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: red; width: '.(($playerhp / $playermaxhp) * 100).'%; height: 3px;"></td></tr>'; 
            } 
            if($config['site']['show_mana_information']) // Modified by Jerryb1988 from otfans.net 
            {     
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $playermana = $player->getMana(); 
                $playermaxmana = $player->getManaMax(); 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><td>Mana:</td><td>' .number_format($playermana). '/' .number_format($playermaxmana). '<div style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: blue; width: '.(($playermana / $playermaxmana) * 100).'%; height: 3px;"></td></tr>'; 
            } 
            if($config['site']['show_exp_information']) // Modified by Jerryb1988 from otfans.net 
            {     
                // BEGIN *** Fixed EXP bar by Jerryb1988 from otfans.net 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 

                $currentlevel = $player->getLevel(); 
                $currentexp = $player->getExperience(); 
                $currentlevelexp = (50 * ($currentlevel - 1) * ($currentlevel - 1) * ($currentlevel - 1) - 150 * ($currentlevel - 1) * ($currentlevel - 1) + 400 * ($currentlevel - 1)) / 3; 
                $nextlevel = ($currentlevel + 1); 
                $nextlevelexp = (50 * ($currentlevel) * ($currentlevel) * ($currentlevel) - 150 * ($currentlevel) * ($currentlevel) + 400 * ($currentlevel)) / 3; 
                $leveldifference = ($nextlevelexp - $currentlevelexp); 
                $expremaining = ($nextlevelexp - $currentexp); 
                $partofcurrentexp = ($currentexp-$currentlevelexp); 
                $expbarpercentage = (($partofcurrentexp / $leveldifference)*100); 
                $togopercentage = (100 - $expbarpercentage); 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>EXP:</td><td> ' .number_format($currentexp).'/' .number_format($nextlevelexp).' ('.number_format($expbarpercentage,2).'%) *** '.number_format($expremaining).' EXP (' .number_format($togopercentage,2). '%) Remaining.<div title="'.number_format($expbarpercentage,2).'%" style="width: 100%; height: 3px; border: 1px solid #000;"><div style="background: red; width: '.number_format($expbarpercentage,2).'%; height: 3px;"></td></tr>'; 
                 
                // END *** Fixed EXP bar by Jerryb1988 from otfans.net 
            } 

            //Outfit shower by Pening edited by loleslav 
            // ** ADDED GM/CM/GOD outfits by Jerryb1988 from otfans.net 
            if($config['site']['show_outfit']) { 
                $id = $player->getCustomField("id"); 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $main_content .= '<TD BGCOLOR="'.$bgcolor.'">Outfit:'; 
                $listaddon = array('75','128','129','130','131','132','133','134','135','136','137','138','139','140','141','142','143','144','145','146','147','148','149','150','151','152','153','154','155','158','159','251','252','266','268','269','270','273','278','279','288','289','302','324','325'); 
                $lookadd = array('0','1','2','3'); 
                foreach ($listaddon as $pid => $name) 
                    foreach ($lookadd as $addo => $name) { 
                        $addon1 = $SQL->query('SELECT * FROM players WHERE id = '.$id.' AND looktype = '.$listaddon[$pid].' AND lookaddons = '.$lookadd[$addo].';')->fetch(); 
                        if($addon1[looktype] == true ) { 
                            $finaddon = $addon1[looktype] + $addon1[lookaddons] * 300; 
                            $main_content .= '<TD style="background-color: '.$bgcolor.'"><img src="images/addons/'.$finaddon.'.gif"/></center></TD></TD>'; 
                        } 
                    } 
            } 
            //end   Outfit shower by Pening edited by loleslav 
             
            // Char Comment 
            $comment = $player->getComment(); 
            $newlines   = array("\r\n", "\n", "\r"); 
            $comment_with_lines = str_replace($newlines, '<br />', $comment, $count); 
            if($count < 50) 
                $comment = $comment_with_lines; 
            if(!empty($comment)) 
            { 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD VALIGN=top>Comment:</TD><TD>'.$comment.'</TD></TR>'; 
            } 
            $main_content .= '</td></table></td>'; 
            // END Char Comment 

            //modified status scripts by ballack13 
             
             //equipment shower by ballack13 
            $id = $player->getCustomField("id"); 
            $number_of_items = 1; 
            $main_content .= '<td width=135 align=left valign=top><table with=100% style="border: solid 1px #888888;" CELLSPACING="1"><TR>';         
                        $list = array('2','1','3','6','4','5','9','7','10','8'); 
                        foreach ($list as $pid => $name) { 
                        $top = $SQL->query('SELECT * FROM player_items WHERE player_id = '.$id.' AND pid = '.$list[$pid].';')->fetch();
                           if($top[itemtype] == false) { 
                           if($list[$pid] == '8') { 
            $main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Soul:<br/>'.$player->getSoul().'</td>'; 
            } 
                if(is_int($number_of_items / 3)){ 
            $main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$list[$pid].'.gif"/></TD></tr><tr>'; 
                } else { 
            $main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$list[$pid].'.gif"/></TD>'; 
            } 
                $number_of_items++; 
            } 
            else 
            { 
                           if($list[$pid] == '8') { 
            $main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Soul:<br/>'.$player->getSoul().'</td>'; 
            } 
                if(is_int($number_of_items / 3)) 
            $main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$top[itemtype].'.gif" width="45"/></TD></tr><tr>'; 
                else 
            $main_content .= '<TD style="background-color: '.$config['site']['darkborder'].'; text-align: center;"><img src="images/items/'.$top[itemtype].'.gif" width="45"/></TD>'; 
                $number_of_items++; 
            } 
                           if($list[$pid] == '8') { 
            $main_content .= '<td style="background-color: '.$config['site']['darkborder'].'; text-align: center;">Cap:<br/>'.$player->getCap().'</td>'; 
            } 
            } 
             
            if($config['site']['show_skills_info']) { 
                $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=1 WIDTH=100%>'; 
                $main_content .= '<TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Skills</B></TD></TR>'; 
                $main_content .= '<TR BGCOLOR="'.$config['site']['darkborder'].'"><TD width=75%>Magic:</TD><TD>'.$player->getMagLevel().'</TD></TR>'; 
                $main_content .= '<TR BGCOLOR="'.$config['site']['lightborder'].'"><TD>Fisting:</TD><TD>'.$player->getSkill(0).'</TD></TR>'; 
                $main_content .= '<TR BGCOLOR="'.$config['site']['darkborder'].'"><TD>Club:</TD><TD>'.$player->getSkill(1).'</TD></TR>'; 
                $main_content .= '<TR BGCOLOR="'.$config['site']['lightborder'].'"><TD>Sword:</TD><TD>'.$player->getSkill(2).'</TD></TR>'; 
                $main_content .= '<TR BGCOLOR="'.$config['site']['darkborder'].'"><TD>Axe:</TD><TD>'.$player->getSkill(3).'</TD></TR>';
                $main_content .= '<TR BGCOLOR="'.$config['site']['lightborder'].'"><TD>Distance:</TD><TD>'.$player->getSkill(4).'</TD></TR>'; 
                $main_content .= '<TR BGCOLOR="'.$config['site']['darkborder'].'"><TD>Shielding:</TD><TD>'.$player->getSkill(5).'</TD></TR>'; 
                $main_content .= '<TR BGCOLOR="'.$config['site']['lightborder'].'"><TD>Fishing:</TD><TD>'.$player->getSkill(6).'</TD></TR>'; 
                $main_content .= '</TABLE>'; 
            } 
             
            //quest status by ballack13 
            $id = $player->getCustomField("id"); 
            $number_of_quests = 0; 
            $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=1 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD align="left" COLSPAN=2 CLASS=white><B>Quests</B></TD></TD align="right"></TD></TR>';         
                        $quests = $config['site']['quests']; 
                        foreach ($quests as $storage => $name) { 
                if(is_int($number_of_quests / 2)) 
                    $bgcolor = $config['site']['darkborder']; 
                else 
                    $bgcolor = $config['site']['lightborder']; 
                $number_of_quests++; 
            $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD WIDTH=95%>'.$storage.'</TD>'; 
                        $quest = $SQL->query('SELECT * FROM player_storage WHERE player_id = '.$id.' AND `key` = '.$quests[$storage].';')->fetch(); 
                           if($quest == false) { 
            $main_content .= '<TD><img src="images/false.png"/></TD></TR>'; 
                        } 
            else 
            { 
            $main_content .= '<TD><img src="images/true.png"/></TD></TR>'; 
            } 
            } 

            $main_content .= '</TABLE></td></tr></table><br />'; 
            // end quest status 
             
            // Signature by makr0mango. 
            if($config['site']['show_signature']) { 
                function randomSignature( $folder ) { 
                    $files = scandir ( "./$folder/" ); 
                    $signature = array(); 

                    foreach ( $files as $file ): 
                        if ( substr ( strtolower ( $file ) , -4 ) == ".png" ) 
                            $signature[] = $file; 
                    endforeach; 

                    return rand(0,count($signature)-1); 
                    } 
                    $random = randomSignature("signatures"); 
                    $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Signature</B></TD></TR>'; 
                    $main_content .= "<TR BGCOLOR=".$config['site']['darkborder']."><TD WIDTH=20%>Forum Link:</TD><TD><input type='text' size='75' onclick='this.select();' value='[url=\"http://" . $_SERVER['HTTP_HOST'] . "\"][IMG]http://" . $_SERVER['HTTP_HOST'] . "/signature.php?character=" .$player->getName(). "&image=" . $random . "[/IMG][/url]' /></TD></TR>"; 
                    $main_content .= "<TR BGCOLOR=".$config['site']['lightborder']."><TD WIDTH=20%>Direct Link:</TD><TD><input type='text' size='75' onclick='this.select();' value='http://" . $_SERVER['HTTP_HOST'] . "/signature.php?character=" .$player->getName(). "&image=" . $random . "' /></TD></TR>"; 
                    $main_content .= "<TR BGCOLOR=".$config['site']['darkborder']."><TD COLSPAN='2' style='text-align: center;'><img src='signature.php?character=" .$player->getName(). "&image=" . $random . "' /></TD></TR>"; 
                    $main_content .= '</TD></TR></TABLE>'; 
                     
            } 
            // Signature by makr0mango. 
             
            //BEGIN Player advances by jerryb1988 from otfans.net 
            if($config['site']['number_of_advances'] > 0) { 
                $numadvances = $config['site']['number_of_advances']; 
                $advances = 0; 
                $player_advances = $SQL->query('SELECT * FROM `player_advances` WHERE `cid` = '.$player->getId().' ORDER BY `time` DESC LIMIT '.$numadvances.';'); 

                foreach($player_advances as $advance) 
                { 
                    $skill = $advance['skill']; 
                    if ($skill == 0){$skill_name = '<font color=purple><B>Fist</B></font>';} 
                    if ($skill == 1){$skill_name = '<font color=purple><B>Club</B></font>';} 
                    if ($skill == 2){$skill_name = '<font color=purple><B>Sword</B></font>';} 
                    if ($skill == 3){$skill_name = '<font color=purple><B>Axe</B></font>';} 
                    if ($skill == 4){$skill_name = '<font color=purple><B>Distance</B></font>';} 
                    if ($skill == 5){$skill_name = '<font color=purple><B>Shielding</B></font>';} 
                    if ($skill == 6){$skill_name = '<font color=purple><B>Fishing</B></font>';} 
                    if ($skill == 7){$skill_name = '<font color=blue><B>Magic</B></font>';} 
                    if ($skill == 8){$skill_name = '<font color=red><B>Level</B></font>';} 
                 
                    if(is_int($advances / 2)) { $bgcolor = $config['site']['lightborder']; } else { $bgcolor = $config['site']['darkborder']; } $advances++; 
                     
                    $advances_add_content .= "<tr bgcolor=\"".$bgcolor."\"><td width=\"20%\" align=\"center\"><nobr>".date("j M Y, g:i a", $advance['time'])."</td><td>".$skill_name."</td><td width=75><font color=red><B>".$advance['oldlevel']."</B></font></td><td width=75><font color=green><B>".$advance['newlevel']."</B></font></tr>"; 
                     
                } 

                if($advances > 0) 
                    $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=4 CLASS=white><B>Lastest Skill Advances</B></TD></TR><tr bgcolor='.$config['site']['darkborder'].'><td><b>Time</b></td><td><b>Skill</b></td><td><b>Old Level</b></td><td><b>New Level</b></td></tr>' . $advances_add_content . '</TABLE><br />'; 
            } 
            //END Advances by jerryb1988 from otfans.net 
             
            //deaths list 
            $deads = 0; 
            $player_deaths = $SQL->query('SELECT `id`, `date`, `level` FROM `player_deaths` WHERE `player_id` = '.$player->getId().' ORDER BY `date` DESC LIMIT 0,10;'); 
            foreach($player_deaths as $death) 
            { 
                if(is_int($number_of_rows / 2)) 
                    $bgcolor = $config['site']['darkborder']; else $bgcolor = $config['site']['lightborder']; 

                $number_of_rows++; $deads++; 
                $dead_add_content .= "<tr bgcolor=\"".$bgcolor."\"><td width=\"20%\" align=\"center\"><nobr>".date("j M Y, g:i a", $death['date'])."</td><td>"; 
                $killers = $SQL->query("SELECT environment_killers.name AS monster_name, players.name AS player_name, players.deleted AS player_exists FROM killers LEFT JOIN environment_killers ON killers.id = environment_killers.kill_id LEFT JOIN player_killers ON killers.id = player_killers.kill_id LEFT JOIN players ON players.id = player_killers.player_id WHERE killers.death_id = ".$SQL->quote($death['id'])." ORDER BY killers.final_hit DESC, killers.id ASC")->fetchAll(); 

                $i = 0; 
                $count = count($killers); 
                foreach($killers as $killer) 
                { 
                    $i++; 
                    if(in_array($i, array(1, $count))) 
                        $killer['monster_name'] = str_replace(array("an ", "a "), array("", ""), $killer['monster_name']); 

                    if($killer['player_name'] != "") 
                    { 
                        if($i == 1) 
                            $dead_add_content .= "Killed at level <b>".$death['level']."</b> by "; 
                        else if($i == $count) 
                            $dead_add_content .= " and by "; 
                        else 
                            $dead_add_content .= ", "; 

                        if($killer['monster_name'] != "") 
                            $dead_add_content .= $killer['monster_name']." summoned by "; 

                        if($killer['player_exists'] == 0) 
                            $dead_add_content .= "<a href=\"index.php?subtopic=characters&name=".urlencode($killer['player_name'])."\">"; 

                        $dead_add_content .= $killer['player_name']; 
                        if($killer['player_exists'] == 0) 
                            $dead_add_content .= "</a>"; 
                    } 
                    else 
                    { 
                        if($i == 1) 
                            $dead_add_content .= "Died at level <b>".$death['level']."</b> by "; 
                        else if($i == $count) 
                            $dead_add_content .= " and by "; 
                        else 
                            $dead_add_content .= ", "; 

                        $dead_add_content .= $killer['monster_name']; 
                    } 

                    if($i == $count) 
                        $dead_add_content .= "."; 
                } 

                $dead_add_content .= "</td></tr>"; 
            } 

            if($deads > 0) 
                $main_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Deaths</B></TD></TR>' . $dead_add_content . '</TABLE>'; 
            //end DEATHS 
			
			    //frags list by Xampy 
             
            $frags_limit = 10; // frags limit to show? // default: 10 
            $player_frags = $SQL->query('SELECT `player_deaths`.*, `players`.`name`, `killers`.`unjustified` FROM `player_deaths` LEFT JOIN `killers` ON `killers`.`death_id` = `player_deaths`.`id` LEFT JOIN `player_killers` ON `player_killers`.`kill_id` = `killers`.`id` LEFT JOIN `players` ON `players`.`id` = `player_deaths`.`player_id` WHERE `player_killers`.`player_id` = '.$player->getId().' ORDER BY `date` DESC LIMIT 0,'.$frags_limit.';'); 
            if(count($player_frags)) 
            { 
                $frags = 0; 
                $frag_add_content .= '<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><br><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Victims</B></TD></TR>'; 
                foreach($player_frags as $frag) 
                { 
                $frags++; 
                    if(is_int($number_of_rows / 2)) $bgcolor = $config['site']['darkborder']; else $bgcolor = $config['site']['lightborder']; 
                    $number_of_rows++; 
                    $frag_add_content .= "<tr bgcolor=\"".$bgcolor."\"> 
                    <td width=\"20%\" align=\"center\">".date("j M Y, H:i", $frag['date'])."</td> 
                    <td>".(($player->getSex() == 0) ? 'She' : 'He')." fragged <a href=\"index.php?subtopic=characters&name=".$frag[name]."\">".$frag[name]."</a> at level ".$frag[level].""; 
 
                    $frag_add_content .= ". (".(($frag[unjustified] == 0) ? "<font size=\"1\" color=\"green\">Justified</font>" : "<font size=\"1\" color=\"red\">Unjustified</font>").")</td></tr>"; 
                } 
            if($frags >= 1) 
                $main_content .= $frag_add_content . '</TABLE>'; 
            } 
            // end of frags list by Xampy             
             
            if(!$player->getHideChar()) { 
                $main_content .= '<TABLE BORDER=0><TR><TD></TD></TR></TABLE><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=2 CLASS=white><B>Account Information</B></TD></TR>'; 
                if($account->getRLName()) 
                { 
                    if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                    $main_content .= '<TR BGCOLOR='.$config['site']['lightborder'].'><TD WIDTH=20%>Real Name:</TD><TD>'.$account->getRLName().'</TD></TR>'; 
                } 
                if($account->getLocation()) 
                { 
                    if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                    $main_content .= '<TR BGCOLOR='.$config['site']['darkborder'].'><TD WIDTH=20%>Real Location:</TD><TD>'.$account->getLocation().'</TD></TR>'; 
                } 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                if($account->getLastLogin()) 
                    $main_content .= '<TR BGCOLOR='.$config['site']['lightborder'].'><TD WIDTH=20%>Account Last login:</TD><TD>'.date("j F Y, g:i a", $account->getLastLogin()).'</TD></TR>'; 
                else 
                    $main_content .= '<TR BGCOLOR='.$config['site']['lightborder'].'><TD WIDTH=20%>Account Last login:</TD><TD>Never logged in.</TD></TR>'; 
                if($account->getCreated()) 
                { 
                    if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['darkborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                    $main_content .= '<TR BGCOLOR='.$config['site']['darkborder'].'><TD WIDTH=20%>Account Created:</TD><TD>'.date("j F Y, g:i a", $account->getCreated()).'</TD></TR>'; 
                } 
                if(is_int($number_of_rows / 2)) { $bgcolor = $config['site']['lightborder']; } else { $bgcolor = $config['site']['lightborder']; } $number_of_rows++; 
                $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD>Account*Status:</TD><TD>'; 
                $main_content .= ($account->isPremium()) ? '<b><font color="green">Premium Account</font></b>' : '<b><font color="red">Free Account</font></b>'; 
                if($account->isBanned()) 
                    if($account->getBanTime() > 0) 
                        $main_content .= '<font color="red"> [Banished until '.date("j F Y, G:i", $account->getBanTime()).']</font>'; 
                    else 
                        $main_content .= '<font color="red"> [Banished FOREVER]</font>'; 
                $main_content .= '</TD></TR></TABLE>'; 
                $main_content .= '<br><TABLE BORDER=0><TR><TD></TD></TR></TABLE><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%><TR BGCOLOR='.$config['site']['vdarkborder'].'><TD COLSPAN=5 CLASS=white><B>Characters</B></TD></TR> 
                <TR BGCOLOR='.$config['site']['darkborder'].'><TD><B>Name</B></TD><TD><B>World</B></TD><TD><B>Level</B></TD><TD><b>Status</b></TD><TD><B>*</B></TD></TR>'; 
                $account_players = $account->getPlayersList(); 
                $account_players->orderBy('name'); 
                $player_number = 0; 
                foreach($account_players as $player_list) 
                { 
                    if(!$player_list->getHideChar()) 
                    { 
                        $player_number++; 
                        if(is_int($player_number / 2)) 
                            $bgcolor = $config['site']['darkborder']; 
                        else 
                            $bgcolor = $config['site']['lightborder']; 
                        if(!$player_list->isOnline()) 
                            $player_list_status = '<font color="red">Offline</font>'; 
                        else 
                            $player_list_status = '<font color="green">Online</font>'; 
                        $main_content .= '<TR BGCOLOR="'.$bgcolor.'"><TD WIDTH=52%><NOBR>'.$player_number.'.*<a href="?subtopic=characters&name='.urlencode($player_list->getName()).'">'.$player_list->getName(); 
                        $main_content .= ($player_list->isDeleted()) ? '<font color="red"> [DELETED]</font>' : ''; 
                        $main_content .= '</NOBR></TD><TD WIDTH=15%>'.$config['site']['worlds'][$player_list->getWorld()].'</TD><TD WIDTH=25%>'.$player_list->getLevel().' '.$vocation_name[$player_list->getWorld()][$player_list->getPromotion()][$player_list->getVocation()].'</TD><TD WIDTH="8%"><b>'.$player_list_status.'</b></TD><TD><TABLE BORDER=0 CELLSPACING=0 CELLPADDING=0><FORM ACTION="?subtopic=characters" METHOD=post><TR><TD><INPUT TYPE=hidden NAME=name VALUE="'.$player_list->getName().'"><INPUT TYPE=image NAME="View '.$player_list->getName().'" ALT="View '.$player_list->getName().'" SRC="'.$layout_name.'/images/buttons/sbutton_view.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></FORM></TABLE></TD></TR>';
                    } 
                } 
                $main_content .= '</TABLE></TD><TD><IMG SRC="'.$layout_name.'/images/general/blank.gif" WIDTH=10 HEIGHT=1 BORDER=0></TD></TR></TABLE>'; 
            } 
            $main_content .= '<BR><BR><FORM ACTION="?subtopic=characters" METHOD=post><TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=4><TR><TD BGCOLOR="'.$config['site']['vdarkborder'].'" CLASS=white><B>Search Character</B></TD></TR><TR><TD BGCOLOR="'.$config['site']['darkborder'].'"><TABLE BORDER=0 CELLPADDING=1><TR><TD>Name:</TD><TD><INPUT NAME="name" VALUE=""SIZE=29 MAXLENGTH=29></TD><TD><INPUT TYPE=image NAME="Submit" SRC="'.$layout_name.'/images/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></TABLE></TD></TR></TABLE></FORM>'; 
            $main_content .= '</TABLE>'; 
        } 
        else 
            $search_errors[] = 'Character <b>'.$name.'</b> does not exist.'; 
    } 
    else 
        $search_errors[] = 'This name contains invalid letters. Please use only A-Z, a-z and space.'; 
    if(!empty($search_errors)) 
    { 
        $main_content .= '<div class="SmallBox" >  <div class="MessageContainer" >    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeLeftTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeRightTop" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="ErrorMessage" >      <div class="BoxFrameVerticalLeft" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="BoxFrameVerticalRight" style="background-image:url('.$layout_name.'/images/content/box-frame-vertical.gif);" /></div>      <div class="AttentionSign" style="background-image:url('.$layout_name.'/images/content/attentionsign.gif);" /></div><b>The Following Errors Have Occurred:</b><br/>'; 
        foreach($search_errors as $search_error) 
            $main_content .= '<li>'.$search_error; 
        $main_content .= '</div>    <div class="BoxFrameHorizontal" style="background-image:url('.$layout_name.'/images/content/box-frame-horizontal.gif);" /></div>    <div class="BoxFrameEdgeRightBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>    <div class="BoxFrameEdgeLeftBottom" style="background-image:url('.$layout_name.'/images/content/box-frame-edge.gif);" /></div>  </div></div><br/>'; 
        $main_content .= '<BR><FORM ACTION="?subtopic=characters" METHOD=post><TABLE WIDTH=100% BORDER=0 CELLSPACING=1 CELLPADDING=4><TR><TD BGCOLOR="'.$config['site']['vdarkborder'].'" CLASS=white><B>Search Character</B></TD></TR><TR><TD BGCOLOR="'.$config['site']['darkborder'].'"><TABLE BORDER=0 CELLPADDING=1><TR><TD>Name:</TD><TD><INPUT NAME="name" VALUE=""SIZE=29 MAXLENGTH=29></TD><TD><INPUT TYPE=image NAME="Submit" SRC="'.$layout_name.'/images/buttons/sbutton_submit.gif" BORDER=0 WIDTH=120 HEIGHT=18></TD></TR></TABLE></TD></TR></TABLE></FORM>'; 
    } 
} 
?>