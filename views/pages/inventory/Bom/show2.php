<!DOCTYPE html>
<html lang="bn">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>BOM with Cost | Production Management System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f5f7fa; font-family: "Segoe UI", sans-serif; }
    .card { border: none; border-radius: 12px; box-shadow: 0 4px 16px rgba(0,0,0,0.08); }
    .card-header { background: #0a66c2; color: #fff; border-radius: 12px 12px 0 0; }
    .table th { background: #eef2f7; text-transform: uppercase; font-size: 13px; }
    .summary-box { background: #fff; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); padding: 20px; }
  </style>
</head>
<body>
  <div class="container py-5">
    <div class="card">
      <div class="card-header">
        <h4 class="mb-0">🧾 Bill of Materials (BOM) with Production Cost</h4>
      </div>
      <div class="card-body">
        <form id="bomForm">
          <div class="row g-3 mb-4">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Product Name</label>
              <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold">Product Code</label>
              <input type="text" name="product_code" class="form-control">
            </div>
            <div class="col-md-3">
              <label class="form-label fw-semibold">Production Quantity</label>
              <input type="number" name="production_qty" id="productionQty" class="form-control" value="1" min="1">
            </div>
          </div>

          <h5 class="fw-semibold mb-3 border-bottom pb-2">Component Details</h5>

          <div class="table-responsive">
            <table class="table table-bordered align-middle" id="bomTable">
              <thead>
                <tr>
                  <th style="width:5%">#</th>
                  <th>Material Name</th>
                  <th style="width:12%">Quantity</th>
                  <th style="width:12%">Unit</th>
                  <th style="width:12%">Unit Cost</th>
                  <th style="width:12%">Total Cost</th>
                  <th style="width:70px">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-center row-index">1</td>
                  <td><input type="text" name="material_name[]" class="form-control" required></td>
                  <td><input type="number" name="quantity[]" class="form-control text-end qty" step="0.01" value="1"></td>
                  <td>
                    <select name="unit[]" class="form-select">
                      <option value="pcs">pcs</option>
                      <option value="kg">kg</option>
                      <option value="litre">litre</option>
                      <option value="meter">meter</option>
                    </select>
                  </td>
                  <td><input type="number" name="unit_cost[]" class="form-control text-end cost" step="0.01" value="0"></td>
                  <td><input type="text" name="total_cost[]" class="form-control text-end total" readonly></td>
                  <td class="text-center">
                    <button type="button" class="btn btn-sm btn-danger removeRow">×</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <button type="button" id="addRow" class="btn btn-outline-primary btn-sm mb-4">+ Add Material</button>

          <div class="summary-box mt-3">
            <div class="row">
              <div class="col-md-6">
                <h6 class="fw-semibold">Total BOM Cost:</h6>
                <h4 id="totalBomCost" class="text-primary">৳ 0.00</h4>
              </div>
              <div class="col-md-6 text-end">
                <h6 class="fw-semibold">Per Unit Production Expense:</h6>
                <h4 id="perUnitCost" class="text-success">৳ 0.00</h4>
              </div>
            </div>
          </div>

          <div class="text-end mt-4">
            <button type="submit" class="btn btn-primary px-4">💾 Save BOM</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    const tableBody = document.querySelector('#bomTable tbody');
    const addRowBtn = document.getElementById('addRow');
    const totalBomCostEl = document.getElementById('totalBomCost');
    const perUnitCostEl = document.getElementById('perUnitCost');
    const qtyInput = document.getElementById('productionQty');

    // Add row
    addRowBtn.addEventListener('click', () => {
      const rowCount = tableBody.querySelectorAll('tr').length + 1;
      const newRow = document.createElement('tr');
      newRow.innerHTML = `
        <td class="text-center row-index">${rowCount}</td>
        <td><input type="text" name="material_name[]" class="form-control" required></td>
        <td><input type="number" name="quantity[]" class="form-control text-end qty" step="0.01" value="1"></td>
        <td>
          <select name="unit[]" class="form-select">
            <option value="pcs">pcs</option>
            <option value="kg">kg</option>
            <option value="litre">litre</option>
            <option value="meter">meter</option>
          </select>
        </td>
        <td><input type="number" name="unit_cost[]" class="form-control text-end cost" step="0.01" value="0"></td>
        <td><input type="text" name="total_cost[]" class="form-control text-end total" readonly></td>
        <td class="text-center">
          <button type="button" class="btn btn-sm btn-danger removeRow">×</button>
        </td>`;
      tableBody.appendChild(newRow);
    });

    // Remove row
    document.addEventListener('click', (e) => {
      if (e.target.classList.contains('removeRow')) {
        e.target.closest('tr').remove();
        updateRowNumbers();
        calculateTotals();
      }
    });

    // Update row numbers
    function updateRowNumbers() {
      document.querySelectorAll('.row-index').forEach((cell, index) => {
        cell.textContent = index + 1;
      });
    }

    // Calculate cost
    document.addEventListener('input', (e) => {
      if (e.target.classList.contains('qty') || e.target.classList.contains('cost') || e.target.id === 'productionQty') {
        calculateTotals();
      }
    });

    function calculateTotals() {
      let totalCost = 0;
      document.querySelectorAll('#bomTable tbody tr').forEach(row => {
        const qty = parseFloat(row.querySelector('.qty').value) || 0;
        const cost = parseFloat(row.querySelector('.cost').value) || 0;
        const total = qty * cost;
        row.querySelector('.total').value = total.toFixed(2);
        totalCost += total;
      });

      totalBomCostEl.textContent = `৳ ${totalCost.toFixed(2)}`;

      const prodQty = parseFloat(qtyInput.value) || 1;
      const perUnit = totalCost / prodQty;
      perUnitCostEl.textContent = `৳ ${perUnit.toFixed(2)}`;
    }

    document.getElementById('bomForm').addEventListener('submit', e => {
      e.preventDefault();
      alert('✅ BOM with cost saved successfully!');
    });
  </script>
</body>
</html>
