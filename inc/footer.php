<!--lOGIN-->
<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Login Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" id="pwd" name="pass" required>
          </div>
          <div class="d-flex align-items-center mt-2">
            <button name="login" type="submit" class="btn btn-success">Submit</button>
            <p class="mb-0 ms-3">Don't have an account yet? <a href="#" data-bs-toggle="modal" data-bs-target="#dd">Sign Up here</a></p>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- //LOGIN -->

<!--SIGNUP-->
<div class="modal fade" id="dd" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Sign Up Form</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="d">
      <form action="" method="post">
            <div class="form-group">
              <label for="email">Email address:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" name="pass" required>
            </div>
            <div class="form-group">
              <label for="email">Name:</label>
              <input type="text" class="form-control" id="email" name="name" required>
            </div>
            <div class="form-group">
              <label for="email">City:</label>
              <input type="text" class="form-control" id="email" name="city" required>
            </div>
            <div class="form-group">
              <label for="email">Zip Code:</label>
              <input type="text" class="form-control" id="email" name="zip" required>
            </div>
            <div class="form-group">
              <label for="email">Address:</label>
              <input type="text" class="form-control" id="email" name="address" required>
            </div>
            <div class="form-group">
              <label for="email">Country:</label>
              <input type="text" class="form-control" id="email" name="country" required>
            </div>
            <div class="form-group">
              <label for="email">Phone:</label>
              <input type="text" class="form-control" id="email" name="phone" required>
            </div>
            <button name="signup" type="submit" class="btn btn-success mt-2">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- //SIGNUP -->

<!--Product Modals--->

<div id="dataModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Product Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="product_detail">
      </div>
    </div>
  </div>
</div>

<!-- <div id="dataModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product Details</h4>
      </div>
      <div class="modal-body" id="product_detail">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> -->
<!--Product Modals--->

<!-- Footer -->
<footer class="footer mt-auto text-center">
  <div class="container">
    <span class="text-muted">TokoTo &copy; <?php echo date('Y'); ?></span>
  </div>
</footer>

</div>
<!-- /.container -->

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.view_data').forEach(function(element) {
      element.addEventListener('click', function() {
        var product_id = this.getAttribute('id');
        
        fetch('select.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({ send_id: product_id })
        })
        .then(response => response.text())
        .then(data => {
          document.getElementById('product_detail').innerHTML = data;
          var modal = new bootstrap.Modal(document.getElementById('dataModal'));
          modal.show();
        })
        .catch(error => console.error('Error:', error));
      });
    });
  });
</script>


<!-- document.addEventListener("DOMContentLoaded", function() {
  const viewDataButtons = document.querySelectorAll(".view_data");

  viewDataButtons.forEach(button => {
    button.addEventListener("click", function() {
      const productId = this.id;

      fetch("select.php", {
        method: "POST",
        body: JSON.stringify({ send_id: productId }),
      })
        .then(response => response.text())
        .then(data => {
          const productDetail = document.getElementById("product_detail");
          productDetail.innerHTML = data;
          document.getElementById("dataModal").showModal();
        })
        .catch(error => {
          console.error("Error fetching data:", error);
        });
    });
  });
});

<script>
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.view_data').forEach(function(element) {
      element.addEventListener('click', function() {
        var product_id = this.getAttribute('id');
        
        fetch('select.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
          },
          body: new URLSearchParams({ send_id: product_id })
        })
        .then(response => response.text())
        .then(data => {
          document.getElementById('product_detail').innerHTML = data;
          var modal = new bootstrap.Modal(document.getElementById('dataModal'));
          modal.show();
        })
        .catch(error => console.error('Error:', error));
      });
    });
  });
</script> -->

</body>

</html>