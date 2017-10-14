<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{


    /**
     * AjaxController constructor.
     */
    public function __construct(Request $request)
    {
        if (!$request->ajax()) return;
    }

    public function getAttributes(Request $request)
    {
        $attr = [
            1 => "Option 1",
            2 => "Option 2",
            3 => "Option 3",
            4 => "Option 4",
            5 => "Option 5",
        ];

        return \Response::json($attr);
    }
}
