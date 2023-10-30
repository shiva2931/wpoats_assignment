<html lang="en" style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD OPERATION</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.3.1/css/all.min.css">
    <link rel="stylesheet" href="assets/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/css/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="assets/css/toastr.min.css">
</head>
<?php
 include_once("config/config.php");
 
?>
<body class="layout-fixed">
    <div class="wrapper">
      <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Add Subject <small>(New)</small></h3>
                            </div>
                            <!-- form start -->
                            <form method="POST" id="frm_sub" name="frm_sub" autocomplete="off">
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="sub_id" class="form-control" id="sub_id">
                                        <div class="col-md-2">
                                            <label for="sub_name">Subject Name<span style="color:red">*</span></label>
                                            <div class="form-group input-group">
                                                <input autocomplete="nope" type="text" name="sub_name" class="form-control" id="sub_name" placeholder="Enter Subject Name">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="tagline">Tagline<span style="color:red">*</span></label>
                                            <div class="form-group input-group">
                                                <input autocomplete="nope" type="text" name="tagline" class="form-control" id="tagline" placeholder="Enter Tagline">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="descrption">Description<span style="color:red">*</span></label>
                                            <div class="form-group input-group">
                                                <input autocomplete="nope" type="text" name="descrption" class="form-control" id="descrption" placeholder="Enter Description">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="icon_image">Icon</label>
                                            <div class="form-group input-group">
                                                <input autocomplete="nope" type="file" name="icon_image" class="form-control" id="icon_image">
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="sub_image">Image</label>
                                            <div class="form-group input-group">
                                                <input autocomplete="nope" type="file" name="sub_image" class="form-control" id="sub_image">
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <div id="prev_image"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info" id="btn_sub_save" name="btn_sub_save">Save</button>
                                    <button type="submit" style="display:none" class="btn btn-info" id="btn_sub_update" name="btn_sub_update">Update</button>
                                    <button type="reset" class="btn btn-danger">Cancel</button>
                                </div>
                            </form>
                        </div>
        
                    </div>
                    
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- jquery validation -->
					<div class="card card-info">
						<div class="card-header">
							<h3 class="card-title">Product List <small>(All)</small></h3>
						</div>
                        <div class="row"><div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable no-footer dtr-inline">
							<thead>
								<tr role="row">
                                    <th class="sorting sorting_asc">Sr.No</th>
                                    <th class="sorting">Subject Name</th>
                                    <th class="sorting">Tagline</th>
                                    <th class="sorting">Description</th>
                                    <th class="sorting">Icon</th>
                                    <th class="sorting">Image</th>
                                    <th class="sorting">Action</th>
                                </tr>
							</thead>
							<tbody>
                             <?php
                                $result = mysqli_query($con, "SELECT * FROM `subject` where status=1 ORDER BY id DESC");
                                $sr=0; 
                                while($res = mysqli_fetch_array($result)) { 
                            ?>
                                <tr>
                                    <td><?= ++$sr; ?></td>
                                    <td><?= $res['sub_name']; ?></td>
                                    <td><?= $res['tagline']; ?></td>
                                    <td><?= $res['descrption']; ?></td> 
                                    <td>
                                        <?php if ($res['icon']) { ?>
											<img style="border-radius: 50%;" height="40px" src="images/<?= $res['icon']; ?>">
										<?php } else {
											echo '<img style="border-radius: 60%;" height="40px" src="images/no-image.jpg">';
											} 
                                        ?>
                                    </td>
                                    <td>
                                        <?php if ($res['image']) { ?>
											<img style="border-radius: 50%;" height="40px" src="images/<?= $res['image']; ?>">
										<?php } else {
											echo '<img style="border-radius: 60%;" height="40px" src="images/no-image.jpg">';
											} 
                                        ?>
                                    </td>
                                    <td>
                                        <button type=" button" class="btn btn-info btn-sm edit_sub" id="btn_up" value="<?= $res['id']; ?>">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-danger btn-sm delete_sub" id="btn_delete" value="<?= $res['id']; ?>">
                                           <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php 
								} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>
</section>
</div>
<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Delete Subject</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<form method="POST" id="form_delete_sub" name="form_delete_sub" autocomplete="off">
				<input type="hidden" name="sub_delete_id" id="sub_delete_id">
				<div class="modal-body">
					<p>Do you really want to delete these records?</p>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" id="btn_sub_delete" class="btn btn-danger">Delete</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<footer class="main-footer no-print">
    <strong>Copyright © 2023 <a href="#"></a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0
    </div>
</footer>

</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script src="assets/js/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/additional-methods.min.js"></script>

<script src="assets/js/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="assets/js/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>
<script type="text/javascript">
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>

<script type="text/javascript">
    
</script>
 <script type="text/javascript" src="master.js"></script>
</body></html>