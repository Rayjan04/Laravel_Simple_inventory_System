<?php

namespace App\Http\Controllers;
use App\Models\inventory;
use Illuminate\Http\Request;

class inventory_controller extends Controller
{
   
    //display controller
    public function displaydata(){
        
    $data = inventory::all();
    return view('dashboard',['inventories'=>$data]);
    }


    //display controller
    public function displayinventory(){

        $datas = inventory::all();
        return view('inventory',['inventories'=>$datas]);
    }
    

     // add controller
    public function additem(){
            return view('additem');
    }


    public function addinventory(Request $request){
        
        //validation
        $request->validate([
            'item' => 'required',
            'Qty' => 'required',
            'category' => 'required'
        ]);

        //eloquent insert Query
        $addQuery =  inventory::insert(
            ['items' => $request->input('item'), 
             'qty' => $request->input('Qty'),
             'category' => $request->input('category'),
            ]);

        return redirect('inventory');
     }
     

    public function delete_inventory($id){

        //eloquent query for delete inventory
        $deleteQuery = inventory::find($id);
        $deleteQuery->Delete();
        return  redirect('inventory');
    }

    public function display_update($id){

      //eloquent query for display data using find 
      $updatedata = inventory::find($id);
      return view('updateform',['updates'=>$updatedata]);
    }

    public function update_inventory(Request $request){

        //validation
        $request->validate([
            'item' => 'required',
            'Qty' => 'required',
            'category' => 'required'
        ]);

        //eloquent query for update using where clauses 
        inventory::where('id', $request->input('id'))
        ->update(
            ['items' => $request->input('item'), 
             'qty' => $request->input('Qty'),
             'category' => $request->input('category')
            ]);
        
        return redirect('inventory');
    }


    public function Search(Request $request){

        $search = $request->get('search');
        //search Query Builder
        $inventories = inventory::where('items' ,'LIKE', '%'.$search.'%')->get();

        //count Database: Query Builder
        $count = inventory::where('items' ,'LIKE', '%'.$search.'%')->count();
    
        return view('Dashboard',compact('inventories'),['Count'=>$count]);
        
    }
}



