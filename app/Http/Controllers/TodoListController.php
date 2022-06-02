<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Input model at the top---
use App\Models\ListItem;

class TodoListController extends Controller
{
    //Start Coding---

    //index method return welcome page---
    //return all the values in ListItem---
    public function index() {
        //show all the listItem in the page---
        // return view('welcome', ['listItems'=> ListItem::all()]);

        //show the only 0 is_complete listItem in the papge---
        return view('welcome', ['listItems' => ListItem::where('is_complete', 0)->get()]);
    }

    // markComplete Method---
    public function markComplete($id) {
        //For checking the route is working or not ---
        // return view('welcome', ['listItems'=> ListItem::all()]);
        
        // dd($id);
        \Log::info($id);
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        \Log::info($listItem);
        return redirect('/');
    }

    // SaveItem method take Request object---
    // Request object is every trhing passing in to the form in end point---
    public function saveItem(Request $request) {

        //generate token and show in log file---
        // \Log::info(json_encode($request->all()));

        // SaveItem to the database---
        //Define new Item--- ListItem in label---
        $newListItem = new ListItem;
        //Setting the name and ListItem passing in the requset--- listItem in input
        $newListItem->name = $request->listItem;
        //The default vale of is_complete---
        $newListItem->is_complete = 0;
        //Save Item---
        $newListItem->save();

        // 'listItems'=> ListItem::all()]) Because to slove the problem to show list of new item added---
        // return view('welcome', ['listItems'=> ListItem::all()]);

        // Redirect the page and reconfirmation not show in the page
        return redirect('/');

    //End Coding---

    }
}
