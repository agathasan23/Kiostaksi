<?php 
$name = $this->session->userdata('name');
$check_in = $this->session->userdata('check_in');
$check_out = $this->session->userdata('check_out');
$price = $this->session->userdata('price');
$room = $this->session->userdata('room');
$person = $this->session->userdata('person');
?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Hotel Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="<?php echo base_url(); ?>reservation">Reservation</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>login">Login</a>
                    </li>
                </ul>
            </div>
	</div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Reservation
                <small>Start Reservation</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url('reservation'); ?>">Reservation</a></li>
                <li class="active">Booking</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="<?php echo base_url('reservation_action'); ?>" method="POST">
                <table width="100%" height="20%" border="1">
                    <tr bgcolor="gray" align="center">
                        <td>Room Type</td>
                        <td>Check-In</td>
                        <td>Check-Out</td>
                        <td>Room(s)</td>
                        <td>Person(s)</td>
                        <td>Price</td>
                    </tr>
                    <tr align="center">
                        <td><?php echo $name; ?></td>
                        <td><?php echo $check_in; ?></td>
                        <td><?php echo $check_out; ?></td>
                        <td><?php echo $room; ?></td>
                        <td><?php echo $person; ?></td>
                        <td><?php echo $price_all=$price*$room; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Tax(1%)</td>
                        <td align="center"><?php echo $tax=$price*(1/100); ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Total Price</td>
                        <td align="center">
                             <input type="text" name="total_price" value="<?php echo $total=$price+$tax; ?>" hidden>
                             <?php echo $total; ?>
                        </td>
                    </tr>
                </table>
        </div>
        <div class="col-md-4">
            <ul id="myTab" class="nav nav-tabs nav-justified">
                <li class="active"><a href="#service-one" data-toggle="tab"><i class="fa fa-database"></i> Guest</a>
                </li>
                <li class=""><a href="#service-two" data-toggle="tab"><i class="fa fa-database"></i> Registered User</a>
                </li>
            </ul>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="service-one">
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Name :</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number :</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>E-Mail :</label>
                            <input type="email" class="form-control" name="e-mail" required>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="service-two">
                    <div class="well" style="height: 202px;">
                        <div class="row">
                            <div class="col-lg-12" align="center">
                                <p>Already have an account?</p>
                                <p>Please login to proceed your checkout faster.</p>
                                <a href='#popup1' class="btn btn-primary" style="margin-top: 22px;" align="right">Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div align="right" class="col-lg-12">
                <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Book Now</button>
            </form>
        </div>
    </div>
</div>

<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Login</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form action="<?php echo base_url('login/fast_login'); ?>" method="POST">
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
                <div class="control-group form-group" align="right">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>