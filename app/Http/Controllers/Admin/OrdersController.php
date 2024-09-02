<?php

namespace App\Http\Controllers\Admin;

use App\Exports\InvoicesExport;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Operator;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Repositories\GenralSettingRepository;
use App\Services\OrderEditService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;

class OrdersController extends Controller
{
    public function __construct(public GenralSettingRepository $genralSettingRepository)
    {
    }

    public function index(Request $request)
    {

        if (!Admin()->can('orders view')) {
            abort(401);
        }

        $action = $request->action;
        if ($request->ajax()) {

            $data = Order::$action()->select('*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addIndexColumn()
                ->addColumn('Source', function ($row) {
                    return $row->Source;
                })
                ->addColumn('ZoneID', function ($row) {
                    return $row->zone['Addres' . getLang()];
                })
                ->addColumn('OrderDate', function ($row) {
                    return $row->OrderDate . ' - ' . getDayNames($row->OrderDate);
                })
                ->addColumn('DeliveryTime', function ($row) {
                    return $row->DeliveryTime . ' - ' . getDayNames($row->DeliveryTime);
                })
                ->addColumn('Total', function ($row) {
                    return number_format((float)$row->Total, 2, '.', '');
                })
                ->addColumn('action', function ($row) use ($action) {
                    if ($action == 'AcceptedOrder') {
                        $array = [
                            [
                                'title' => @langucw('order rejected'),
                                'url' => route('dashboard.orders.order_action', ['entity' => $row, 'status' => 'rejected', 'action' => $action]),
                                'icon' => 'fas fa-bars'
                            ]
                        ];
                    } else if ($action == 'RejectedOrder') {
                        $array = [[
                            'title' => @langucw('order acceptance'),
                            'url' => route('dashboard.orders.order_action', ['entity' => $row, 'status' => 'accepted', 'action' => $action]),
                            'icon' => 'fas fa-bars'
                        ]];

                    } else {
                        $array = [
                            [
                                'title' => @langucw('order rejected'),
                                'url' => route('dashboard.orders.order_action', ['entity' => $row, 'status' => 'rejected', 'action' => $action]),
                                'icon' => 'fas fa-bars'
                            ]
                            ,
                            [
                                'title' => @langucw('order acceptance'),
                                'url' => route('dashboard.orders.order_action', ['entity' => $row, 'status' => 'accepted', 'action' => $action]),
                                'icon' => 'fas fa-bars'
                            ]
                        ];
                    }


                    return view('components.table_crud', [
                        'entity' => $row,
                        'showViewButton' => true,
                        'showEditButton' => true,
                        'showDeleteButton' => false,
                        'showOptionsButton' => false,
                        'otherUrls' => $array


                    ])->render();
                })
                ->setRowClass(function ($row) {

                    return $row->PaymentMethod == 'pay by credit card' ? 'bg-success-subtle' : 'bg-warning-subtle';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.orders.index', ['action', $action]);
    }

    public function show(Order $entity)
    {
        if (!Admin()->can('orders view')) {
            abort(401);
        }
        return view('admin.orders.show', ['entity' => $entity, 'currency' => $this->genralSettingRepository->getCurrency(), 'operators' => Operator::all()]);

    }

    public function edit(Order $entity)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }

        return view('admin.orders.edit', ['entity' => $entity, 'currency' => $this->genralSettingRepository->getCurrency(), 'operators' => Operator::all(), 'products' => Item::all()]);

    }

    public function changeDeliveryType(Request $request, Order $entity)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        $check = OrderEditService::changeDeliveryType($request, $entity);
        switch ($check) {
            case 'successfully':
                return response()->json(['status' => 200, 'message' => "successfully", 'addValue' => $entity->AddValue], 200);
            case 'error':
                return response()->json(['status' => 500, 'message' => "error", 'addValue' => $entity->AddValue], 200);
        }
    }

    public function changeZone(Request $request, Order $entity)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        $check = OrderEditService::changeZone($request, $entity);
        switch ($check) {
            case 'successfully':
                return response()->json(['status' => 200, 'message' => "successfully", 'addValue' => $entity->AddValue], 200);
            case 'delivery-type':
                return response()->json(['status' => 422, 'message' => "error delivery-type", 'addValue' => $entity->AddValue], 200);
            case 'error':
                return response()->json(['status' => 500, 'message' => "error", 'addValue' => $entity->AddValue], 200);
        }
    }

    public function changePhone2(Request $request, Order $entity)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        try {
            $entity->Phone2 = $request->Phone2;
            $entity->save();
            return response()->json(['status' => 200, 'message' => "successfully"], 200);
        } catch (\Exception $ex) {
            return response()->json(['status' => 500, 'message' => "error"], 500);
        }

    }

    public function changeBranch(Request $request, Order $entity)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        $check = OrderEditService::changeBranch($request, $entity);
        switch ($check) {
            case 'successfully':
                return response()->json(['status' => 200, 'message' => "successfully", 'addValue' => $entity->AddValue], 200);
            case 'delivery-type':
                return response()->json(['status' => 422, 'message' => "error delivery-type", 'addValue' => $entity->AddValue], 200);
            case 'error':
                return response()->json(['status' => 500, 'message' => "error", 'addValue' => $entity->AddValue], 200);
        }
    }

    public function getItem(Request $request, Order $entity, Item $item)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        if ($request->ajax() || $request->wantsJson()) {
            return view('components.product-show-admin', [
                'product' => $item,
                'entity' => $entity
            ])->render();
        }


    }

    public function deleteItem(Order $entity, OrderDetail $item)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        $check = OrderEditService::deleteOrder($entity, $item);
        switch ($check) {
            case "successfully":
                return response()->json(['status' => 200, 'message' => 'Successfully', 'addValue' => $entity->AddValue, 'content' => view('components.order-edit-admin', ['entity' => $entity, 'currency' => $this->genralSettingRepository->getCurrency(), 'operators' => Operator::all()])->render()], 200);
            default:
                return response()->json(['status' => 500, 'message' => 'something went wrong'], 200);
        }


    }

    public function updateItem(Order $entity, OrderDetail $item, Request $request)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }

        if ($request->quantity != $item->Quantity) {
            $check = OrderEditService::updateOrder($request, $entity, $item);
            switch ($check) {
                case "successfully":
                    return response()->json(['status' => 200, 'message' => 'Successfully', 'addValue' => $entity->AddValue, 'content' => view('components.order-edit-admin', ['entity' => $entity, 'currency' => $this->genralSettingRepository->getCurrency(), 'operators' => Operator::all()])->render()], 200);
                default:
                    return response()->json(['status' => 500, 'message' => 'something went wrong'], 200);
            }
        }

        // return redirect()->back()->with('message', __('update successfully'));
    }

    public function OrderAction(Request $request, Order $entity)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        try {
            if ($request->status === 'accepted') {
                $result = $this->openBill($entity);
                logger($result->R_Data->R_OrderNumber??'');
                if (isset($result->R_IsSuccess) && $result->R_IsSuccess) {
                    $entity->Status = $request->status;
                    $entity->save();
                    return redirect()->route('dashboard.orders.index', ['action' => "NewOrder"])->with('message', "Bill created successfully with No. #" . $result->R_Data->R_OrderNumber?? '');
                } else {
                    $message = $result->Message ?? $result->R_Message;
                    return redirect()->route('dashboard.orders.index', ['action' => "NewOrder"])->with('error', $message);
                }
            } else {
                $entity->Status = $request->status;
                $entity->save();
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        return view('admin.orders.index', ['action' => $request->action]);
    }

    public function getCustomerId($user, $token)
    {
        $params = ['P_PhoneNumber' => $user->phone];
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->get(config('app.cake_api_url') . '/api/POSIntegration/GetContractorDetails', $params);

        if ($response->successful()) {
            $result = $response->json();
            if (isset($result['R_IsSuccess']) && $result['R_IsSuccess']) {
                return $result['R_Data']['R_KON_ID'];
            } else {
                $data = [
                    "P_STAID" => 1,
                    "P_KOGID" => 200002,
                    "P_PhoneNumber" => $user->phone,
                    "P_FirstName" => $user->name,
                    "P_LastName" => "",
                    "P_Address1" => "",
                    "P_Address2" => "",
                    "P_City" => "",
                    "P_Email" => $user->email,
                    "P_Description" => "",
                    "P_DateOfBirth" => $user->BirthDate,
                    "P_PostalCode" => "",
                    "P_CardNumber" => ""
                ];
                $url = config('app.cake_api_url') . '/api/POSIntegration/AddContractor';
                $headers = [
                    'Content-Type: application/json',
                    'Authorization: Bearer ' . $token
                ];

                $result = callAPI($url, $headers, $data, 'POST');
                if (isset($result->R_IsSuccess) && $result->R_IsSuccess) {
                    $customerId = $result->R_Data;
                    $user->CustomerID = $customerId;
                    $user->save();
                    return $customerId;
                }
            }
        }

    }

    public function openBill(Order $entity)
    {
        try {
            $items = [];
            foreach ($entity->order_details as $key => $item) {
                $items[$key] = [
                    "P_ItemID" => $item->item->ItemID,
                    "P_ItemType" => $item->item->ItemType,
                    "P_SalePrice" => $item->item->Price,
                    "P_DefaultPrice" => $item->item->Price,
                    "P_Content" => 1,
                    "P_Quantity" => $item->Quantity,
                    "P_Description1" => $item->Note,
                    "P_Description2" => $item->Note,
                    "P_ItemDetailsList" => [],
                ];
                foreach ($item->optionDetil()?->get() ?? [] as $option) {
                    $items[$key]['P_ItemDetailsList'][] = [
                        "P_ModifierID" => $option->subOption->ModifierID,
                        "P_DishsetID" => $option->option->DishsetID,
                        "P_ItemID" => $item->item->ItemID,
                        "P_Price" => $option->AdditionalValue,
                        "P_Content" => 1,
                        "P_Quantity" => $item->Quantity,
                    ];
                }
            }

            $token = $this->getToken();
            $data = [
                "order_id" => $entity->id,
                "P_StationID" => 1,
                "P_AccountOpenTypeID" => 11,
                "P_CustomerID" => $entity->user->CustomerID ?? $this->getCustomerId($entity->user, $token),
                "P_Description" => $entity->Note,
                "P_AddressDetails" => $entity->address,
                "P_Phone" => $entity->Phone ?? $entity->Phone2,
                "P_DLSID" => 1,
                'P_ItemList' => $items
            ];

            $url = config('app.cake_api_url') . '/api/POSIntegration/OpenBill';
            $headers = [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $token
            ];
            Log::debug('openbill', $data);
            return callAPI($url, $headers, $data, 'POST');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('dashboard.orders.index', ['action' => "NewOrder"])->with('error', $e->getMessage());
        }
    }

    public function addItemOrder(Request $request, Order $entity, Item $item)
    {
        if (!Admin()->can('orders edit')) {
            abort(401);
        }
        $check = OrderEditService::addItemOrder($request, $entity, $item);
        switch ($check) {
            case 'exists':
                return response()->json(['status' => 422, 'message' => "already exits"], 200);
            case "successfully":
                return response()->json(['status' => 200, 'message' => 'Successfully', 'addValue' => $entity->AddValue, 'content' => view('components.order-edit-admin', ['entity' => $entity, 'currency' => $this->genralSettingRepository->getCurrency(), 'operators' => Operator::all()])->render()], 200);
            default:
                return response()->json(['status' => 500, 'message' => 'something went wrong'], 200);
        }

    }

    public function exportPDF(Order $entity)
    {
        return Excel::download(new InvoicesExport($entity), $entity->id . '-invoices.pdf', \Maatwebsite\Excel\Excel::MPDF);
    }

    protected function getToken()
    {
        try {
            $url = config('app.cake_api_url') . '/token';
            $response = Http::asForm()->post($url, [
                'username' => config('app.username'),
                'password' => config('app.password'),
                'grant_type' => config('app.grant_type'),
            ]);
            return $response->json()['access_token'];
        } catch (\Exception $e) {
            $this->error('An error occurred: ' . $e->getMessage());
        }
    }
}
