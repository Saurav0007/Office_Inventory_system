<?php

namespace App\Http\Controllers;

use App\employee;
use App\empSelectedData;
use App\inventory;
use App\type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventoryController extends Controller
{
    //
    public function inventoryDetails(Request $request){
        $new = new inventory();
        $new->item_id=$request->input('itemId');
        $new->select_type=$request->input('type');
        $new->type=$request->input('cate');
        $new->brand=$request->input('brand');
        $new->description=$request->input('description');
        $new->man_date=$request->input('manu-date');
        $new->ex_date=$request->input('ex-date');
        $new->stock=$request->input('stock');
        $new->entry_date=$request->input('entry-date');
        $new->save();
        return redirect('/');
    }
    public function empDataSub(Request $request){
        $new = new empSelectedData();
        $new->selectedData=$request->input('selectedData');
        $new->userName=$request->input('userName');
        $new->floor=$request->input('floor');
        $new->room=$request->input('room');
        $new->bedNumber=$request->input('bed');
        $new->designation=$request->input('designation');
        $new->phone=$request->input('phone');
        // $new->emp_id=$request->input('emp_id');
        $new->save();
        return redirect('/');
    }
    public function delete($id){
        $data = inventory::find($id);
        $data->delete();
        return redirect('/');
    }
    
    public function getDetails($id){
        $userList =  DB::table('inventories')
        ->join('emp_selected_data','emp_selected_data.selectedData','inventories.id')
        ->join('employees','emp_selected_data.emp_id','employees.id')->where('inventories.id',$id)->get();
        dd($userList);
    }

    public function search(Request $request){
        $search = $request->input('search');
    
        $posts = inventory::query()
            ->where('item_id', 'LIKE', "%{$search}%")
            ->get();
    
        return view('/details', compact('posts'));
    }
}
