<?php

namespace App\Http\Controllers\Backend\Port;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Backend\Port\PortRepository;
use App\Http\Requests\Backend\Port\ManagePortRequest;

/**
 * Class PortsTableController.
 */
class PortsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var PortRepository
     */
    protected $port;

    /**
     * contructor to initialize repository object
     * @param PortRepository $port;
     */
    public function __construct(PortRepository $port)
    {
        $this->port = $port;
    }

    /**
     * This method return the data of the model
     * @param ManagePortRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManagePortRequest $request)
    {
        return Datatables::of($this->port->getForDataTable())
            ->escapeColumns(['id'])
            ->addColumn('created_at', function ($port) {
                return Carbon::parse($port->created_at)->toDateString();
            })
            ->addColumn('name', function ($port) {
                return $port->name;
            })
            ->addColumn('actions', function ($port) {
                return $port->action_buttons;
            })
            ->make(true);
    }
}
