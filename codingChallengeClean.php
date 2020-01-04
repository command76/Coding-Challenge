<?php 

$file = file("coding_example.csv", FILE_SKIP_EMPTY_LINES);

$keys = array_shift($file);
$keyIndex = str_getcsv($keys, ",");
$uniqueArr = array();

$uniqueFile = array();
$fileId = 1;
$uniqueParent = array();
$multiLayer = array();


foreach($file as $i=>$row) {
    
    $getKeyValue = str_getcsv($row, ",");
    $arrCombined = array_combine($keyIndex, $getKeyValue);
    array_push($multiLayer, $arrCombined);
    $multiLayer[$i]["file_id"] = $fileId;
   
    array_push($uniqueFile, $fileId);
    array_push($uniqueParent, $arrCombined["parent_id"]);
   
    array_push($uniqueArr, $arrCombined["title"]);
    $firstLetter = substr($arrCombined["file_name"],0,1);
    if ((ord(strtolower($firstLetter))-96)%2 !== 0) {
        $numberOfOdd += 1;
    }
   $fileId++;
}

print("Number of Odd Letters: ".$numberOfOdd."\n");
if (sizeof($uniqueArr) == sizeof($file)) {
    $arrUnique = array_unique($uniqueArr);
    $uniqueArrValues = sizeof($arrUnique);
    print("Number of Unique Values: ".$uniqueArrValues)."\n";

}
for($i = 0; $i < sizeof($uniqueFile); $i++) {
    for($j = 0; $j < sizeof($uniqueParent); $j++) {
        if($uniqueFile[$i] == $uniqueParent[$j]) {
            if($multiLayer[$i]["file_id"] == $uniqueFile[$i]) {
                echo "<h3>".$uniqueFile[$i]." => ".$multiLayer[$i]["file_name"]."</h3>";
                if($multiLayer[$j]["parent_id"] == $uniqueParent[$j]) {
                echo "<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$uniqueParent[$j]." => ".$multiLayer[$j]["title"]."</p>";
                }
            }
        }
    }
}

?>