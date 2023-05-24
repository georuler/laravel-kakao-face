<?php
namespace Kakao\Pay\Face\App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Exceptions\CustomException;
use Kakao\Pay\Face\App\Traits\KakaoPayFaceTrait;

class KakaoFaceController
{
    use KakaoPayFaceTrait;

    /**
     * 얼굴 비교
     *
     * @param Request $request
     * @return array
     */
    public function faceSimilarity(Request $request) : array
    {
        try
        {            
            return $this->kakaoPostRequest([
                'apiUrl' => config('kakaoPayFace.faceSimilarity.apiUrl'),
                'data' => [
                    'image1' => [
                        'data' => ''
                    ],
                    'image2' => [
                        'data' => ''
                    ],
                ]
            ]);
        }
        catch(Exception $e) 
        {
            throw new Exception($e->getMessage());
        }
    }

    /**
     * 얼굴 감지
     *
     * @param Request $request
     * @return void
     */
    public function faceDetect(Request $request) : void
    {
        try
        {
            return $this->kakaoPostRequest([
                'apiUrl' => config('kakaoPayFace.faceDetect.apiUrl'),
                'data' => [
                    'image1' => [
                        'data' => ''
                    ]
                ]
            ]);
        }
        catch(Exception $e) 
        {
            throw new Exception($e->getMessage());
        }
    }
}