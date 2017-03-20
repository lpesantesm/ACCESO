function formToCallPost(f,sPagina,sDiv,sCodAdic) {
    var controles = "$('#"+sDiv+"').empty();";
    controles += "$.post('"+sPagina+"', { \n";
    for (var nItem = 0; nItem < f.elements.length; nItem++) {
        //console.log(f.elements[nItem].id +  ' ' +f.elements[nItem].type);
        if ('btn_ fls_ div_'.indexOf(f.elements[nItem].id.substr(0,4)) < 0) {
            //mtexto += f.elements[nItem].id + ' ';
            //alert(mtexto);
            valorparametro =  f.elements[nItem].value;
            //alert(valorparametro);
            valorparametro = valorparametro.replace(/\r?\n/g, ' "+"');
            //controles += f.elements[nItem].id+':' + '\"' + f.elements[nItem].value + '\"' + ', \n';
            //Para ver el nombre de los controles y sus tipos
            //console.log(f.elements[nItem].id +  ' ' +f.elements[nItem].type);
            controles += f.elements[nItem].id+':' + '\"' + valorparametro + '\"' + ', \n';
            //console.log(controles);
        }            
    }               
//  controles += "xxx_t: new Date().getTime() },\n function(respuesta) { \n $('#"+sDiv+"').html(respuesta); \n $.unblockUI(); \n"+sCodAdic +" });";    
  controles += "xxx_t: new Date().getTime() },\n function(respuesta) { \n $('#"+sDiv+"').html(respuesta); \n"+sCodAdic +" });";      
  //alert(controles);
  console.log(controles);
    return controles;
} //--
