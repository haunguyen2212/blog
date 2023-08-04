<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\InquiryRequest;
use App\Mail\Front\ReplyInquiryMail;
use App\Repositories\InquiryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    protected $inquiry;

    public function __construct(
        InquiryRepository $inquiryRepository
    )
    {
        $this->inquiry = $inquiryRepository;
    }

    public function index(){
        return view('front.contact');
    }

    public function store(InquiryRequest $request){
        // try{
            DB::beginTransaction();
            $this->inquiry->create([
                'user_name' => $request->name,
                'email' => $request->email,
                'title' => $request->subject,
                'content' => $request->message
            ]);
            $mailData = [
                'user_name' => $request->name,
                'subject' => $request->subject,
                'message' => $request->message,
                'date_send' => Carbon::now()->format(config('constant.DATETIME_FORMAT_VIEW'))
            ];
            Mail::to($request->email)->send(new ReplyInquiryMail($mailData));
            DB::commit();
            return response()->json(['status' => 1]);
        // }
        // catch(\Exception $e){
        //     DB::rollBack();
        //     return response()->json(['status' => 0]);
        // }

    }
}
