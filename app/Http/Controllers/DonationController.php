<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreDonationRequest;
use App\Http\Requests\UpdateDonationRequest;
use App\Models\Category;

use App\Models\Charity;
use App\Models\Donation;
use App\Models\Donor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(auth()->user()->user_type == "admin"){
            $donations=Donation::all();
        }
        else{
            $charity_id = auth()->user()->charity_id;

        $donations = Donation::where('active', true)->where('charity_id',$charity_id)->get();
        }


        return view('donation.index', compact('donations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // abort_if(Gate::denies('donation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if(auth()->user()->user_type == "admin"){
        $charities = Charity::where('active', true)->get();
        $donors = Donor::where('Active', true)->get();
        $categories = Category::where('Active', true)->get();
        return view('donation.create',compact('charities','donors','categories'));
        }
        else{
        $charity_id = auth()->user()->charity_id;
        $donors = Donor::where('charity_id', $charity_id)->where('Active', true)->get();
        $categories = Category::where('charity_id', $charity_id)->where('Active', true)->get();
        return view('donation.create',compact('donors','categories'));
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreDonationRequest $request)

    {

        // Donation::create($request->validated());

        // return redirect()->route('donation.index');
    }

    public function post_create(Request $request){

        if($request->input('donator') == "-1" || $request->input('target') == "-1" || $request->input("charity") == "-1"){
            return  redirect()->back()->with('message', 'Cannot choose the default option!');
        }
        if(auth()->user()->user_type == "admin"){
            $donor_number = $request->input('donator');
            $cat_id = $request->input('target');
            $donor_char_id = Donor::where('donor_number',$donor_number)->first()->charity_id;
            $categ_char_num = Category::where('id', $cat_id)->first()->charity_id;;
            $charity_id=$request->input('charity');
            if($donor_char_id != $charity_id || $categ_char_num != $charity_id  ){
                return  redirect()->back()->with('message', 'Please choose Donator and Target that matches your charity choice!');
            }
        }
        else{
            $charity_id=auth()->user()->charity_id;
        }



        Donation::create([
            'charity_id' => $charity_id,
            'donor_number' => $request->input('donor_number'),
            'category' => $request->input('category'),
            'amount' => $request->input('value'),
            'active' => true
        ]);


        return redirect()->route('donation.index')->with('success', 'Created a new donation successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(Donation $donation)
    {
        // abort_if(Gate::denies('donation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // return view('donation.show', compact('donation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    // ???
    public function edit_donation($id)
    {
        // abort_if(Gate::denies('donation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $donation = Donation::where('id', $id)->first();

        $charity_id = $donation->charity_id;

        $donors = Donor::where('charity_id', $charity_id)->where('Active', true)->get();
        $categories = Category::where('charity_id', $charity_id)->where('Active', true)->get();

        return view('donation.edit',compact('donation','donors','categories'));
    }

    public function post_edit(Request $request, $id){
        if($request->input('donator') == "-1" || $request->input('target') == "-1" ){
            return  redirect()->back()->with('message', 'Cannot choose the default option!');;
        }
        Donation::where('id', $id)->update(['donor_number' => $request->input('donor_number'),'category' => $request->input('category'),
        'amount' => $request->input('value')]);
        return redirect()->route('donation.index')->with('success', 'Edited a new donation successfully!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDonationRequest $request, Donation $donation)
    {
        $donation->update($request->validate());
        return redirect()->route('donation.index');
    }

    public function deactivate($id){
        Donation::where('id', $id)
            ->update(['active' => false]);


        return redirect()->route('donation.index')->with('success', 'Deactive donation '.$id.' successfully!');
    }
    public function activate($id){
        Donation::where('id', $id)
            ->update(['active' => true]);

        return redirect()->route('donation.index')->with('success', 'Active donation '.$id.' successfully!');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Donation $donation)
    {
        // abort_if(Gate::denies('donation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // $donation->delete();
        // return redirect()->route('donation.index');
    }
}
