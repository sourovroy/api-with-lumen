<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="/css/style.css"/>
    <script src="/js/all.js"></script>

    <script>
        $(function(){
            setupLanguages(["bash", "javascript"]);
        });
    </script>
</head>

<body class="">
    <a href="#" id="nav-button">
        <span>
            NAV
            <img src="img/navbar.png" alt="Nav" />
        </span>
    </a>

    <div class="tocify-wrapper">
	    <a href="/"><img src="img/logo-2.png" alt="Logo" /></a>

        <div class="lang-selector">
            <a href="#" data-language-name="bash">bash</a>
            <a href="#" data-language-name="javascript">javascript</a>
        </div>

        <div class="search">
            <input type="text" class="search" id="input-search" placeholder="Search">
        </div>

        <ul class="search-results"></ul>
        <div id="toc"></div>

    </div>

    <div class="page-wrapper">
	    <div class="dark-box"></div>

	    <div class="content">

		    <!-- START_INFO -->
		    <h1>Introduction</h1>
		    <p>
			    Welcome to the our API! <br>
			    This is a free REST service like <a href="https://jsonplaceholder.typicode.com/">JSONPlaceholder</a>,
			    but here you can CRUD your own data.
		    </p>

		    <p>To CRUD your own posts and comments you need to create a user then send HTTP request with Api-Token of this user.</p>

		    <p>If you find anything wrong in this documentation or anything need to improve please send me an email sourovfci@gmail.com</p>
		    <!-- END_INFO -->

		    <!-- START_HTTP_VARBS -->
		        @include('http-varbs')
		    <!-- END_HTTP_VARBS -->

		    <!-- START_STATUS_CODE -->
		        @include('status-code')
		    <!-- END_STATUS_CODE -->

		    <!-- START_USER -->
		        @include('users')
		    <!-- END_USER -->

		    <!-- START_POSTS -->
		        @include('posts')
		    <!-- END_POSTS -->

		    <!-- START_COMMENTS -->
		        @include('comments')
		    <!-- END_COMMENTS -->

			<br><p style="height:250px;">&nbsp;</p><br>

	    </div> <!-- /.content -->

	    <div class="dark-box">
		    <div class="lang-selector">
			    <a href="#" data-language-name="bash">bash</a>
			    <a href="#" data-language-name="javascript">javascript</a>
		    </div>
	    </div>

    </div> <!-- /.page-wrapper -->

</body>
</html>