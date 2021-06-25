<?php 
require_once 'db.php';

 ?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=us-ascii" />
  
  <title>Firsst</title>

  <!-- BOOTSTRAP -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->


  
  <!-- CSS -->
  <link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body>
  <div id="page-wrap">
    <div id="header">
      <h1><a href="">PHP Sample Test App</a></h1>
    </div>


    <div id="main">

      <noscript>This site just doesn't work, period, without JavaScript</noscript>

      
                      <ul class="ui-sortable" id="list">
                  <?php
                  //get rows query
                  $query = mysqli_query($con, "SELECT * FROM tabletb ORDER BY orderID ASC");
                  
                  //number of rows
                  $rowCount = mysqli_num_rows($query);
                  
                  if($rowCount > 0){ 
                    while($row = mysqli_fetch_assoc($query)){ 
                      $tutorial_id =  $row['id'];
                  ?>
                    <li data-post-id="<?php echo $row['id']; ?>" color="1" class="colorBlue" rel="1">
                      <div class="li-post-group">
                      <span id='2listitem' title='Double-click to edit...' style='opacity: 1;'>
                                  <?php echo  $row['name']; ?>
                                  </span>
                        <div class='draggertab tab'></div>

          <div class='colortab tab'></div>

          <div class='deletetab tab' style='width: 44px; display: block; right: -64px;'>
            <?php 
            echo "<a href='delete.php?id=$row[id]&name=$row[name]'>";

             ?>
          </div>
          

          <div class='donetab tab'></div>
                            
                    </div>
                    </li>
                    <?php echo "</a>"; ?>
                  <?php } 
                  } ?>
                  </ul>
      
	  <br />

      <form action="insert.php" id="add-new" method="post">
        <input type="text" id="new-list-item-text" name="name" />
        <input type="submit" name="submit" id="add-new-submit" value="Add" class="button" />
      </form>

      <div class="clear"></div>
      
    </div>

  </div>

 <!-- Jquery Core Js -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Bootstrap Select Js -->
    <script src="js/bootstrap-select.js"></script>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<script>

  $(document).ready(function(){
    $( "#list" ).sortable({
      placeholder : "ui-state-highlight",
      update  : function(event, ui)
      {
        var post_order_ids = new Array();
        $('#list li').each(function(){
          post_order_ids.push($(this).data("post-id"));
        });
        $.ajax({
          url:"ajax_upload.php",
          method:"POST",
          data:{post_order_ids:post_order_ids},
          success:function(data)
          {
           if(data){
            $(".alert-danger").hide();
            $(".alert-success ").show();
           }else{
            $(".alert-success").hide();
            $(".alert-danger").show();
           }
          }
        });
      }
    });
  });
  </script>

</body>
</html>
