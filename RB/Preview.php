<?php
$file = "allcv/".$_REQUEST['file'];

$handle = fopen($file, 'r');
$data = fread($handle,filesize($file));
 ?>
 <!DOCTYPE html>
 <html>
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title></title>
     <style type="text/css">
/*             div {
            margin: 5px;
        }
  
        .first {
            width: 50%;
            display: inline-grid;

        }*/div{
          margin: auto;
          width: 90%;
          height: 100%;
          /*border: 1px solid;*/
          padding: 10px ;}
     </style>
 </head>
 <body>
        <div class="first" ><?php echo $data; ?></div>
 </body>
 </html>