
  <!DOCTYPE html>
  <html lang="en">
      <head>
          <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
          <meta charset="utf-8">
          <title>8 Hordings</title>
          <meta name="generator" content="Bootply" />
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

          <link href="css/bootstrap.min.css" rel="stylesheet">
          
          <!--[if lt IE 9]>
            <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
          <![endif]-->
          <style type="text/css">
              
              html,body{
    	        height:100%;
             }

            #map-canvas {
             width:100%;
             height:100%;
            }

            .hide{
               visibility: hidden;
            }

            .show{
              visibility: visible;
            }
          </style>
      </head>
      
      <body>
   <div class="container">
     <div class="row">
         <div class="col-md-12" style="padding:10px;">
            <button class="btn btn-primary btn1">Search Location</button>
            <button class="btn btn-info btn2">Add Location</button> 
         </div>
     </div>

     <div class="row">
       <div class="col-md-12 searchForm hide" style="padding:10px;">  
       <form class="form-inline">
         <div class="form-group">
            <input type="text" class="form-control" name="location" placeholder="Enter location">
         </div>
         <button type="button" class="btn btn-default" id="search">Search</button>
       </form>
      </div> 
     </div> 

     <div class="row">
          <div class="col-md-6 addForm hide" style="padding:10px;">  
             <form>
               <div class="form-group">
                 <label for="agencyName">Agency Name</label>
                 <input type="text" class="form-control" value="agencyName" placeholder="abc"> 
               </div>

               <div class="form-group">
                 <label for="contactNumber">Contact Number</label>
                 <input type="text" class="form-control" value="contactNumber" placeholder="+91"> 
               </div>

               <div class="form-group">
                 <label for="address">Address</label>
                 <textarea class="form-control" name="address" placeholder="Address" rows="5" cols="3"></textarea>
               </div>

              <button class="btn btn-primary">Submit</button>
             </form>
          </div>
     </div>

   </div>
    <!--div id="map-canvas" class=""></div-->  
    <div id="map_load_div"></div>


          
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type='text/javascript' src="js/bootstrap.min.js"></script>


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3D7zw3hgVk-3Tmi0lrP7B9MzlL_KcyZQ&signed_in=true">
      </script>

      



  <script type="text/javascript">
    $(document).ready(function(){
     $('.btn1').on('click', function(){
         $('.addForm').removeClass('show').addClass('hide');
         $('.searchForm').removeClass('hide').addClass('show'); 
     });

     $('.btn2').on('click', function(){
        $('.searchForm').removeClass('show').addClass('hide');  
        $('.addForm').removeClass('hide').addClass('show');
        $("#map_load_div").removeClass('show').addClass('hide');
     });

     $("#search").on('click',function(){
        
        $('.addForm').removeClass('show').addClass('hide');
        $("#map_load_div").removeClass('hide').addClass('show');
         


        
          $.ajax({
            url: 'ajax_map.php',
            type: 'POST',
            success: function (data) {
             $("#map_load_div").html(data);
   
             }
          });
    
     });

    });
  </script>

        
          
      </body>
  </html>