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
								<h3 class="page-title">Quiz Course Category</h3>
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-body">
									<a href="{{route('course-category.create')}}" class="btn btn-primary">Add New <i class="fa fa-plus"></i></a><br><br>
									<div class="table-responsive">
										<table class="table table-nowrap mb-0">
											<thead>
												<tr>
													<th>Course Category Name</th>
													<th>Course Category Slug</th>
													<th>Course</th>
													<th class="text-right">Action</th>
												</tr>
											</thead>
											<tbody>
												@if(count($course_categories) > 0)
												<tr>
													@foreach($course_categories as $course_category)
													<td>
														{{ $course_category->name}}
													</td>
													<td>{{$course_category->category_slug}}</td>
													<td>{{$course_category->course->name}}</td>

													<td class="text-right">
														<div class="actions" style="display:flex;">
															<a href="{{route('course-category.edit',$course_category->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-course_category"><i class="fe fe-pencil"></i> Edit</a>
															<form method="POST" action="{{ route('course-category.destroy', $course_category->id) }}"  id="form_{{$course_category->id}}" >
							                                    @method('Delete')
							                                    @csrf()

							                                    <button type="submit" id="{{$course_category->id}}" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
							                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
							                                     <i class="fe fe-trash"></i> Delete
							                                        <!--end::Svg Icon-->
							                                    </button>
							                                </form>
															
														</div>
													</td>
												</tr>
												 @endforeach
												@else
												<tr>
						                        <td colspan="3" style="text-align: center;"><strong> No Course Category Yet Created </strong></td>
						                      </tr>
						                      @endif
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