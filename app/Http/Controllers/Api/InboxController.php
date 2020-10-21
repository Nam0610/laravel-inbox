<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\inboxModel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InboxController extends Controller
{
    protected $zone = '1,2,4,5,6,8,9,10,11,12,13,14,17,18';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            $status = $request->get('status', '');
            $amount = $request->get('amount', 1);
            $key = $request->get('key', '');
            $inboxs = inboxModel::query();
            if (!empty($status)) {
                $inboxs = $inboxs->where('status', $status);
            }
            if (!empty($key)) {
                $inboxs = $inboxs->where('title', $key);
            }
            $limit = $request->get('limit') ?? 2;
            $inboxs = $inboxs->paginate($limit);
            return response()->json([
                'status' => 'true',
                'code' => Response::HTTP_OK,
                'model' => $inboxs->items(),
                'meta' => [
                    'total' => $inboxs->total(),
                    'perPage' => $inboxs->perPage(),
                    'currentPage' => $inboxs->currentPage(),
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $zone = $request->zone != null ? $request->zone : $this->zone;
            $payload = $request->all();
            $payload['status'] = 0;
            $payload['zone'] = $zone;
            $model = new inboxModel();
            $model->create($payload);
            return response()->json([
                'status' => 'true',
                'code' => Response::HTTP_OK,
                'model' => $model->items(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $model = inboxModel::query()->findOrFail($id);
            return response()->json([
                'status' => 'true',
                'code' => Response::HTTP_OK,
                'model' => $model->items(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $model = inboxModel::findOrFail($id);
            $model->update($request->all());
            return response()->json([
                'status' => 'true',
                'code' => Response::HTTP_OK,
                'model' => $model->items(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $model = inboxModel::findOrFail($id);
            $model->destroy($id);
            return response()->json([
                'status' => 'true',
                'code' => Response::HTTP_OK,
                'model' => $model->items(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'code' => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $e->getMessage(),
            ]);
        }

    }
}
