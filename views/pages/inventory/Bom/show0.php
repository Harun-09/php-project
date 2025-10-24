<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>BOM Form</title>
<style>
  body { font-family: Arial, sans-serif; color:#111; margin:20px; }
  .sheet { max-width: 900px; margin:0 auto; border:1px solid #ddd; padding:18px; }
  header { display:flex; justify-content:space-between; align-items:center; margin-bottom:14px; }
  .title { font-size:20px; font-weight:700; }
  .meta { text-align:right; font-size:13px; }
  table { width:100%; border-collapse:collapse; font-size:13px; }
  th, td { border:1px solid #ccc; padding:8px; text-align:left; }
  th { background:#f5f5f5; font-weight:600; }
  tfoot td { font-weight:700; background:#fafafa; }
  .num { text-align:right; }
  @media print {
    body { margin:0; }
    .sheet { border: none; padding:0; }
    header, footer { page-break-inside: avoid; }
  }
</style>
</head>
<body>
  <div class="sheet">
    <header>
      <div>
        <div class="title">Bill of Materials</div>
        <div style="font-size:13px; color:#333;">Product: <strong id="productName">Control Board</strong></div>
      </div>
      <div class="meta">
        <div><strong>BOM No:</strong> <span id="bomNo">BOM-2025-001</span></div>
        <div><strong>Rev:</strong> <span id="rev">A</span></div>
        <div><strong>Date:</strong> <span id="date">2025-10-11</span></div>
      </div>
    </header>

    <table>
      <thead>
        <tr>
          <th style="width:5%;">Item</th>
          <th style="width:18%;">Part Number</th>
          <th style="width:35%;">Description</th>
          <th style="width:10%;">Qty/Asm</th>
          <th style="width:7%;">Unit</th>
          <th style="width:12%;">Unit Cost</th>
          <th style="width:13%;">Total Cost</th>
        </tr>
      </thead>
      <tbody id="bomRows">
        <tr>
          <td class="num">1</td>
          <td>R-10K</td>
          <td>Resistor 10K 1% 0.25W</td>
          <td class="num">4</td>
          <td>pcs</td>
          <td class="num">0.02</td>
          <td class="num">0.08</td>
        </tr>
        <tr>
          <td class="num">2</td>
          <td>C-10uF</td>
          <td>Capacitor 10uF 16V</td>
          <td class="num">2</td>
          <td>pcs</td>
          <td class="num">0.10</td>
          <td class="num">0.20</td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="6" class="num">Subtotal</td>
          <td class="num">0.28</td>
        </tr>
        <tr>
          <td colspan="6" class="num">Assembly Qty</td>
          <td class="num">1</td>
        </tr>
        <tr>
          <td colspan="6" class="num">Total Cost Per Assembly</td>
          <td class="num">0.28</td>
        </tr>
      </tfoot>
    </table>

    <section style="margin-top:12px; font-size:13px;">
      <div><strong>Prepared By:</strong> <span id="preparedBy">Md</span></div>
      <div style="margin-top:6px;"><strong>Notes:</strong> <span id="notes">All costs in USD; supplier lead times vary.</span></div>
    </section>
  </div>
</body>
</html>