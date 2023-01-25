<?php

// use App\Http\Controllers\ContactUsController;
use Illuminate\Support\Facades\Route;
use YudizBhargav\ContactUs\Http\Controllers\ContactUsController;

// Route::get('contact-us',[ContactUsController::class,'index'])->name('contact-us');
Route::middleware(['guest', 'web'])->group(function () {
        Route::get('contact-us',function (){
            return view('contactUs::contact-us.index');
        })->name('contact-us');

    Route::post('contact-us',[ContactUsController::class,'store'])->name('contact-us');
});
