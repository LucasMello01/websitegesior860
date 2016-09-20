
<?PHP
header("Content-Type: text/html; charset=ISO-8859-1",true) ;
if($action == '')
	{
  $main_content .=' 
 <div id="ProgressBar">  <div id="Headline">Informações Iniciais</div>  <div id="MainContainer">    <div id="BackgroundContainer">    
 <img id="BackgroundContainerLeftEnd" src="layouts/tibiacom/images/vips/stonebar-left-end.gif">      <div id="BackgroundContainerCenter">       
 <div id="BackgroundContainerCenterImage" style="background-image: url(layouts/tibiacom/images/content/stonebar-center.gif);"></div>      </div>
 <img id="BackgroundContainerRightEnd" src="layouts/tibiacom/images/vips/stonebar-right-end.gif">    </div>   
 <img id="TubeLeftEnd" src="layouts/tibiacom/images/vips/progress-bar-tube-left-blue.gif">
 <img id="TubeRightEnd" src="layouts/tibiacom/images/vips/progress-bar-tube-right-blue.gif">   
 <div id="FirstStep" class="Steps">
      <div class="SingleStepContainer">
         <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-0-blue.gif">      
 <div class="StepText" style="font-weight: bold;">Regras da Doação</div>
      </div>
    </div>
    <div id="StepsContainer1">
      <div id="StepsContainer2">    
 <div class="Steps" style="width: 25%;">
          <div class="TubeContainer">
            <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">   
 </div>
          <div class="SingleStepContainer">
            <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-1-blue.gif">           
 <div class="StepText" style="font-weight: normal;">Metodo de Pagamento</div>
          </div>
        </div>
        <div class="Steps" style="width: 25%;">         
 <div class="TubeContainer">
            <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">
          </div>
          <div class="SingleStepContainer"> 
 <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-2-blue.gif">
            <div class="StepText" style="font-weight: normal;">Informações do Pedido</div>   
 </div>
        </div>
        <div class="Steps" style="width: 25%;"> 
         <div class="TubeContainer">    
 <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">
          </div>
          <div class="SingleStepContainer">       
 <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-3-blue.gif">
            <div class="StepText" style="font-weight: normal;">Confirmação</div>   
 </div>
        </div>
        <div class="Steps" style="width: 25%;">
          <div class="TubeContainer">          
 <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">          </div>          <div class="SingleStepContainer">         
 <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-4-blue.gif">            <div class="StepText" style="font-weight: normal;">Pedido Realizado</div>    
 </div>        </div>      </div>    </div>  </div></div><div class="TableContainer">  <div class="CaptionContainer">      <div class="CaptionInnerContainer">     
  <span class="CaptionEdgeLeftTop" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>       
  <span class="CaptionEdgeRightTop" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>    
  <span class="CaptionBorderTop" style="background-image: url(layouts/tibiacom/images/content/table-headline-border.gif);"></span>   
  <span class="CaptionVerticalLeft" style="background-image: url(layouts/tibiacom/images/content/box-frame-vertical.gif);"></span>   
  <div class="Text">Informações Iniciais para sua doação.</div>       
  <span class="CaptionVerticalRight" style="background-image: url(layouts/tibiacom/images/content/box-frame-vertical.gif);"></span>      
  <span class="CaptionBorderBottom" style="background-image: url(layouts/tibiacom/images/content/table-headline-border.gif);"></span>   
  <span class="CaptionEdgeLeftBottom" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>   
  <span class="CaptionEdgeRightBottom" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>     
  </div>
    </div>
    <table class="Table1" cellpadding="0" cellspacing="0"> 
   <tbody><tr>
      <td>
        <div class="InnerTableContainer">       
  <table style="width: 100%;"><tbody><tr><td>
Informamos aos jogadores e colaboradores que o '.$config['server']['serverName'].' Alternate Tibia Server não tem nenhum interesse financeiro. Toda a renda obtida é diretamente reaplicada para a manutenção do servidor - isto significa que ao fazer uma doação, você está garantindo a estabilidade e aumentando a qualidade do mesmo.</br></br>
Os pontos que são repassados aos jogadores que efetuam as doações não representam nada mais além de nossa gratificação, isto é, você não está comprando pontos e sim recebendo uma gratificação simbólica (em formas de pontos) que te beneficie dentro do jogo; você poderá usar os seus pontos da maneira que desejar.</br></br>
O espírito deste sistema é simples: com o intuito de nos aproximarmos dos jogadores e fazer com que vocês se sintam em casa, entendemos a sua doação como uma via de mão dupla no quesito credibilidade. Ao acreditar que vale a pena investir na manutenção do servidor, nós investimos em vocês creditando-os com pontos, que como já dito anteriormente, podem ser utilizados da maneira que mais os couber.</br></br>
Confira as <a href="?subtopic=beneficiospremium">Vantagens Vips</a> e o <a href="?subtopic=shopsystem">'.$config['server']['serverName'].' Shop</a> e saiba como aproveitar os seus pontos da maneira mais proveitosa à sua situação.</br>

<h3>Dúvidas Frequentes</h3></br>
<b>Mas o que são Premium Points?</b>
Premium Points faz parte do nosso sistema de doação, com eles você pode adquirir uma VIP ou algo mais que esteja disponível no Shopping Online.</br></br>

<b>O que é uma VIP Account?</b>
Uma VIP Account traz habilidades e vantagens adicionais dentro e fora do jogo por um determinado período de tempo. Para saber mais sobre os beneficios por favor visite a seção <a href="?subtopic=beneficiospremium">Vantagens Vips</a>.</br></br>

<b>Como efetuar a doação?</b>
<br>Clique no botão <b>"Continue"</b> e siga todos os procedimentos para realizar sua doação.

  </td></tr>          </tbody></table>        </div>
  </td></tr></tbody></table></div><br><center><table border="0" cellpadding="0" cellspacing="0">
  <tbody><tr><td style="border: 0px none;">
  <div class="BigButton" style="background-image: url(layouts/tibiacom/images/buttons/sbutton.gif);">
  <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image: url(layouts/tibiacom/images/buttons/sbutton_over.gif);"></div>
  <a href="?subtopic=donate&action=rules"><input class="ButtonText" name="Continue" alt="Continue" onclick=location.href="index.php?subtopic=donate&action=rules" src="layouts/tibiacom/images/vips/_sbutton_continue.gif" type="image"></a></div></div></td></tr></tbody></table></center> 
	 




';
	}
elseif($action == 'rules')
	{
		if(!$logged) {
		$main_content .= 'You are not logged in. <a href="?subtopic=accountmanagement">Log in</a> first to make a donate..';
		}
		else
		{
  $main_content .='<div id="ProgressBar">  <div id="Headline">Regras & Informações</div>  <div id="MainContainer">    <div id="BackgroundContainer">      <img id="BackgroundContainerLeftEnd" src="layouts/tibiacom/images/vips/stonebar-left-end.gif">      <div id="BackgroundContainerCenter">        <div id="BackgroundContainerCenterImage" style="background-image: url(layouts/tibiacom/images/content/stonebar-center.gif);"></div>      </div>      <img id="BackgroundContainerRightEnd" src="layouts/tibiacom/images/vips/stonebar-right-end.gif">    </div>    <img id="TubeLeftEnd" src="layouts/tibiacom/images/vips/progress-bar-tube-left-green.gif">    <img id="TubeRightEnd" src="layouts/tibiacom/images/vips/progress-bar-tube-right-blue.gif">    <div id="FirstStep" class="Steps">      <div class="SingleStepContainer">        <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-0-green.gif">        <div class="StepText" style="font-weight: bold;">Regras da Doação</div>      </div>    </div>    <div id="StepsContainer1">      <div id="StepsContainer2">        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">            <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-green-blue.gif">          </div>          <div class="SingleStepContainer">            <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-1-blue.gif">            <div class="StepText" style="font-weight: normal;">Metodo de Pagamento</div>          </div>        </div>        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">            <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">          </div>          <div class="SingleStepContainer">            <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-2-blue.gif">            <div class="StepText" style="font-weight: normal;">Informações do Pedido</div>          </div>        </div>        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">            <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">          </div>          <div class="SingleStepContainer">            <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-3-blue.gif">            <div class="StepText" style="font-weight: normal;">Confirmação</div>          </div>        </div>        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">            <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">          </div>          <div class="SingleStepContainer">            <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-4-blue.gif">            <div class="StepText" style="font-weight: normal;">Pedido Realizado</div>          </div>        </div>      </div>    </div>  </div></div><div class="TableContainer">  <div class="CaptionContainer">      <div class="CaptionInnerContainer">        <span class="CaptionEdgeLeftTop" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightTop" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>        <span class="CaptionBorderTop" style="background-image: url(layouts/tibiacom/images/content/table-headline-border.gif);"></span>        <span class="CaptionVerticalLeft" style="background-image: url(layouts/tibiacom/images/content/box-frame-vertical.gif);"></span>        <div class="Text">Leia as Regras das Doações</div>        <span class="CaptionVerticalRight" style="background-image: url(layouts/tibiacom/images/content/box-frame-vertical.gif);"></span>        <span class="CaptionBorderBottom" style="background-image: url(layouts/tibiacom/images/content/table-headline-border.gif);"></span>        <span class="CaptionEdgeLeftBottom" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>        <span class="CaptionEdgeRightBottom" style="background-image: url(layouts/tibiacom/images/content/box-frame-edge.gif);"></span>      </div>    </div>    <table class="Table1" cellpadding="0" cellspacing="0">    <tbody><tr>      <td>        <div class="InnerTableContainer">          <table style="width: 100%;"><tbody><tr><td valign="middle" width="25px;">

<B>Antes de fazer uma doação, lembre-se de estar de acordo com as regras vigentes e ciente de todas as informações necessárias.</B><TEXTAREA ROWS="5" WRAP="physical" COLS="80" READONLY="true" style="float:right;">
1. Gerais
a) O '.$config['server']['serverName'].' é um servidor alternativo de Tibia planejado, construído e executado dentro das regras vigentes que possibilitam o funcionamento do mesmo sem infringir nenhuma lei (seja ela nacional ou não).
b) Todo o dinheiro depositado e creditado no servidor é diretamente aplicado em sua própria manutenção, isto é, todo o capital girado em torno do mesmo é diretamente canalizado para o rumo de sua autossuficiência.
c) O '.$config['server']['serverName'].' luta pela sua estabilidade, entretando, não podemos impedir que erros venham a acontecer.
d) O histórico de doações está sendo salvado, ou seja, você nunca será esquecido.
e) O nome designado à central de trocas de pontos - '.$config['server']['serverName'].'Shop - é fictício; o '.$config['server']['serverName'].' não vende nenhum tipo de produto.
e) O '.$config['server']['serverName'].' é uma empresa sem fins lucrativos.

2. Perdas & Danos
a) Guarde o seu comprovante de doação. É o único documento que comprova a sua ajuda para a manutenção do servidor.
b) Em caso de resets, todas as doações que foram realizadas no prazo de dois meses (contando a partir do dia do reset) serão recreditadas integralmente nas contas dos jogadores. Lembrem-se que o histórico de doações está sendo salvo, porém você também precisa comprovar a sua participação nas doações.
c) Em caso de quedas e(ou) problemas que façam com que o '.$config['server']['serverName'].' fique off-line, em modo de segurança ou de espera por três dias consecutivos ou mais, os jogadores que optaram por debitar seus pontos em tempo VIP serão recreditados, da mesma maneira, com os dias perdidos (contando a partir do terceiro dia).
d) Em caso de paralização inesperada das atividades, não haverá reposição ou recreditação de capital investida no servidor, posto que toda doação é diretamente encaminhada à manutenção do mesmo. Neste caso, os jogadores serão comunicados pelos veículos de informação (site oficial ou fórum).
e) Em caso de paralização pré-programada das atividades, os jogadores serão informados através de nossos veículos de informação e a partir da data referida o sistema de doações encontrar-se-á fora do ar.
f) O '.$config['server']['serverName'].' oferece e investe na segurança básica para o servidor, cabe a você mantê-lo seguro; ou seja, não nos responsabilizamos pelos seus pertencens, personagens e contas.

3. Denotação # Doação
a) Ato ou efeito de doar. 
b) Aquilo que se doa.
c) Contrato, ou documento que assegura e legaliza a doação simples: a que é feita por exclusiva resolução do doador.
</TEXTAREA>As regras e informações dispostas na caixa de diálogo acima podem ser modificadas sem aviso prévio.<br>
Caso você não concorde com a contratação sobre a doação simples por favor não prossiga.


       </tbody></table>        </div>  </td></tr></tbody></table></div><br><table width="100%"><tbody><tr align="center"><td><table border="0" cellpadding="0" cellspacing="0">
	   <tbody><tr><td style="border: 0px none;">
	   <a href="javascript:void();" onclick=location.href="?subtopic=donate&action=pag_form">
	   <div class="BigButton" style="background-image: url(layouts/tibiacom/images/buttons/sbutton.gif);">
	   <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image: url(layouts/tibiacom/images/buttons/sbutton_over.gif);"></div>
	   <input class="ButtonText" name="Continue" alt="Continue" src="layouts/tibiacom/images/vips/_sbutton_continue.gif" type="image">

	   </div></div></a></td></tr><tr></tr></tbody></table></td><td><table border="0" cellpadding="0" cellspacing="0"><tbody><tr><td style="border: 0px none;">
	   <a href="javascript:void();" onclick=location.href="?subtopic=donate"><div class="BigButton" style="background-image: url(layouts/tibiacom/images/buttons/sbutton.gif);">
	   <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image: url(layouts/tibiacom/images/buttons/sbutton_over.gif); visibility: hidden;"></div>
	   <input class="ButtonText" name="Back" alt="Back" src="layouts/tibiacom/images/vips/_sbutton_back.gif" type="image">
	   </table></td></tr></tbody></table>
	   	   	   		 



';
		}
	}
elseif($action == 'selectchar')
	{
	    if(!$logged) {
		$main_content .= 'You are not logged in. <a href="?subtopic=accountmanagement">Log in</a> first to make a donate..';
		}
		else
		{
	
		$main_content .= '

<h1>Selecione o player</h1><BR>
			<form action="index.php?subtopic=donate&action=pag_form" method=POST> 
			<table border="0" cellpadding="1" cellspacing="1" width="100%"> 
			<tr bgcolor="#505050"><td colspan="2"><font color="#FFFFFF"><b>Select the character you want receive the donate.</b></font></td></tr> 
			<tr bgcolor="#D4C0A1"><td width="110"><b>Nome:</b></td><td width="550"><select name="buy_name">';
            $players_from_logged_acc = $account_logged->getPlayersList();
            if(count($players_from_logged_acc) > 0)
            {
              $players_from_logged_acc->orderBy('name');
              foreach($players_from_logged_acc as $player)
              {
                $main_content .= '<option>'.$player->getName().'</option>';
              }
            }
            else
            {
              $main_content .= 'Voce não tem nenhum char nessa account.';
            }
		$main_content .= '</table> 
		<br><center><input type="image" value="submit" src="layouts/tibiacom/images/buttons/sbutton_submit.gif"/> 
		</form>';
		}
	

	}
elseif($action == 'pag_form')
	{
	    if(!$logged) {
		$main_content .= 'You are not logged in. <a href="?subtopic=accountmanagement">Log in</a> first to make a donate..';
		}
		else
		{
		$buy_name = stripslashes(urldecode($_POST['buy_name']));
		$main_content .= '<div id="ProgressBar">  <div id="Headline">Método de Pagamento</div>  <div id="MainContainer">    <div id="BackgroundContainer">      

<img id="BackgroundContainerLeftEnd" src="layouts/tibiacom/images/vips/stonebar-left-end.gif">      <div id="BackgroundContainerCenter">        
<div id="BackgroundContainerCenterImage" style="background-image: url(layouts/tibiacom/images/content/stonebar-center.gif);"></div>     
 </div>      <img id="BackgroundContainerRightEnd" src="layouts/tibiacom/images/vips/stonebar-right-end.gif">    </div>    
 <img id="TubeLeftEnd" src="layouts/tibiacom/images/vips/progress-bar-tube-left-green.gif">    
 <img id="TubeRightEnd" src="layouts/tibiacom/images/vips/progress-bar-tube-right-blue.gif">    <div id="FirstStep" class="Steps">     
 <div class="SingleStepContainer">        <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-0-green.gif">       
 <div class="StepText" style="font-weight: normal;">Regras da Doação</div>      </div>    </div>    <div id="StepsContainer1">      
 <div id="StepsContainer2">        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">          
 <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-green.gif">          </div>          <div class="SingleStepContainer">        
 <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-1-green.gif">          <div class="StepText" style="font-weight: bold;">Metodo de Pagamento</div>    
 </div>        </div>        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">          
 <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-green-blue.gif">          </div>          <div class="SingleStepContainer">           
 <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-2-blue.gif">            <div class="StepText" style="font-weight: normal;">Informações do Pedido</div>     
 </div>        </div>        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">          
 <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">          </div>          <div class="SingleStepContainer">         
 <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-3-blue.gif">            <div class="StepText" style="font-weight: normal;">Confirmação</div>  
 </div>        </div>        <div class="Steps" style="width: 25%;">          <div class="TubeContainer">         
 <img class="Tube" src="layouts/tibiacom/images/vips/progress-bar-tube-blue.gif">          </div>          <div class="SingleStepContainer">      
 <img class="StepIcon" src="layouts/tibiacom/images/vips/progress-bar-icon-4-blue.gif">            <div class="StepText" style="font-weight: normal;">Pedido Realizado</div>   
 </div>        </div>      </div>    </div>  </div></div>Você está prestes a escolher um método de pagamento para fazer a sua doação!<br><br>


<TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%> 
				<form action="index.php?subtopic=donate&action=tipo" method="POST"><input type="hidden" name="char_name" value=""> 
				<TR BGCOLOR="#505050"> 
					<TD CLASS=white COLSPAN=3><B>Escolha o Método de Pagamento</B></TD> 
				</TR> 
				<TR BGCOLOR=#D4C0A1> 
								<TD><input type="radio" name="method" value="1" checked="checked"> PagSeguro - Cartão de crédito/boleto</TD>
				</TR>
				<TR BGCOLOR="#505050"> 
				<TR BGCOLOR=#D4C0A1>

					<TD><input type="radio" name="method" value="3"> Bradesco - Depósitos/DOCS/Transferencias Bancárias</TD>
				</TR>
								<TR BGCOLOR="#505050"> 
				<TR BGCOLOR=#D4C0A1>
				</TR>
			</TABLE>
       </tbody></table>        <br><table width="100%"><tbody><tr align="center"><td><table border="0" cellpadding="0" cellspacing="0">
	   <tbody><tr><td style="border: 0px none;">
	   <a href="javascript:void();" onclick=location.href="?subtopic=donate&action=pag_form">
	   <div class="BigButton" style="background-image: url(layouts/tibiacom/images/buttons/sbutton.gif);">
	   <div onmouseover="MouseOverBigButton(this);" onmouseout="MouseOutBigButton(this);"><div class="BigButtonOver" style="background-image: url(layouts/tibiacom/images/buttons/sbutton_over.gif);"></div>
	   <input class="ButtonText" name="Continue" alt="Continue" src="layouts/tibiacom/images/vips/_sbutton_continue.gif" type="image">

	   </table></td></tr></tbody></table>';
		}$_SESSION["nome"] = stripslashes(urldecode($_POST['method']));
	}
elseif($action == 'tipo')
	{
	    if(!$logged) {
		$main_content .= 'You are not logged in. <a href="?subtopic=accountmanagement">Log in</a> first to make a donate..';
		}
		else
		{
		$buy_tipo = stripslashes(urldecode($_POST['method']));
		if($buy_tipo == 1) {		
        $main_content .= '
<table><tr><td> 
<form method="post" target="_new" action="https://pagseguro.uol.com.br/security/webpagamentos/webpagto.aspx" name="LOGIN" class="formulario">

<input type="hidden" name="email_cobranca" value="EMAILDOPAGAQUI">

<input type="hidden" name="tipo" value="CP"> 

<input type="hidden" name="moeda" value="BRL"> 

<input type="hidden" name="item_id_1" value="2000050"> 

<table><tbody><tr><td><strong>Nome do Seu Character (Sem erro):</strong></td></tr></tbody></table> 

<table><tbody><tr><td><input type="text" name="item_descr_1"></td></tr></tbody></table><br> 

<input type="hidden" name="item_quant_1" value="1"> 
<table><tbody><tr>
<td width="153"><span class="style11 style4">
<strong>Valor do pagamento:</strong>
</span>
</td>
</tr>
</tbody></table> 

<table border="0"><tbody><tr>

  <td width="96"><label>

    <select name="item_valor_1" id="item_valor_1" tabindex="2">

      <option selected>Selecione</option>

      <option value="5,00">5 Points</option>

      <option value="10,00">10 Points</option>

      <option value="20,00">20 Points</option>

      <option value="30,00">30 Points</option>

      <option value="40,00">40 Points</option>

      <option value="50,00">50 Points</option>

      <option value="60,00">60 Points</option>

      <option value="70,00">70 Points</option>

      <option value="80,00">80 Points</option>

      <option value="90,00">90 Points</option>

      <option value="100,00">100 Points</option>

      <option value="110,00">110 Points</option>

      <option value="120,00">120 Points</option>

      <option value="130,00">130 Points</option>

      <option value="140,00">140 Points</option>

      <option value="150,00">150 Points</option>

                                </select>

  </label></td>

</tr></tbody></table>


</td>
</tr>
<br> 

<br> 

<input type="hidden" name="item_frete_1" value="000">  

<table><tbody><tr><td><input type="submit" value="Finalizar Compra"></td></tr></tbody></table> 
';
			}
				if($buy_tipo == 3) {		
        $main_content .= '
<table border="0" cellspacing="1" cellpadding="4" width="100%">
        <tr bgcolor="#505050"><td colspan="1" class="white"><center><b>Informa&ccedil;&otilde;es da Conta</b></center></td></tr>
        <tr bgcolor="#D4C0A1"><td>Nome: ---<br>
Banco: Bradesco<br>
Conta: Poupança<br>
Nº do Banco: ---<br>
Ag&ecirc;ncia: ---<br>
</td></tr>
        </table><br/>';

}
				if($buy_tipo == 4) {		
        $main_content .= '
	<center><h1>Onebip - Sistema de Pagamento pelo celuar via SMS</center></h1>
	';
	
	$main_content .= '<center>
	<table border="0" cellspacing=1 cellpadding=4 width="80%">
	<tr bgcolor="'.$config['site']['vdarkborder'].'">
	<center><th width="100%"><font class=black><b>Planos disponíveis</b></font></th>
	</tr>
	</table>
	<table border="0" cellspacing=1 cellpadding=4 width="80%">
	<tr>
	<center><td bgcolor="'.$config['site']['darkborder'].'" witdh="2%"><center><b>Doação - 5R$</center></b></td>
	<td bgcolor="'.$config['site']['darkborder'].'" witdh="2%"><center><b>Doação - 10R$</center></b></td>
	<td bgcolor="'.$config['site']['darkborder'].'" witdh="2%"><center><b>Doação - 20R$</center></b></td>
	<td bgcolor="'.$config['site']['darkborder'].'" witdh="2%"><center><b>Doação - 30R$</center></b></td>
	<td bgcolor="'.$config['site']['darkborder'].'" witdh="2%"><center><b>Doação - 50R$</center></b></td>
	</tr>
	<tr>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b><a href="LINKDOSEUBOTAO" title="Mobile payment: send and receive money with your mobile phone">
<img src="http://www.onebip.com/tools/bts/btn04.gif" alt="Transfer money with your mobile phone credit" border="0"/>
</a></center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b><a href="LINKDOSEUBOTAO" title="Mobile payment: send and receive money with your mobile phone">
<img src="http://www.onebip.com/tools/bts/btn04.gif" alt="Transfer money with your mobile phone credit" border="0"/>
</a></center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b><a href="LINKDOSEUBOTAO" title="Mobile payment: send and receive money with your mobile phone">
<img src="http://www.onebip.com/tools/bts/btn04.gif" alt="Transfer money with your mobile phone credit" border="0"/>
</a></center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b><a href="LINKDOSEUBOTAO" title="Mobile payment: send and receive money with your mobile phone">
<img src="http://www.onebip.com/tools/bts/btn04.gif" alt="Transfer money with your mobile phone credit" border="0"/>
</a></center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b><a href="LINKDOSEUBOTAO" title="Mobile payment: send and receive money with your mobile phone">
<img src="http://www.onebip.com/tools/bts/btn04.gif" alt="Transfer money with your mobile phone credit" border="0"/>
</a></center></b></td>
	</tr>
	<tr>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b>Faça sua Doação</center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b>Faça sua Doação</center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b>Faça sua Doação</center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b>Faça sua Doação</center></b></td>
	<td bgcolor="'.$config['site']['lightborder'].'" witdh="2%"><center><b>Faça sua Doação</center></b></td></center>
	</tr>
	</table>
	<table border="0" cellspacing=1 cellpadding=4 width="80%">
	<tr bgcolor="'.$config['site']['vdarkborder'].'">
	<td width="100%"></td>
	</tr>
	</table>
	<br>
	';
	
	$main_content.='
	<table border="0" cellspacing=1 cellpadding=4 width="100%">
	<tr bgcolor="'.$config['site']['vdarkborder'].'">
	<th width="100%"><font class=black>Observa&ccedil;&otilde;es</b></th>
	</tr>
	</table>
	<table border="0" cellspacing=1 cellpadding=4 width="100%">
	<tr bgcolor="'.$config['site']['darkborder'].'">
	<td width="100%"><ul><li>Para efetuar com sucesso sua doação utilizando o sistema <b>Onebip</b> é necessário de atenção: Ao enviar a mensagem você recebera os créditos em sua conta Onebip e depois transferir para a conta do servidor, caso não seja feito isso seus pontos não vão chegar.</li></ul></td>
	</tr>
	<tr bgcolor="'.$config['site']['darkborder'].'">
	<td width="100%"><ul><li>Todas as doações efetuadas no sistema <b>Onebip</b> precisam ser <a href="http://tibera-world.com/index.php?subtopic=confirmacao">Confirmadas</a> para serem creditas em sua account, caso contrário seus pontos não serão creditados</li></ul></td>
	</tr>
	</table>';

}			
			elseif($buy_tipo == 2)
	{
	    if(!$logged) {
		$main_content .= 'You are not logged in. <a href="?subtopic=accountmanagement">Log in</a> first to make a donate..';
		}
		else
		{
		$main_content .= '<center>Ao clicar no botão submit você será redirecionado para a página de doações do PayPal, onde você deverá preencher os dados e concluir a doação.</center> 
			<br><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%> 
			<tr bgcolor="#505050"><td colspan="3"><font color="white" size="4"><b>Pedido</b></font></td></tr> 
			<tr bgcolor="#D4C0A1"><td width="100"><b>M&eacute;todo de pagamento:</b></td><td width="550" colspan="2">PayPal</TD></tr>	
			<tr bgcolor="#D4C0A1"><td width="100"><b>Account:</b></td><td width="550" colspan="2">'.$account_logged->getName().'</td></tr>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<tr bgcolor="#D4C0A1"><td width="100"><b>Pontos:</b></td><td width="550" colspan="2"><select name="amount">
  <option value="10.00">10 R$</option>
  <option value="20.00">20 R$</option>
  <option value="30.00">30 R$</option>
  <option value="40.00">40 R$</option>
  <option value="50.00">50 R$</option>
</select></td></tr>		
			</TABLE><BR> 
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="EMAILPAYPALAQUI">
<input type="hidden" name="lc" value="BR">
<input type="hidden" name="item_name" value="Pontos na account de nome: '.$account_logged->getCustomField("name").'">
<input type="hidden" name="custom" value="'.$account_logged->getCustomField("name").'">
<input type="hidden" name="item_number" value="1">
<input type="hidden" name="currency_code" value="BRL">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="notify_url" value="http://tibera-world.com/ipn/ipn.php">
<input type="hidden" name="return" value="http://tibera-world.com">
<input type="hidden" name="rm" value="0">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG_global.gif:NonHosted">

<BR> 
			<table style="width:100%;" ><tr align="center" ><td>
			<a href="index.php?subtopic=donate"><img border="0" src="layouts/tibiacom/images/buttons/sbutton_back.gif"></a> </TD>  
			<td><input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online."></TR> 
			</TABLE></form>';
		}
	}
		}
	}
elseif($action == 'finalps')
	{
	    if(!$logged) {
		$main_content .= 'You are not logged in. <a href="?subtopic=accountmanagement">Log in</a> first to make a donate..';
		}
		else
		{
		$buy_quant = stripslashes(urldecode($_POST['quant']));
		$main_content .= '<center>Ao clicar no botão submit você será redirecionado para a página de doações do PagSeguro, onde você deverá preencher os dados e concluir a doação.</center> 
			<br><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%> 
			<form target="pagseguro" action="https://pagseguro.uol.com.br/security/webpagamentos/webpagto.aspx" method="post"><input type="hidden" name="char_name" value=""> 
			<tr bgcolor="#505050"><td colspan="3"><font color="white" size="4"><b>Confirme seus dados</b></font></td></tr> 
			<tr bgcolor="#D4C0A1"><td width="100"><b>M&eacute;todo de pagamento:</b></td><td width="550" colspan="2">PagSeguro</TD></tr>	
			<tr bgcolor="#D4C0A1"><td width="100"><b>Account:</b></td><td width="550" colspan="2">'.$account_logged->getName().'</td></tr>	
			<tr bgcolor="#D4C0A1"><td width="100"><b>Pontos:</b></td><td width="550" colspan="2">'.$buy_quant.'</td></tr>
			<tr bgcolor="#D4C0A1"><td width="100"><b>Valor:</b></td><td width="550" colspan="2">'.$buy_quant.',00</td></tr>		
			</TABLE><BR> 
	 		<center> 
<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
<form target="pagseguro" action="https://pagseguro.uol.com.br/checkout/checkout.jhtml" method="post">
<input type="hidden" name="email_cobranca" value="daniel_freire2109@hotmail.com" />
<input type="hidden" name="tipo" value="CP" />
<input type="hidden" name="moeda" value="BRL" />
<input type="hidden" name="item_id_1" value="'.$buy_quant.'" />
<input type="hidden" name="item_descr_1" value="Pontos" />
<input type="hidden" name="item_quant_1" value="'.$buy_quant.'" />
<input type="hidden" name="item_valor_1" value="100" />
<input type="hidden" name="item_peso_1" value="0" />
<input type="hidden" name="ref_transacao" value="'.$account_logged->getName().'" />

<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
<BR> 
			<table style="width:100%;" ><tr align="center" ><td>
			<a href="index.php?subtopic=donate"><img border="0" src="layouts/tibiacom/images/buttons/sbutton_back.gif"></a> </TD>  
			<td><input type="image" src="layouts/tibiacom/images/buttons/sbutton_submit.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" /></TR> 
			</TABLE></form>';
		}
	}
elseif($action == 'finalpp')
	{
	    if(!$logged) {
		$main_content .= 'You are not logged in. <a href="?subtopic=accountmanagement">Log in</a> first to make a donate..';
		}
		else
		{
		$main_content .= '<center>Ao clicar no botão submit você será redirecionado para a página de doações do PayPal, onde você deverá preencher os dados e concluir a doação.</center> 
			<br><TABLE BORDER=0 CELLSPACING=1 CELLPADDING=4 WIDTH=100%> 
			<tr bgcolor="#505050"><td colspan="3"><font color="white" size="4"><b>Pedido</b></font></td></tr> 
			<tr bgcolor="#D4C0A1"><td width="100"><b>M&eacute;todo de pagamento:</b></td><td width="550" colspan="2">PayPal</TD></tr>	
			<tr bgcolor="#D4C0A1"><td width="100"><b>Account:</b></td><td width="550" colspan="2">'.$account_logged->getName().'</td></tr>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<tr bgcolor="#D4C0A1"><td width="100"><b>Pontos:</b></td><td width="550" colspan="2"><select name="amount">
  <option value="10.00">10 R$</option>
  <option value="20.00">20 R$</option>
  <option value="30.00">30 R$</option>
  <option value="40.00">40 R$</option>
  <option value="50.00">50 R$</option>
</select></td></tr>		
			</TABLE><BR> 
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="ital0_stylle@hotmail.com">
<input type="hidden" name="lc" value="BR">
<input type="hidden" name="item_name" value="Pontos na account de nome: '.$account_logged->getCustomField("name").'">
<input type="hidden" name="custom" value="'.$account_logged->getCustomField("name").'">
<input type="hidden" name="item_number" value="1">
<input type="hidden" name="currency_code" value="BRL">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="no_shipping" value="0">
<input type="hidden" name="notify_url" value="http://tibera-world.com/ipn/ipn.php">
<input type="hidden" name="return" value="http://tibera-world.com">
<input type="hidden" name="rm" value="0">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG_global.gif:NonHosted">

<BR> 
			<table style="width:100%;" ><tr align="center" ><td>
			<a href="index.php?subtopic=donate"><img border="0" src="layouts/tibiacom/images/buttons/sbutton_back.gif"></a> </TD>  
			<td><input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online."></TR> 
			</TABLE></form>';
		}
	}
?>

