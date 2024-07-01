<?php
session_start();
if(empty($_SESSION['username'])){
    ?>
      <script>
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: "กรุณาล็อกอินก่อนใช้งาน!!",
        timer: 3000,
        showConfirmButton: false
        }).then(() => {
            document.location.href = 'login.php';
        });
      </script>
      <?php
    }
?>