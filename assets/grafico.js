$(document).ready(function(){



  var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta'],
    datasets: [
    {
      label: 'Tecnico 1',
      data: [5, 12, 19, 3, 17],
      backgroundColor: "rgba(242,97,1,0.3)"
    }, 
    {
      label: 'Tecnico 2',
      data: [2, 29, 5, 5, 2],
      backgroundColor: "rgba(145,190,212,0.5)"
    }, 
    {
      label: 'Tecnico 3',
      data: [8, 6, 4, 8, 9],
      backgroundColor: "rgba(40,66,55,0.5)"
    }
    ]
  }
});



});