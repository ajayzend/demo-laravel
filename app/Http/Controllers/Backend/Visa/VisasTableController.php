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
            ->addColumn('app_type', function ($visa) {
                return $visa->app_type;
            })

            ->addColumn('fname', function ($visa) {
                return $visa->fname;
            })

            ->addColumn('mname', function ($visa) {
                return $visa->mname;
            })

            ->addColumn('lname', function ($visa) {
                return $visa->lname;
            })
            ->addColumn('status', function ($visa) {
                return $visa->status;
            })
            ->addColumn('created_at', function ($visa) {
                return Carbon::parse($visa->created_at)->toDateString();
            })
            ->addColumn('actions', function ($visa) {
                return $visa->action_buttons;
            })
            ->make(true);
    }
}
