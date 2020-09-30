<?php

namespace App\Http\Controllers;

use App\Http\Service\CallService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CallController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param CallService $callService
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request, CallService $callService)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|regex:/[+0-9]+/i',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $callService->call($request->get('phone'));
        return response()->json(['ok'], 200);
    }
}
