<div class="container mt-5">
    <h2>Tạo Hóa Đơn</h2>
    <?php if (isset($data['error'])): ?>
                            <div class="error-message"><?php echo htmlspecialchars($data['error']); ?></div>
                        <?php endif; ?>
    <form id="addSaleForm" method="POST" action="addSaleSubmit">
    <!-- Customer ID and Search Fields -->
    <div class="mb-3">
        <label for="maKH" class="form-label">Mã khách hàng</label>
        <input type="text" class="form-control" id="maKH" name="maKH" required oninput="checkCustomerExists(this.value)">
    </div>
    <div class="mb-3">
        <label for="tenKH" class="form-label">Tên khách hàng</label>
        <input type="text" class="form-control" id="customerNameDisplay" readonly>
    </div>
    <div class="mb-3">
        <label for="drugSearch">Tìm kiếm Thuốc</label>
        <input type="text" class="form-control" id="drugSearch" placeholder="Nhập tên thuốc" oninput="searchDrug(this.value)">
        <ul class="list-group" id="searchResults" style="position: absolute; z-index: 1000;"></ul>
    </div>

    <!-- Drug Items Table -->
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên thuốc</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody id="drugItemsContainer">
        </tbody>
        <tfoot>
            <tr>
                <th colspan="4" class="text-right">Tổng Tiền:</th>
                <th id="totalPrice">0</th>
                <th></th>
            </tr>
        </tfoot>
    </table>

    <!-- Submit Button -->
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Thêm Hóa Đơn Mới</button>
    </div>
</form>

</div>

<script>
function addDrugItem(drug) {
    const container = document.getElementById('drugItemsContainer');
    const row = document.createElement('tr');
    row.className = 'drug-item';
    row.innerHTML = `
        <td><input type="number" class="form-control maThuoc" name="maThuoc[]" value="${drug.maThuoc}" required readonly></td>
        <td><input type="text" class="form-control tenThuoc" name="tenThuoc[]" value="${drug.tenThuoc}" required readonly></td>
        <td><input type="number" class="form-control giaBan" name="giaBan[]" value="${drug.giaBan}" required readonly></td>
        <td><input type="number" class="form-control soLuong" name="soLuong[]" required min="1" value="1" onchange="updatePrice(this)"></td>
        <td><input type="number" class="form-control giaTien" name="giaTien[]" required readonly></td>
        <td><button type="button" class="btn btn-danger" onclick="removeDrugItem(this)">Remove</button></td>
    `;
    container.appendChild(row);
    updatePrice(row.querySelector('.soLuong'));
    document.getElementById('drugSearch').value = ''; // Clear search field
    document.getElementById('searchResults').innerHTML = ''; // Clear search results
}

function searchDrug(searchQuery) {
    const resultsContainer = document.getElementById('searchResults');
    if (searchQuery.length < 3) {
        resultsContainer.innerHTML = '';  // Clear previous results if the search term is less than 3 characters
        return; // Exit the function to prevent unnecessary API calls
    }

    fetch(`http://localhost:8083/searchDrugAPI/${encodeURIComponent(searchQuery)}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok'); // Throw an error if response is not OK
            }
            return response.json();
        })
        .then(data => {
            resultsContainer.innerHTML = ''; // Clear previous results
            if (data.length === 0) {
                resultsContainer.innerHTML = '<li class="list-group-item">No drugs found</li>'; // Show message if no drugs are found
                return;
            }
            data.forEach(drug => {
                let listItem = document.createElement('li');
                listItem.classList.add('list-group-item');
                listItem.textContent = `${drug.tenThuoc}`;
                listItem.onclick = () => addDrugItem(drug);
                resultsContainer.appendChild(listItem);
            });
        })
        .catch(error => {
            console.error('Error fetching drugs:', error);
            resultsContainer.innerHTML = '<li class="list-group-item">Failed to fetch drug data. Please try again.</li>'; // Show error message
        });
}


function updatePrice(quantityInputElement) {
    const quantity = parseInt(quantityInputElement.value);
    const unitPrice = parseFloat(quantityInputElement.closest('.drug-item').querySelector('.giaBan').value);
    const totalPriceInput = quantityInputElement.closest('.drug-item').querySelector('.giaTien');
    totalPriceInput.value = (quantity * unitPrice).toFixed(2);
    updateInvoiceTotal(); // Update the total invoice price
}

function updateInvoiceTotal() {
    const totalInputs = document.querySelectorAll('.giaTien');
    let total = 0;
    totalInputs.forEach(input => {
        total += parseFloat(input.value) || 0;
    });
    document.getElementById('totalPrice').textContent = total.toFixed(2);}

function removeDrugItem(button) {
    button.closest('.drug-item').remove();
    updateInvoiceTotal(); // Recalculate total after item removal
}
function checkCustomerExists(maKH) {
    if (maKH.length === 0) {
        document.getElementById('customerNameDisplay').textContent = '';
        return;
    }
    fetch(`http://localhost:8083/getCustomerDetails/${encodeURIComponent(maKH)}`)
        .then(response => response.json())
        .then(data => {
            if (data && data.hoTen) {
                document.getElementById('customerNameDisplay').value = `${data.hoTen}`;
            } else {
                document.getElementById('customerNameDisplay').value = 'Khách hàng không tồn tại.';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('customerNameDisplay').textContent = 'Lỗi khi truy vấn thông tin khách hàng.';
        });
}

</script>
