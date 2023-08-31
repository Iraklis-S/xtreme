<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-color: black">
    

<div class="table" style="text-align: center;color:white;">
@foreach ( $userData as $user )
{{$user->username}}<br>
{{$user->email}}
<hr>
@endforeach



</div>
 

</body>
</html>