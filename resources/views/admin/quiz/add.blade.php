@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Question</h3>
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
											<form method="POST" action="{{ route('quiz.store') }}">
                        					@csrf
					                            <div class="form-group">
					                                <label>Question</label>
					                                <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus>

					                                @error('question')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                            </div>
					                            
					                            <div class="row">
					                                <div class="col-md-6">
					                                    <div class="form-group">
					                                        <label>Option 1</label>
					                                        <input id="option_1" type="text" class="form-control @error('option_1') is-invalid @enderror" name="option_1" required autocomplete="option_1">

							                                @error('option_1')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror
					                                    </div>
					                                </div>
					                                <div class="col-md-6">
					                                    <div class="form-group">
					                                        <label>Option 1</label>
					                                        <input id="option_2" type="text" class="form-control @error('option_2') is-invalid @enderror" name="option_2" required autocomplete="option_2">

							                                @error('option_2')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror
					                                    </div>
					                                </div>
					                            </div>

					                            <div class="row">
					                                <div class="col-md-6">
					                                    <div class="form-group">
					                                        <label>Option 3</label>
					                                        <input id="option_3" type="text" class="form-control @error('option_3') is-invalid @enderror" name="option_3" required autocomplete="option_3">

							                                @error('option_3')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror
					                                    </div>
					                                </div>
					                                <div class="col-md-6">
					                                    <div class="form-group">
					                                        <label>Option 4</label>
					                                        <input id="option_4" type="text" class="form-control @error('option_4') is-invalid @enderror" name="option_4" required autocomplete="option_4">

							                                @error('option_4')
							                                    <span class="invalid-feedback" role="alert">
							                                        <strong>{{ $message }}</strong>
							                                    </span>
							                                @enderror
					                                    </div>
					                                </div>
					                            </div>
												<div class="row">
													<div class="col-md-6">
														<label>Upload Image</label>
					                                    <input id="upload_Img" type="file" name="upload_Img" required autocomplete="upload_Img">
													</div>
													<div class="col-md-6">
														<label>Map Image</label>
					                                    <input id="map_Img" type="file" name="map_Img" required autocomplete="map_Img">
													</div>
												</div>

					                            <div class="form-group">
					                                <label>Answer</label>
					                                <input id="answer" type="text" class="form-control @error('answer') is-invalid @enderror" name="answer" value="{{ old('answer') }}" required autocomplete="answer">

					                                @error('answer')
					                                    <span class="invalid-feedback" role="alert">
					                                        <strong>{{ $message }}</strong>
					                                    </span>
					                                @enderror
					                            </div>

					                            <div class="form-group">
											                <label for="category">Category</label>
											                <select name="category_id" class="form-control" >
											                <option selected disabled>Select Category</option>
															@if($categories)
															@foreach($categories as $all)
																<option value="{{$all->id}}">{{$all->name}}</option>
															@endforeach
															@endif
											                </select>
											            </div>
					                            
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Create Question</button>
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