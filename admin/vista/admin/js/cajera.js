function buscarUsuario() {

    var cedula = document.getElementById("cedula").value;
    if (cedula == "") {
        document.getElementById("informacion").innerHTML = "";
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            document.getElementById("informacion").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET","../empleado/usuario.php?ced="+cedula,true);
    xmlhttp.send();
    }
    return false;
}
function retiro() {
    var cedula = document.getElementById("cedula").value;
    if (cedula == "") {
        document.getElementById("opcion").innerHTML = "";
    } else {

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            
            document.getElementById("opcion").innerHTML = this.responseText;
        }
    };  
    xmlhttp.open("GET","../empleado/cajeraRetiro.php?cedu="+cedula,true);
    xmlhttp.send();
    }
    return false;
}

function deposito() {

    
    
    var cedula = document.getElementById("cedula").value;
    if (cedula == "") {
        document.getElementById("opcion").innerHTML = "";
    } else {

        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert("llegue");
            
            document.getElementById("opcion").innerHTML = this.responseText;
        }
    };  
    xmlhttp.open("GET","../empleado/cajeraDeposito.php?cedu="+cedula,true);
    xmlhttp.send();
    }

    return false;
}