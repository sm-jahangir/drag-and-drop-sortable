<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Nestable 2 Sortable</title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.5.0/jquery.nestable.min.css">
</head>

<body class="bg-light">
	<div class="container">
		<div class="row" style="margin: auto; width: 80%">
			<div class="col-md-12">
				<h2 class="text-center pb-3 pt-1">Learning drag and dropable - Core Learners</h2>
				<div class="row justify-content-center">
					<div class="col col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="row">
									<div class="col">
										<h4>Category List</h4>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="datatable" class="align-middle mb-0 table table-borderless table-striped table-hover">
										<tbody>
											<div class="dd" id="nestable">
												<ol class="dd-list">
													@foreach ($categories as $category)
														<li class="dd-item" data-id="{{ $category->id }}">
															{{-- <div class="dd-handle dd3-handle"></div> --}}
															<div class="dd-handle">
																{{ $category->title }}
															</div>
															@if ($category->childs->count() > 0)
																<ol class="dd-list">
																	@foreach ($category->childs as $childcategory)
																		<li class="dd-item" data-id="{{ $childcategory->id }}">
																			{{-- <div class="dd-handle dd3-handle"></div> --}}
																			<div class="dd-handle">
																				{{ $childcategory->title }}
																			</div>
																			@if (!empty($childcategory->childs->count() > 0))
																				<ol class="dd-list">
																					@foreach ($childcategory->childs as $subchild)
																						<li class="dd-item" data-id="{{ $childcategory->id }}">
																							{{-- <div class="dd-handle dd3-handle"></div> --}}
																							<div class="dd-handle d-flex justify-content-between align-items-center">
																								{{ $subchild->title }}
																							</div>
																						</li>
																					@endforeach
																				</ol>
																			@endif
																		</li>
																	@endforeach
																</ol>
															@endif
														</li>
													@endforeach
												</ol>
											</div>

											<div class="dd" id="nestable2">
											</div>
											<textarea id="nestable-output"></textarea>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- /.col-md-6 -->
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.5.0/jquery.nestable.min.js"></script>
	<script>
	 $(document).ready(function() {
	  var updateOutput = function(e) {
	   var list = e.length ? e : $(e.target),
	    output = list.data("output");
	   if (window.JSON) {
	    output.val(window.JSON.stringify(list.nestable("serialize"))); //, null, 2));
	    console.log(window.JSON.stringify(list.nestable("serialize"))); //This is my Code

	   } else {
	    output.val("JSON browser support required for this demo.");
	   }
	  };

	  // activate Nestable for list 1
	  $("#nestable")
	   .nestable({
	    group: 1,
	   })
	   .on("change", updateOutput);
	  // output initial serialised data
	  updateOutput($("#nestable").data("output", $("#nestable-output")));


	 });
	</script>
</body>

</html>
