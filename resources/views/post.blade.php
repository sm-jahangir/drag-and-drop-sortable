<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="container">
	<h1>Hello, world!</h1>

	<div class="row gap-1">
		<div class="col-md-4">
			<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
				@csrf
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<strong>{{ $message }}</strong>
					</div>
				@endif
				<div class="form-class mb-3">
					<label for="inputTitle">Title</label>
					<input type="text" name="title" class="form-control" id="inputTitle" placeholder="Title Here">
				</div>
				<div class="form-class">
					Image: <input type="file" name="image1" class="form-control" id="fileIdHere">
				</div>
				<div class="form-class mt-4">
					Gallery: <input type="file" name="gallery[]" class="form-control" id="fileIdHere" multiple>
				</div>
				{{-- all errors --}}
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<button class="btn btn-success mt-3">Upload</button>
			</form>
		</div>
		<div class="col-md-7">
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Gallery</th>
						<th scope="col">Image</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($posts as $post)
						<tr>
							<th scope="row">{{ $post->id }}</th>
							<th scope="row">
								@php
									$x = json_decode($post->gallery);
								@endphp
								@foreach ($x as $key => $val)
									<img width="50px" src="{{ asset('backend/gallery/' . $val) }}">
								@endforeach

							</th>
							<td>
								<img width="50" src="{{ asset('backend/thumbnail') . '/' . $post->original_url }}" alt="">
							</td>
							<td>
								<button class="btn btn-warning btn-sm">Delete</button>
								<a href="{{ route('post.show', $post->id) }}" class="btn btn-warning btn-sm">Show</a>
							</td>
						</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>
