<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>BOM Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f5f7fb; font-family: "Segoe UI", sans-serif; }
    .form-card {
      background: #fff; padding: 30px; border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    }
    .table td, .table th { vertical-align: middle; }
    .btn-add { background: #0a66c2; color: #fff; }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="form-card">
      <h3 class="mb-4 text-center">🧩 Bill of Materials (BOM) Form</h3>

      <form id="bomForm">
        <div class="mb-3">
          <label class="form-label fw-semibold">Product Name</label>
          <input type="text" class="form-control" placeholder="Enter product name" name="product_name" required>
        </div>

        <div class="mb-3">
          <label class="form-label fw-semibold">Product Code</label>
          <input type="text" class="form-control" placeholder="Enter product code" name="product_code">
        </div>

        <h5 class="mt-4 mb-3">Components / Materials</h5>

        <table class="table table-bordered align-middle" id="materialsTable">
          <thead class="table-light">
            <tr>
              <th>Material Name</th>
              <th>Quantity</th>
              <th>Unit</th>
              <th>Remarks</th>
              <th style="width:60px">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><input type="text" class="form-control" name="material_name[]" required></td>
              <td><input type="number" class="form-control" name="quantity[]" step="0.01" required></td>
              <td>
                <select class="form-select" name="unit[]">
                  <option value="pcs">pcs</option>
                  <option value="kg">kg</option>
                  <option value="litre">litre</option>
                  <option value="meter">meter</option>
                </select>
              </td>
              <td><input type="text" class="form-control" name="remarks[]"></td>
              <td class="text-center">
                <button type="button" class="btn btn-sm btn-danger removeRow">×</button>
              </td>
            </tr>
          </tbody>
        </table>

        <button type="button" id="addRow" class="btn btn-sm btn-add mb-3">+ Add Material</button>

        <div class="text-end">
          <button type="submit" class="btn btn-success">Save BOM</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    document.getElementById('addRow').addEventListener('click', function () {
      const table = document.querySelector('#materialsTable tbody');
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td><input type="text" class="form-control" name="material_name[]" required></td>
        <td><input type="number" class="form-control" name="quantity[]" step="0.01" required></td>
        <td>
          <select class="form-select" name="unit[]">
            <option value="pcs">pcs</option>
            <option value="kg">kg</option>
            <option value="litre">litre</option>
            <option value="meter">meter</option>
          </select>
        </td>
        <td><input type="text" class="form-control" name="remarks[]"></td>
        <td class="text-center">
          <button type="button" class="btn btn-sm btn-danger removeRow">×</button>
        </td>`;
      table.appendChild(newRow);
    });

    document.addEventListener('click', function (e) {
      if (e.target.classList.contains('removeRow')) {
        e.target.closest('tr').remove();
      }
    });

    document.getElementById('bomForm').addEventListener('submit', function (e) {
      e.preventDefault();
      alert('✅ BOM saved successfully!');
    });
  </script>
</body>
</html>
