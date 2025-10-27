<style>
	#bomItemsTable td,
	#bomItemsTable th {
		border: 1px solid #ccc;
		vertical-align: middle;
	}

	#bomItemsTable select,
	#bomItemsTable input {
		width: 100%;
		box-sizing: border-box;
	}

	.text-right {
		text-align: right;
	}

	.text-center {
		text-align: center;
	}
</style>

<div class="container mt-4">
	<h2>Create BOM</h2>
	<a href="<?= $base_url ?>/bom/index" class="btn btn-secondary mb-2">Back to List</a>
	<form id="bomForm">
		<div class="row mb-3">
			<div class="col-md-4">
				<label>BOM Code</label>
				<input type="text" class="form-control" name="bom_code" id="bom_code" value="BOM-#0000<?php echo Bom::get_last_id() + 1; ?>" readonly>
			</div>
			<div class="col-md-4">
				<label>Product</label>

					<?= Product::html_select_finished_products("product"); ?>
				

			</div>
			<div class="col-md-4">
				<label>Revision</label>
				<input type="text" class="form-control" name="revision_no" id="revision_no" value="A">
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md-4">
				<label>Effective Date</label>
				<input type="date" class="form-control" name="effective_date" id="effective_date" value="<?= date('Y-m-d') ?>">
			</div>
			<div class="col-md-4">
				<label>Status</label>
				<select id="status" name="status" class="form-control">
					<?php foreach (Status::all() as $s) {
						echo "<option value='{$s->id}'>{$s->name}</option>";
					} ?>
				</select>
			</div>
		</div>

		<h5>Components</h5>
		<table class="table table-bordered" id="bomItemsTable">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th>Component</th>
					<th class="text-right">Qty</th>
					<th class="text-center">UOM</th>
					<th class="text-right">Unit Cost (৳)</th>
					<th>Remarks</th>
					<th class="text-center">Action</th>
				</tr>
				<tr>
					<td class="text-center">1</td>
					<td><?= Product::html_select_raw("component"); ?></td>
					<td><input type="number" class="form-control qty" value="1" min="0" readonly></td>
					<td><?= Uom::html_select("uom"); ?></td>
					<td class="price text-right">0</td>
					<td><input type="text" class="form-control remarks" placeholder="Enter remarks"></td>
					<td class="text-center"><button type="button" class="btn btn-success add-row">Add</button></td>
				</tr>
			</thead>
			<tbody id="Items"></tbody>
		</table>

		<div class="text-right fw-bold" style="padding-right:300px">
			<span>Total Raw Material Cost Per Unit</span>
			<span class="text-right" id="totalCost">0.00 ৳</span>
		</div>

		<div class="text-end mt-3">
			<button type="submit" class="btn btn-success" id="saveBtn">➕ Save BOM</button>
			<button type="reset" class="btn btn-primary reset">Reset</button>
		</div>
	</form>
</div>

<script src="<?= $base_url ?>/js/cart2.js"></script>
<script>
	$(function() {
		const cart = new Cart("bom");

		// Update price when component changes
		$("#bomItemsTable").on("change", "select[name='component']", function() {
			let tr = $(this).closest("tr");
			let id = $(this).val();
			$.get("<?= $base_url ?>/api/product/find", {
				id: id
			}, function(res) {
				let data = JSON.parse(res);
				tr.find(".qty").val(1);
				tr.find(".price").text(parseFloat(data.product.purchase_price));
			});
		});

		function printCart() {
			let data = cart.getData();
			let html = "",
				total = 0;
			data.forEach((e, i) => {
				total += e.qty * e.price;
				html += `<tr>
                <td>${i+1}</td>
                <td>${e.name}</td>
                <td>${e.qty}</td>
                <td>${e.uom_name}</td>
                <td class="text-end">${parseFloat(e.price).toFixed(2)}</td>
                <td>${e.remarks||""}</td>
                <td class="text-center"><button class="btn btn-sm btn-danger w-50 remove-row" data-id="${e.id}">Remove</button></td>
            </tr>`;
			});
			$("#Items").html(html);
			$("#totalCost").text(total.toFixed(2) + " ৳");
		}

		printCart();

		// Add row
		$(".add-row").click(function() {
			let tr = $(this).closest("tr");
			let data = {
				id: tr.find("select[name='component']").val(),
				name: tr.find("select[name='component'] option:selected").text(),
				qty: parseFloat(tr.find(".qty").val()),
				uom_name: tr.find("select[name='uom'] option:selected").text(),
				price: parseFloat(tr.find(".price").text()),
				remarks: tr.find(".remarks").val(),
				status_id: $("#status").val()
			};
			cart.AddItem(data);
			printCart();
		});

		// Remove row
		$(document).on("click", ".remove-row", function() {
			cart.delItem($(this).data("id"));
			printCart();
		});

		// Reset
		$(".reset").click(function() {
			cart.clearItem();
			printCart();
		});

		// Save BOM
		$("#saveBtn").click(function(e) {
			e.preventDefault();
			let data = {
				bom_code: $("#bom_code").val(),
				product_id: $("#product").val(),
				product_name: $("#product option:selected").text(),
				revision_no: $("#revision_no").val(),
				effective_date: $("#effective_date").val(),
				status_id: $("#status").val(),
				total_cost: $("#totalCost").text().replace(" ৳", ""),
				components: cart.getData()
			};
			$.ajax({
				url: "<?= $base_url ?>/api/bom/save",
				type: "POST",
				data: JSON.stringify(data),
				contentType: "application/json",
				success: function() {
					cart.clearItem();
					printCart();
				},
				error: function(err) {
					console.log(err);
				}
			});
		});
	});
</script>