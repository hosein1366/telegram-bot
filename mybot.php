<?php
        //https://api.telegram.org/bot1467108696:AAFjeFW2Ulhkca4TpchpfnCLyUwr9ftZToM/setwebhook?url=https://commenters.ir/bot.php

    $json = file_get_contents("php://input");
    $request = json_decode($json);
    //$token = "1446447446:AAE3OBP_grLNSX6RP1rmhWp5TUnYeCeuoZg";


    if (isset($request["message"])){

        $text = $request["message"]["text"];
        $chat_id = $request["message"]["chat"]["id"];
    }


    $replay = "پیام شما :" . $GLOBALS['text'];

    $url = "https://api.telegram.org/bot" . "1268566452:AAFyCg_A5Cz-W1nWWekCcwx5zNG8uI-X_U8" . "/sendMessage";
    $post_params = ['chat_id' => $GLOBALS['chat_id'] , ['text'] => $replay] ;

    send_replay($url , $post_params);



    function send_replay($url , $post_params){


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //get result
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;

    }


    ?>
