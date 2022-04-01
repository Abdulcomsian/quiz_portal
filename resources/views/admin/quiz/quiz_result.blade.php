@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Quiz Results</h3>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-nowrap mb-0">
											<thead>
												<tr>
													<th>User Name</th>
													<th>User Email</th>
													<th>Obtained Marks</th>
													<th>Total Marks</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													@foreach($quiz_results as $result)
													<td>{{$result->user->name}}</td>
													<td>{{$result->user->email}}</td>
													<td>{{$result->result}}</td>
													<td>{{count($questions)}}</td>
													<td>
														<div class="actions" style="display:flex;">
															
															<form method="POST" action="{{ route('quiz.destroy', $result->id) }}"  id="form_{{$result->id}}" >
							                                    @method('Delete')
							                                    @csrf()

							                                    <button type="submit" id="{{$result->id}}" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
							                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
							                                     <i class="fe fe-trash"></i> Delete
							                                        <!--end::Svg Icon-->
							                                    </button>
							                                </form>
															
														</div>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				</div>			
			</div>
			<!-- /Main Wrapper -->	
@endsection