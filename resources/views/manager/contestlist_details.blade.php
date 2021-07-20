<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bd Freelancer</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
   <div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/manager">Home</a></li>
              <li class="breadcrumb-item"><a href="/list/{{$contest->id}}">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.vectorstock.com%2Froyalty-free-vector%2Favatar-icon-girl-in-a-baseball-cap-vector-16225068&psig=AOvVaw3lGAnBGAdVW475rmS3JhbD&ust=1624792372649000&source=images&cd=vfe&ved=0CAoQjRxqFwoTCIi6pbSVtfECFQAAAAAdAAAAABAD" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                       @if($contest->active =='1')
                      <button class="btn btn-primary">Active</button>
                      @else
                      <button class="btn btn-danger">Deactive</button>
                      @endif
                      <button class="btn btn-outline-primary">Message</button>
                    </div>
                  </div>
                </div>
              </div>
            
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
              <div class="card" style="width: 18rem;" class="col-md-4" >
                  <img  class="card-img-top" src="{{('/protfolio_img/'.$contest['contest_file'])}}" alt="Card image cap"/>
                  <div class="card-body">
                    <h5 class="card-title">{{$contest['title']}}</h5>
                    <p class="card-text">{{$contest['description']}}</p>
                    <p class="card-text"><h5>Time:</h5><span>{{$contest['time']}}</span></p>
                    <!--  a href="/user/details/>{{$contest['buyer_id']}}"> Details </a>-->
                  </div>
                </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="">Edit</a>
              
              @if($contest->active =='1')
              <a class="btn btn-warning "   target="__blank" href="/suspend/contest/{{$contest->id}}">Suspend</a>
              @else
              <a class="btn btn-primary "  target="__blank" href="/active/contest/{{$contest->id}}">Active</a>
              @endif
                    </div>
                  </div>
  
<!-- Modal -->

                </div>
              </div>

           


            </div>
          </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>