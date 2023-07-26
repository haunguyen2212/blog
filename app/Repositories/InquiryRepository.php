<?php

namespace App\Repositories;

use App\Models\Inquiry;

class InquiryRepository
{
    protected $inquiry;

    public function __construct(
        Inquiry $inquiry
    )
    {
        $this->inquiry = $inquiry;
    }

    public function create($data){
        return $this->inquiry->create($data);
    }

}