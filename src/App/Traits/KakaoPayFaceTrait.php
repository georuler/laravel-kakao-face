<?php
namespace Kakao\Pay\Face\App\Traits;

use Exception;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Http;

trait KakaoPayFaceTrait 
{
    public array $headers = [
        "Content-Type" => "application/json"
    ];

    //request connect timeout init -> unit : second
    public int $connectTimeOut = 10;

    //request response timeout init -> unit : second
    public int $responseTimeOut = 10;

    /**
     * post Request
     *
     * @param array $params
     * @return array
     */
    public function kakaoPostRequest(array $params) : array
    {
        try
        {
            $this->headers['Authorization'] = 'SECRET_KEY '.config('kakaoPayFace.token.secret_key');
            
            $response = Http::timeout($this->responseTimeOut)
            ->withHeaders($this->headers)
            ->post($params['apiUrl'], $params['data'])
            ->throw()
            ->json();

            return $response;
        }
        catch (Exception $e)
        {
            return [
                'similarity' => -1
            ];
        }
    }
}