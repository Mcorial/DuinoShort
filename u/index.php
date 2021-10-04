<?php 
  include "php/config.php";
  $new_url = "";
  if(isset($_GET)){
    foreach($_GET as $key=>$val){
      $u = mysqli_real_escape_string($conn, $key);
      $new_url = str_replace('/', '', $u);
    }
      $sql = mysqli_query($conn, "SELECT full_url FROM url WHERE shorten_url = '{$new_url}'");
      if(mysqli_num_rows($sql) > 0){
        $sql2 = mysqli_query($conn, "UPDATE url SET clicks = clicks + 1 WHERE shorten_url = '{$new_url}'");
        if($sql2){
            $full_url = mysqli_fetch_assoc($sql);
            header("Refresh: 30; url=".$full_url['full_url']);
          }
      }
  }
?>

<!DOCTYPE html>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>DuinoShort | MyEcoria</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="redirect.css">
  <!-- Iconsout Link for Icons -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css">
</head>
<body>
  <div class="wrapper" style="text-align: center;">
    
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
        <div class="pad">
            <progress class="progress" value="0" max="100">0%</progress>
            <div class="alert alert-success" role="alert">Redirection ...</div>
        </div>
          

         <script type="text/javascript">
            var $alert = $('.alert');
            var $progressBar = $('.progress');

            var progress = 0;      //initial value of your progress bar
            var timeout =25;      //number of milliseconds between each frame
            var increment = .1;    //increment for each frame
            var maxprogress = 100; //when to leave stop running the animation

            function animate() {
                setTimeout(function () {
                    progress += increment;
                    if(progress < maxprogress) {
                        $progressBar.attr('value', progress);
                        animate();
                    } else {
                        $progressBar.css('display', 'none');
                        $alert.css('display', 'block');
                    }
                }, timeout);
            };
            animate();
         </script>
  </div>

  <script src="script.js"></script>

</body>
</html>