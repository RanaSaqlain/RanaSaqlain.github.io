<?php

 $I =array();

 $a1 =array();
 $S =array();

 $Smain =array();

for ($i=0; $i =15 ; $i++) { 
	for ($j=0; $j =15 ; $j++) { 
		  


		  $r = rand(0,255);

         $I[$j] = $r;
        

	}
$a1[$i]=$I;
}

for ($i=0; $i =15 ; $i++) { 

    print_r($a1[$i]);
    echo "<br>";

}
$Smain= $a1;


echo "<br><hr><br> S-BOX <br><br>";
for ($i=0; $i =15 ; $i++) { 

    print_r($Smain[$i]);
    echo "<br>";

}



	?>