<?php

namespace App\Http\Controllers\Backend\Religion;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Religion\ReligionRepository;
use App\Http\Requests\Backend\Religion\ManageReligionRequest;

/**
 * Class ReligionsTableController.
 */
class ReligionsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ReligionRepository
     */
    protected $religion;

    /**
     * contructor to initialize repository object
     * @param ReligionRepository $religion;
     */
    public function __construct(ReligionRepository $religion)
    {
        $this->religion = $religion;
    }

    /**
     * This method return the data of the model
     * @param ManageReligionRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageReligionRequest $request)
    {
        return Datatables::of($this->religion->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($religion) {
                return Carbon::parse($religion->created_at)->toDateString();
            })
            ->addColumn('actions', function ($religion) {
                return $religion->action_buttons;
            })
            ->make(true);
    }
}
