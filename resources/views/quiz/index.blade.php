@extends('layout.mainlayout')
@section('content')     
<!-- Page Wrapper -->
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">Quiz</div>

                                <div class="card-body">
                                    @if(session('status'))
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @foreach($errors->all() as $error)
                                        <li style="color:red;">{{ $error }}</li>
                                    @endforeach

                                    <form method="POST" action="{{ route('test.store') }}">
                                        @csrf
                                            <div class="card mb-3">
                                
                                                
                                            @foreach($quizzes as $key=>$quiz)
                                                <div class="card @if(!$loop->last)mb-3 @endif" style="border: 1px solid transparent;">
                                                    <strong>Question {{$key + 1 }} : </strong>
                                                    <div class="card-header">{{ $quiz->question }}</div>
                                                    <input type="hidden" name="question[]" value="{{$quiz->id}}">
                                                        <div class="card-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="option_{{$key + 1}}" id="option_{{$quiz->id}}" value="{{$quiz->option_1}}">
                                                                <label class="form-check-label" for="{{$quiz->option_1}}">
                                                                   {{$quiz->option_1}} 
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="option_{{$key + 1}}" id="option_{{$quiz->id}}" value="{{$quiz->option_2 }}">
                                                                <label class="form-check-label" for="option_2">
                                                                    {{$quiz->option_2}}
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="option_{{$key + 1}}" id="option_{{$quiz->id}}" value="{{ $quiz->option_3 }}">
                                                                <label class="form-check-label" for="option_3">
                                                                    {{$quiz->option_3}}
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio" name="option_{{$key + 1}}" id="option_{{$quiz->id}}" value="{{ $quiz->option_4 }}">
                                                                <label class="form-check-label" for="option_4">
                                                                    {{$quiz->option_4}}
                                                                </label>
                                                            </div>
                                                            <!-- <div style="color:red;">{{$errors->first('option_$key')}}</div> 
                                                            <br> -->

                                                        </div>
                                                   
                                            @endforeach
                                                            </div>
                                                       
                                            <div class="m-t-20 text-center">
                                                <button type="submit" class="btn btn-primary btn-md">
                                                Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>          
</div>

        

            <!-- /Page Wrapper -->
@endsection