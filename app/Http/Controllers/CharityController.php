<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;

class CharityController extends Controller
{
    public function GetAllCharity()
    {
        $user = Auth::user();
        if ($user->user_type == 'user' || $user->user_type == 'admin') {
             return redirect()->route('dashboard');
        }
        else {
            $data = Charity::all();
        }
        return view('charity.list',['charities'=>$data,
        'navName'=>"All Charities",
        'user' => $user]);
    }

    public function GetAllMyCharity()
    {
        $user = Auth::user();
        if ($user->user_type == 'user') {
            return redirect()->route('dashboard');
        }
        if ($user->user_type == 'super_admin') {
            return redirect()->route('charity');
        }
        $data = Charity::where('email', auth()->user()->email)->get();
        $user = auth()->user();
                
        return view('charity.list',['charities'=>$data,
        'navName'=>"My Charity",
        'user'=> $user]);
    }
    
    public function create()
    {
        return view('charity.create');
    }

    public function post_create(Request $request,Charity $church)
    {
        $user = auth()->user();
        if(Charity::where('email',$user->email)->exists())
            return redirect()->back()->withInput()->with('message', "You are allowed to create charity only once");
        
            Charity::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'email' => $user->email,
            'active' => 1,
            'phone' => $request->input('phone'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),

        ]);

        
        $user->charity_id = Charity::where('email',$user->email)->first()->id;
        $user->save();

        return redirect()->route('my_charity');
    }

    public function deactivate($id)
    {
        Charity::where('id', $id)
            ->update(['active' => 0]);

        if (Auth::user()->isSuperAdmin()) {
            return redirect()->route('charity');
        }
        return redirect()->route('my_charity');
    }
    public function activate($id)
    {
        Charity::where('id', $id)
            ->update(['active' => 1]);

        if (Auth::user()->isSuperAdmin()) {
            return redirect()->route('charity');
        }
        return redirect()->route('my_charity');
    }

    public function edit($id)
    {
        $data = Charity::where('id', $id)->first();

        $disableControls = (auth()->user()->email == $data->email)?false:true;

        return view('charity.edit',['charity'=>$data,'disabled'=>$disableControls]);
    }

    public function post_edit(Request $request,$id)
    {
        Charity::where('id', $id)
            ->update(['name' => $request->input('name'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'postal_code' => $request->input('postal_code'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
            ]);
            
        return redirect()->route('my_charity');
    }

    public function createCategory(Request $request) {
        if (Auth::user()->charity_id == null) {
            return redirect()->route('my_charity');
        }
        Category::create([
            'description' => $request->input('description'),
            'charity_id' => Auth::user()->charity_id,
            'active' => 1
        ]);
        return redirect()->route('my_charity');
    }
}
