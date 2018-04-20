<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

 	<meta name="csrf-token" content="{{ csrf_token() }}">
  

 {{-- 	 to connect to css file in public / css app.css  --}}
    
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
	<title>Document</title>
</head>
<body>
	<div id="app">
      {{--  connect to Myheader variable in app.js file --}}
		<Myheader></Myheader>
           {{-- 	get the content of pages --}}
           <div class="container">
           	<router-view></router-view>
            </div>
          
	 {{--  connect to Myfooter variable in app.js file --}}
		<Myfooter></Myfooter>
	</div>
{{-- 	 to connect to js file in public / js app.js  --}}

	<script src="{{ asset('js/app.js')}}"></script>
</body>
</html>