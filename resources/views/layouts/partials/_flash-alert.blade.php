

  <div id='flash'>
   	<script type="text/javascript">
	 @if ($message = Session::get('success'))

	   var $toastContent = '<span>{{ $message }}</span>';
	   toastr.success($toastContent)
	 @endif

	 @if ($message = Session::get('info'))
	   var $toastContent = '<span>{{ $message }}</span>';
	   toastr.info($toastContent)
	 @endif

	 @if ($message = Session::get('warning'))
	   var $toastContent = '<span>{{ $message }}</span>';
	   toastr.warning($toastContent)
	 @endif


	 @if ($message = Session::get('error'))
	   var $toastContent = '<span>{{ $message }}</span>';
	   toastr.error($toastContent)
	 @endif

   </script>
</div>
