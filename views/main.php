<!DOCTYPE html>
<html>
<head>
	<title>Server-side datatables with Bootstrap 4</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-32x32.png" sizes="32x32" />
  <link rel="icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-192x192.png" sizes="192x192" />
  <link rel="apple-touch-icon" href="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-180x180.png" />
  <meta name="msapplication-TileImage" content="https://elmer.dev/blog/wp-content/uploads/2020/06/cropped-EB-logo-270x270.png" />

<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />
	<link rel="stylesheet" href="/assets/css/bootstrap.css">
	<link rel="stylesheet" href="/assets/css/style.css?ver=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">

	<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
	<script src="/assets/js/bootstrap.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.3.1/dt-1.10.25/datatables.min.css"/>


</head>
<body>
	
<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
  <a class="navbar-brand" href="/">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/">მთავარი</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/shares">განცხადებები</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['is_logged_in'])) : ?>
        <li class="nav-item">
          <span class="navbar-text"><!-- user name goes here --></span>
        </li>
        <li class="nav-item">
          <a class="nav-link"  onclick="logout()">Logout</a>
        </li>
      <?php else : ?>
       <li class="nav-item" id="navLogout">
          <a class="nav-link" onclick="logout()">Logout</a>
        </li>
   

      <?php endif; ?>
    </ul>

  </div>
</nav>

<main role="main" class="container-fluid">

	<div class="row">
    <?php Messages::display(); ?>
		<?php require($view); ?>
	</div>

</main><!-- /.container -->


<script>

function logout() {
	
		         $.ajax({
            type: "POST",
            url: "/users/logout",
            processData: false,
            contentType: false,
            cache: false,
            timeout: 600000,
            success: function (data) {
				console.log('logged out');
				$("#cabinet").hide();
                  $(".regform").show();
                  $(".loginform").show();
                   checkAuth();
				
            },
            error: function (e) {
              console.log("ERROR : ", e);
            }
        });
}

</script>
</body>
</html>
