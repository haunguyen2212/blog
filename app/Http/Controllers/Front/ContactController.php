<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\InquiryRequest;
use App\Repositories\InquiryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        try{
            DB::beginTransaction();
            $this->inquiry->create([
                'user_name' => $request->name,
                'email' => $request->email,
                'title' => $request->subject,
                'content' => $request->message
            ]);
            DB::commit();
            return 1;
        }
        catch(\Exception $e){
            DB::rollBack();
            return;
        }

    }
}
