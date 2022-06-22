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
				<div class="row">
					<div class="dd">
						<ol class="dd-list">
							<li class="dd-item" data-id="1">
								<div class="dd-handle">Item 1</div>
							</li>
							<li class="dd-item" data-id="2">
								<div class="dd-handle">Item 2</div>
							</li>
							<li class="dd-item" data-id="3">
								<div class="dd-handle">Item 3</div>
								<ol class="dd-list">
									<li class="dd-item" data-id="4">
										<div class="dd-handle">Item 4</div>
									</li>
								</ol>
							</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/nestable2/1.5.0/jquery.nestable.min.js"></script>
	<script>
	 $('.dd').nestable('serialize');
	</script>
</body>

</html>
