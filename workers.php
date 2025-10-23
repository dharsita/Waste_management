<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Eco Waste Management | Directory</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #fceabb, rgb(74, 202, 231));
      color: #333;
    }

    header {
      background: linear-gradient(to right, rgb(167, 118, 220), rgba(37, 116, 252, 0.82));
      padding: 1.5rem 1rem;
      text-align: center;
      color: white;
    }

    header h1 {
      margin: 0;
      font-size: 2rem;
      font-weight: 600;
      text-shadow: 1px 1px 2px #0000003a;
    }

    .container {
      max-width: 1100px;
      margin: 2rem auto;
      background: #fff;
      border-radius: 16px;
      padding: 2rem;
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
      animation: fadeIn 0.8s ease-in;
    }
    footer {
  background: linear-gradient(to right, #6a11cb, #2575fc);
  color: white;
  text-align: center;
  padding: 1.2rem 1rem;
  font-size: 1rem;
  border-top-left-radius: 12px;
  border-top-right-radius: 12px;
  box-shadow: 0 -3px 15px rgba(0, 0, 0, 0.1);
}


    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .search-bar {
      text-align: right;
      margin-bottom: 1.5rem;
    }

    .search-bar input {
      padding: 0.7rem 1rem;
      width: 280px;
      border: 2px solid #2575fc;
      border-radius: 12px;
      font-size: 1rem;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th {
      background: linear-gradient(to right, #2196f3, #6dd5ed);
      color: white;
      padding: 16px;
      text-align: left;
      font-size: 1.1rem;
    }

    td {
      padding: 14px;
      font-size: 1rem;
      border-bottom: 1px solid #eee;
    }

    tr:hover {
      background-color: #f1f1f1;
      transition: 0.2s ease-in-out;
    }

    td i, td img {
      margin-right: 8px;
      vertical-align: middle;
    }

    td img {
      width: 28px;
      height: 28px;
      border-radius: 50%;
      object-fit: cover;
    }

    footer {
      background: linear-gradient(to right, #6a11cb, #2575fc);
      color: white;
      text-align: center;
      padding: 1rem;
      font-size: 0.95rem;
      margin-top: 4rem;
    }

    @media (max-width: 768px) {
      .search-bar input {
        width: 100%;
        margin-top: 1rem;
      }

      th, td {
        font-size: 0.95rem;
        padding: 12px;
      }
    }
  </style>
</head>
<body>

  <!-- Workers -->
  <header><h1><i class="fas fa-users"></i> Workers Directory</h1></header>
  <div class="container">
    <div class="search-bar"><input type="text" id="searchWorkers" placeholder="Search Workers..." onkeyup="filterTable('workersTable', 'searchWorkers')"></div>
    <table id="workersTable">
      <thead>
        <tr><th>ID</th><th>Name</th><th>Contact</th></tr>
      </thead>
      <tbody>
        <tr><td>UW001</td><td><img src="https://i.pravatar.cc/30?img=11" /> Amit Kumar</td><td>9876543210</td></tr>
        <tr><td>UW002</td><td><img src="https://i.pravatar.cc/30?img=12" /> Priya Sharma</td><td>9123456780</td></tr>
        <tr><td>UW003</td><td><img src="https://i.pravatar.cc/30?img=13" /> Ravi Verma</td><td>9988776655</td></tr>
      </tbody>
    </table>
  </div>

  <!-- Drivers -->
  <header><h1><i class="fas fa-truck"></i> Drivers Directory</h1></header>
  <div class="container">
    <div class="search-bar"><input type="text" id="searchDrivers" placeholder="Search Drivers..." onkeyup="filterTable('driversTable', 'searchDrivers')"></div>
    <table id="driversTable">
      <thead>
        <tr><th>ID</th><th>Name</th><th>Contact</th><th>Vehicle</th></tr>
      </thead>
      <tbody>
        <tr><td>DR001</td><td>🚚 Karan Das</td><td>9876512345</td><td>OD-05-AC-1122</td></tr>
        <tr><td>DR002</td><td>🚛 Meera Nayak</td><td>9988001122</td><td>OD-05-BB-3421</td></tr>
        <tr><td>DR003</td><td>🚚 Rakesh Sahu</td><td>9112233445</td><td>OD-07-CZ-9898</td></tr>
      </tbody>
    </table>
  </div>

  <footer>
  &copy; 2025 Eco Waste Management Portal | Keeping the campus clean 🌱
</footer>


  <script>
    function filterTable(tableId, searchInputId) {
      const input = document.getElementById(searchInputId).value.toLowerCase();
      const rows = document.getElementById(tableId).getElementsByTagName("tr");
      for (let i = 1; i < rows.length; i++) {
        let match = false;
        const cells = rows[i].getElementsByTagName("td");
        for (let j = 0; j < cells.length; j++) {
          if (cells[j].textContent.toLowerCase().includes(input)) {
            match = true;
            break;
          }
        }
        rows[i].style.display = match ? "" : "none";
      }
    }
  </script>

</body>
</html>
