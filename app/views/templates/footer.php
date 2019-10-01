
<?php if (!empty($data['admin'])): ?>
	<?php if ($data['admin'] == 'admin'): ?>
	</div>
</div>
<?php endif ?>
<?php endif ?>

<script type="text/javascript" src="<?php echo BASEURL; ?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL; ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo BASEURL; ?>/js/toastr.min.js"></script>
<script type="text/javascript">
	$('.statusUser').change(function () {
		var value = $(this).val();
		var idUser = $(this).data("id");
		console.log(value+' '+idUser);
		$.ajax({
			url: "<?php echo BASEURL; ?>/Admin/updateStatusUser",
			type: "POST",
			data: {
				value:value,
				idUser:idUser
			}, 
			success: function(data){
				toastr.success('Update Status Pengajuan', 'Pengajuan Berhasil Di update');
			}
		});
	});
</script>
<script type="text/javascript" src="<?php echo BASEURL; ?>/js/javascript.js"></script>
</body>
</html>