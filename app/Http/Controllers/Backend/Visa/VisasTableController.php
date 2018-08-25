<?php

namespace App\Http\Controllers\Backend\Visa;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Visa\VisaRepository;
use App\Http\Requests\Backend\Visa\ManageVisaRequest;

/**
 * Class VisasTableController.
 */
class VisasTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var VisaRepository
     */
    protected $visa;

    /**
     * contructor to initialize repository object
     * @param VisaRepository $visa;
     */
    public function __construct(VisaRepository $visa)
    {
        $this->visa = $visa;
    }

    /**
     * This method return the data of the model
     * @param ManageVisaRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageVisaRequest $request)
    {
        return Datatables::of($this->visa->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('visa_no', function ($visa) {
                return $visa->visa_no;
            })

            ->addColumn('p1_app_type', function ($visa) {
                return $visa->p1_app_type;
            })

            ->addColumn('p1_fname', function ($visa) {
                return $visa->p1_fname;
            })

            ->addColumn('p1_mname', function ($visa) {
                return $visa->p1_mname;
            })

            ->addColumn('p1_lname', function ($visa) {
                return $visa->p1_lname;
            })
            ->addColumn('status', function ($visa) {
                return $visa->status;
            })
            ->addColumn('created_at', function ($visa) {
                return Carbon::parse($visa->created_at)->toDateString();
            })
            ->addColumn('p1_dob', function ($visa) {
                return Carbon::parse($visa->p1_dob)->toDateString();
            })
            ->addColumn('p1_edate', function ($visa) {
                return Carbon::parse($visa->p1_edate)->toDateString();
            })
            ->addColumn('actions', function ($visa) {
                return $visa->action_buttons;
            })
            ->make(true);
    }
}
