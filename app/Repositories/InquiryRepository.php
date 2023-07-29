<?php

namespace App\Repositories;

use App\Models\Inquiry;

class InquiryRepository extends BaseRepository
{

    public function __construct(
        Inquiry $inquiry
    )
    {
        parent::__construct($inquiry);
    }

}