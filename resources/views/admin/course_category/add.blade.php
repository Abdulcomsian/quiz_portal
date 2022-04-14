@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Course Cateogry</h3>
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
											<form action="{{ route('course-category.store') }}" method="post">
                								@csrf
					                            <div class="form-group">
					                                <label>Course Category Name</label>
					                                <input value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="Enter Course Category Name" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Course Category Slug</label>
					                                <input class="form-control" value="{{old('category_slug')}}" id="category_slug" name="category_slug" placeholder="Enter Course Category Slug" type="text">
					                                <div style="color:red;">{{$errors->first('category_slug')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Select Course</label>
					                                <select name="course_id" class="form-control" >
										                <option selected disabled>Select Course</option>
														@if($courses)
														@foreach($courses as $all)
															<option value="{{$all->id}}">{{$all->name}}</option>
														@endforeach
														@endif
										            </select>
					                                <div style="color:red;">{{$errors->first('course_id')}}</div> <br>
					                            </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Publish Course Category</button>
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