<?php
    /*
        Gateway 
        Desenvolvido por: Luiz Fernando Calegario de Souza / Vagner Fiuza Vieira (Suporte MoIP)
        Versao: I.HTML v1.0
        Empresa: SIERTI (http://www.sierti.com.br)/ MoIP Pagamentos (http://www.moip.com.br)    
    */
?><?
    
    $name_modulo = "moip"; 
    $variavel_moip = getGatewayVariables($name_modulo);
    
    function moip_config() {
    $key_whmcs = rand(0000,9999);
    $key_whmcs_salvo = $variavel_moip['key_whmcs'];
    $configarray = array(
     "FriendlyName" => array("Type" => "System", "Value"=>"MoIP Pagamentos"),
     "id_carteira" => array("FriendlyName" => "E-Mail*", "Type" => "text", "Size" => "50", "Name" => "id_carteira", "Description" => "E-mail cadastrado com o MoIP"),
     "layout" => array("FriendlyName" => "Layout", "Type" => "text", "Size" => "20", "Description" => "Insira o nome do layout criado em sua conta MoIP, caso nao haja essa informacao o layout utilizado sera o defalt (padrao) MoIP.\n<br>Para criar ou alterar um layout acesse sua conta MoIP no menu \"Meus Dados\" >> \" Preferencias \" >> \" Layout personalizado da pagina de pagamento \"."),
     "url_retorno" => array("FriendlyName" => "URL onde esta instalado seu WHMCS*", "Type" => "text", "Size" => "50", "Description" => "Ex: http://www.seudominio.com/whmcs/"),
     "key_whmcs" => array("FriendlyName" => "Chave de seguranca MoIP", "Type" => "text", "Size" => "4", "Value" => "$key_whmcs", "Description" => "Apos salvar as configuracoes, pegue o codigo de seguranca e ensira na URL de notificacao em sua conta MoIP <br>Ex: http://www.seudominio.com/whmcs/modules/gateways/moip/nasp.php?key=SEU_KEY"),
     "instrucoes" => array("FriendlyName" => "Instrucoes", "Type" => "yesno", "Description" => "1° - Acesse sua conta MoIP e verifique se a ferramenta de \"Integracao HTML\" esta habilitada. \n<br>Caso nao esteja, clique no link presente em sua conta para ativar a ferramenta. \n<br> 2° - Preencha os capos acima, onde os que possuem * sao de preenchimento obrigatorio. ", ),
    );
	return $configarray;
}

	
    function moip_link($params){
        $code = '<form action="https://www.moip.com.br/PagamentoMoIP.do" method="POST">
                    <input type="hidden" name="id_carteira" value="'.$params['id_carteira'].'">
                    <input type="hidden" name="valor" value="'.str_replace(".","",$params['amount']).'">
                    <input type="hidden" name="nome" value="'.$params["description"].'">
                    <input type="hidden" name="id_transacao" value="Pedido: '.$params['invoiceid'].' - Cliente: '.$params['clientdetails']['id'].'">
                    <input type="hidden" name="descricao" value="Fatura Servicos de Internet '.$params['invoiceid'].', Site ['.$_SERVER[SERVER_NAME].']">
                    <input type="hidden" name="pagador_nome" value="'.$params['clientdetails']['firstname'].' '.$params['clientdetails']['lastname'].'">
                    <input type="hidden" name="pagador_cep" value="'.str_replace("-","",$params['clientdetails']['postcode']).'">
                    <input type="hidden" name="pagador_logradouro" value="'.$params['clientdetails']['address1'].'">
                    <input type="hidden" name="pagador_numero" value="'.str_replace(" ","",ereg_replace("[^a-zA-Z0-9 .]","",
                                                                        strtr($params['clientdetails']['address1'],"abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ,.",
                                                                        "                                                     "))).'">
                    <input type="hidden" name="pagador_bairro" value="'.$params['clientdetails']['address2'].'">
                    <input type="hidden" name="pagador_cidade" value="'.$params['clientdetails']['city'].'">
                    <input type="hidden" name="pagador_estado" value="'.$params['clientdetails']['state'].'">
                    <input type="hidden" name="pagador_pais" value="'.$params['clientdetails']['country'].'">
                    <input type="hidden" name="pagador_telefone" value="'.str_replace(" ","",str_replace("-","",$params['clientdetails']['phonenumber'])).'">
                    <input type="hidden" name="pagador_email" value="'.$params['clientdetails']['email'].'">
                    <input type="hidden" name="layout" value="'.$params['layout'].'">
                    <input type="hidden" name="url_retorno" value="'.$params['url_retorno'].'viewinvoice.php?id='.$params['invoiceid'].'">
                    <input type="submit" value="'.$params['langpaynow'].'">
                 </form>';
        return $code;
    }     
    $GATEWAYMODULE['moipname'] = 'moip';
    $GATEWAYMODULE['moipvisiblename'] = 'MoIP';
    $GATEWAYMODULE['moiptype'] = 'Invoices';
?><?
    /*
        [Isaías 33:6 = E haverá estabilidade nos teus tempos, abundância de salvação, sabedoria e ciência; e o temor do SENHOR será o seu tesouro. ]
    */
?>