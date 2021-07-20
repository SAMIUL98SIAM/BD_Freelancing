<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bid Delete</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	



<div class="container">
   <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/buyer">Home</a></li>
              <li class="breadcrumb-item"><a href="/list/{{$bid->id}}">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                       @if($bid->active =='1')
                      <button class="btn btn-primary" disabled>Active</button>
                      @else
                      <button class="btn btn-danger" disabled>Deactive</button>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
              <div class="card" style="width: 18rem;" class="col-md-4" >
              <img class="card-img-top" src="{{('/protfolio_img/'.$bid['image'])}}" alt="Card image cap"/>
                  <div class="card-body">
                    <h5 class="card-title">{{$bid['username']}}</h5>
                    <p class="card-text">{{$bid['description']}}</p>
                    <!--  a href="/user/details/>{{$bid['buyer_id']}}"> Details </a>-->
                  </div>
                </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      
              
              @if($bid->active =='1')
              <a class="btn btn-warning"  href="/suspend/bid/{{$bid->id}}">Suspend</a>
              @else
              <a class="btn btn-primary" href="/active/bid/{{$bid->id}}">Active</a>
              @endif
			  <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
        <button class="btn btn-primary" href="" >Details</button>
              <!-- <a class="btn btn-danger" href="/blog/delete/{{$bid->id}}">Delete</a>		 -->
                    </div>
                  </div>
  
<!-- Modal -->

                </div>
              </div>

           


            </div>
          </div>

        </div>
    </div>






<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are sure delete Mr.{{$bid->username}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form method="post" enctype="multipart/form-data"> 
      	<input type="hidden" name="_token" value="{{csrf_token()}}">
      	<table>
		<tr>
			<tr>
			<td>Title</td>
			<td><input type="text" name="username" value="{{$bid->username}}"></td>
		</tr>
		<tr>
			<td>Buyer id</td>
			<td><input type="text" name="buyer_id" value="{{$bid->buyer_id}}"></td>
		</tr>
		<tr>
			<td>Seller id</td>
			<td><input type="text" name="seller_id" value="{{$bid->seller_id}}"></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="btn btn-primary" name="Submit" value="Delete">
			</td>
		</tr>
	</table>
</form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>