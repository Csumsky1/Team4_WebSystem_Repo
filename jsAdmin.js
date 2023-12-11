document.addEventListener('click', function(event) {
  const userDropdown = document.getElementById('userDropdown');
  const dropdownContent = document.getElementById('logoutDropdown');

  // check if the clicked element is outside the dropdown
  if (!userDropdown.contains(event.target)) {
    dropdownContent.style.display = 'none';
  }
});

function logout() {
  var logoutDropdown = document.getElementById('logoutDropdown');
  logoutDropdown.style.display = 'block';
  
  window.location.href = 'logout.php';
}

function toggleDropdown() {
  const dropdownContent = document.getElementById('logoutDropdown');
  dropdownContent.style.display = (dropdownContent.style.display === 'block') ? 'none' : 'block';
}

function showContent(contentId) {
  var contentElements = document.querySelectorAll('.content');
  contentElements.forEach(function (element) {
    element.style.display = 'none';
  });

  var selectedContent = document.getElementById(contentId + 'Content');
  if (selectedContent) {
    selectedContent.style.display = 'block';
  }
}


document.getElementById('analyticsTab').addEventListener('click', function () {
  showContent('analytics');
});

document.getElementById('settingsTab').addEventListener('click', function () {
  showContent('settings');
});

document.getElementById('topAreasContent').addEventListener('click', function () {
  showContent('topAreas');
});

// analyticsFunctions.js

// function to fetch and display top areas with the highest properties listed or sold
function loadTopAreasData() {
  // Replace the API endpoint with your actual endpoint
  const apiEndpoint = 'https://example.com/api/topAreas';

  // fetch data from the API
  fetch(apiEndpoint)
    .then(response => response.json())
    .then(data => {
      // Check if data is available
      if (data && data.topAreas) {
        // Display the top areas in the UI
        displayTopAreas(data.topAreas);
      } else {
        console.error('Error fetching top areas data');
      }
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
}

// function to display top areas in tabular form
function displayTopAreas(topAreas) {
  const topAreasContainer = document.querySelector('#topAreasContent .analytics-data');

  // clear previous content
  topAreasContainer.innerHTML = '';

  // check if there are top areas to display
  if (topAreas.length > 0) {
    // create a table to display top areas
    const tableElement = document.createElement('table');
    tableElement.classList.add('top-areas-table');

    // create table header
    const tableHeader = document.createElement('thead');
    const headerRow = document.createElement('tr');
    const headerName = document.createElement('th');
    headerName.textContent = 'Area Name';
    headerRow.appendChild(headerName);
    tableHeader.appendChild(headerRow);
    tableElement.appendChild(tableHeader);

    // create table body
    const tableBody = document.createElement('tbody');

    // iterate through top areas and create table rows
    topAreas.forEach(area => {
      const row = document.createElement('tr');
      const nameCell = document.createElement('td');
      nameCell.textContent = area.name;
      row.appendChild(nameCell);
      tableBody.appendChild(row);
    });

    // append table body to the table
    tableElement.appendChild(tableBody);

    // append the table to the container
    topAreasContainer.appendChild(tableElement);
  } else {
    // aisplay a message when no top areas are available
    topAreasContainer.textContent = 'No data available for top areas.';
  }
}

// call the function to load top areas data when the page is loaded
document.addEventListener('DOMContentLoaded', () => {
  loadTopAreasData();
});
