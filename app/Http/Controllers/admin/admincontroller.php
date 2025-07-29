<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
  public function index()
  {
    return view('admin.admin');
  }
  public function setting(){
    return view('admin.setting');

  }
  public function manage_user(){
    return view('admin.manage.user');

  }
  public function manage_store(){
    return view('admin.manage.store');
  }
  public function cart_history(){
    return view('admin.cart.history');
  }
  public function order_history(){
    return view('admin.order.history');
  }
}
