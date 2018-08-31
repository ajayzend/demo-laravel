<?php

namespace App\Http\Controllers\Backend\Education;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Education\EducationRepository;
use App\Http\Requests\Backend\Education\ManageEducationRequest;

/**
 * Class EducationTableController.
 */
class EducationTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var EducationRepository
     */
    protected $education;

    /**
     * contructor to initialize repository object
     * @param EducationRepository $education;
     */
    public function __construct(EducationRepository $education)
    {
        $this->education = $education;
    }

    /**
     * This method return the data of the model
     * @param ManageEducationRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageEducationRequest $request)
    {
        return Datatables::of($this->education->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($education) {
                return Carbon::parse($education->created_at)->toDateString();
            })
            ->addColumn('actions', function ($education) {
                return $education->action_buttons;
            })
            ->make(true);
    }
}
