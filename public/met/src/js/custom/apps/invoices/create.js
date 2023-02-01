"use strict";

// Class definition
let KTAppInvoicesCreate = function () {
    let form;

	// Private functions
	let updateTotal = function() {
		let items = [].slice.call(form.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]'));
		let grandTotal = 0;

		let format = wNumb({
			//prefix: '$ ',
			decimals: 0,
			thousand: ''
		});

		items.map(function (item) {
            let quantity = item.querySelector('[data-kt-element="quantity"]');
			let price = item.querySelector('[data-kt-element="price"]');

			let priceValue = format.from(price.value);
			priceValue = (!priceValue || priceValue < 0) ? 0 : priceValue;

			let quantityValue = parseInt(quantity.value);
			quantityValue = (!quantityValue || quantityValue < 0) ?  1 : quantityValue;

			price.value = format.to(priceValue);
			quantity.value = quantityValue;

			item.querySelector('[data-kt-element="total"]').innerText = format.to(priceValue * quantityValue);			

			grandTotal += priceValue * quantityValue;
		});

		form.querySelector('[data-kt-element="sub-total"]').innerText = format.to(grandTotal);
		form.querySelector('[data-kt-element="grand-total"]').innerText = format.to(grandTotal);
	}

	let handleEmptyState = function() {
		if (form.querySelectorAll('[data-kt-element="items"] [data-kt-element="item"]').length === 0) {
			let item = form.querySelector('[data-kt-element="empty-template"] tr').cloneNode(true);
			form.querySelector('[data-kt-element="items"] tbody').appendChild(item);
		} else {
			KTUtil.remove(form.querySelector('[data-kt-element="items"] [data-kt-element="empty"]'));
		}
	}

	let handeForm = function (element) {
		// Add item
		form.querySelector('[data-kt-element="items"] [data-kt-element="add-item"]').addEventListener('click', function(e) {
			e.preventDefault();

			let item = form.querySelector('[data-kt-element="item-template"]  tr').cloneNode(true);
			// let tr = $('tr[id^="tabelitem"]:last');
			
			let items1 = $('.additem');

			// for (let i = 0; i < items1.length; i++) {
			// 	const element = items1[i];
				
			// }

			// var num = parseInt( tr.prop("id").match(/\d+/g), 10 ) +1;
			let barang = items1.length;
			item.id = 'tabelitem'+barang;

			console.log(barang);
			form.querySelector('[data-kt-element="items"] tbody').appendChild(item);

			handleEmptyState();
			updateTotal();			
		});

		// Remove item
		KTUtil.on(form, '[data-kt-element="items"] [data-kt-element="remove-item"]', 'click', function(e) {
			e.preventDefault();

			KTUtil.remove(this.closest('[data-kt-element="item"]'));

			handleEmptyState();
			updateTotal();			
		});		

		// Handle price and quantity changes
		KTUtil.on(form, '[data-kt-element="items"] [data-kt-element="quantity"], [data-kt-element="items"] [data-kt-element="price"]', 'change', function(e) {
			e.preventDefault();

			updateTotal();			
		});
	}

	let initForm = function(element) {
		// Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/
		let invoiceDate = $(form.querySelector('[id="invoice_date"]'));
		invoiceDate.flatpickr({
			enableTime: false,
			dateFormat: "Y-m-d",
		});

        // Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/
		let dueDate = $(form.querySelector('[name="invoice_due_date"]'));
		dueDate.flatpickr({
			enableTime: false,
			dateFormat: "Y-m-d",
		});
	}

	// Public methods
	return {
		init: function(element) {
            form = document.querySelector('#kt_invoice_form');

			handeForm();
            initForm();
			updateTotal();
        }
	};
}();

	


	$('#cloneDiv').click(function(){

		// get the last DIV which ID starts with ^= "klon"
		var $div = $('div[id^="klon"]:last');
	  
		// Read the Number from that DIV's ID (i.e: 3 from "klon3")
		// And increment that number by 1
		var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;
	  
		// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
		var $klon = $div.clone().prop('id', 'klon'+num );
	  
		// Finally insert $klon wherever you want
		// $div.after( $klon.text('klon'+num) );
	  
	  });

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAppInvoicesCreate.init();
});



