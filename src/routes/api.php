<?php
use Illuminate\Support\Facades\Route;

Route::prefix('kakao')->group(function() : void {
    //얼굴 감지
    Route::get('/faceDetect', [\Kakao\Pay\Face\App\Http\Controllers\KakaoFaceController::class, 'faceDetect']);

    //얼굴 비교
    Route::get('/faceSimilarity', [\Kakao\Pay\Face\App\Http\Controllers\KakaoFaceController::class, 'faceSimilarity']);
});