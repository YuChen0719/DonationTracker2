<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userData = Auth::user();
        $categories = DB::table('categories')
                                ->select('categories.*')
                                ->where('categories.charity_id','=',$userData['charity_id'])
                                ->get();

        // check user type
        $flag = CategoryController::checkUserType();

        return view('category.index',compact('categories','flag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(CategoryController::checkUserType() == 'Admin' || CategoryController::checkUserType() == 'admin'){
            return view('category.create');
        } else {
            return view('category.error');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        // get data of current user
        $currentUserData = Auth::user();

        // create array to insert data
        $data = array(
            'name' => $request->name, 
            'description' => $request->description,
            'active' => 1,
            'charity_id' =>$currentUserData['charity_id'],
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        );

        // insert data into table
        DB::table('categories')->insert($data);
        
        return redirect()->route('category.index')->with('success','Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if(CategoryController::checkUserType() == 'Admin' || CategoryController::checkUserType() == 'admin'){
            return view('category.edit',compact('category'));
        } else {
            return view('category.error');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        // get data of current user
        $currentUserData = Auth::user();

        // create array to update data
        $data = array(
            'name' => $request->name, 
            'description' => $request->description,
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        );

        // update data into table
        Category::whereId($category->id)->update($data);

        return redirect()->route('category.index')->with('success','Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function checkUserType(){
        $userData = Auth::user();
        return $userData['user_type'];
    }
}
