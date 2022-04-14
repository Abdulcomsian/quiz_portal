@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Edit Course Lesson</h3>
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
											<form action="{{ route('course-lesson.update',$lesson->id) }}" method="post" enctype="multipart/form-data">
												@method('PUT')
                								@csrf
					                            <div class="form-group">
					                                <label>Course Category Name</label>
					                                <input type="hidden" name="id" value="{{$lesson->id}}">
					                                <input value="{{$lesson->name}}" class="form-control" id="name" name="name" placeholder="Enter Lesson Name" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Lesson Category</label>
					                                <select name="category_id" class="form-control" >
										                <option selected disabled>Select Category</option>
														@if($course_categories)
														@foreach($course_categories as $category)
															<option value="{{$category->id}}" {{ $lesson->category_id == $category->id ? 'selected' : '' }} >{{$category->name}}</option>
														@endforeach
														@endif
										            </select>
					                                <div style="color:red;">{{$errors->first('category_id')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Select Course</label>
					                                <select name="course_id" class="form-control" >
										                <option selected disabled>Select Course</option>
														@if($courses)
														@foreach($courses as $all)
															<option value="{{$all->id}}" {{ $lesson->category_id == $all->id ? 'selected' : '' }}>{{$all->name}}</option>
														@endforeach
														@endif
										            </select>
					                                <div style="color:red;">{{$errors->first('course_id')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Lesson Document</label>
					                                <input type="file" name="document" class="form-control" value="{{$lesson->document}}">
					                                <div style="color:red;">{{$errors->first('document')}}</div> <br>
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