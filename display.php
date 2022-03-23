<?php 

include 'connect.php';

  //Query the database to fetch result
  $sql = " SELECT * FROM crud ORDER BY id";
  $result = $conn->query($sql);

  $conn->close( );


?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stlyesheet" href="../css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Reading Data from Database</title>
</head>
 
<body style="background-color: #F5F5F5;">
  <div class="row">
    <!-- Tab begins  -->
  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="overview" aria-selected="true">Overview</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="screening" aria-selected="false">Screening</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="verification" aria-selected="false">Verification</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="deployment" aria-selected="false">Deployment</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
<!-- Tabs ends here -->
    <div class="col-8">

    <div class="container" >
        <div class="format-doc"  style="background-color: #ffffff; border-radius:1%; ">
          <p style="float: right; padding-top:7%; margin-right:5%; "><a href="user.php" >Back</a></p>
          <button class="btn btn-success my-5" style="margin-left: 5%;"><a href="user.php" class="text-light">Add User</a></button>
        </div>
       
        <div class="card mt-5">
  <div class="card-body">
    This is some text within a card body.
  </div>
</div>
      <h4 class="personal mt-5">Personal Details</h4>
        <table class="table" style="background-color: #ffffff; border-radius:1%;">
            <thead>
                <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <!-- <th scope="col">Gender</th> -->
                    <th scope="col">Mobile</th>
                    <th scope="col">Country</th>
                    <th scope="col">State</th>
                    <th scope="col">LGA</th>
                    <th scope="col">Image</th>
                    <th scope="col">Operation</th>
                </tr>
            </thead>
            <tbody>

            <?php 
          while($row = $result->fetch_row()){
            ?>
            
              <tr>
                    <td><?php echo $row[0] ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[4] ?></td>
                    <td><?php echo $row[5] ?></td>
                    <td><?php echo $row[6] ?></td>
                    <td><?php echo '<img src="uploads/'.$row[7].'" height = 60px width = 60px class="img-round" />' ?></td>
                    <td>
                    <button class="btn btn-primary" name="update"><a href="update.php?updateid=<?php echo $row[0] ?>" class="text-light">Update</a></button>
                  </br></br>
                    <button class="btn btn-danger" ><a href="delete.php?deleteid=<?php echo $row[0];?>" class="text-light">Delete</a></button>
                </td>
                
                </tr>
        <?php
        }
        
            ?>
                
            </tbody>
        </table>
        <h4 class="address mt-5">Address Details</h4>
        <div style="background-color: #ffffff; border-radius:5px;">
          
          ihkjenf;oefiho;lf/wkjf'pjf[wq0yhqdfjwmq'[pfuq[9f]0q0
          pwqfwqoj[0ju9[3['pfypq9fhf;oeqfieqw0'f9ju]ewfu7f]]]]
          Note: None of the OTHER CSS border properties (which you will 
          learn more about in the next chapters) will have ANY effect unless 
          the border-style property is set!
          Note: None of the OTHER CSS border properties (which you will learn
           more about in the next chapters) will have ANY effect unless the 
           border-style property is set!
           Note: None of the OTHER CSS border properties (which 
           you will learn more about in the next chapters) will have ANY effect
            unless the border-style property is set!
            Note: None of the OTHER CSS border properties (which you will learn more about in the next chapters) will have ANY effect unless the border-style property is set!

            Note: None of the OTHER CSS border properties (which you will learn more about in the next chapters) will have ANY effect unless the border-style property is set!








        </div>

        <h4 class="address mt-5">Educational Background</h4>
        <div class="col-" style="background-color: #ffffff; border-radius:5px;">
          
          the boy is the man of nthe yearmnhi jhkje'oiefoiunfej
        </div>
        
        <h4 class="address mt-5">Identification</h4>
        <div class="col-" style="background-color: #ffffff; border-radius:5px;">
         
          ihkjenf;oefiho;lf/wkjf'pjf[wq0yhqdfjwmq'[pfuq[9f]0q0
          pwqfwqoj[0ju9[3['pfypq9fhf;oeqfieqw0'f9ju]ewfu7f]]]]
        </div>

        <h4 class="address mt-5">Bank Details</h4>
        <div class="col-" style="background-color: #ffffff; border-radius:5px;">
         
          Provide your bank details and ensure the data provided in here is correct
        </div>

        <h4 class="address mt-5">Disabilities</h4>
        <div class="col-" style="background-color: #ffffff; border-radius:5px;">
          
          Are you with any disabilities form
        </div>

        <h4 class="address mt-5">Other Documents</h4>
        <div class="col-" style="background-color: #ffffff; border-radius:5px;">
          
          Upload your documents that are not provided in here
        </div>
        
    </div>




    </div>
    <div class="col-4">
        <div class="col-12" style="background-color: #ffffff;border-radius:5px; text-align:center"> 
          <img src="img/me1.png" class="img-circle mt-4" alt="checking image" width="130" height="130" style="border-radius:100px;">
           
          <h4>UserName</h4>
          <p>shatertimothy89@gmail.com</p>
          <h5>NPWR/2020/006475494</h5>
          <h5>N-Teach - NPR</h5>
          <p>Beneficiary</p>

        </div>
        <div class="col-12"></div>

    </div>
  </div>
  

  <!-- Javascript start -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>