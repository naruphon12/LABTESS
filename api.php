<?php

  $strAccessToken = "AHnv9qVdS2tMYN25CPL0yV+x/G6Z3WqgwOvoWb99ORNyfgY2dDy6R/7KvWc6mLKUK6OAj+TuSpilJkTxMa3x1+ie8toLFfj7EMf2CklzCW/s7nCzBPTJHmn40B22V10HGlhOQbdgcYIVinuGbmXobQdB04t89/1O/w1cDnyilFU=";
  //$strAccessToken = "eAnt4bRuZ7yYDz0JTDKUhbQp0slqwUHMepuTGOfbhZwJurCrd7y8qXjX8UaST8xQsknAI6CN4nWGv3t6LwkONikxfursy4+Neax1rgBT2g7HmHswuqR4iA7T2zRJUYHyuTWZnN7niYM1dl+0qJCnvQdB04t89/1O/w1cDnyilFU=";

  $content = file_get_contents('php://input');
  $arrJson = json_decode($content, true);

  $strUrl = "https://api.line.me/v2/bot/message/reply";

  $arrHeader = array();
  $arrHeader[] = "Content-Type: application/json";
  $arrHeader[] = "Authorization: Bearer {$strAccessToken}";
  $_msg = $arrJson['events'][0]['message']['text'];


  $api_key="xX3Bhqg9gp1ds9yfrPfgzaa8BlYS2igP";
  $url = 'https://api.mongolab.com/api/1/databases/data/collections/datas?apiKey='.$api_key.'';
  $json = file_get_contents('https://api.mongolab.com/api/1/databases/data/collections/datas?apiKey='.$api_key.'&q={"question":"'.$_msg.'"}');
  $data = json_decode($json);
  $isData=sizeof($data);

  if (strpos($_msg, 'สอนอุ๋ง') !== false) 
  {
    if (strpos($_msg, 'สอนอุ๋ง') !== false) 
    {
      $x_tra = str_replace("สอนอุ๋ง","", $_msg);
      $pieces = explode("|", $x_tra);
      $_question=str_replace("[","",$pieces[0]);
      $_answer=str_replace("]","",$pieces[1]);
      //Post New Data
      $newData = json_encode(
        array(
          'question' => $_question,
          'answer'=> $_answer
        )
      );
      $opts = array(
        'http' => array(
            'method' => "POST",
            'header' => "Content-type: application/json",
            'content' => $newData
         )
      );
      $context = stream_context_create($opts);
      $returnValue = file_get_contents($url,false,$context);
      $arrPostData = array();
      $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
      $arrPostData['messages'][0]['type'] = "text";
      $arrPostData['messages'][0]['text'] = 'ขอบคุณที่สอนอุ๋งนะ';
    }
  }
  else
  {
    if($isData >0){
       foreach($data as $rec){
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = $rec->answer;
       }
    }
    else
    {
        $arrPostData = array();
        $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
        $arrPostData['messages'][0]['type'] = "text";
        $arrPostData['messages'][0]['text'] = 'อุ๋งๆ คุณสามารถสอนให้ฉลาดได้เพียงพิมพ์: สอนอุ๋ง[คำถาม|คำตอบ]';
    }
  }


  $channel = curl_init();
  curl_setopt($channel, CURLOPT_URL,$strUrl);
  curl_setopt($channel, CURLOPT_HEADER, false);
  curl_setopt($channel, CURLOPT_POST, true);
  curl_setopt($channel, CURLOPT_HTTPHEADER, $arrHeader);
  curl_setopt($channel, CURLOPT_POSTFIELDS, json_encode($arrPostData));
  curl_setopt($channel, CURLOPT_RETURNTRANSFER,true);
  curl_setopt($channel, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($channel);
  curl_close ($channel);
  echo "sucess full";
?>
