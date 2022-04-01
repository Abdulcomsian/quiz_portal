@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Edit User</h3>
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
											<form method="POST" action="{{ route('user.update',$user->id) }}">
											@method('PUT')
                        					@csrf
					                            <div class="form-group">
					                                <label>Name</label>
					                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
					                                <input type="hidden" name="id" value="{{$user->id}}">

					                                @error('name')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                            </div>
					                            <div class="form-group">
					                                <label>Email</label>
					                                <div>
					                                    <input id="email" type="email" readonly class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

						                                @error('email')
						                                    <span class="invalid-feedback" role="alert">
						                                        <strong>{{ $message }}</strong>
						                                    </span>
						                                @enderror
					                                </div>
					                            </div>
					                            <div class="form-group">
					                                <label>Phone</label>
					                                <div>
					                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ $user->phone }}" required autocomplete="phone">

						                                @error('phone')
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
					                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

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
					                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
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