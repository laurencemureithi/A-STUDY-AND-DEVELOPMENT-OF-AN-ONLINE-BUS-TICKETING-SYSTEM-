 <section id="bg-bus" style="margin-left:400px; position: absolute; z-index:2;" class="d-flex align-items-center">
    <div class="container">
      
      <?php if(!isset($_SESSION['login_id'])): ?>
        <h1 style="color: black; margin-top:90px;">Book Your Bus Ticket Now</h1>
        <h2 style = "color: black; margin-top:20px; margin-bottom:10px;">Find your schedule and book your ticket now</h2>
      	<button style="margin-top:-2px;" class="btn btn-primary btn-lg" type="button" id="book_now">Search Available Routes</button>
        
      
        <?php else: ?>
        <h1 style="color: black; margin-top:50px;">Welcome <?php echo $_SESSION['login_name'] ?></h1>
        <h2 style = "color: black;"
      >Use the Side Navigation to Navigate the System</h2>
      <?php endif; ?>
    </div>
  </section>
  <script>
  	$('#book_now').click(function(){
      uni_modal('Find Schedule','book_filter.php')
  })
  </script>