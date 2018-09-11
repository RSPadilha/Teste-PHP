<?php

/**
* Retorna as possibilidades de separacao de silabas para uma palavra
* @param string $palavra A cadeia de caracteres de uma palavra no seguinte formato:
*  <silaba><digito><silaba><digito>...<silaba><digito>
*  Os dígitos indicam onde a palavra pode sofrer divisao e seus valores indicam a preferencia pela divisao.
*  Caso exista mais de um digito com o mesmo valor todas as opcoes devem ser consideradas, as primeiras devem ser aquelas em que o hifen aparece mais a esquerda.
* @return array A lista de possibilidade de separacao de silabas da palavra ordenadas pela preferencia
**/


function separaSilabas($palavra) {
	$resultado = array();
	for ($i=9; $i > 0; $i--) {
		$aux = str_replace($i, "-", $palavra);
		if($aux != $palavra){
			$aux = preg_replace("/[0-9]/", "", $aux);
			$resultado[] = $aux;
		}
	}
	return($resultado);
}


/***** Teste 01 *****/
$palavra = "pro5gra5ma7cao";
$resultadoEsperado = array(
	"programa-cao",
	"pro-gramacao",
	"progra-macao");
$resultado = separaSilabas($palavra);
verificaResultado("01", $resultadoEsperado, $resultado);

/***** Teste 02 *****/
$palavra = "pro7gra9ma7cao";
$resultadoEsperado = array(
	"progra-macao",
	"pro-gramacao",
	"programa-cao");
$resultado = separaSilabas($palavra);
verificaResultado("02", $resultadoEsperado, $resultado);

/***** Teste 03 *****/
$palavra = "in3cons7ti9tu7cio5nal";
$resultadoEsperado = array(
	"inconsti-tucional",
	"incons-titucional",
	"inconstitu-cional",
	"inconstitucio-nal",
	"in-constitucional");
$resultado = separaSilabas($palavra);
verificaResultado("03", $resultadoEsperado, $resultado);

/***** Teste 04 *****/
$palavra = "ca2de5a9do";
$resultadoEsperado = array(
	"cadea-do",
	"cade-ado",
	"ca-deado");
$resultado = separaSilabas($palavra);
verificaResultado("04", $resultadoEsperado, $resultado);

/***** Teste 05 *****/
$palavra = "con1co3mi8tan8te4men1te";
$resultadoEsperado = array(
	"concomi-tantemente",
	"concomitan-temente",
	"concomitante-mente",
	"conco-mitantemente",
	"con-comitantemente",
	"concomitantemen-te");
$resultado = separaSilabas($palavra);
verificaResultado("05", $resultadoEsperado, $resultado);

/***** Teste 06 *****/
$palavra = "en1do7cro6lo7gi4ca7men1te";
$resultadoEsperado = array(
	"endo-crologicamente",
	"endocrolo-gicamente",
	"endocrologica-mente",
	"endocro-logicamente",
	"endocrologi-camente",
	"en-docrologicamente",
	"endocrologicamen-te");
$resultado = separaSilabas($palavra);
verificaResultado("06", $resultadoEsperado, $resultado);

/***** Teste 07 *****/
$palavra = "te4cla";
$resultadoEsperado = array(
	"te-cla");
$resultado = separaSilabas($palavra);
verificaResultado("07", $resultadoEsperado, $resultado);


function verificaResultado($nTeste, $resultadoEsperado, $resultado) {
	if($resultadoEsperado == $resultado) {
		echo "Teste $nTeste passou.<br>";
	} else {
		echo "Teste $nTeste NAO passou<br>" .
			"Resultado esperado =<br>" . var_export($resultadoEsperado,true) . "<br>" .
			"Resultado obtido =<br>" . var_export($resultado,true) . "<br><br>";
	}
}

?>