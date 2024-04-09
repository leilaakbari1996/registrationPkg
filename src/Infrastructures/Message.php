<?php

namespace Leila\RegistrationPlatform\Infrastructures;

use Illuminate\Http\Request;

class Message
{
    /**
     * @var
     */
    public $request;
    public $message;
    public $data;

    /**
     * @param $request
     * @param $message
     * @param $data
     */
    public function __construct(Request $request,$message ="" ,$data =[])
    {
        $this->request = $request;
        $this->message = $message;
        $this->data    = $data;
    }

    /**
     * @return array|mixed
     */
    public function failResponse(Request $request,$message="",$data=[])
    {
        if (!$request->wantsJson()) {
            return $data;
        }

        return response()->json([
            "status" => 0,
            "message" => $message,
            "data" => $data
        ])->getData();

    }

    /**
     * @return array|mixed
     */
    public function successResponse(Request $request,$message="",$data=[])
    {
        if (!$request->wantsJson()) {

            return $data;
        }
        return response()->json([
            "status" => 1,
            "message" => $message,
            "data" => $data
        ])->getData();
    }

}
