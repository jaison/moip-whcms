<?php
    /*
        Gateway 
        Desenvolvido por: Luiz Fernando Calegario de Souza / Vagner Fiuza Vieira (Suporte MoIP)
        Versão: I.HTML v1.0
        Empresa: SIERTI / MoIP Pagamentos     
    */
?><?


	if (!function_exists('log_var')) {
		  function log_var($var, $name='', $to_file=false){
		    if ($to_file==true) {
		        $txt = @fopen('debug.txt','a');
		        if ($txt){
    		        fwrite($txt, "-----------------------------------\n");
    		        fwrite($txt, $name."\n");
    		        fwrite($txt,  print_r($var, true)."\n");
    		        fclose($txt);//
                }
		    } else {
		         echo '<pre><b>'.$name.'</b><br>'.
		              print_r($var,true).'</pre>';
		    }
		  }
	}


  include '../../../dbconnect.php';
  $silent = 'true';
  include '../../../includes/functions.php';
  include '../../../includes/gatewayfunctions.php';
  include '../../../includes/invoicefunctions.php';
 
  
  $id_transacao = $_POST['id_transacao'];
  $transid = $_POST['cod_moip'];
  $valor = $_POST['valor'];
  $real = substr($valor,0,-2);
  $cent = substr($valor,-2);
  $amount = $real.".".$cent;
  $status_pagamento = $_POST['status_pagamento'];
  $fee = $_POST["tipo_pagamento"];
  $data_hora = date("d/m/Y H:i:s");
  
 log_var ($_POST, "POST recebido: ", true);  
    
  $transacao = explode(':',$_POST['id_transacao']);        
  $transacao_novo = $transacao[1];
  $tmp = explode('-',$transacao_novo);
  $invoiceid = str_replace(" ","",$tmp[0]);    
  
      function define_var($params){
        $url_retorno = $params['url_retorno'];
        return $url_retorno;
    }    
  
 
  if($status_pagamento == "1"){   
      addinvoicepayment ($invoiceid, $transid, $amount, "", 'moip');
           log_var ("Status [".$_POST['status_pagamento']."] \nTransação \"Autorizada\", valor pago pelo cliente e identificado pelo MoIP. ", "Retorno de dados MoIP, Pedido: ".$invoiceid."\nData: ".$data_hora, true); 
           echo 'Sucesso';
      
      exit ();  
  }elseif($status_pagamento == "4" ){       
            log_var ("Status [".$_POST['status_pagamento']."] \nTransação \"Comcluida\", valor repassado par sua conta MoIP. ", "Retorno de dados MoIP, Pedido: ".$invoiceid."\nData: ".$data_hora, true); 
            echo 'Sucesso';
      
      exit ();  
  }elseif($status_pagamento == "5" ){  
           log_var ("Status [".$_POST['status_pagamento']."] \nPagamento Cancelado. ", "Retorno de dados MoIP, Pedido: ".$invoiceid."\nData: ".$data_hora, true); 
           echo 'Sucesso';
           
      exit (); 
  }else{  
           log_var ("Status [".$_POST['status_pagamento']."] \nPagamento não identificado. ", "Retorno de dados MoIP, Pedido: ".$invoiceid."\nData: ".$data_hora, true); 
           echo 'Sucesso';
           
      exit (); 
  }

  
  exit ();
?><?
    /*
        [Isaías 33:6 = E haverá estabilidade nos teus tempos, abundância de salvação, sabedoria e ciência; e o temor do SENHOR será o seu tesouro. ]
    */
?>