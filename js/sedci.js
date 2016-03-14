// Custom JS for SEDCI API

$('.delrec').on('click', function(){
	return confirm('Are you sure you want to delete this record?');
});

$('#checkall').on('click', function(){
	$('[name="device[]"]').prop('checked', $(this).prop('checked'));
});

$('.updateip').on('click', function(){
	if ($('[name="device[]"]:checked').length < 1) {
		alert('No device selected!');
		return false;
	}
});
