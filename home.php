<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<Link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <title>Welcome to Grocery Hawk!</title>
</head>
<body>
  <header class="navbar navbar-toggleable-md navbar-light bg-faded">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#"> Grocery Hawk    </span></a>
  <div class="collapse navbar-collapse" id="">
    <input class="form-control mr-sm-2" type="text" placeholder="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Shopping cart</button>
  </div>
  </header>
	<div class="row">
		<div class="col-sm-2">
				<table class="table table-hover table-striped">
				<thead>
					<tr>
						<th>Categories</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><a href="">Beverages</a></td>
					</tr>
					<tr>
						<td><a href="">Bakery</a></td>
					</tr>
					<tr>
						<td><a href="">Dairy</a></td>
					</tr>
					<tr>
						<td><a href="">Canned</a></td>
					</tr>
					<tr>
						<td><a href="">Frozen Goods</a></td>
					</tr>
					<tr>
						<td><a href="">Meat</a></td>
					</tr>
					<tr>
						<td><a href="">Paper goods</a></td>
					</tr>
					<tr>
						<td><a href="">Cleaners</a></td>
					</tr>
					<tr>
						<td><a href="">Personal Care</a></td>
					</tr>
					<tr>
						<td><a href="">Seafood</a></td>
					</tr>
					<tr>
						<td><a href="">Laundry</a></td>
					</tr>
					<tr>
						<td><a href="">Home & Office</a></td>
					</tr>
					<tr>
						<td><a href="">Kitchen</a></td>
					</tr>
					<tr>
						<td><a href="">Bedrooms</a></td>
					</tr>
						</tbody>
					</table>
		</div>
		<div class="col-sm-10">
			<nav class="row">
				<div class="col-sm-2" style="padding-top: 0.5em;">Welcome User001!</div>
				<div class="col-sm-10">
					<div class="btn-group" role="group" aria-label="Basic example">
						<button type="button" class="btn btn-secondary col-sm-3">Account Information</button>
						<button type="button" class="btn btn-secondary col-sm-3">Order History</button>
						<button type="button" class="btn btn-secondary col-sm-3">Order status</button>
						<button type="button" class="btn btn-secondary col-sm-3">Deal</button>
						<button type="button" class="btn btn-secondary col-sm-3">Language</button>
						<button type="button" class="btn btn-secondary col-sm-3">Help</button>
					</div>
				</div>
				<!--<table class="table">
					<tbody>
						<tr>
							<td>
								Welcome User!
							</td>
							<td>
								<a href="">Account Information</a>
							</td>
							<td>
								<a href="">Order History</a>
							</td>
							<td>
								<a href="">Order status</a>
							</td>
							<td>
								<a href="">Deals</a>
							</td>
							<td>
								<a href="">Help</a>
							</td>
						</tr>
					</tbody>
				</table>-->
			</nav>
			<div class="row" id="grid">
			<table class="table">
				<tbody>
					<tr>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
					</tr>
					<tr>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
					</tr>
					<tr>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
					</tr>
					<tr>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
						<td>
							<img src="https://www.kitchenrestock.com/thumbnail.asp?file=assets/images/Product-Images/WincoImages/fb9efa1c-45e6-4f99-9813-9d69a83c68bd.png&maxx=370&maxy=0" alt="" border='2' height='180' width='180' />
							<div>Lemonade $1.99</div>
								<div class="form-group row">
								<div class="col-sm-6" id="quantity">
								<label for="sel1" class="control-label">Quantity:</label>
								</div>
								<div class="col-sm-6">
								<select class="form-control col-sm-4" id="sel1">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
								</select>
								</div>
								</div>
							<button type="button" class="btn btn-primary btn-sm">Add to cart</button>
						</td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
  </div>
  
  
  
  
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>