<?php
namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Razorpay\Api\Api;
//use Session;
//use Redirect;

class RazorpayController extends Controller
{
    public function payWithRazorpay()
    {
        $total_pay = session()->get('evisafeedollar');
        if($total_pay != 'redirect')
            return view('frontend.visas.payWithRazorpay');
        else
            return redirect()->route('frontend.visas.index')->withFlashSuccess(trans('alerts.backend.visas.updated'));
    }

    public function paymentSuccess()
    {
        session()->flash('vid');
        session()->flash('evpuid');
        session()->flash('process_steps');
        session()->flash('evisafeedollar');
        return view('frontend.visas.payment-response');
    }

    public function payment()
    {
        $visano = session()->get('evpuid');
//Input items of form
        $input = Input::all();
//get API Configuration
        $api = new Api(config('razor.razor_key'), config('razor.razor_secret'));
//Fetch payment information by razorpay_payment_id
        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));

            } catch (\Exception $e) {
                return $e->getMessage();
                \Session::put('error', $e->getMessage());
                return redirect()->back();
            }
// Do something here for store payment details in database...
            $invoice = new Invoice();
            $invoice->pg_flag = "razor";
            $invoice->visa_no = session()->get('evpuid');
            $invoice->title = $response->id;
            $invoice->price = $response->amount;
            $invoice->status = $response->status;
            $invoice->paid = ($response->status == 'captured' && $response->captured == true) ? 1 : 0;
            $invoice->order_id = $response->order_id;
            $invoice->invoice_id = $response->invoice_id;
            $invoice->international = $response->international;
            $invoice->method = $response->method;
            $invoice->amount_refunded = $response->amount_refunded;
            $invoice->refund_status = $response->refund_status;
            $invoice->captured = $response->captured;
            $invoice->card_id = $response->card_id;
            $invoice->bank = $response->bank;
            $invoice->wallet = $response->wallet;
            $invoice->vpa = $response->vpa;
            $invoice->email = $response->email;
            $invoice->contact = $response->contact;
            // $invoice->notes = $response->notes;
            $invoice->fee = $response->fee;
            $invoice->tax = $response->tax;
            $invoice->error_code = $response->error_code;
            $invoice->error_description = $response->error_description;
            //dd($response);
            $invoice->save();
            session()->put('code', true);
            session()->put('payment_mail_flag', true);
            session()->put('payment_price',session()->get('evisafeedollar'));
            session()->put('evisafeedollar', 'redirect');
        }

        session()->put('message', "Payment has been done successfully, Your Visa registration number is $visano. We will process it as soon as possible and will keep you updated regarding your visa process.");
        //\Session::put('success', "Payment has been done successfully, Your Visa registration number is $visano. We will process it ASAP and will keep you updated regarding your visa process");
        return redirect('/payment-update');
        //return redirect()->back();
    }
}