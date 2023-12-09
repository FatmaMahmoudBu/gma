<?php

use App\User;
use Illuminate\Http\Request;

if (!function_exists('sendNotification')) {
    function sendNotification(Request $request) {
        $url = 'https://fcm.googleapis.com/fcm/send';

        if(auth()->user()->hasRole('طالب الخدمة')){
            $FcmToken = User::whereHas('roles', function($q){$q->where('name', 'owner');})->whereNotNull('device_token')->pluck('device_token')->toArray();
            $data = [
                "registration_ids" => $FcmToken,
                "notification" => [
                    "title" => "طلب خدمة جديد",
                    "body" => $request->name,  
                ]
            ];
        } else if(auth()->user()->hasRole('owner')){
            $FcmToken = User::where('id', $request->client_id)->whereNotNull('device_token')->pluck('device_token')->toArray();
            $data = [
                "registration_ids" => $FcmToken,
                "notification" => [
                    "title" => "موقع الخدمات الإدارية",
                    "body" => "حالة الخدمة المطلوبة بتاريخ ".$request->request_date." : ".$request->status,  
                ]
            ];
        }

        $encodedData = json_encode($data);
        //$FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();
            
        $serverKey = 'AAAA-OgUjFE:APA91bEjxda1UzYT3eoaBAOkDDqF2xZEQe_WAjjskMLo2fUdVSqU3AqyvE9glamY7ELIefRUbqBmGeKf8Jo-UZJ7hm1xJv8gTiMB48N_xEDpWLA1YAjPVSPW9iKKSDyoBiRbLXrYFWbe'; // ADD SERVER KEY HERE PROVIDED BY FCM
    
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        // Close connection
        curl_close($ch);
        // FCM response
        //dd($result);
    }
}

?>