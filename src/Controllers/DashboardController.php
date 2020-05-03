<?php

namespace LaravelBoilerplates\Admin\Controllers;

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
      $users = User::paginate();

      return view('admin.dashboard', compact('users'));
    }
}
