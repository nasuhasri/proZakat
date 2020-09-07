<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>eSijil Kolej Komuniti Pagoh</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
         
    <style type="text/css">
        .mtb-margin-top { margin-top: 20px; }
        .top-margin { border-bottom:2px solid #ccc; margin-bottom:20px; display:block; font-size:1.3rem; line-height:1.7rem;}

        .demo-page-header {
            text-align: center;
            font-size: 17px;
            text-transform: uppercase;
        }
        .margin-top-bottom {
            margin:20px 0;
            border: 4px solid #ccc;
            border-radius: 5px;
            padding: 8px 0;
        }
        .error {
            text-align: center;
            font-size: 15px;
            color: #ff0000;
            margin-top: 10px;
        }
        @media screen and (max-width:300px) {
            p {font-size:11px;}
            h1.top-margin {font-size:15px; line-height: 1.5em;}
        }
        
    </style>
</head>
<body>
    <div class="container">        
        <div class="row">   
            <div class="col-lg-12">
                <h1 class="demo-page-header">----------- Certificate Generator -----------</h1>
            </div>
        </div> 
        <form action="generate-pdf.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="name">Nama Peserta</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group col-md-6">
              <label for="icnum">MyKad</label>
              <input type="text" class="form-control" id="icnum" name="icnum">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="kodprog">Kod Program</label>
              <input type="text" class="form-control" id="kodprog" name="kodprog">
            </div>
            <div class="form-group col-md-6">
              <label for="nameprog">Nama Program</label>
              <input type="text" class="form-control" id="nameprog" name="nameprog">
            </div>
          </div>
          <div class="form-group">
            <label for="venue">Anjuran</label>
            <input type="text" class="form-control" id="venue" name="venue">
          </div>
          <button type="submit" class="btn btn-primary">Submit & Generate PDF</button>
        </form>
    </div><!-- .container -->
</body>
</html>