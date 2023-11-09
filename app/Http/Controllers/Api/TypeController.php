<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::select('id', 'label')->get();

        return response()->json($types);
    }

    public function show($id)
    {
        $type = Type::select('id', 'label')
            ->where('id', $id)
            ->first();

        return response()->json($type);
    }

}
