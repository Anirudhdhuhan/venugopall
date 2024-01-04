<div>
	<p><strong>Name:- </strong>{{ $_POST['name'] }}</p>
	<p><strong>Profession:- </strong>{{ $_POST['profession'] }}</p>
	<p><strong>Address:- </strong>{{ $_POST['address'] }}</p>
	<p><strong>Email:- </strong>{{ $_POST['email'] }}</p>
	<p><strong>Mobile:- </strong>{{ $_POST['mobile'] }}</p>
	<p><strong>Total words:- </strong>{{ count(explode(" ", $_POST['essay'])) }}</p>
	<p><strong>Essay:- </strong>{{ $_POST['essay'] }}</p>
	<br>
</div>