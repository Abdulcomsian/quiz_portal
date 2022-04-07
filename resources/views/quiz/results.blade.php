@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">{{count($results)}} Quiz Result</h3>
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
                                                    <th>Quiz #</th>
                                                    <th>Total Questions</th>
                                                    <th>Correct Answers</th>
                                                    <th>Obtain Marks</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($results as $result)
                                                <tr>
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{count($result->questions)}}</td>
                                                    <td>{{$result->result}}</td>
                                                    <td>{{$result->result}}</td>
                                                    <td><a href="{{route('quiz.review',$result->id)}}"><i class="fa fa-eye"></i></a></td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <!-- result in div form old -->
										<!-- @foreach($results as $result)
										 <div class="col-12 blog-details">
											<p>You Got <strong>{{$result->result}}</strong> Marks Out of <strong>{{count($result->questions)}}</strong></p>
										</div>
										@endforeach -->
									</div>
                                    <br>
                                    <div class="col-md-6 d-flex" style="margin-bottom:10px">
                                        {{$results->links("pagination::bootstrap-4")}}
                                    </div>
								</div>
							</div>
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
@endsection