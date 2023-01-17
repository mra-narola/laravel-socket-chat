<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>{{ config('app.name'); }}</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <link rel="stylesheet" href="{{ asset('assets/custom/css/style.css') }}" />
    </head>
    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="javascript:void(0);">{{ config('app.name') }}</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('welcome') }}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Content -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="card mb-4">
                        <h5 class="m-4">
                            <span id="active_username">Active User</span>
                            <small id="online_status" class="small">Online</small>
                        </h5>
                        <hr class="bg-dark mt-0">
                        <div class="card-body">
                            <div class="chat-wrapper">
                                <h6 class="card-title">Post Title</h6>
                                <div class="user-recevie-message mr-5">
                                    <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                                    <div class="text-left">
                                        <small class="user-recevie-message-date-time">{{ date('d M, Y H:i A', strtotime('-5 minute')) }}</small>
                                    </div>
                                </div>
                            </div>

                            <div class="chat-wrapper">
                                <h6 class="card-title text-right pl-5">Post Title 2</h6>
                                <div class="user-recevie-message ml-5">
                                    <p class="m-0 text-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                                    <div class="text-right">
                                        <small class="user-recevie-message-date-time">{{ date('d M, Y H:i A') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between">
                                <textarea name="message" class="form-control" placeholder="Write a message..."></textarea>
                                <button type="submit" class="btn btn-success btn-chat align-self-center ml-2" name="send"><img src="{{ asset('assets/images/email-send.png') }}" /></button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widgets Column -->
                <div class="col-md-4">
                    <!-- Search Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-secondary open-modal" type="button">Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Categories Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="javascript:void(0);">Web Design</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">HTML</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Freebies</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="javascript:void(0);">JavaScript</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">CSS</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Tutorials</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="py-5 bg-dark">
            <div class="container">
                <p class="m-0 text-center text-white">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</p>
            </div>
        </footer>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		
		<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.1.3/socket.io.js"></script>

		<script type="text/javascript">
            // intialize client socket
		    const socket = io.connect('ws://127.0.0.1:5014', { secure: true });
		    console.log('socket', socket);

		    $(document).on('click', '.click-me', function(event) {
		    	event.preventDefault();
		    	let obj = { foo: 'bar' };
			    socket.emit('request-for-new-modal', obj);
		    });


		    socket.on('initialize-modal', (data) => {
		    	console.log('initialize-modal', data);
		    	$('body').append(data.html);
		    	if ( $(document).find('#upload-modal').length ) {
		    		$(document).find('#upload-modal').modal('show');
		    	}
		    });
		</script>
	</body>
</html>