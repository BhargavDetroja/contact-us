<?php

namespace YudizBhargav\ContactUs\Http\Controllers;

use App\Http\Controllers\Controller;
use YudizBhargav\ContactUs\Http\Requests\CntactUs\ContactUsRequest;
use YudizBhargav\ContactUs\Models\ContactUs;

class ContactUsController extends Controller
{
    //

    public function index()
    {
        return view('contact-us.index');
    }

    public function store(ContactUsRequest $request)
    {
        try
        {

            $contactUs=ContactUs::create($request->validated());
            // Public Folder
            if ($request->hasFile('image')) {
                $contactUs->image = $request->image->store('images/contact-us');
                $contactUs->save();
            }

            return redirect()->back()->with('message', 'Your details have been successfully submitted');

        } catch (\Throwable $th) {
            return redirect()->back()->with('err-message', 'Something went wrong try again');

        }



    }

}
