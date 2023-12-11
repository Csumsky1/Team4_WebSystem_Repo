<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="adminStyles.css">
  <script src="chart.js"></script>
</head>
<body>
  <div class="topbar">
    <div class="logo">
        <a href="home.php" style="text-decoration: none; color: inherit;">PropertyConnect</a>
    </div>
    <div class="admin-info" id="userDropdown">
      <?php
      session_start();
      if (isset($_SESSION['email'])) {
        echo "<span>Welcome, " . $_SESSION['user_name'] . "!</span>";
        echo '<div class="dropdown">
                <div class="dropdown-icon" onclick="toggleDropdown()">⚙️</div>
                <div class="dropdown-content" id="logoutDropdown">
                  <a href="logout.php">Logout</a>
                </div>
              </div>';
      } else {
        echo '<a href="javascript:void(0);" onclick="openPopup(\'signin\')">Sign in</a>';
      }
      ?>
    </div>
  </div>

  <div class="container">
    <div class="sidebar">
      <ul>
        <li class="tab" onclick="showContent('analytics')">Analytics</li>
        <li class="tab" onclick="showContent('settings')">Settings</li>
        <li class="tab" onclick="showContent('topAreas')">Top Areas</li>
        <li class="tab" onclick="showContent('highPerformers')">High Performers</li>
      </ul>
    </div>
    <div class="content" id="analyticsContent">
      <h2>Analytics Page</h2>
      <div class="analytics-data">
        <div class="chart-container">
          <canvas id="analyticsChart"></canvas>
        </div>
      </div>
    </div>
    

    <div class="content" id="settingsContent" style="display:none;">
      <h2>Settings Page</h2>
      <div class="settings-options">
        <p>General Settings</p>
        <label>Enable Notifications <input type="checkbox" checked></label>
        <label>Theme Color <input type="color" value="#3498db"></label>
      </div>
    </div>

    <div class="content" id="topAreasContent" style="display:none;">
      <h2>Top Areas</h2>
      <div class="analytics-data">
        <div class="filter-buttons">
          <button onclick="sortTable('areaName')">Sort by Area</button>
          <button onclick="sortTable('propertiesListed')">Sort by Properties Listed</button>
        </div>
    
        <!-- Search bar -->
        <div class="search-bar">
          <label for="areaSearch">Search by Area:</label>
          <input type="text" id="areaSearch" onkeyup="filterTable()">
        </div>
    
        <table class="table table-bordered" id="topAreasTable">
          <thead class="thead-dark">
            <tr>
              <th>Area Name</th>
              <th>Properties Listed</th>
              <th>Properties Sold</th>
              <th>Average Price</th>
              <th>Buyers</th>
              <th>Sellers</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    
    
    <div class="content" id="highPerformersContent" style="display:none;">
      <h2>High Performers</h2>
      <div class="analytics-data">
        <div class="filter-buttons">
          <button onclick="sortTable('performerName')">Sort by Performer</button>
          <button onclick="sortTable('propertiesListed')">Sort by Properties Listed</button>
        </div>
    
        <div class="search-bar">
          <label for="performerSearch">Search by Performer:</label>
          <input type="text" id="performerSearch" onkeyup="filterTable()">
        </div>
    
        <table class="table table-bordered" id="highPerformersTable">
          <thead class="thead-dark">
            <tr>
              <th>Performer Name</th>
              <th>Properties Listed</th>
              <th>Properties Sold</th>
              <th>Average Price</th>
              <th>Buyers</th>
              <th>Sellers</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>
  <script src="jsAdmin.js"></script>
  <script src="chartScript.js"></script>

</body>

</html>

<script>
  const topAreasData = [
    { areaName: 'Central Park', propertiesListed: 50, propertiesSold: 30, averagePrice: '$500,000', buyers: 25, sellers: 15 },
    { areaName: 'Green Valley', propertiesListed: 40, propertiesSold: 22, averagePrice: '$450,000', buyers: 18, sellers: 10 },
    { areaName: 'Ocean View', propertiesListed: 30, propertiesSold: 18, averagePrice: '$600,000', buyers: 15, sellers: 8 },
    { areaName: 'Mountain Heights', propertiesListed: 35, propertiesSold: 20, averagePrice: '$550,000', buyers: 20, sellers: 12 }
  ];

  function populateTable() {
    const tableBody = document.querySelector('#topAreasTable tbody');
    tableBody.innerHTML = '';

    topAreasData.forEach(rowData => {
      const row = document.createElement('tr');
      Object.values(rowData).forEach(value => {
        const cell = document.createElement('td');
        cell.textContent = value;
        row.appendChild(cell);
      });
      tableBody.appendChild(row);
    });
  }

  function sortTable(column) {
    topAreasData.sort((a, b) => (a[column] > b[column]) ? 1 : -1);
    populateTable();
  }

  function filterTable() {
    const searchInput = document.getElementById('areaSearch').value.toLowerCase();
    const filteredData = topAreasData.filter(row =>
      Object.values(row).some(value => value.toString().toLowerCase().includes(searchInput))
    );
    populateTable(filteredData);
  }

  document.addEventListener('DOMContentLoaded', () => {
    populateTable();
  });

  const highPerformersData = [
    { performerName: 'Enna Swift', propertiesListed: 60, propertiesSold: 40, averagePrice: '$550,000', buyers: 30, sellers: 20 },
    { performerName: 'Henry fen', propertiesListed: 55, propertiesSold: 35, averagePrice: '$600,000', buyers: 25, sellers: 15 },
    { performerName: 'Bob Johnson', propertiesListed: 50, propertiesSold: 30, averagePrice: '$500,000', buyers: 20, sellers: 12 },
  ];

  function populateHighPerformersTable() {
    const tableBody = document.querySelector('#highPerformersTable tbody');
    tableBody.innerHTML = '';

    highPerformersData.forEach(rowData => {
      const row = document.createElement('tr');
      Object.values(rowData).forEach(value => {
        const cell = document.createElement('td');
        cell.textContent = value;
        row.appendChild(cell);
      });
      tableBody.appendChild(row);
    });
  }

  function sortHighPerformersTable(column) {
    highPerformersData.sort((a, b) => (a[column] > b[column]) ? 1 : -1);
    populateHighPerformersTable();
  }

  function filterHighPerformersTable() {
    const searchInput = document.getElementById('performerSearch').value.toLowerCase();
    const filteredData = highPerformersData.filter(row =>
      Object.values(row).some(value => value.toString().toLowerCase().includes(searchInput))
    );
    populateHighPerformersTable(filteredData);
  }

  document.addEventListener('DOMContentLoaded', () => {
    populateHighPerformersTable();
  });

</script>