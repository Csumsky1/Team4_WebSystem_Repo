// Dummy data for analytics chart
const analyticsData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June'],
    datasets: [{
      label: 'Properties Listed',
      data: [12, 19, 3, 5, 2, 3],
      backgroundColor: 'rgba(52, 152, 219, 0.8)',
      borderColor: 'rgba(52, 152, 219, 1)',
      borderWidth: 1
    }]
  };
  
  // Get the context of the canvas element
  const ctx = document.getElementById('analyticsChart').getContext('2d');
  
  // Create the analytics chart
  new Chart(ctx, {
    type: 'bar',
    data: analyticsData
  });
  