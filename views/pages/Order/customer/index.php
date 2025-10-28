<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --Body-Text: #111; /* light theme text */
        }
        body.dark-theme {
            --Body-Text: #fff; /* dark theme text */
        }

        /* Container & table */
        .container {
            max-width: 1000px;
            margin: 50px auto;
        }
        .customer-table {
            padding: 20px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.2);
            box-shadow: 0 0 15px rgba(255,255,255,0.2);
            background: transparent;
            color: var(--Body-Text);
        }
        table {
            background: transparent !important;
            color: inherit;
        }
        table thead th {
            background: rgba(255,255,255,0.1) !important;
        }
        table tbody td {
            background: transparent !important;
        }

        /* Theme-aware text for all except buttons */
        .customer-table, 
        .customer-table *:not(.btn) {
            color: var(--Body-Text);
            background-color: transparent;
            transition: all 0.3s;
        }

        /* Buttons manual color (background unaffected by theme) */
        .btn-success { 
            background-color: #28a745; 
            color: #fff; 
            border: none; 
            transition: 0.3s;
        }
        .btn-success:hover { filter: brightness(90%); }

        .btn-primary { 
            background-color: #007bff; 
            color: #fff; 
            border: none; 
            transition: 0.3s;
        }
        .btn-primary:hover { filter: brightness(90%); }

        .btn-danger { 
            background-color: #dc3545; 
            color: #fff; 
            border: none; 
            transition: 0.3s;
        }
        .btn-danger:hover { filter: brightness(90%); }

        .btn-info { 
            background-color: #17a2b8; 
            color: #fff; 
            border: none; 
            transition: 0.3s;
        }
        .btn-info:hover { filter: brightness(90%); }
    </style>
</head>
<body id="themeBody">
    <div class="container customer-table">
        <h2 class="text-center mb-4">Customer List</h2>

        <div class="mb-3">
            <a href="<?php echo $base_url; ?>/customer/create" class="btn btn-success">New Customer</a>
        </div>

        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $customers = Customer::all();
                foreach ($customers as $c) {
                    echo "<tr>
                            <td>$c->id</td>
                            <td>$c->name</td>
                            <td>$c->phone</td>
                            <td>$c->email</td>
                            <td>$c->address</td>
                            <td>$c->created_at</td>
                            <td>$c->updated_at</td>
                            <td>
                                <a href='{$base_url}/customer/show/$c->id' class='btn btn-info btn-sm'>Show</a>
                                <a href='{$base_url}/customer/edit/$c->id' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='{$base_url}/customer/delete/$c->id' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure?')\">Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        // Example toggle dark theme
        const toggleTheme = () => {
            document.body.classList.toggle('dark-theme');
        }
    </script>
</body>
</html>
