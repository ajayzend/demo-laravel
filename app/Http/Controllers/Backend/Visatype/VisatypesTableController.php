<?php

namespace App\Http\Controllers\Backend\Visatype;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Visatype\VisatypeRepository;
use App\Http\Requests\Backend\Visatype\ManageVisatypeRequest;

/**
 * Class VisatypesTableController.
 */
class VisatypesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var VisatypeRepository
     */
    protected $visatype;

    /**
     * contructor to initialize repository object
     * @param VisatypeRepository $visatype;
     */
    public function __construct(VisatypeRepository $visatype)
    {
        $this->visatype = $visatype;
    }

    /**
     * This method return the data of the model
     * @param ManageVisatypeRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageVisatypeRequest $request)
    {
        return Datatables::of($this->visatype->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($visatype) {
                return Carbon::parse($visatype->created_at)->toDateString();
            })
            ->addColumn('actions', function ($visatype) {
                return $visatype->action_buttons;
            })
            ->make(true);
    }
}
