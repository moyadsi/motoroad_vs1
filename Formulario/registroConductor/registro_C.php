
<?php
    include("../../conexionBD.php");
    if(isset($_POST["registrar"])){
        $nombres =  trim ($_POST["nombres"]);
        $apellidos = trim ($_POST["apellidos"]);
        $email = trim ($_POST["email"]);
        $contraseña = trim ($_POST["contraseña"]);
        $nacimiento = trim ($_POST["nacimiento"]);
        $genero =  trim ($_POST["sexo"]);
        $confirmar_contraseña = trim ($_POST['confirmar-contraseña']);
        define("KEY_C",1);
        
        $consulta = "INSERT INTO registro_conductor( nombres, apellidos, correo,  contraseña, fecha_nacimiento, genero,KEY_C) 
        VALUES ('$nombres','$apellidos','$email','$contraseña','$nacimiento','$genero','KEY_C')";
        $registro = mysqli_query($conex,$consulta);
       
        $verificar_correo = mysqli_query($conex,"select * from registro_conductor where correo = '$email'");

      if(mysqli_num_rows($verificar_correo) > 0){
        ?>
        <script>
          alert("el correo que esta ingresando ya se encuentra registrado");
        </script>
        <?php
        exit();
      }    
    
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