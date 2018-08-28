<?php

namespace App\Http\Controllers\Backend\Evisacountry;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Evisacountry\EvisacountryRepository;
use App\Http\Requests\Backend\Evisacountry\ManageEvisacountryRequest;

/**
 * Class EvisacountriesTableController.
 */
class EvisacountriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var EvisacountryRepository
     */
    protected $evisacountry;

    /**
     * contructor to initialize repository object
     * @param EvisacountryRepository $evisacountry;
     */
    public function __construct(EvisacountryRepository $evisacountry)
    {
        $this->evisacountry = $evisacountry;
    }

    /**
     * This method return the data of the model
     * @param ManageEvisacountryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageEvisacountryRequest $request)
    {
        return Datatables::of($this->evisacountry->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($evisacountry) {
                return Carbon::parse($evisacountry->created_at)->toDateString();
            })
            ->addColumn('actions', function ($evisacountry) {
                return $evisacountry->action_buttons;
            })
            ->make(true);
    }
}
