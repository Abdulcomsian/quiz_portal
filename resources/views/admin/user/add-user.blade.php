@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add User</h3>
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
										<div class="col-12 blog-details">
											<form method="POST" action="{{ route('user.store') }}">
                        					@csrf
					                            <div class="form-group">
					                                <label>Name</label>
					                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

					                                @error('name')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                            </div>
					                            <div class="form-group">
					                                <label>Email</label>
					                                <div>
					                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

						                                @error('email')
						                                    <span class="invalid-feedback" role="alert">
						                                        <strong>{{ $message }}</strong>
						                                    </span>
						                                @enderror
					                                </div>
					                            </div>
					                            <div class="form-group">
					                                <label>PA Number</label>
					                                <div>
					                                    <input id="" type="text" class="form-control @error('pa_num') is-invalid @enderror" name="pa_num" placeholder="Enter PA Number" value="{{ old('pa_num') }}" required autocomplete="pa_num">

						                                @error('pa_num')
						                                    <span class="invalid-feedback" role="alert">
						                                        <strong>{{ $message }}</strong>
						                                    </span>
						                                @enderror
					                                </div>
					                            </div>
					                            <div class="form-group">
					                                <label>Unit</label>
					                                <div>
					                                    <input id="" type="text" class="form-control @error('unit') is-invalid @enderror" name="unit" value="{{ old('unit') }}" placeholder="Enter Unit" required autocomplete="unit">

						                                @error('unit')
						                                    <span class="invalid-feedback" role="alert">
						                                        <strong>{{ $message }}</strong>
						                                    </span>
						                                @enderror
					                                </div>
					                            </div>
					                            <div class="row">
					                                <div class="col-md-6">
					                                    <div class="form-group">
					                                        <label>Password</label>
					                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

							                                @error('password')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror
					                                    </div>
					                                </div>
					                                <div class="col-md-6">
					                                    <div class="form-group">
					                                        <label>Confirm Password</label>
					                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
					                                    </div>
					                                </div>
					                            </div>
					                            
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Create User</button>
					                            </div>
					                        </form>
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