@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Result</h3>
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
                                        <div class="quizFinish">
                                            <div class="col-12 text-center">
                                                    <img src="{{asset('assets/img/tick-icon.svg')}}" alt="" class="img-fluid">
                                                    <h2>Your Quiz has Finished !</h2>
                                                    <p>Your total Score is {{$results}} out of {{ $total_question }}.</p>
                                                </div>
                                            </div>
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