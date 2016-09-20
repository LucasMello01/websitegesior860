<?PHP
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
$main_content .= '

<center>
        <table border="0" cellpadding="4" cellspacing="1" width="95%">
            <tr bgcolor="#505050">
                <td colspan="2"><font class="white"><b>Status</b></font></td>
            </tr>
            <tr bgcolor="#505050">
                <td width="50%"><font class="white">Name</font></td><td><font class="white">Value</font></td>
            </tr>
            <tr bgcolor="#D4C0A1">
                <td>Server Status</td><td><font color="#33CC00"><b>ONLINE</b></font></td>
            </tr>
            <tr bgcolor="#D4C0A1">
                <td>Uptime</td><td>24 horas</td>
            </tr>
            <tr bgcolor="#F1E0C6">
                <td>Monsters</td><td>Mais de 25.000</td>
            </tr>
            <tr bgcolor="#D4C0A1">
                <td>NPCs</td><td>Mais de 300</td>
            </tr>
        </table>
        <br><table border="0" cellpadding="4" cellspacing="1" width="95%">
            <tr bgcolor="#505050">
                <td colspan="2"><font class="white"><b>Rates</b></font></td>
            </tr>
            <tr bgcolor="#505050">
                <td><font class="white">Name</font></td><td><font class="white">Value</font></td>
            </tr>
            <tr bgcolor="#D4C0A1">
                <td width="50%">Experience</td><td><table width="100%"><tr align="center" bgcolor="#505050"><td class="white">From Level</td><td class="white">To Level</td><td class="white">Rate</td></tr><tr align="center" bgcolor="#F1E0C6"><td>1</td><td>50</td><td>200</td></tr><tr align="center" bgcolor="#D4C0A1"><td>51</td><td>80</td><td>100</td></tr><tr align="center" bgcolor="#F1E0C6"><td>81</td><td>100</td><td>75</td></tr><tr align="center" bgcolor="#D4C0A1"><td>101</td><td>120</td><td>50</td></tr><tr align="center" bgcolor="#F1E0C6"><td>121</td><td>140</td><td>30</td></tr><tr align="center" bgcolor="#D4C0A1"><td>141</td><td>160</td><td>15</td></tr><tr align="center" bgcolor="#F1E0C6"><td>161</td><td>180</td><td>10</td></tr><tr align="center" bgcolor="#D4C0A1"><td>181</td><td>200</td><td>5</td></tr><tr align="center" bgcolor="#F1E0C6"><td>201</td><td>-</td><td>2</td></tr></table></td>
            </tr>
            <tr bgcolor="#F1E0C6">
                <td>Skill</td><td>80x</td>
            </tr>
            <tr bgcolor="#D4C0A1">
                <td>Magic</td><td>50x</td>
            </tr>
            <tr bgcolor="#F1E0C6">
                <td>Loot</td><td>6x</td>
            </tr>
            <tr bgcolor="#D4C0A1">
                <td>Spawn</td><td>2x</td>
            </tr>
        </table>
		</br>
		<table border="0" cellpadding="4" cellspacing="1" width="95%">
            <tr bgcolor="#505050">
                <td colspan="2"><font class="white"><b>Commands</b></font></td>
            </tr><tr align="center" bgcolor="#D4C0A1"><td width="50%">
			
			!online
			<BR>
            !uptime
			<BR>
            !serverinfo
			<BR>
            !changesex
			<BR>
            !save
			<BR>
            !frags
			<BR>
            !go (change all guild members outfit)
			<BR>
            !bless
			<BR>
            !aol
			<BR>
            !buyhouse
			<BR>
            !sellhouse
			
			
			</td></table>
			<br><table border="0" cellpadding="4" cellspacing="1" width="95%">
        <tr bgcolor="#505050">
            <td colspan="2"><font class="white"><b>Frags</b></font></td>
        </tr>
        <tr bgcolor="#505050">
            <td width="50%"><font class="white">Name</font></td><td><font class="white">Value</font></td>
        </tr>
        <tr bgcolor="#D4C0A1">
            <td>White Skull Time</td><td>10  minutes</td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td>Red Skull Time</td><td>30  days</td>
        </tr>
        <tr bgcolor="#D4C0A1">
            <td>Black Skull Time</td><td>45  days</td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td>Black Skull Time</td><td>1  days</td>
        </tr>
        <tr bgcolor="#D4C0A1">
            <td>Frags to Red Skull</td><td>Daily: 10 | Weekly: 35 | Monthly: 105</td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td>Black Skull</td><td><font color="green">Enabled</font></td>
        </tr>
    </table><br><table border="0" cellpadding="4" cellspacing="1" width="95%">
        <tr bgcolor="#505050">
            <td colspan="2"><font class="white"><b>Onther information</b></font></td>
        </tr>
        <tr bgcolor="#505050">
            <td width="50%"><font class="white">Name</font></td><td><font class="white">Value</font></td>
        </tr>
        <tr bgcolor="#D4C0A1">
            <td>Premium</td><td>Free</td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td>Bank System</td><td>Enabled</td>
        </tr>
        <tr bgcolor="#D4C0A1">
            <td>Guild halls</td><td>Disabled</td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td>Kick Time</td><td>15  hours</td>
        </tr>
        <tr bgcolor="#D4C0A1">
            <td>PZ Lock</td><td>40  seconds</td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td>Protection Level</td><td>40</td>
        </tr>
        <tr bgcolor="#D4C0A1">
            <td>Level to buy house</td><td>50</td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td>Level to create guild</td><td>50</td>
        </tr>
        <!--
        <tr bgcolor="#D4C0A1">
            <td></td><td></td>
        </tr>
        <tr bgcolor="#F1E0C6">
            <td></td><td></td>
        </tr>
        -->
    </table><br></center>

';