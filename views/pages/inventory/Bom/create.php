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
				<select id="product" name="product" class="form-control">
					<?php
					$products = Product::all();
					foreach ($products as $p) {
						echo "<option value='{$p->id}'>{$p->name}</option>";
					}
					?>
				</select>
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
				<label>status</label>
				<select id="status" name="status" class="form-control">
					<?php
					$status = Status::all();
					foreach ($status as $s) {
						echo "<option value='{$s->id}'>{$s->name}</option>";
					}

					?>
				</select>
			</div>
		</div>

		<h5>Components</h5>
		<table class="table table-bordered" id="bomItemsTable">
			<thead>
				<tr>
					<th class="text-center" style="width:5%;">#</th>
					<th style="width:auto; min-width:200px;">Component</th>
					<th class="text-right" style="width:10%; min-width:60px;">Qty</th>
					<th class="text-center" style="width:10%; min-width:80px;">UOM</th>
					<th class="text-right" style="width:12%; min-width:100px;">Unit Cost (৳)</th>
					<th style="width:15%; min-width:120px;">Remarks</th>
					<th class="text-center" style="width:10%; min-width:80px;">Action</th>
				</tr>
				<tr>
					<?php $count = 1; ?>
					<td class="text-center"><?php echo $count; ?></td>
					<td>
						 <?php echo Product::html_select_raw("product"); ?>
					</td>
					<td><input type="number" class="form-control qty" value="1" min="0" readonly></td>
					<td><?php echo Uom::html_select("uom"); ?></td>
					<td class="price text-right">0</td>
					<td><input type="text" class="form-control remarks" placeholder="Enter remarks"></td>
					<td class="text-center"><button type="button" class="btn btn-success add-row">Add</button></td>
					<?php $count++; ?>
				</tr>
			</thead>
			<tbody id="Items"></tbody>

		</table>
		<div class="text-right fw-bold" style="padding-right:300px">
			<span class="text-end pe-5">Total Raw Material Cost Per Unit</span>
			<span class="text-right" id="totalCost">0.00 ৳</span>
		</div>



		<div class="text-end">
			<button type="submit" class="btn btn-success" id="saveBtn">➕ Save BOM</button>
			<button type="reset" class="btn btn-primary reset">Reset</button>
		</div>
	</form>
</div>

<script src="<?= $base_url ?>/js/cart2.js"></script>
<script>
	$(function() {
		const cart = new Cart("bom");
		printCart();

		// Raw material selection
		$("#product").on("change", function() {
			let product_id = $(this).val();
			$.ajax({
				url: "<?= $base_url ?>/api/product/find",
				type: "GET",
				data: {
					id: product_id
				},
				success: function(res) {
					let data = JSON.parse(res);
					$(".qty").val(1);
					$(".price").text(parseFloat(data.product.purchase_price));
				}
			});
		});


		$(".add-row").on("click", function() {


			// console.log("Add button clicked");

			let product_id = $("#product").val();
			let product_name = $("#product option:selected").text();
			let qty = parseFloat($(".qty").val());
			let uom_name = $("#uom option:selected").text();
			let price = parseFloat($(".price").text());
			let remarks = $(".remarks").val();

			// console.log(raw_material_id, raw_material_name, qty, uom_name, price);

			let data = {

				id: product_id,
				name: product_name,
				qty: qty,
				uom_name: uom_name,
				price: price,
				remarks: remarks,
				status_id: $("#status").val()
			}

			// console.log(cart);

			cart.AddItem(data);

			// console.log(cart.getData());

			printCart();

		})

		$(document).on("click", ".remove-row", function() {
			let id = $(this).data("id");
			cart.delItem(id);
			printCart();
		});

		function printCart() {
			let data = cart.getData();

			// console.log("Cart Data:", data);

			let html = "";
			let total = 0;

			data.forEach((element, i) => {


				let totalcost = element.qty * element.price;
				total += totalcost;
				html += `
				<tr class= "item-row">
				<td>${++i}</td>
				<td><span>${element.name}</span></td>
                <td><span>${parseFloat(element.qty)}</span></td>
				<td><span>${element.uom_name}</span></td>
                <td class="text-end"><span>${parseFloat(element.price)}</span></td>
				<td><span>${element.remarks || ""}</span></td>
				<td class= "text-center"><button class="btn btn-sm btn-danger w-50 remove-row" data-id="${element.id}">Remove</button></td>
				</tr>
				`;
			});

			$("#Items").html(html);
			$("#totalCost").text(Math.round(total));
		}

		$(".reset").on("click", function() {
			cart.clearItem();
			printCart();
		});


		$("#saveBtn").on("click", function(e) {
			e.preventDefault();

			let bom_code = $("#bom_code").val();
			let product_id = $("#product").val();
			let product_name = $("#product option:selected").text();
			let revision_no = $("#revision_no").val();
			let effective_date = $("#effective_date").val();
			let status_id = $("#status option:selected").val();


			let total_cost = $("#totalCost").text().replace(" ৳", "");

			let components = cart.getData();

			// console.log("Components:", components);


			let data = {
				bom_code: bom_code,
				product_id: product_id,
				product_name,
				revision_no: revision_no,
				effective_date: effective_date,
				status_id,
				total_cost: total_cost,
				components: components
			};

			$.ajax({
				url: "<?= $base_url ?>/api/bom/save",
				type: "POST",
				data: JSON.stringify(data),
				contentType: "application/json",
				success: function(res) {
					cart.clearItem();
					printCart();
				},
				error: function(err) {
					console.log(err);
				}
			});
		})


	});
</script>