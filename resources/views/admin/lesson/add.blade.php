@extends('layout.mainlayout_admin')
@section('content')		
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Add Course Lesson</h3>
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
											<form action="{{ route('course-lesson.store') }}" method="post" enctype="multipart/form-data">
                								@csrf
					                            <div class="form-group">
					                                <label>Lesson Name</label>
					                                <input value="{{old('name')}}" class="form-control" id="name" name="name" placeholder="Enter Course Category Name" type="text">
			                                        <div style="color:red;">{{$errors->first('name')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Select Course</label>
					                                <select name="course_id" id="course_id" class="form-control" >
										                <option selected disabled>Select Course</option>
														@if($courses)
														@foreach($courses as $all)
															<option value="{{$all->id}}">{{$all->name}}</option>
														@endforeach
														@endif
										            </select>
					                                <div style="color:red;">{{$errors->first('course_id')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Lesson Category</label>
					                                <select class="form-control required" placeholder="Select Category" name="category_id" id="category_id">
		                							</select>
					                                <div style="color:red;">{{$errors->first('category_id')}}</div> <br>
					                            </div>
					                            <div class="form-group">
					                                <label>Lesson Document</label>
					                                <input type="file" name="document" required class="form-control" value="{{old('document')}}">
					                                <div style="color:red;">{{$errors->first('document')}}</div> <br>
					                            </div>
					                            <div class="m-t-20 text-center">
					                                <button class="btn btn-primary btn-lg">Publish Course Lesson</button>
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
@section('js')
<script>
$(document).ready(function() {
$('#course_id').on('change', function () {
    let course_id = $(this).val();
    $('#category_id').empty();
    $('#category_id').append(`<option value="0" disabled selected>Processing...</option>`);
    $.ajax({
        type: 'GET',
        url: '{{url("/admin/get_category/")}}' +'/' + course_id,
        success: function (response) {
	        var response = JSON.parse(response);
	        console.log(response);   
	        $('#category_id').empty();
	        $('#category_id').append(`<option value="0" disabled selected>Select Sub Category*</option>`);
	        response.forEach(element => {
	            $('#category_id').append(`<option value="${element['id']}">${element['name']}</option>`);
        	});
		}
	});
});

});
</script>
@endsection