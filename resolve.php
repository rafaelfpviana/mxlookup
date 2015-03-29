<?php
header('Content-Type: application/json');
$json = json_decode($_POST['json']);
exec('dig ' . $json->{'domain'} . ' mx +short|sort -n', $output);


function removePriority($in){
    $out = array();
    foreach($in as $line){
        $line = explode(" ", $line);
        $out[] = $line[1];
    }
    return $out;
}


$json->{'mx'} = removePriority($output);

echo json_encode($json);

?>