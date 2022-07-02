<?php/
    include("../../conexionBD.php");

    if(isset($_POST["registrar"])){
        $nombres =  trim ($_POST["nombres"]);
        $apellidos = trim ($_POST["apellidos"]);
        $email = trim ($_POST["correo"]);
        $contraseña = trim ($_POST["contraseña"]);
        $nacimiento = trim ($_POST["nacimiento"]);
        $genero =  trim ($_POST["Genero"]);
        $confirmar_contraseña = trim ($_POST['confirmar-contraseña']);
        define("KEY_PERSONA",0);
        
        $consulta = "INSERT INTO registro_pasajero (nombres, apellidos, correo, contraseña, genero, KEY_P)
        VALUES ('$nombres','$apellidos','$email','$contraseña','$genero','KEY_PERSONA')";
       
  
    
      if($contraseña <> $confirmar_contraseña){
        ?>
        <script>
          alert("las contraseñas no coinciden");
        </script>
        <?php
        exit();
      }
        
        $registro = mysqli_query($conex,$consulta);
        if($registro){
            ?>
            <script>
                alert("se ha registrado con exito ")
            </script> 
            <?php
        }
        else{
            ?>
            <script>
                alert("no se ha registrado con exito ")
            </script> 
            <?php
        }
      }
 ?>