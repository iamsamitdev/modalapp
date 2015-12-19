<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>News letter</title>
        <style type="text/css">
	div
	{
		width: 600px;
		margin: 0 auto;
		padding: 20px;
		border: 1px solid #A9A9A9;
	}
        </style>
    </head>
    <body>
        
       <div>
	<h1>News Letter</h1>

            <h4>Hello {{$CustName}}</h4>
	<p>{{Request::input('message')}}</p>

	<p>ITGenius.co.th</p>
       </div>

    </body>
</html>