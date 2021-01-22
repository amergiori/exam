<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Contact Us</title>
  <?php include_once('header.php'); ?>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</head>
<body>
  <?php include_once('nav.php'); ?>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 border border-dark my-3">
          <h1>Contact Us</h1>
          <form action="" method="POST" class="mb-3" id="form">
            <div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" placeholder="Please enter your name">
              </div>
            </div>
            <div class="form-group row">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" placeholder="Please enter your email">
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-sm-2 col-form-label">Phone</label>
              <div class="col-sm-10">
                <input type="tel" class="form-control" id="Phone" name="phone" placeholder="Please enter your phone number">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label" for="exampleFormControlSelect1">Department</label>
              <div class="col-sm-10">
                <select class="form-control" name="department" id="exampleFormControlSelect1">
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="content" class="col-sm-2 col-form-label">Content</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
              </div>
            </div>
            <button class="btn btn-primary mb-3">Submit</button>
            <div class="alert alert-success d-none" role="alert">Your Message Was Sent Successfully</div>
            <div class="alert alert-danger d-none" role="alert"></div>
          </form>
        </div>
      </div>
    </div>
  <script src="../js/contact.js"></script>
</body>
</html>