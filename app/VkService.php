<?php

namespace App;

use Illuminate\Support\Facades\Http;

class VkService{
    public function addProduct($name, $description, $category_id, $price, $weight,$vkToken)
    {
        $photourl='https://cdn1.ozone.ru/s3/multimedia-b/wc1200/6035424947.jpg';
        $vkGroupID = $category_id;
        $vkVersionAPI = config('services.vkontakte.v');
        $GET_getMarketUploadServer = [
            'group_id' => $vkGroupID,
            'main_photo' => 1,
            'access_token' => $vkToken,
            'v' => $vkVersionAPI
        ];
        $result_url_dp = json_decode(file_get_contents('https://api.vk.com/method/photos.getMarketUploadServer?' . http_build_query($GET_getMarketUploadServer)), TRUE);
        $curl_file = curl_file_create($photourl, 'image/jpeg', 'test_name.jpg');
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $result_url_dp['response']['upload_url'],
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => array("photo" => $curl_file)
        ));
        //Получим массив с хешем и прочим
        $img_attach = json_decode(curl_exec($ch), true);

        //Сохраняем фоточку отпрявляя ГЕТ запрос в ВК
        $GET_saveMarketPhoto = [
            'group_id' => $vkGroupID,
            'photo' => stripslashes($img_attach['photo']),
            'server' => $img_attach['server'],
            'hash' => $img_attach['hash'],
            'crop_data' => $img_attach['crop_data'],
            'crop_hash' => $img_attach['crop_hash'],
            'access_token' => $vkToken,
            'v' => $vkVersionAPI
        ];
        $photo = json_decode(file_get_contents('https://api.vk.com/method/photos.saveMarketPhoto?' . http_build_query($GET_saveMarketPhoto)), TRUE);

        $photoGoods = $photo['response'][0]['id'];

        $GET_marketadd = [
            'owner_id' => '-' . $vkGroupID . '',
            'name' => $name,
            'description' => $description,
            'category_id' => $category_id,
            'price' => $price,
            'main_photo_id' => $photoGoods,
            'weight' => $weight,
            'access_token' => $vkToken,
            'v' => $vkVersionAPI
        ];
        $addMarket = json_decode(file_get_contents('https://api.vk.com/method/market.add?' . http_build_query($GET_marketadd)), TRUE);

        return $addMarket;
    }
//    ($id, $name, $description, $category_id, $price, $weight){
//        $id = -$id;
//        $token=config('services.vkontakte.client_secret');
//        $for_upload = get_web_page("https://api.vk.com/method/photos.getMarketUploadServer?access_token=".$token."&group_id".$id);
//        $url_upload = json_decode($for_upload['content'])->response->upload_url;
//
//        $upload = get_web_page($url_upload, ['photo' => ['file1' => file_get_contents(public_path('images'))]]);
//        $response = Http::get(config('services.vkontakte.url'.'market.add', [
//            'owner_id' =>$id,
//            'name' =>$name,
//            'description' =>$description,
//            'category_id' =>$category_id,
//            'price' =>$price,
//            'weight' =>$weight,
//            'access_token' => $token,
//            'v' => config('services.vkontakte.version'),
//        ]));
//    }
//    private function get_web_page($url, $post = null)
//    {
//        $options = array(
//            CURLOPT_RETURNTRANSFER => true,     // return web page
//            CURLOPT_HEADER         => false,    // don't return headers
//            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
//            CURLOPT_ENCODING       => "",       // handle all encodings
//            CURLOPT_USERAGENT      => "spider", // who am i
//            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
//            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
//            CURLOPT_TIMEOUT        => 120,      // timeout on response
//            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
//            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
//        );
//
//
//        $ch      = curl_init( $url );
//        curl_setopt_array( $ch, $options );
//
//        if($post){
//            curl_setopt($ch, CURLOPT_POST, 1);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
//        }
//
//        $content = curl_exec( $ch );
//        $err     = curl_errno( $ch );
//        $errmsg  = curl_error( $ch );
//        $header  = curl_getinfo( $ch );
//        curl_close( $ch );
//
//        $header['errno']   = $err;
//        $header['errmsg']  = $errmsg;
//        $header['content'] = $content;
//        return $header;
//    }
}