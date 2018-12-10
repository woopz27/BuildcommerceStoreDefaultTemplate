@extends('master.index')

@section('content')
<style>

body
{
	background:#00bcd4;
}

h1
{
	color:#fff;
	margin:40px 0 60px 0;
	font-weight:300;
}

.our-team-main
{
	width:100%;
	height:auto;
	border-bottom:5px #323233 solid;
	background:#fff;
	text-align:center;
	border-radius:10px;
	overflow:hidden;
	position:relative;
	transition:0.5s;
	margin-bottom:28px;
	cursor:pointer;
}


.our-team-main img
{
	border-radius:50%;
	margin-bottom:20px;
	width: 90px;
}




.team-back
{
	width:100%;
	height:auto;
	position:absolute;
	top:0;
	left:0;
	padding:5px 15px 0 15px;
	text-align:left;
	background:#fff;
	
}

.team-front
{
	width:100%;
	height:auto;
	position:relative;
	z-index:10;
	background:#fff;
	padding:15px;
	bottom:0px;
	transition: all 0.5s ease;
}



</style>
  <h1 class="text-center">Select Courier Service</h1>

	<div class="container">
	<div class="row">
	
	<!--team-1-->
	<div class="col-lg-4">
	<div class="our-team-main">
	
	<a href="{{ route('auth.createDelivery',['storeName' => $storeName,'courier' => 'lbcexpress']) }}"> 
	<div class="team-front">
	<img src="data:image/png;base64,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" class="img-fluid" />
	<h3>LBC EXPRESS</h3>
	</div>
	</a>

	
	</div>
	</div>
	<!--team-1-->
	
	<!--team-2-->
	<div class="col-lg-4">
	<div class="our-team-main">
	
	<a href="{{ route('auth.createDelivery',['storeName' => $storeName,'courier' => '2go']) }}"> 
	<div class="team-front">
	<img src="data:image/jpeg;base64,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" class="img-fluid" />
	<h3>2GO EXPRESS</h3>
	</div>
	</a>
	
	</div>
	</div>
	<!--team-2-->
	
	<!--team-3-->
	<div class="col-lg-4">
	<div class="our-team-main">
	
	<a href="{{ route('auth.createDelivery',['storeName' => $storeName,'courier' => 'air21']) }}"> 
	<div class="team-front">
	<img src="data:image/jpeg;base64,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fIrB6O8mQ1cL6isB0OeI4QHFl7bOdcc9zp8it/RdG9IZ5jIxwjuGwR8R17NA1vJvfd1wPAKtuppWcInWiJwqBcKzKTJtC4VFa/W2khLxExrjeQRiz36juQXAgAc9l2zFkulFPTcKIwVFRJFG2MSOkA1daW+o76WBxuO7xUdzTKOauVYopl0i4TRUT46elYeJbXK4vc6zeTW2Jtc7n2e1Q1bUtFozDWtt0ZERFZIuWkXF+V9/YuEQWZSZrwqB0c1MyWEsDuJFHG0cUkAND3arEDc816t6SKVvFqGwvNTI0NYC1ulrW34bC8G9rkuNhzJHYquRc/bU/rLhqsyvz7RugigZDJpE0ckzQ1rWkB/Efpu83vJvvz3uVnTdIlD6Uye9S4NidGGhjQ1pc5pc4guBcdh4CyqVEnpqHDVZuBdINO01L6gSRyTyOcyRrQ8NYG6Ym2ve7R2ctytRmXOUUlG3D6JsjYwAJJJLBzwDc9UHm525JUJRTHT1ickaNc5TrHs4U5w1mH0LZALNZI57Q27Ru61iblzufmtbkHGaWiqHVFSHucG6YgxodbV67iS4b228youitGlG2a/q3HGMLMrekSCeiqIXtl4kwmazqjS0OuIwTq+rpvt3rIkzzhz4YGETNbA5j+CI2nWWNsxpdqtYOs7nvYKq0VO2orw1TPN+O0+IRmokc9soPDpadpaQ2O4JklNtnE32B7G+1dshZnpcOjldIyR08mzdLRpDW+q3UXbXNydu7uUKRX4a7dv0txxjCU5dzG30r0jEpZ5GtJkZG0lzOITcHS5wADewezuUupOkyl4ksssLw/1IS1oLjEN26yXbHUTsFVCKLdPSyJ0qys2nzrh4ovRD6QNdzM5rGXe5ztUu5ftqJIv3Fez+kOikmjfJFMI4BeFga03ktbWRqsNLdmjf1iewKrEVe2ojhqtOn6S6bTNI+FzJ5NTWFjQRpbcQ6nF3Pe+wsL+axa3N+HPw8UDPSWsDGtu1rAXFu/WJcdnO3O3aVWyKe2ocNVkUudqGnpYqOCB74r2qTIwDU0gl7gA7rOcbbEgW9llpukLNEWISQ8EPbHEHA6wAbvIuQATewaFEEU10KxO77TGlWJys6nz9RxejQxMmEFO1xd1W6nPDdLNtXK5c4787LzrOkeM085jEgqJtTYyQNEbL6WAG9yQ27uXMlVqijtqI4arRbnXDnUsEDhMxsBic6IRg6+ELtaXaradYa7xt4rCOfIZqz0qYSxiFpZSsY1jz178R79RsHGzRty71XaJHTUg4YZOJ1r6iaSeQkukcXG9vIbbbCw8ljIi3iMRhrEYEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREH/2Q==" class="img-fluid" />
	<h3>AIR21</h3>

	</div>
	</a>

	
	</div>
	</div>
	<!--team-3-->
	
	<!--team-4-->
	
	<!--team-4-->
	
	<!--team-5-->

	<!--team-5-->
	
	<!--team-6-->

	
	</div>
	</div>
	<!--team-6-->
	
	
	
	</div>
	</div>
@endsection