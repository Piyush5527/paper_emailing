<?php
    // echo "hello";
    // $curl = curl_init();
    // curl_setopt_array($curl, array(
    //      CURLOPT_URL => 'https://emailidea.biz/api/sendEmail',
    //      CURLOPT_RETURNTRANSFER => true,
    //      CURLOPT_ENCODING => '',     
    //      CURLOPT_MAXREDIRS => 10,
    //      CURLOPT_TIMEOUT => 0, 
    //      CURLOPT_FOLLOWLOCATION => true,      
    //      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //      CURLOPT_CUSTOMREQUEST => 'POST',
    //      CURLOPT_POSTFIELDS =>
    //         'ApiKey=f53b79f0dc7d487da43e9a903e91821f
    //          From=tempmail4812@gmail.com
    //          FromName=tempmail4812@gmail.com    
    //          ReplyTo=tempmail4812@gmail.com
    //          To=piyushjainkgp36@gmail.com
    //          Subject=xyz&
    //          Body=xyz&',
    //     CURLOPT_HTTPHEADER => array( 'Content-Type: application/x-www-form-urlencoded'),
    // ));

    $ch= curl_init();
    curl_setopt($ch,CURLOPT_URL,'https://emailidea.biz/api/sendEmail');
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_VERBOSE, true);
    $result = curl_exec($ch);
    curl_close($ch);
    echo $result;
    
    // $response = curl_exec($curl);
    // curl_close($curl);
    // echo $response;
    
?>