<?php
$fullName= $_POST['fullName'];
$email= $_POST['email'];
$orderDetails= $_POST['orderDetails'];
$quantity= $_POST['quantity'];
$address= $_POST['address'];
$phone= $_POST['phone'];
$foodName= $_POST['foodName'];

//db connectio
$conn = new myqsli('localhost','root','','steaman')

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);

}
else {
    $stmt = $conn->prepare("insert into neworders(fullName, phone, email, foodName, orderDetails, address, quantity) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi", $fullName, $phone, $email, $foodName, $orderDetails, $address);
    $execval = $stmt->execute();
    //echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>