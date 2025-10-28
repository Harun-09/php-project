<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Create Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Transparent background + white text */
    body {
      background: transparent !important;
      color: #fff !important;
      font-family: Arial, sans-serif;
    }

    .customer-form {
      background: rgba(0, 0, 0, 0.4);
      padding: 30px;
      border-radius: 15px;
      border: 1px solid #fff;
      max-width: 600px;
      margin: 50px auto;
      box-shadow: 0 0 15px rgba(255,255,255,0.2);
    }

    .customer-form label {
      color: #fff !important;
    }

    .customer-form input,
    .customer-form textarea {
      background: transparent !important;
      color: #fff !important;
      border: 1px solid #ccc !important;
    }

    .customer-form input::placeholder {
      color: #ccc !important;
    }

    .customer-form .btn {
      background-color: #28a745 !important;
      border: none;
      transition: 0.3s;
    }

    .customer-form .btn:hover {
      background-color: #218838 !important;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #fff;
    }
  </style>
</head>
<body>

  <div class="customer-form">
    <h2>Create Customer</h2>
    <form method="post" action="<?php echo $base_url ?>/customer/save">
		<input type="hidden" name="create" id="">
      <div class="mb-3">
        <label for="name" class="form-label">Customer Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Enter name" required>
      </div>
      <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter phone number" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" id="address" class="form-control" rows="3" placeholder="Enter address"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" name="btnSave" class="btn btn-success px-4">Save</button>
      </div>
    </form>
  </div>

</body>
</html>