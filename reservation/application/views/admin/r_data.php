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
                    <li class="active">
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
            <h1 class="page-header">Reservation Data
                <small>Hotel Reservation Data</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">Reservation Data</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table border="1" width="100%">
                <thead>
                    <tr bgcolor="gray" align="center" height="30">
                        <td>Room No</td>
                        <td>Check-in</td>
                        <td>Check-out</td>
                        <td>Person</td>
                        <td>Name</td>
                        <td>Total Price</td>
                        <td>Record Date</td>
                        <td>Status</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        foreach($reservations as $reservation){
                            $today=date('Y-m-d');
                            if($today >= $reservation->check_out){
                                $control='<small><a href='.base_url('admin/check_out/'.$reservation->id_reservation).'>Check Out</a></small>';
                            }elseif($today >= $reservation->check_in){
                                $control="<font color='green'>In Room</font>";
                            }else{
                                $control="<font color='green'>Ready</font>";
                            }
                    ?>
                    <tr align="center">
                        <td><?php echo $reservation->id_room ?></td>
                        <td><?php echo $reservation->check_in ?></td>
                        <td><?php echo $reservation->check_out ?></td>
                        <td><?php echo $reservation->person ?></td>
                        <td><?php echo $reservation->name ?></td>
                        <td><?php echo $reservation->total_price ?></td>
                        <td><?php echo $reservation->record_date ?></td>
                        <td><?php echo $control ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>