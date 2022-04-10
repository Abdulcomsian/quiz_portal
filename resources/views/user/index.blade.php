@extends('layout.mainlayout_admin')
@include('layouts.sweetalert.sweetalert_css')
@section('title')
Users 
@endsection
@section('content')     
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
    
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                   
                </div>
            </div>
        </div>
        <!-- /Page Header -->
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                     Total Attemp Quize {{$totalquizes}}
                     <a href="{{url('user/quiz')}}" class="btn btn-primary btn-lg" style="float: right;">Start Quiz</a>
                    </div>
                </div>
            </div>          
        </div>
        
    </div>          
</div>
<!-- /Page Wrapper -->
@endsection

@section('js')
@include('layouts.sweetalert.sweetalert_js')