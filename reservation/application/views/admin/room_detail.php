<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">Hotel Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url('admin'); ?>">User Data</a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url('admin/reservation_data') ?>">Reservation Data</a>
                    </li>
                    <li class="dropdown active">
                        <a href="<?php echo base_url('admin/room_data') ?>" class="dropdown-toggle" data-toggle="dropdown">
                                Room Data
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php foreach($rooms as $r){ ?>
                            <li><a href="<?php echo site_url('admin/room_data/' .$r->id_category); ?>"><?php echo $r->name; ?></a></li>
                            <?php } ?>
                        </ul>
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
            <h1 class="page-header">Reservation Data
                <small>Hotel Reservation Data</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('admin/room_data/'.$this->session->userdata('id_category')) ?>">Room Data</a></li>
                <li class="active">Detail</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $category['pic']; ?>" alt="">
        </div>
        <div class="col-md-4">
            <h3><?php echo $category['name']; ?></h3>
            <h3><small><?php echo $category['price']; ?></small></h3>
            <p><?php echo $category['describe']; ?></p>
            <h3>In Room :</h3>
            <ul>
                <li><strong>Name :</strong><?php echo $user['name']; ?></li>
                <li><strong>Location :</strong><?php echo $user['location']; ?></li>
                <li><strong>Phone :</strong><?php echo $user['phone']; ?></li>
                <li><strong>E-mail :</strong><?php echo $user['e_mail']; ?></li>
            </ul>
        </div>
    </div>
</div>