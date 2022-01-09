<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Hotel Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url(); ?>reservation">Reservation</a>
                    </li>
                    <li class="active">
                        <a href="<?php echo base_url(); ?>login">Login</a>
                    </li>
                </ul>
            </div>
	</div>
</nav>

<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Login
                <small>Connect to Web</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="active">Login</li>
            </ol>
        </div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    		<h2 class="page-header">Register</h2>
            <form action="<?php echo base_url('login/register_action'); ?>" method="POST">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Username:</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Password:</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Full name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Location:</label>
                        <input type="text" class="form-control" name="location" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Phone:</label>
                        <input type="text" class="form-control" name="phone" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>E-mail:</label>
                        <input type="E-mail" class="form-control" name="e_mail" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
    	</div>

    	<div class="col-md-6">
    		<h2 class="page-header">Login</h2>
    		<form action="<?php echo base_url('login/login_action'); ?>" method="POST">
    			<div class="control-group form-group">
    				<div class="controls">
    					<label>Username:</label>
    					<input type="text" class="form-control" name="username" required>
    				</div>
    			</div>
    			<div class="control-group form-group">
    				<div class="controls">
    					<label>Password:</label>
    					<input type="password" class="form-control" name="password" required>
    				</div>
    			</div>
    			<button type="submit" class="btn btn-primary">Login</button>
    		</form>
    	</div>
    </div>
</div>