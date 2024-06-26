<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Restaurant;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage',compact('user'));
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();

        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
 
         $user->name = $request->input('name') ? $request->input('name') : $user->name;
         $user->email = $request->input('email') ? $request->input('email') : $user->email;
         $user->postal_code = $request->input('postal_code') ? $request->input('postal_code') : $user->postal_code;
         $user->address = $request->input('address') ? $request->input('address') : $user->address;
         $user->phone = $request->input('phone') ? $request->input('phone') : $user->phone;
         $user->update();
 
         return to_route('mypage');
    }

    public function favorite()
    {
        $user = Auth::user();
        $categories = Category::all();
 
        $favorite_restaurants = $user->favorite_restaurants;

        return view('users.favorite', compact('favorite_restaurants','categories'));
    }

    public function reservations()
    {
        $user = Auth::user();
        $restaurants = Restaurant::all();
        $reservation_restaurants = Reservation::where('user_id',$user->id)->get();

        return view('users.reservations',compact('reservation_restaurants','restaurants'));
    }

    public function upgrade()
    {
        $user = Auth::user();
        $user->membership = true;
        $user->update();
        
        return view('users.edit',compact('user'));
    }
    public function downgrade()
    {
        $user = Auth::user();
        $user->membership = false;
        $user->update();
        
        return view('users.edit',compact('user'));
    }

}
