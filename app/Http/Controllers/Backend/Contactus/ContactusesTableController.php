<?php

namespace App\Http\Controllers\Backend\Contactus;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Contactus\ContactusRepository;
use App\Http\Requests\Backend\Contactus\ManageContactusRequest;

/**
 * Class ContactusesTableController.
 */
class ContactusesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ContactusRepository
     */
    protected $contactus;

    /**
     * contructor to initialize repository object
     * @param ContactusRepository $contactus;
     */
    public function __construct(ContactusRepository $contactus)
    {
        $this->contactus = $contactus;
    }

    /**
     * This method return the data of the model
     * @param ManageContactusRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageContactusRequest $request)
    {
        return Datatables::of($this->contactus->getForDataTable())
            ->escapeColumns(['id'])

            ->addColumn('name', function ($contactus) {
                return $contactus->name;
            })

            ->addColumn('mobile', function ($contactus) {
                return $contactus->mobile;
            })

            ->addColumn('email', function ($contactus) {
                return $contactus->email;
            })

            ->addColumn('query', function ($contactus) {
                return $contactus->query;
            })
            ->addColumn('created_at', function ($contactus) {
                return Carbon::parse($contactus->created_at)->toDateString();
            })
            ->addColumn('actions', function ($contactus) {
                return $contactus->action_buttons;
            })
            ->make(true);
    }
}
