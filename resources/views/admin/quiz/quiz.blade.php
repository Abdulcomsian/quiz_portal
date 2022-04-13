@extends('layout.mainlayout_admin')
@section('content')	
<!-- Page Wrapper -->
<div class="page-wrapper">
                <div class="content container-fluid">
				
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Quiz Questions</h3>
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
													<th>Question</th>
													<th>Option 1</th>
													<th>Option 2</th>
													<th>Option 3</th>
													<th>Option 4</th>
													<th>Answer</th>
													<th>Category</th>
													<th>Image</th>
													<th>Map Image</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													@foreach($quizzes as $quiz)
													<td>{{$quiz->question}}</td>
													<td>{{$quiz->option_1}}</td>
													<td>{{$quiz->option_2}}</td>
													<td>{{$quiz->option_3}}</td>
													<td>{{$quiz->option_4}}</td>
													<td>{{$quiz->answer}}</td>
													<td>{{$quiz->category->name}}</td>
													<td><img src="{{ URL::to('/question/image/'.$quiz->image) }}" width="100" height="80" /></td>
													<td><img src="{{ URL::to('/question/m_image/'.$quiz->m_image) }}" width="100" height="80" /></td>
													<td>
														<div class="actions" style="display:flex;">
															
															<a href="{{route('quiz.edit',$quiz->id)}}" style="height: 33px; margin-left: 10px" class="btn btn-sm bg-success-light edit-quiz"><i class="fe fe-pencil"></i> Edit</a>
															<form method="POST" action="{{ route('quiz.destroy', $quiz->id) }}"  id="form_{{$quiz->id}}" >
							                                    @method('Delete')
							                                    @csrf()

							                                    <button type="submit" id="{{$quiz->id}}" class="confirm btn btn-sm bg-danger-light btn-active-color-primary btn-sm">
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