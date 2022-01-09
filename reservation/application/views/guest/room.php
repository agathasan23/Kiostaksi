<?php 
$count = $this->data_model->count_room($room['id_category'])->num_rows();
if($count>0){
    $availability = 1;
    $count_text = "<font color='green'>Available</font>";
}else{
    $availability = 0;
    $count_text = "<font color='red'>Unavailable</font>";
}
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
            <img class="img-responsive" src="<?php echo base_url(); ?>assets/img/<?php echo $room['pic']; ?>" alt="">
        </div>
        <div class="col-md-4">
            <h3><?php echo $room['name']; ?><small>&nbsp;<?php echo $count_text; ?></small></h3>
            <h3><small><?php echo $room['price']; ?></small></h3>
            <p><?php echo $room['describe']; ?></p>
            <h3>Details</h3>
            <ul>
                <li>Lorem Ipsum</li>
                <li>Lorem Ipsum</li>
                <li>Lorem Ipsum</li>
            </ul>
            <p>&nbsp;</p>
            <?php if($availability==1){ ?>
            <a href="#popup1" class="btn btn-primary">Book Now</a>
            <?php }else{} ?>
        </div>
    </div>
</div>

<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Fill this data</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <form action="<?php echo base_url('reservation_table'); ?>" method="POST">
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Check in:</label>
                        <input type="date" class="form-control" name="check_in" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Check Out:</label>
                        <input type="date" class="form-control" name="check_out" required>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Room:</label>
                        <select name="room" class="form-control">
                            <?php 
                            for($i=1;$i<=$count;$i++){
                                if($i<2){
                                    echo '<option value='.$i.'>'.$i.' Room</option>';
                                }else{
                                    echo '<option value='.$i.'>'.$i.' Rooms</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group form-group">
                    <div class="controls">
                        <label>Person:</label>
                        <select name="person" class="form-control">
                            <?php 
                            for($i=1;$i<=$room['capacity'];$i++){
                                if($i<2){
                                    echo '<option value='.$i.'>'.$i.' Person</option>';
                                }else{
                                    echo '<option value='.$i.'>'.$i.' Persons</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group form-group" align="right">
                    <input type="text" name="id" value="<?php echo $room['id_category']; ?>" hidden>
                    <button type="submit" class="btn btn-primary">Book Now</button>
                </div>
            </form>
        </div>
    </div>
</div>