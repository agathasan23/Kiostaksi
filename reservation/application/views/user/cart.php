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
            <a class="navbar-brand" href="<?php echo base_url(); ?>user">Hotel Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url('user'); ?>/reservation">Reservation</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('login/logout'); ?>">Log Out</a>
                    </li>
                </ul>
            </div>
	</div>
</nav>

<div class="container">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Home
                <small>Hotel Reservation</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>user">Home</a></li>
                <li><a href="<?php echo base_url('user'); ?>/reservation">Reservation</a></li>
                <li class="active">Booking</li>
            </ol>
        </div>
    </div>
<!---
    <div class="well">
        <div class="row">
            <div class="col-lg-12">
                <p></p>
            </div>
        </div>
    </div>
---->
    <div class="row">
        <div class="col-lg-12">
            <form action="<?php echo base_url('user/reservation_action'); ?>" method="POST">
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
                        <td align="center"><?php echo $tax=$price_all*(1/100); ?></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right">Total Price</td>
                        <td align="center">
                             <input type="text" name="total_price" value="<?php echo $total_price=$price+($price*(1/100)); ?>" hidden>
                             <?php echo $total=$price_all+$tax; ?>
                        </td>
                    </tr>
                </table>
        </div>
        <div align="right" class="col-lg-12">
                <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Book Now</button>
            </form>
        </div>
    </div>
</div>