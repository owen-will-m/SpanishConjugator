<?php
 $verb = $_GET['verb'];
 $mood = $_GET['mood'];
 $tense = ucfirst($_GET['tense']);
error_reporting(E_ERROR | E_PARSE);



$doc = new DOMDocument();
$doc->loadHTMLFile("http://api.verbix.com/conjugator/html?language=spa&tableurl=http://tools.verbix.com/webverbix/personal/template.htm&verb=".$verb);
//echo $doc->getElementsByTagName('td')->length;

$file = $doc->saveHTML();
$file = preg_replace('#<[^>]+>#', ' ', $file);
$array = explode(' ',$file);
$result = array_map('trim', $array);
$array = array_filter($array);
$array = array_values($array);
$verb = array();

//echo var_dump($array);
echo json_encode(getNextValues($array,$tense, 12, $mood, $tense));



// 1 for indicativ 2 for subjunctie
function getNextValues($array, $value, $int, $first, $tense){
    if($tense=="Preterito"){//in the preterite tense

            $value = 'hube';
            $array = array_reverse($array);
        
        $index = array_search($value, $array);
    
        $array = array_reverse($array);
        $index = sizeof($array)- $index;
        $index--;
            $conj = array();
        
                for($i=$int+5;$i>5;$i--){
                array_push($conj, $array[$index - $i]);
                }
    
            return $conj;
    }
    
    
    if($first==2){
        $array = array_reverse($array);
        
        $index = array_search($value, $array);
    
        $array = array_reverse($array);
        $index = sizeof($array)- $index;
        $index--;
    }else{
            $index = array_search($value, $array);
    }
    $conj = array();
    for($i=1;$i<=$int;$i++){
        array_push($conj, $array[$index + $i]);
    }
    return $conj;
}



?>