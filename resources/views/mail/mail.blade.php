<!DOCTYPE html>
<html>
<head>
	<title>Mail</title>
</head>
<body>
<form action="{{ route('sendmail') }}" method="post">
	<input type="email" name="mail" placeholder="mail_adress">
	<input type="text" name="title" placeholder="title">
	{{ csrf_field() }}
	<button type="submit">Send</button>
</form>

Hello!


</body>
</html>
