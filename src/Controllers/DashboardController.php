<?php

namespace LaravelBoilerplates\Admin\Controllers;

use Admin;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $users = Admin::user()->paginate();

      return view('admin::dashboard', compact('users'));
    }
}
