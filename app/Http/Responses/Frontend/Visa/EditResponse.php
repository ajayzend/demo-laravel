<?php

namespace App\Http\Responses\Frontend\Visa;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var \App\Models\Faqs\Faq
     */
    protected $visa;

    /**
     * @param \App\Models\Visas\Visa $visa
     */
    public function __construct($visa)
    {
        $this->visa = $visa;
    }

    /**
     * toReponse.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('frontend.visaprocess.visaprocess1')
            ->with('visa', $this->visa);
    }
}
