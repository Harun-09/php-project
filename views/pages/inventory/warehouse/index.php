<?php
$report = Warehouse::find_report();
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouse Stock Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .text-end {
            text-align: right;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <h2>Warehouse Stock Report</h2>
    </div>

    <div class="table-responsive shadow-sm">
        <table class="table table-bordered table-striped">
            <thead class="table-primary text-center">
                <tr>
                    <th>Warehouse Name</th>
                    <th>Product Name</th>
                    <th class="text-end">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($report)) : ?>
                    <?php foreach ($report as $row) : ?>
                        <tr>
                            <td><?= htmlspecialchars($row->warehouse_name) ?></td>
                            <td><?= htmlspecialchars($row->product_name) ?></td>
                            <td class="text-end">
                                <?= number_format($row->total_quantity) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="3" class="text-center text-muted">No stock data found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
