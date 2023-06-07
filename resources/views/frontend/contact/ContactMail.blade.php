<!DOCTYPE html>
<html>
<head>
	<title>Contact Massage</title>
</head>
<body>
<center>
	<h1>{{$details['subject']}}</h1>
</center>
<p>Hi I am {{$details['name']}}</p>
<p>{{$details['mail_body']}}</p>
<br>
<p>Reply to <a href="{{$details['email']}}">{{$details['email']}}</a></p>
<p>Thank you</p>
<br>
<center>This massage is automaticaly sent form BloodTent contact page</center>
</body>
</html>