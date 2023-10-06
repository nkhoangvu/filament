<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactCreate;
use App\Http\Requests\ContactRequest;
use App\Rules\GoogleRecaptcha;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use App\Models\Office;
use App\Models\Branch;
use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$pageTitle = 'Liên hệ';
        $current = 'cur_contact';
        $SEOData = new SEOData(title: $pageTitle, description: 'Dòng họ Nguyễn Khoa');

        return view('/frontend/contact', compact('pageTitle', 'current', 'SEOData'));  
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $input = $request->validated(); 
        
        $toEmail = $input['email'];
        $toName =  $input['name'];
        $email = env('MAIL_FROM_ADDRESS');
        $name = env('APP_NAME');
        $fromName = 'Trang thông tin & Gia phả';
        $subject_reply = 'Cảm ơn bạn đã liên hệ.';
        $subject_notif = 'Có tin nhắn từ trang web';
        $toNotif = 'info@nguyenkhoa.info';
        $page_title_en = "Contact Us";

        Mail::send('layouts.mail.contact_reply', $input, function($message) use ($toEmail, $toName, $email, $name, $subject_reply) {
            $message->to($toEmail, $toName)->subject($subject_reply);
            $message->from($email, $name);
         });
        
         Mail::send('layouts.mail.contact_notif', $input, function($message) use ($toNotif, $email, $name, $subject_notif, $fromName) {
            $message->to($toNotif, $name)->subject($subject_notif);
            $message->from($email, $fromName);
         });

        return redirect()->route('lien-he')->with('success', trans('common.mail_success')); 
    }


}
