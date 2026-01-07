$(document).ready(function () {

    $('#product-form').submit(function (e) {
        e.preventDefault();

        $.post('/products', $(this).serialize(), renderTable);
        this.reset();
    });

    function renderTable(response) {
        let rows = '';
        response.products.forEach(p => {
            rows += `
                <tr>
                    <td contenteditable data-field="product_name" data-id="${p.id}">${p.product_name}</td>
                    <td contenteditable data-field="quantity" data-id="${p.id}">${p.quantity}</td>
                    <td contenteditable data-field="price" data-id="${p.id}">${p.price}</td>
                    <td>${p.created_at}</td>
                    <td>${p.total_value.toFixed(2)}</td>
                    <td><button class="btn btn-sm btn-success save" data-id="${p.id}">Save</button></td>
                </tr>
            `;
        });

        $('#product-table').html(rows);
        $('#grand-total').text(response.total.toFixed(2));
    }

});
