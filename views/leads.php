<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads</title>
    <?php include_once('header.php'); ?>
</head>
<body>
    <?php include_once('nav.php'); ?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-9">
                <table class="table table-striped border">
                    <thead>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div class="alert alert-success d-none msg" role="alert">Row Successfully Deleted</div>
                <div class="alert alert-danger d-none msg" role="alert">Something Went Wrong</div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js" integrity="sha512-YKERjYviLQ2Pog20KZaG/TXt9OO0Xm5HE1m/OkAEBaKMcIbTH1AwHB4//r58kaUDh5b1BWwOZlnIeo0vOl1SEA==" crossorigin="anonymous"></script>
    <script src="../js/leads.js"></script>
</body>
</html>