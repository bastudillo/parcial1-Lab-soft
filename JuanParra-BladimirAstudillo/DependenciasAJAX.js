function loadDoc(v)
{    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
           CargarDependencia(this,v);
      }
    };
    xhttp.open("GET", "dependencias.xml", true);
    xhttp.send();
 }

 function CargarDependencia(xml, v) 
 {
  
  var i;

    var xmlDoc = xml.responseXML;
    var depNameElem = document.getElementById("depName");
    var depImgElem = document.getElementById("depImg");
	var subDepElem = document.getElementById("subDep");
    
    

    var x = xmlDoc.getElementsByTagName("Dependencia");
    for (i = 0; i <x.length; i++) 
    { 
      var id = x[i].getElementsByTagName("Numero")[0].childNodes[0].nodeValue;
      
      if(id == v)
      {
        depNameElem.innerHTML = x[i].getElementsByTagName("Nombre")[0].childNodes[0].nodeValue;
        depImgElem.setAttribute("src",x[i].getElementsByTagName("Imagen")[0].childNodes[0].nodeValue);
      }        
    }
    
  }

  loadDoc(0);