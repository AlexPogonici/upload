<?php

$target = "uploads/";

$target_fisier = $target . basename($_FILES["upload"]["name"]);

$upload = 1;

$tip_imagine = pathinfo($target_fisier,PATHINFO_EXTENSION);

if(isset($_POST['submit'])){

  $check = getimagesize($_FILES["upload"]["tmp_name"]);

  if($check!== false){
  	 echo "Fisierul este o imagine - ". $check["mime"] . ".";
  	 $upload = 1 ;
  } else{


    echo "Fisierul nu-i o imagine. ";
    $upload = 0;

  }

if (file_exists($target_fisier)) {
    echo "Fisieru' exista.";
    $upload = 0;
} 


if($_FILES["upload"]["size"]>6000000){
	echo "Fisieru' e prea mare.";
	$upload = 0;
}


if($tip_imagine != "jpg" && $tip_imagine != "png" 
	 && $tip_imagine !="jpeg" && $tip_imagine != "gif"){

	 echo "Scuze,numai fisierele de tipul JPG,JPEG,PNG si GIF sunt permise.";
	$upload = 0;
}

header('uploads/ '. $target_fisier .'');
readfile($target_fisier);
}


?>