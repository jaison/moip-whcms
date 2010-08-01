Módulo integração HTML - WHMCS
==============================


**Módulo desenvolvido em parceria com a empresa SIERTI (http://www.sierti.com.br/) para integração com o sistema de Pagamento MoIP http://www.moip.com.br. Baseado na documentação disponibilizado no site do WHMCS (https://www.whmcs.com/).**

Instruções
----------


1- Acesse sua conta MoIP e certifique-se que a ferramenta HTML está devidamente habilitada, caso a mesma não esteja acesse sua conta no menu “Ferramentas” >> “Ferramentas disponíveis” >> “Integração HTML” em Visão geral clique no link para ativar a ferramenta.

2- Envie esta pasta para seu host, colocando-a no diretório **modules/gateways**

2.2- Será criado um arquivo no diretório gateways chamado **moip.php** e um novo diretório chamado **moip**, onde esse novo diretório terá um arquivo chamado **nasp.php** responsável pela captura do POST automático do MoIP e processo de atualização do status do pagamento em seu WHMCS.

3- Habilite a opção de pagamento MoIP em seu administrativo WHMCS, **Setup** >> **Payment Gateways** >> **Activate Gateway** , escolha a opção **MoIP Pagamentos** e clique no botão **Activate**, logo você irá visualizar a pagina onde estão presentes os campos para configuração assim como imagem a seguir.



![img1](http://labs.moip.com.br/imagens_documentacao/moip_whcms1.png)

*Obs: Pagina Admin não possui acentuação por erros de execução no script referente ao charset de seu WHMCS.*


4- Preencha os campos assim como solicita a pagina respeitando as informações descritas na pagina.

5- Pegue o código gerado no campo “Chave de segurança MoIP” e insira ao final da URL de Notificação “NASP”. Ex: 

  http://www.seudominio.com/whmcs/modules/gateways/moip/nasp.php?key=SEU_KEY

Onde “SEU_KEY” é referencia ao cógido gerado no campo “Chave desegurança MoIP”.

6- Agora em sua conta MoIP cadastre a URL de notificação, acesse o menu **Meus Dados** >> **Preferências** >> **Notificação das transações**, habilite a opção **Receber notificação instantânea de transação** e insira a URL no campo **URL de notificação:**, seguido pela **Chave de segurança MoIP** assim como exemplo acima descrito.

7- Pronto, seu WHMCS está configurado com a forma de pagamento MoIP, Bons Negócios.
