<?php
$ch = curl_init("https://api.leminnow.com/captcha/v1/cropped/validate");

$payload = json_encode(array(
		//https://help.leminnow.com/knowledge/how-does-lemin-verify-a-captcha-answer
        "private_key" => "[REPLACE HERE WITH YOUR PRIVATE KEY]",
        "challenge_id" => $_POST['challenge_id'],
        "answer" => $_POST['answer']
));
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$verify_result =[];
$result = curl_exec($ch);
$result = json_decode($result, true);
curl_close($ch);
if ($result["success"]) {
$verify_result['success']=true;
} else {
$verify_result['success']=false;
}
print_r(json_encode($verify_result));
die();
		
?>