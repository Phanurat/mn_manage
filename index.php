<!DOCTYPE html>
<html>
<head>
    <title>ระบบบันทึกรายรับและรายจ่าย</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div id="container">
        <h1>บันทึกรายรับและรายจ่าย</h1>
        <form id="expense-form">
            <label for="description">รายการ:</label>
            <input type="text" id="description" placeholder="รายการรายรับหรือรายจ่าย">
            <label for="amount">จำนวนเงิน:</label>
            <input type="text" id="amount" placeholder="จำนวนเงิน">
            <input type="submit" value="บันทึก">
        </form>
        <h2>รายการ</h2>
        <table id="expense-table">
            <tr>
                <th>รายการ</th>
                <th>จำนวนเงิน</th>
                <th>จัดการ</th>
            </tr>
        </table>
        <p>รายรับทั้งหมด: <span id="total-income">0</span></p>
        <p>รายจ่ายทั้งหมด: <span id="total-expense">0</span></p>
        <p>ยอดรวม: <span id="balance">0</span></p>
    </div>

    <script>
        const form = document.getElementById('expense-form');
        const descriptionInput = document.getElementById('description');
        const amountInput = document.getElementById('amount');
        const table = document.getElementById('expense-table');
        const totalIncomeElement = document.getElementById('total-income');
        const totalExpenseElement = document.getElementById('total-expense');
        const balanceElement = document.getElementById('balance');
        let totalIncome = 0;
        let totalExpense = 0;

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const description = descriptionInput.value;
            const amount = parseFloat(amountInput.value);

            if (description.trim() === '' || isNaN(amount)) {
                alert('กรุณากรอกข้อมูลให้ครบถ้วน');
                return;
            }

            const row = table.insertRow(1);
            const cell1 = row.insertCell(0);
            const cell2 = row.insertCell(1);
            const cell3 = row.insertCell(2);
            cell1.innerHTML = description;
            cell2.innerHTML = amount;
            cell3.innerHTML = '<button onclick="deleteExpense(this)">ลบ</button>';

            totalIncome = amount > 0 ? totalIncome + amount : totalIncome;
            totalExpense = amount < 0 ? totalExpense + amount : totalExpense;

            descriptionInput.value = '';
            amountInput.value = '';

            updateTotal();
        });

        function deleteExpense(button) {
            const row = button.parentNode.parentNode;
            const amount = parseFloat(row.cells[1].innerHTML);
            totalIncome = amount > 0 ? totalIncome - amount : totalIncome;
            totalExpense = amount < 0 ? totalExpense - amount : totalExpense;
            table.deleteRow(row.rowIndex);
            updateTotal();
        }

        function updateTotal() {
            totalIncomeElement.textContent = totalIncome;
            totalExpenseElement.textContent = totalExpense;
            balanceElement.textContent = totalIncome + totalExpense;
        }
    </script>
</body>
</html>