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
            <h1 class="page-header"><?php echo $detail['name']; ?>
                <small>Room Data</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">Room Data</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <form action="<?php echo base_url('admin/edit_category'); ?>" method="POST">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $detail['name']; ?>" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Price:</label>
                        <input type="text" class="form-control" name="price" value="<?php echo $detail['price']; ?>" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Describe :</label>
                        <textarea rows="10" cols="100" class="form-control" name="describe" required style="resize:none"><?php echo $detail['describe']; ?></textarea>
                    </div>
                </div>
                <div align="right">
                    <button type="submit" class="btn btn-primary" align="right">Edit</button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary" href="<?php echo base_url('admin/add_new_room') ?>">Add New</a>
            <table width="100%" border="1" style="margin-top: 10px;">
                <tr bgcolor="gray" align="center" height="30">
                    <td>Room No.</td>
                    <td>Availability</td>
                    <td>Control</td>
                </tr>
                <?php 
                    $no=1;
                    foreach($rom as $d){ 
                        if($d->availability == 0){
                            $available="<font color='green'>Available</font>";
                            $control = '<small><a href='.base_url('admin/delete_room/'.$d->id_room).'>Delete</a></small>';
                        }else{
                            $available="<font color='red'>Not Available</font>";
                            $control = '<small><a href='.base_url('admin/room_data_detail/'.$d->id_room).'>Check</a></small>';
                        }
                ?>
                <tr align="center">
                    <td><?php echo $no ?></td>
                    <td><?php echo $available ?></td>
                    <td><?php echo $control ?></td>
                </tr>
                <?php $no++;} ?>
            </table>
        </div>
    </div>

</div>