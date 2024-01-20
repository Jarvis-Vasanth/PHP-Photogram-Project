<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="project jarvis">
	<meta name="generator" content="Hugo 0.84.0">
	<title>login to photogram</title>

	<!-- Bootstrap core CSS -->
	<link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
	// Initialize the agent at application startup.
    const fpPromise = import('https:///openfpcdn.io/fingerprintjs/v3').then(FingerprintJS => FingerprintJS.load())

	//Get the visitor identifier when you need it.
	fpPromise
	     .then(fp => fp.get())
		 .then(result => {
		 //This is the visitor identifier:
		 const visitorId = result.visitorId
		 console.log(visitorId)
		 $('#fingerprint').val(visitorId);	
		 })
     </script>

	 <!-- All Css Automatic including in one function -->
	 <?php if (file_exists($_SERVER['DOCUMENT_ROOT'] .get_config('base_path').'css/' . basename($_SERVER['PHP_SELF'], ".php") . ".css")) { ?>
	
	<link
		href="/css/<?=basename($_SERVER['PHP_SELF'], ".php");?>.css" rel="stylesheet">
	<?php } ?>

</head>