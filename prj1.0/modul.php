<?php
function enrg($user,$ville,$img,$age,$sexe,$loa,$pass)
{
    $varbd = fopen("BD.txt","a");
    fwrite($varbd,"$user|$ville|$img,$age,$sexe,$loa|$pass");
    fwrite($varbd,"\r\n");
    fclose($varbd);
}

function testread($user,$pass)
{
    $test = 0;
    $varbd = fopen("BD.txt","r");
    while(! feof($varbd)){
        $eng = fgets($varbd);
        if($eng != ""){
            $tab = explode("|",  $eng);
            $datauser = $tab[0];
            $datapass = $tab[count($tab)-1];
            if(($user == trim($datauser)) && (trim($datapass) == $pass))
            {
                $test = $tab;
                break;
            }
        }

    }
    fclose($varbd);
    return $test;
}

function getdataville()
{
    $varbd = fopen("BD.txt","r");
    $dataville=[];
    // $i = 0;
    while(! feof($varbd)){
        $eng = fgets($varbd);
        if($eng != ""){
            $tab = explode("|",  $eng);
            if(isset($tab[1])) {
              $dataville[] = strtolower($tab[1]);
            }
        }

    }

    fclose($varbd);
    return array_unique($dataville);
}

function search($ville)
{
    $test = array();
    $varbd = fopen("BD.txt","r");
    $i=0;
    while(! feof($varbd)){
        $i +=2;
        $eng = fgets($varbd);
        if($eng != ""){
            $tab= explode("|",  $eng);
            $datauser = $tab[0];
            if(isset($tab[1])) {
              $dataville = $tab[1];
              // echo "$dataville end $ville<br>";
            }
    
            if(strtolower(trim($dataville)) == strtolower($ville))
            {
                // echo "name : $datauser  ville : $dataville<br>";
                $test = array_merge($test, $tab);
            }
        }

    }

    fclose($varbd);
    return $test;

}
// function searchall()
// {
//     $test = array();
//     $varbd = fopen("BD.txt","r");
//     while(! feof($varbd)){
//         $eng = fgets($varbd);
//         if($eng != ""){
//             $tab= explode("|",  $eng);
//             $test = array_merge($test, $tab);
//         } 
//     }

//     fclose($varbd);
//     return $test;

// }
?>
