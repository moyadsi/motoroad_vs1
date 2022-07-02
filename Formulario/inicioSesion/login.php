<?php/
    include("../../conexionBD.php");
    if(isset($_POST["iniciar"])){
      $email = trim ($_POST["email"]);
      $contraseña = trim ($_POST["contraseña"]);

      $verificar_login_P = mysqli_query($conex,"select * from registro_pasajero where correo = '$email' and contraseña = '$contraseña'");
      $verificar_login_C = mysqli_query($conex,"select * from registro_conductor where correo = '$email' and contraseña = '$contraseña'");

      if(mysqli_num_rows($verificar_login_C) > 0){
        ?>
        <script>
          alert("login exitoso");
        </script>
        <?php
        exit();
    }elseif(mysqli_num_rows($verificar_login_P) > 0) {
      ?>
      <script>
        alert("login exitoso");
      </script>
      <?php 
      exit();
    }else{
      ?>
      <script>
        alert("el usuario no se encuentra registrado");
      </script>
      <?php 
      exit();
    }
?>