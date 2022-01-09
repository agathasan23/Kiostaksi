<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">Hotel Reservation</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="<?php echo base_url('admin'); ?>">User Data</a>
                    </li>
                    <li class="">
                        <a href="<?php echo base_url('admin/reservation_data') ?>">Reservation Data</a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo base_url('admin/room_data') ?>" class="dropdown-toggle" data-toggle="dropdown">
                                Room Data
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <?php foreach($rooms as $room){ ?>
                            <li><a href="<?php echo site_url('admin/room_data/' .$room->id_category); ?>"><?php echo $room->name; ?></a></li>
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
            <h1 class="page-header">User Data
                <small>Data User Registered</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">User Data</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table border="1" width="100%">
                <thead>
                    <tr bgcolor="gray" align="center" height="30">
                        <td>Name</td>
                        <td>Location</td>
                        <td>Phone</td>
                        <td>E-Mail</td>
                        <td>Username</td>
                        <td>Level</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($users as $user){
                    ?>
                    <tr align="center">
                        <td><?php echo $user->name ?></td>
                        <td><?php echo $user->location ?></td>
                        <td><?php echo $user->phone ?></td>
                        <td><?php echo $user->e_mail ?></td>
                        <td><?php echo $user->username ?></td>
                        <td><?php echo $user->level ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>