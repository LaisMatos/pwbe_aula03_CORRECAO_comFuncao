<?php
################# Função ##########################################
#Objetivo: Arquivo funções matemáticas utilizado dentro do projeto
#Autor: lais matos
#Data: 04.02.22
# Versão: 1.0
####################################################################

//import do arquivo configuracao
require_once('modulo/configuracao.php');

//Criando função para calcular as operações matematicas
	function operacaoMatematica($numero1,$numero2,$operacao){
		
		//declaração de variaveis locais
		$num1= (double) $numero1;
		$num2=(double) $numero2;
		$total=(double)0;
		$tipoCalculo=(string)$operacao;
		

		//CALCULO com Switch/Case
		switch ($tipoCalculo) {
			case "SOMAR":
				$total=$num1+$num2;
				break;
			
			case "SUBTRAIR":
				$total=$num1-$num2;
				break;

			case "MULTIPLICAR":
				$total=$num1*$num2;
				break;

			case "DIVIDIR":
				$total=$num1/$num2;
				if ($num2==0) {
					echo(ESSO_MSG_DIVISAO_ZERO);
				}else{
					$total=$num1/$num2;
				}
				break;
			//<default> equivale ao <else> final
			default:
		}
		//estrura para arredondar e limitar casas decimais
		$total= round($total,2);
		return $total;
    }
    
?>