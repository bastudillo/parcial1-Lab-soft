<?php 
	
    function obtenerConsecutivo()
    {
        $datos = file_get_contents("dependencias.json");
        $datosConsecutivo = json_decode($datos, true);        
        return $datosConsecutivo;
    }

    function mostrarConsecutivo($datosConsecutivo,$A1,$A2)
    {
		
		if($A1==0)
		{
			if($A2==1)
			{
				echo "numero mostrado: " .$datosConsecutivo[0]['consecutivo'].".".$datosConsecutivo[0]['subdependencias'][0]['consecutivo']."/".$datosConsecutivo[0]['numero']."<br>";
			}
			else if($A2==2)
			{
				echo "numero mostrado: " .$datosConsecutivo[0]['consecutivo'].".".$datosConsecutivo[0]['subdependencias'][1]['consecutivo']."/".$datosConsecutivo[0]['numero']."<br>";
			}
			else if($A2==""){
				echo "numero mostrado: " .$datosConsecutivo[0]['consecutivo'].".0/".$datosConsecutivo[0]['numero']."<br>";
			}
			
		}
		else if($A1==1){
			if($A2==1)
			{
				echo "numero mostrado: " .$datosConsecutivo[1]['consecutivo'].".".$datosConsecutivo[1]['subdependencias'][0]['consecutivo']."/".$datosConsecutivo[1]['numero']."<br>";
			}
			else if($A2==2)
			{
				echo "numero mostrado: " .$datosConsecutivo[1]['consecutivo'].".".$datosConsecutivo[1]['subdependencias'][1]['consecutivo']."/".$datosConsecutivo[1]['numero']."<br>";
			}
			else{
				echo "numero mostrado: " .$datosConsecutivo[1]['consecutivo'].".0/".$datosConsecutivo[1]['numero']."<br>";
			}
		}
		else if($A1==2){
			if($A2==1)
			{
				echo "numero mostrado: " .$datosConsecutivo[2]['consecutivo'].".".$datosConsecutivo[2]['subdependencias'][0]['consecutivo']."/".$datosConsecutivo[2]['numero']."<br>";
			}
			else if($A2==2)
			{
				echo "numero mostrado: " .$datosConsecutivo[2]['consecutivo'].".".$datosConsecutivo[2]['subdependencias'][1]['consecutivo']."/".$datosConsecutivo[2]['numero']."<br>";
			}
			else{
				echo "numero mostrado: " .$datosConsecutivo[2]['consecutivo'].".0/".$datosConsecutivo[0]['numero']."<br>";
			}
		}
		else if($A1=="f"){
			echo "numero mostrado: 0.0/";
		
		}
		
		
       
		
    }
	
    function aumentar($datosConsecutivo,$A1,$A2)
    {
		if($A1==0)
		{
			$datosConsecutivo[0]['numero']=$datosConsecutivo[0]['numero'] + 1;
		}
		else if($A1==1)
		{
			$datosConsecutivo[1]['numero']=$datosConsecutivo[1]['numero'] + 1;
		}
		else if($A1==2)
		{
			$datosConsecutivo[2]['numero']=$datosConsecutivo[2]['numero'] + 1;
		}
        $nuevosConsecutivo = json_encode($datosConsecutivo);
        file_put_contents('dependencias.json', $nuevosConsecutivo);  
        return $datosConsecutivo; 
    }    

    $datosConsecutivo = obtenerConsecutivo();
	
    $boton="";    
        
    if(isset($_POST['boton']))$boton=$_POST['boton'];
	
    if($boton)
    {   
		$A1 = $_POST['dependencia'];
		$A2= $_POST['sub'];
		
        $datosConsecutivo = aumentar($datosConsecutivo,$A1,$A2);
		
        mostrarConsecutivo($datosConsecutivo,$A1,$A2);
		
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Dependencia</title>
    <link rel="stylesheet" type="text/css" href="theme.css">
    <script src="DependenciasAJAX.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>

</head>
<body>
	
	

	 
    <div class="centrado">
        <div id="depName" class="azul">
            Dependencia 
        </div>
          
			
            <img id="depImg" class="centrado" src="img/fiet1.jpg"/>
      
        
        <form class = "centrado" method="post">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
            <select  id="a" name="dependencia" >
                <option value="f"> --Seleccione dependencia--</option>
				<option value="0">Decanatura</option>
                <option value="1">Departamento de Sistemas</option>
                <option value="2">Departamento de Electronica</option> 
               
            </select>
			
			 <select  id="aa" name="sub">
               <center><option value="">Seleccione la sub-dependencia</option></center>
			   
                
            </select>
            <form action="" method="post">
				<center><input type="submit" name="boton"  value="Enviar informacion"></center>
			</form>
        </form>
        
    </div>
	
	<script >
	var prueba=5;
	var primero="0";
	var segundo="0";
	$("#a").on("change",function(){
		var sel="";
		
		if($(this).val() == "0"){
			sel+= '<option value="">Seleccione la sub-dependencia</option>';
			sel+=' <option value="1">Decano</option>'
			sel+='<option value="2">Secretaria general</option>'
			primero=1;
			segundo=1.1;
			$("#aa").on("change",function(){
				if($(this).val() == "1"){
					segundo=1.1;
				}
				else
				{ 
					segundo=1.2
					
				}
				
			});
			
		}
		else if($(this).val() == "1"){
			primero=2;
			sel+= '<option value="">Seleccione la sub-dependencia</option>';
			sel+= '<option value="1">Jefe de departamento</option>';
			sel+= '<option value="2">Tesoreria</option>';
			$("#aa").on("change",function(){
				if($(this).val() == "JS"){
					segundo=2.1;
				}
				else
				{ segundo=2.2
				}
			});
		}
		else if($(this).val() =="2"){
			sel+= '<option value="">Seleccione la sub-dependencia</option>';
			sel+= '<option value="1">Jefe de departamento</option>';
			sel+= '<option value="2">Tesoreria</option>';
			primero=3;
			$("#aa").on("change",function(){
				if($(this).val() == "JE"){
					segundo=3.1;
				}
				else
				{ segundo=3.2
				}
			});
		}
		$("#aa").html(sel);
		
  
	});
	/*function convertir()
	{
		var uno="123";
		var dos=segundo;
		var z="5";
		var date = "123";
		$.post('index.php', {uno:uno});
		$.ajax({
        type: 'POST',
        url: 'index.php',
        data: {uno:uno},
        dataType: 'text',
        success: function(data){alert(z);
		}
		})
		/*
		$.ajax(
		{
		data: ({'uno': uno}),
			url: 'index.php',
			type:'´POST',
			
			success: function(data) {
				 
				console.log(data);
			} 
		});*/
	
	
	

</script>


</body>
</html>

