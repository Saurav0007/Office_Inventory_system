<?php

namespace App\Http\Controllers;

use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TypeController extends Controller
{
    //
    public function productType(Request $request)
    {
        $new = new type();
        $new->pr_name = $request->input('pr_name');
        $new->pr_type = $request->input('pr_type');
        $new->save();
        return redirect('/type');
    }
    public function getProductNameByType(Request $request)
    {
        $value = type::where('pr_type', $request->type_id)->get();
        return view('product_name_dropdown', compact('value'));
    }
}
