<?php


namespace common\components;


use linslin\yii2\curl\Curl;

class RandomWord
{
    const URL = 'https://random-word-api.herokuapp.com/word';

    /**
     * @param array $params
     * @return string
     * @throws \Exception
     */
    public static function init($params = [])
    {
        $curl = new Curl();
        $response = $curl
            ->setGetParams($params)
            ->get(self::URL)
        ;

        if($curl->responseCode != 200 || $curl->errorCode) {
            \Yii::warning([$curl->responseCode, $curl->errorCode]);
            return '';
        }

        return implode(" ", self::decodeBody($response));
    }

    /**
     * @param $json
     * @return array
     */
    public static function decodeBody($json)
    {
        $arr = json_decode($json, true);
        return ($arr === null || !is_array($arr)) ? [] : $arr;
    }

}