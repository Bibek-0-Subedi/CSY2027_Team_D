@extends('layouts.layout')

@section('mainContent')
    <div class="container-fluid">
        <div class="pl-sm-2 pr-sm-2 mt-2">
            <div class="row">
                <h3>Dashboard</h3>
            </div>
            <!-- begin quick notification panel  -->
            <div class="row mt-1 notification">
                Quick Notification
            </div>
            <!-- end quick notification panel  -->
            <div class="row mt-1">
                <div class="container-fluid">
                    <div class="row">
                        <!-- begin first column -->
                        <div class="col-lg-6 bg-dark">
                                first
                        </div>   
                        <!-- end first column -->
                        <!-- begin second column -->
                        <div class="col-lg-6 bg-success">
                                second
                        </div>
                        <!-- end second column -->
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection