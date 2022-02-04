<?php

### EXERCICIO AULA 03###
#--> Criando Função    #
########################

/*
Funções para linkar arquivos
	include() --> permite importar arquivos no php
	include_once() --> permite importar arquivos no php e o servidor realiza uma restrição para importar somente uma vez o arquivo

	require() --> permite importar arquivos no php
	require_onde() --> permite importar arquivos no php e o servidor realiza uma restrição para importar somente uma vez o arquivo

*/

	//import do arquivo função
require_once('modulo/calculo.php');
	//import do arquivo configuracao
require_once('modulo/configuracao.php');


	//Declaração de variaveis
$valor1=(double)0;
$valor2=(double)0;
$resultado=(double)0;
$opcaoRadio=(String) null;


	//Validação do botão 
if(isset($_POST['btncalc'])){
		
	//Recebe dados do formulário
	$valor1=$_POST['txtn1'];
	$valor2=$_POST['txtn2'];
	
	
	//tratamento da caixa vazia
	if ($_POST['txtn1']==""||$_POST['txtn2']=="") {
		echo(ESSO_MSG_CAIXA_VAZIA); 
	}else{
		
		//validação de tratamento de erro para radio sem escolha
		if(!isset($_POST['rdocalc'])){
			echo(ESSO_MSG_CAIXA_CALCULO);
		}else{

			//validação de dado não numérico
			if (!is_numeric($valor1) || !is_numeric($valor2) ) {
				echo(ESSO_MSG_CARACTER_INVALIDO);
			}else{
					//só podemos receber o valor do radio quando ele existir
				$opcaoRadio=strtoupper($_POST['rdocalc']);

			//camando função para realizar calculos matematicos
			$resultado=operacaoMatematica($valor1,$valor2,$opcaoRadio);

			}
		}
	}
}

/* ######### INCREMENTO 03.02.22 ####################################

//validação de dado não numérico
	if (!is_numeric($valor1) || !is_numeric($valor2) ) {
		echo('<script>alert("Não é possível calcular!!");</script>');
	}else{


//validação para tratamento de erro da divisão por 0
	if ($valor2==0) {
		echo('<script>alert("Não é possível calcular!");</script>');
	}else{
		$resultado=$valor1/$valor2;
	}	
	
//salva os valores qdos números que foram usados nas caixas
	value="<?=$valor1;?>"
	value="<?=$valor2;?>"

//função round
	roud( , ); --> permite limitar e arredondar o número de casas decimais
	number_format( , ); --> permite limitar e arredondar o número de casas decimais

//mostra a operação selecionada
$opcaoRadio=strtoupper($_POST['rdocalc']);

Atenção!!! 
	<checked> é uma tag somente do HTML
	Quem interpreta o PHP é o sevidor e manda o comando para o navegador.

.............................................................
.	//Decisão ternária (Estrutura de decisão)				
.	Estilo de decisão feito em uma linha					
.	Não precisa de IF										
.	? --> equivale as chaves VERDADEIRO						
.	: --> equivale a estrura FALSA							
.	= --> equivale a printar 								
.............................................................


Atenção!!! 
	<switch> <case> : Obrigatório finalizar com break.
	Normalmente <switch> <case> é usado para igualdade entre variaveis.



	Criação de função em php
	Sintaxe: function nome(){	}

###########################################################################
*/


/*
####################### RESOLUÇÃO DO EXERCICIO _ MODELO II  ################################

Anotações


@Passo-a-Passo:											
-Primeiro: tratamento da caixa vazia.					
-Segundo: usar tag <alert>	para exibir msg de erro.	
-Terceiro: tratar o radio caso ele não esteja selecionado e indicar com <alert>
-Quarto: <$opcaoRadio> vai para dentro do <else> dos <calculo>

Atenção! Todo elemento radio quando não é selecionado ele não será submetido.Pois ele não existirá para o sistema.
Atenção! Veja se html existe uma atributo checked na tag <radio>.

*/


/* ###################### RESOLUÇÃO DO EXERCICIO _ MODELO I ################################
<?php
		//Declaração de variaveis
	$valor1=(double)0;
	$valor2=(double)0;
	$resultado=(double)0;
	$opcaoRadio=(String) null;

		//Validação do botão 
	if(isset($_POST['btncalc'])){
			
		//Recebe dados do formulário
		$valor1=$_POST['txtn1'];
		$valor2=$_POST['txtn2'];
		$opcaoRadio=strtoupper($_POST['rdocalc']);
		
		//calculo
		if ($opcaoRadio=='SOMAR') {
			$resultado=$valor1+$valor2;

		}elseif($opcaoRadio=='SUBTRAIR') {
			$resultado=$valor1-$valor2;

		}elseif($opcaoRadio=='MULTIPLICAR') {
			$resultado=$valor1*$valor2;

		}elseif ($opcaoRadio=='DIVIDIR') {
			$resultado=$valor1/$valor2;
		}
	}
?>
	 Anotações 

	@Passo-a-Passo:
	-Primeiro: mudar  o valor do atributo method na tag <form> de get ou para post.
	-Segundo: declarar variveis.
	-Terceiro: tratar botão. Nome de acordo com o html.
	-Quarto: relizar os calculos das operações matemáticas. Usei <if...else>
	-Quinto: printar resultado na tag <form> ao fim do html.

	Atenção! Declaração de variavel: o radio tem que seguir o value. Se não iver valor colocar NULL.
	Atenção! O que difere cada radio são os <value>.
	Atenção! No php <elseif> é diferente de <else if>, são dois tipos de processamentos dierentes.
	
	..................................................
	.@Curiosidade_01:								 
	.<gettype> verifica o tipo do dado               
	.<settype> forçar a mudança do tipo do dado      
	.		Exemplo: $nome=10; -->integer            
	.				 echo(gettype($nome));           
	.				 settype($nome,"string");        
	.				 echo(gettype($nome)); -->String 
	..................................................
	
	.........................................................
	.@Curiosidade_02:										
	.<action> colocar o nome do arquivo						
	.<strtoupper> permite converter um texto para MAIUSCULO 
	.<strtolower> permite converter um texto para minusculo 	 
	.........................................................
	
	.................................................
	.@Passo-a-passo	:								
	.Duas formas de printar resultado				
	.	Exemplo:						 			
	.	--> <?=$resultado;?>						 
	.	--> Resultado:<?php echo($resultado);?>		
	.................................................
	
############################################################################################
	*/
?>

<html>
    <head>
        <title>Calculadora - Simples</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
	<body>
        
        <div id="conteudo">
            <div id="titulo">
                Calculadora Simples
            </div>

            <div id="form">
                <form name="frmcalculadora" method="post" action="calculadora_simples.php">
						Valor 1:<input type="text" name="txtn1" value="<?=$valor1;?>" > <br> <!--<value> mantem o histórico do que foi digitado-->
						Valor 2:<input type="text" name="txtn2" value="<?=$valor2;?>" > <br> <!--<value> mantem o histórico do que foi digitado-->
						<div id="container_opcoes">
							<input type="radio" name="rdocalc" value="somar" <?=$opcaoRadio=='SOMAR'?'checked':null;?> >Somar <br> 
							<input type="radio" name="rdocalc" value="subtrair"<?=$opcaoRadio=='SUBTRAIR'?'checked':null;?> >Subtrair <br>
							<input type="radio" name="rdocalc" value="multiplicar" <?=$opcaoRadio=='MULTIPLICAR'?'checked':null;?> >Multiplicar <br>
							<input type="radio" name="rdocalc" value="dividir" <?=$opcaoRadio=='DIVIDIR'?'checked':null;?>>Dividir <br>
							
							<input type="submit" name="btncalc" value ="Calcular" >
							
						</div>	
						<div id="resultado">
							<?=$resultado;?>

						</div>						
				</form>
            </div>   
        </div>
	</body>
</html>