<?php
/*'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
'Funcion:   validacion de textos
'Objetivos: Validacion de textos segun parametros de evaluacion
'parametros:
'           cadena          string a Evaluar
'           fMayusculas     Mayusculas Validas
'           fMinusculas     Minusculas Validas
'           fNumeros        Numeros Validos
'           CarEspeciales   String con caracteres especiales permitidos
'           fPrimerCaracter El primer caracter tiene que ser una letra
'           Minimo          longitud minima
'           Maximo          longitud maxima
'           nombrecampo     nombre de campo que se esta evaluando
'           msgError        mensaje de error
'Retorna:
'        True -> error
'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function validaTexto(&$cadena, $fMayusculas, $fMinusculas, $fNumeros, $CarEspeciales, $fPrimerCaracter, $Minimo, $Maximo, $nombrecampo, &$msgError){
    
    $fError = false;
	$msgError = "";
    $carValidos="";

    // se eliminan blancos, y caracteres especiales
    $cadena = trim($cadena," ".chr(0xD).chr(0xA));
    
    //valida que una cadena tenga este dentro de un tama?o minimo y un maximo
    $n = strlen($cadena);
    $cadena = substr($cadena,0,$n);
   if ($n == 0 and $Minimo == 0) {
       return false;
   }

   $msgError = "El campo $nombrecampo { $cadena }, ";
   if ($n < $Minimo Or $n > $Maximo) {
        $fError = true;
        $msgError .= sprintf(" debe tener como minimo %d y como maximo %d caracteres. ",$Minimo,$Maximo);
   }
   //valida que el primer caracter sea letra
   if (! $fError And $fPrimerCaracter) {
		$fError = (strpos("AÁBCDEÉFGHIÍJKLMNOÓPQRSTUÚVWXYZ������������", strtoupper(substr($cadena, 0, 1))) === false);
        $fError = ($fError and strpos("������������", substr($cadena, 0, 1)) === false);
        if ($fError) {
            $msgError .= " primer caracter debe ser una letra";
        }
   }
   
   if (! $fError) {
        $detalleValidos = "Debe contener solo";
        if ($fMayusculas) {
            $carValidos = "AÁBCDEÉFGHIÍJKLMNÑOÓPQRSTUÚVWXYZ";
            $detalleValidos .=  " letras mayusculas";
        }
        if ($fMinusculas) {
            $carValidos .= "aábcdeéfghiíjklmnñoópqrstuúvwxyz";
            $detalleValidos .= ", letras minusculas";
        }
        if ($fNumeros) {
            $carValidos .= "1234567890";
            $detalleValidos .= ", numeros";
        }
        
        if ($CarEspeciales <> "") {
            $tmp = $CarEspeciales;
            if (substr($tmp,0,3) == "ALL") {
               $CarEspeciales = " @,;.:-_!#$%/()=?\+*������������";
               if (substr($tmp,3) != "S&") {
                    $CarEspeciales .= '&'; 
               }
               // new line return y tab
               if (substr($tmp,3) == "Snlt") {
                    $CarEspeciales .= chr(13).chr(10).chr(9); 
               } else {
                $cadena = str_replace(chr(0xD).chr(0xA)," ",$cadena);
               }
            }
            $carValidos .= utf8_encode($CarEspeciales);
            //$detalleValidos .= " y caracteres especiales como";
            $detalleValidos .= " y caracteres especiales como '".utf8_encode($CarEspeciales)."'";
        }

        $i = 0;
        while ($i < $n AND $fError == false) {
            $fError = (strpos($carValidos, substr($cadena, $i++, 1)) === false );
        }
        if ($fError) {
             $msgError .= "[pos=".$i."]". $detalleValidos;
        }
    }
	if (! $fError) {
         // se asume que es una fecha	   
         if (! $fMayusculas and ! $fMinusculas and $fNumeros and $Minimo == 10 and $Maximo == 10 and $CarEspeciales = "/") {
            $fError = !(is_date($cadena,2));
            if ($fError) {
                $msgError .= " Contiene una fecha invalida, ingrese en formato dd/mm/aaaa.";                
            }
         } 
         if (! $fError) {
		      $msgError = '';
         }
	}
    
   return $fError;
} // ValidaTexto()

// valida fechas en formatos mmddyyyy, ddmmyyyy o yyyymmdd con cualquier separador 
function is_date($date,$fmt)
    {
        $date = str_replace(array('\'', '-', '.', ','), '/', $date);
        $date = explode('/', $date);
        //echo count($date);
        if(    count($date) == 1 // No tokens
            and    is_numeric($date[0])
            and    $date[0] < 20991231 and
            (    checkdate(substr($date[0], 4, 2)
                        , substr($date[0], 6, 2)
                        , substr($date[0], 0, 4)))
        )
        {
            return true;
        }
       
        if(    count($date) == 3
            and    is_numeric($date[0])
            and    is_numeric($date[1])
            and is_numeric($date[2]) and
            (    ($fmt == 1 and checkdate($date[0], $date[1], $date[2])) //mmddyyyy
            or   ($fmt == 2 and  checkdate($date[1], $date[0], $date[2])) //ddmmyyyy
            or   ($fmt == 3 and  checkdate($date[1], $date[2], $date[0]))) //yyyymmdd
        )
        {
            return true;
            
        }
        return false;
    }

/*'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
'Funcion:   validacion de valores
'Objetivos: Validacion de valores segun parametros de evaluacion
'parametros:
'           cadena          string a Evaluar
'           Opcional        Permite campos vacios
'           Minimo          Valor minima >=
'           Maximo          Valor maxima <=
'           nombrecampo     nombre de campo que se esta evaluando
'           msgError        mensaje de error
'Retorna:
'        True -> error
'~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
function validaValores($cadena, $opcional, $minimo, $maximo, $nombrecampo, &$msgError) {
    
    $fError = false;
	$msgError = "";

    //valida que una cadena tenga este dentro de un tama?o minimo y un maximo
    $cadena = trim($cadena);
    $n = strlen($cadena);
   if ($n == 0 and $opcional) {
       return false;
   }

	$msgError = "El campo $nombrecampo { $cadena }, ";
	try {
		if (! is_numeric($cadena)) {
			$fError = true;
			$msgError .= sprintf(" no es Numero. ");
		} elseif (! is_null($minimo) and $cadena <= $minimo) {
			$fError = true;
			$msgError .= sprintf(" debe ser mayor a %f . ",$minimo);
		} elseif ( ! is_null($maximo) and $cadena > $maximo) {
			$fError = true;
			$msgError .= sprintf(" debe ser menor a %f . ",$maximo);
		}
	} catch (Exception $e) {
		//echo 'Excepcion capturada: ',  $e->getMessage(), "\n";
		$fError = true;
		$msgError .= sprintf(" no es Numero. ");
	}
	if (! $fError) {
	  $msgError = '';
	}
    
   return $fError;
} // ValidaValores()


?>
