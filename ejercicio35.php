<?php 

    $url="https://api.dailymotion.com/videos?channel=sport&limit=10";    

    $opciones=array("ssl"=>array("verify_peer"=>false,"verify_peer_name"=>false));

    $respuesta=file_get_contents($url,false,stream_context_create($opciones));

    $objResp=json_decode($respuesta);

    //print_r($objResp);

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <ul>

        <?php foreach($objResp->list as $video){ ?>

            <li><?php echo $video->title."<br>"; ?></li>

        <?php } ?>
        
    </ul>

</body>
</html>
