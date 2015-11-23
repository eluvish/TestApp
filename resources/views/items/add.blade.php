@extends('layouts.master')

@section('head')

    <link rel="stylesheet" type="text/css" href="/css/upload/normalize.css" />
    <link rel="stylesheet" type="text/css" href="/css/upload/demo.css" />
    <link rel="stylesheet" type="text/css" href="/css/upload/component.css" />
@stop

@section('content')

<!-- resources/views/auth/add.blade.php -->


<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- remove this if you use Modernizr -->
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
</head>

<!-- Reference for file upload tool: http://tympanus.net/codrops/2015/09/15/styling-customizing-file-inputs-smart-way/ -->

<div class="container">
    <div class="content">
        <form method="POST" action="/items/add" role="form" accept-charset="UTF-8" enctype="multipart/form-data">
            {!! csrf_field() !!}
        <div class="box">
            <input type="file" name="image" id="file-5" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
            <label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
            </svg></figure> <span>Choose a file&hellip;</span></label>
        </div>
        <input type="submit" name="submit" value="Upload">
    </form>
    </div>
</div><!-- /container -->

<center>
@if(count($errors) > 0)
    <ul class='errors'>
        @foreach ($errors->all() as $error)
            <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
        @endforeach
    </ul>
@endif
</center>

<script type="text/javascript">

<!-- This changes the label to the name of the file to be uploaded -->
var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		if( this.files && this.files.length > 1 )
			fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else
			fileName = e.target.value.split( '\\' ).pop();

		if( fileName )
			label.querySelector( 'span' ).innerHTML = fileName;
		else
			label.innerHTML = labelVal;
	});
});
</script>

<script src="/js/custom-file-input.js"></script>

<!--
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<center>
<div class="wrapper">
    <h1>Upload</h1>
    <p class="heading">Upload an image of an article of clothing. Items look best against a background with contrast.</p>

    <form method="POST" action="/items/add" role="form" accept-charset="UTF-8" enctype="multipart/form-data" class="dropzoneFileUpload">
        {!! csrf_field() !!}
            <div><input type="file" name="image"></div>

            <div>
                <input type="submit" class="submit" value="Upload">
            </div>
        </form>
    <br>
</div>
-->


@stop
