 <!DOCTYPE html>
<html>

 <head>
  <link rel="stylesheet" type="text/css" href="./app/css/bootstrap.css">

</head> 

<body>


<div class="container">
    <br/>
	<div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form class="card card-sm" action="result.php" method="get">
                                <div class="card-body row no-gutters align-items-center">
                           
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Search topics or keywords" name="search">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>


<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Account Id</th>
      <th scope="col">Account Name</th>
    </tr>
  </thead>
  <tbody>
        <?php require './app/action/render_rs.php'  ?>
  </tbody>
</table>

                    
</div>

</body>
</html> 