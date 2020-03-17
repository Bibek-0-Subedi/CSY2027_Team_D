<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Student;
use App\TableGenerator;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $table = new TableGenerator();
        $tableHead = [
            'Id',
            'Assigned Id',
            'Status',
            'Firstname',
            'Middlename',
            'Surname',
            // 'Temporary Address',
            // 'Permanent Address',
            'Contact',
            'Course Code',
            'Email',
            'Qualifications'
        ]; 
        $table->SetHeadings($tableHead);
        $data = Student::all();
        
        return view('admin.admission', ['data' => $data, 'table'=>$table]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCSV()
    {
        $file = request()->file('UCASDetail');
          if($file->getClientOriginalExtension() == "csv"){
              $csvHandle = fopen($file->getPathName(), "r");
              $mydata = fgetcsv($csvHandle);
              while($data = fgetcsv($csvHandle) ){
                  $arr = [];
                  $count = 0;
                  foreach($data as $key => $value){
                      $arr[$mydata[$count]] = $value;
                      $count++;
                  }
                  StudentController::storeCSV($arr);
              }
          }
          return redirect('/admission');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function show(Admission $admission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function edit(Admission $admission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admission $admission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admission  $admission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admission $admission)
    {
        //
    }
}
