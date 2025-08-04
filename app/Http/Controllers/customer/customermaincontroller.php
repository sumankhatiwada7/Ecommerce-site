<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class customermaincontroller extends Controller
{
  public function index(){
    return view('customer.dashboard');
  }
  public function order_history(){
    return view('customer.orderhistory');
  }
  public function affiliate(){
    return view('customer.affiliate');
  }
  public function payment(){
    return view('customer.payment');
    
  }
  public function profile(){
    return view('customer.profile');
  }
}