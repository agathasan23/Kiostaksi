<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url(); ?>user">Hotel Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
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
            <h1 class="page-header">Reservation
                <small>Start Reservation</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>user">Home</a></li>
                <li class="active">Reservation</li>
            </ol>
        </div>
    </div>

    <?php foreach ($rooms as $room){ ?>
    <div class="row">
        <div class="col-md-7">
                <img src='<?php echo base_url(); ?>assets/img/<?php echo $room->pic; ?>' width="650" height="300">
        </div>
        <div class="col-md-5">
            <h3><?php echo $room->name; ?></h3>
            <h4><?php echo $room->price; ?></h4>
            <p><?php echo $room->describe; ?></p>
            <a href="<?php echo site_url('/user/room/' .$room->slug); ?>" class="btn btn-primary">Book Now</a>
        </div>
    </div>
    <hr>
    <?php } ?>
</div>