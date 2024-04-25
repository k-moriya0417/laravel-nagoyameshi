<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Restaurant;
use App\Models\Category;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $categories = Category::all();
        $keyword = $request->keyword;

        if ($keyword !== null) {
            $restaurants = Restaurant::where('name','like',"%{$keyword}%")->sortable()->paginate(15);
            $total_count = $restaurants->total();
            $category = null;
        } else {
            if ($request->category !== null) {
                $restaurants = Restaurant::where('category_id',$request->category)->sortable()->paginate(15);
                $total_count = Restaurant::where('category_id',$request->category)->count();
                $category = Category::find($request->category);
            } else {
                $restaurants = Restaurant::sortable()->paginate(15);
                $total_count = "";
                $category = null;
            }
        }

        return view('restaurants.index',compact('restaurants','category','categories','total_count','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('restaurants.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = New Restaurant();
        $restaurant->name = $request->input('name');
        $restaurant->description = $request->input('description');
        $restaurant->category_id = $request->input('category_id');
        $restaurant->business_hours = $request->input('business_hours');
        $restaurant->address = $request->input('address');
        $restaurant->phone_number = $request->input('phone_number');
        $restaurant->save();

        return to_route('restaurants.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $user = Auth::user();
        $reviews = $restaurant->reviews()->get();
        $categories = Category::all();

        $averageScore = $restaurant->reviews()->avg('score');
        $aveStar = round($averageScore, 1);
        $dataStar =  round($averageScore * 2, 0) / 2;

        $restaurants = Restaurant::withCount('likes')->get();
        $param = ['restaurants' => '$restaurants',];

        return view('restaurants.show',compact('restaurant','reviews','aveStar','dataStar','user','categories','param'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::all();

        return view('restaurants.edit',compact('restaurant','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $restaurant->name = $request->input('name');
        $restaurant->description = $request->input('description');
        $restaurant->category_id = $request->input('category_id');
        $restaurant->business_hours = $request->input('business_hours');
        $restaurant->address = $request->input('address');
        $restaurant->phone_number = $request->input('phone_number');
        $restaurant->update();

        return to_route('restaurants.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return to_route('restaurants.index');
    }

    public function like(Request $request)
    {

        $user_id = Auth::user()->id;
        $restaurant_id = $request->restaurant_id;
        $already_liked = Like::where('user_id',$user_id)->where('restaurant_id',$restaurant_id)->first();

        if (!$already_liked) {
            $like = new Like;
            $like->restaurant_id = $restaurant_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('restaurant_id',$restaurant_id)->where('user_id',$user_id)->delete();
        }
        $restaurant_likes_count = Restaurant::withCount('likes')->findOrFail($restaurant_id)->likes_count;
        $param = [        
            'restaurant_likes_count' => $restaurant_likes_count,
        ];
        return response()->json($param);
    }
}
