<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function show(Staff $staff)
    {
        return view('staff.show', ['staff' => $staff]);
    }

    public function create()
    {
        return view('staff.add');
    }

    public function store()
    {
        //Store Code
        return redirect('/staff');
    }

    public function edit(Staff $staff)
    {
        return view('staff.edit', ['staff' => $staff]);
    }

    public function update(Staff $staff)
    {
        //Update Code
        return redirect($staff->path());
    }

    public function destory(Staff $staff)
    {
        # code...
    }
}
