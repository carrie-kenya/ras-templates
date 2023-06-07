<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");
$conn = mysqli_connect("localhost","root","","tra_templates");

$data = array();

if($conn){
    $select ="SELECT * FROM payments";
    $results = mysqli_query($conn,$select);
    
    if($results){
        header("Content-Type: JSON");
     
        $i = 0;
        $counter = 0; 
        
        while($row = mysqli_fetch_assoc($results)){
            $data[$i]["serialnumber"] = $counter;
            $data[$i]["id"] = $row["id"];
            $data[$i]["dop"] = $row["dateofpayment"];
            $data[$i]["mop"] = $row["modeofpayment"];
            $data[$i]["ap"] = $row["amountofpayment"];

            $i++;
            $counter++; 
        }

        echo json_encode($data, JSON_PRETTY_PRINT);

    }
}else{
    echo("connection error/sever down");
};

?>