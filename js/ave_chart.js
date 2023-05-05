// Get data from server
fetch('../forms/average.php')
	.then(response => response.json())
	.then(data => {
		// Create bar graph
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['english', 'math', 'filipino', 'science', 'logic'],
				datasets: [{
					label: 'Average Exam Score Per Subject',
					data: [data.english, data.math, data.filipino, data.science, data.logic],
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(0, 25, 200, 0.2)',
						'rgba(90, 300, 60, 0.2)',
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(0, 25, 200, 1)',
						'rgba(90, 300, 60, 1)',
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
	});
