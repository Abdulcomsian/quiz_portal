@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title"> Quiz No# {{$id}} Review</h3>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							<div class="card">
								<div class="card-body">

									<!-- Add details -->
									<div class="row">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Question #</th>
                                                    <th>Question</th>
                                                    <th>Your Answers</th>
                                                    <th>Correct Answer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $i=1;@endphp
                                                @foreach($results->questions as $key => $q)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$q}}</td>
                                                    <td>{{$results->answer['option_'.$i] ?? 'Not Selected'}}</td>
                                                    <td ><span style="background: yellow">{{$results->c_answer['answer_'.$i]}}</span></td>
                                                </tr>
                                                @php $i++ ;@endphp
                                                @endforeach

                                            </tbody>
                                        </table>
                                       
									</div>
									<!-- /Add details -->

								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
@endsection