<?php
/* CodeByte - PHP Age Counting
 * ------------------------------------------------------------
    In the PHP file, write a program to perform a GET request on the
    route https://coderbyte.com/api/challenges/json/age-counting which contains
    a data key and the value is a string which contains items in the format: key=STRING, age=INTEGER.
    Your goal is to count how many items exist that have an age equal to or greater than 50, and print this final value.

    Example Input
    {“data”:”key=IAfpK, age=58, key=WNVdi, age=64, key=jp9zt, age=47″}

    Example Output
    2
 * -------------------------------------------------------------
*/

$ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);

$age = 0;
$ageCount = 0;
$data = json_decode($data, true)['data'];
//  The empty space after the comma in the explode() below is important
//  due to the nature of the data returned from the response above
$dataArr = explode(', ', $data);

for($i = 1; $i <= count($dataArr); $i += 2){
    $ageArr = explode('=', $dataArr[$i]);
    if($ageArr[1] >= 50){
        $ageCount++;
    }
}

print_r($ageCount);

// =============== ALTERNATIVE SOLUTION ===================
/*
$ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);
$data = curl_exec($ch);
curl_close($ch);

$response = json_decode($data, true);
//  The empty space after the comma in the explode() below is important
//  due to the nature of the data returned from the response above
$items = explode(', ', $response['data']);
$count = 0;

foreach($items as $item){
    if(substr($item, 0, 4 ) === "age=" && filter_var($item, FILTER_SANITIZE_NUMBER_INT) >= 50)
        $count++;
}
print_r($count);
*/
