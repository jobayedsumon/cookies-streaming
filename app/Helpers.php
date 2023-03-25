<?php

if (!function_exists('send_sms')) {
    function send_sms($phone_number, $text)
    {
        try {
            $api_key = 'mpF1FwAgbkTRd2G7B6gNT9bZsZM5KWogqzHjoX7z';
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.sms.net.bd/sendsms',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array('api_key' => $api_key,'msg' => $text,'to' => $phone_number),
            ));

            curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);

            if (!$err) {
                $response = true;
            } else {
                $response = false;
            }
        } catch (\Exception $e) {
            $response = false;
        }

        return $response;

    }
}
