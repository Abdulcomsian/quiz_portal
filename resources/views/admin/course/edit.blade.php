@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Course</h3>
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
											<form action="{{ route('course.update',$course->id) }}" method="post">
												@method('PUT')
                								@csrf
					                            <div class="form-group">
					                                <label>Course Name</label>
					                                <input type="hidden" name="course_id" value="{{$course->id}}">
					                                <input value="{{$course->name}}" class="form-control" id="name" name="name" placeholder="Enter Course Name" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Course Slug</label>
					                                <input class="form-control" value="{{$course->course_slug}}" id="course_slug" name="course_slug" placeholder="Enter Course Slug" type="text">
					                                <div style="color:red;">{{$errors->first('course_slug')}}</div> <br>
					                            </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Update Course</button>
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