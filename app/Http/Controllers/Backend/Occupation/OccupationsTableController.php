<?php

namespace App\Http\Controllers\Backend\Occupation;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Occupation\OccupationRepository;
use App\Http\Requests\Backend\Occupation\ManageOccupationRequest;

/**
 * Class OccupationsTableController.
 */
class OccupationsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var OccupationRepository
     */
    protected $occupation;

    /**
     * contructor to initialize repository object
     * @param OccupationRepository $occupation;
     */
    public function __construct(OccupationRepository $occupation)
    {
        $this->occupation = $occupation;
    }

    /**
     * This method return the data of the model
     * @param ManageOccupationRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageOccupationRequest $request)
    {
        return Datatables::of($this->occupation->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($occupation) {
                return Carbon::parse($occupation->created_at)->toDateString();
            })
            ->addColumn('actions', function ($occupation) {
                return $occupation->action_buttons;
            })
            ->make(true);
    }
}
