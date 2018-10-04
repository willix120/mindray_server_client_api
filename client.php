<?php

//Consulto las hematologias a la API
if($data_hematologias = @file_get_contents('http://192.168.1.103:8000/muestras/fecha/2018-06-26')){

	//si todo esta ok

	$lista_hematologias = json_decode($data_hematologias); //del JSON obtengo los datos estructurados como objeto

	//Voy recorriendo
	foreach( $lista_hematologias->Muestras as $hematologia ){
		//En la variable $hematologia se obtiene el objeto hematologia con los atributos
		/*

		Los atributos son todos los que vienen a continuación (entre comillas)

		"hematologiaid" <- id único en la base de datos interna de la API
        
        "hgb" <- hemoglobina
        "hto" <- hematocrito
        "mch" <- indice
        "mchc" <- indice
        "mcv" <- indice
        "mpv" 
        "num_gran"
        "num_lymph"
        "num_mid"
        "pacienteid" <- este es el numero que le colocan a la muestra cuando la procesan en el analizador.
        				por lo general le colocan el numero del paciente del día, este numero es el que
        				deberías usar para saber a quien pertenece los datos de la hematología.
        "pct"
        "pdw"
        "plt" <- plaquetas

        "porcent_gran"     éstos son los valores de linfocitos, segmentados, eosinofilos
        "porcent_lymph"	   según como lo interprete la lic.
        "porcent_mid"
        
        "rbc" <- globulos rojos
        "wbc" <- globulos blancos
        
        "rdw_cv"
        "rdw_sd"
        
        "reg_date" <- esta es la fecha de la muestra en el aparato OJO si el analizador tiene otra fecha, esa es la que guardará acá.
        "reg_time" <- la hora segun el analizador tambien.
        
		*/
		echo $hematologia->pacienteid; //ejemplo de como obtener el dato del atributo
		echo '<br />';
		echo $hematologia->hgb;
		echo '<br />';
	}

}else{

	//en caso de existir problemas para comunicarse con la API o no estar en ejecución el programa
	echo 'No funciona!';
}
