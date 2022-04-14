@extends('layout.mainlayout_admin')
@include('layouts.sweetalert.sweetalert_css')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Users</h3>
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
													<th>Name</th>
													<th>Email</th>
													<th>PA number</th>
													<th>Unit</th>
													<th>Status</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													@foreach($users as $user)
													<td>{{$user->name}}</td>
													<td>{{$user->email}}</td>
													<td>{{$user->pa_num}}</td>
													<td>{{$user->unit}}</td>
													<td>@if($user->status == 0)
														Inactive
														@elseif($user->status == 1)
														Active
														@endif</td>
													<td>
														<div class="actions" style="display:flex;">
															
															@if($user->status == 1) 
													        <form action="{{ route('user-status', $user->id) }}" method="POST">
													            @csrf()                         
													            <button type="submit" class="btn btn-success" name="status" value="0">Active</button>
													        </form>                    
														    @else
														        <form action="{{ route('user-status', $user->id) }}" method="POST">
														            @csrf()                             
														            <button type="submit" class="btn btn-danger" name="status" value="1">Inactive</button>
														        </form>
														    @endif

															<a href="{{route('user.edit',$user->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-user"><i class="fe fe-pencil"></i> Edit</a>
															<form method="POST" action="{{ route('user.destroy', $user->id) }}"  id="form_{{$user->id}}" >
							                                    @method('Delete')
							                                    @csrf()

							                                    <button type="submit" id="{{$user->id}}" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
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
@section('js')
@include('layouts.sweetalert.sweetalert_js')
@endsection