<!DOCTYPE html>
<html lang="en">
<head>
  <title> Customer List</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/additional-methods.min.js'); ?>"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container">
  <h2>Customer  List</h2>

<?php if ($this->session->flashdata('msg')) { ?><?php echo $this->session->flashdata('msg'); } ?>

<a href="<?php echo base_url('welcome/index'); ?>" class="btn btn-primary"  style="float:right;" > Add Customers</a>
<br><br><br>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
            	<th>S.No</th>
                <th>Name</th>
                <th>Email</th>
                <th>Pnone</th>
                <th>Country</th>
                <th>Comments</th>
                <th>Addeed Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
                 if($users)
                 	 {
                 	 	 foreach ($users as $key => $value) 
                 	 	 {
        	?>
            <tr>
            	<td><?php echo $key+1; ?></td>
                <td><?php echo $value->firstname; ?></td>
                <td><?php echo $value->email; ?></td>
                <td><?php echo $value->mobile; ?></td>
                <td><?php echo $value->country; ?></td>
                <td><?php echo $value->comments; ?></td>
                <td><?php echo $value->addeddate; ?></td>
                <td>
                	<a href="<?php echo base_url('welcome/editusers/'.$value->id) ?>"  class="btn btn-primary">Edit</a>
                	<a href="<?php echo base_url('welcome/deleteusers/'.$value->id) ?>"  class="btn btn-danger">Delete</a>  
                	
                </td>
            </tr>
        <?php } } ?>
        </tbody>
    </table>
</div>



<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<style type="text/css">
.error
{
	color: red;
}	
</style>




</body>
</html>
