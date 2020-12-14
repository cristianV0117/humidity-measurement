/**
 * @author Cristian Camilo Vasquez Osorio - 04-12-2020
 */
class Consumer
{
    constructor()
    {
        this.routeMiami   = '/App/Controllers/ConsumerMiamiController.php';
        this.routeOhio    = '/App/Controllers/ConsumerOhioController.php';
        this.routeNewYork = '/App/Controllers/ConsumerNewYorkController.php';
        
        this.dataMiami;
        this.dataOhio;
        this.dataNewYork;
        this.historyAction();

        this.list = document.getElementById('list');
    }

    async consumer()
    {
        
        let responseMiami   = await fetch(this.routeMiami);
        this.dataMiami       = await responseMiami.json();
        let responseOhio    = await fetch(this.routeOhio);
        this.dataOhio        = await responseOhio.json();
        let responseNewYork = await fetch(this.routeNewYork);
        this.dataNewYork     = await responseNewYork.json();
        this.chartConsruction();
    }

    chartConsruction()
    {
        const response = [];
        const title    = [];
        const data     = [];
        response.push(this.dataMiami, this.dataOhio, this.dataNewYork);
        for (let index = 0; index < response.length; index++) {
            title.push(response[index].data.location);
            data.push(response[index].data.humidity);
        
        }
        this.list.innerHTML = `<ul><li>Miami: ${data[0]}%</li><li>Ohio: ${data[1]}%</li><li>New York: ${data[2]}%</li></ul>`;
        this.chart(title, data, 'charHumidity');
    }

    chart(title, data, id)
    {
        let ctx = document.getElementById(id);
        new Chart(ctx, {
            type: 'pie',
            data: {
                labels: title,
                datasets: [{
                    label: `Humedad de ${title} el cual se mide en %` ,
                    data: data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }

    historyAction()
    {
        document.getElementById("registrar").addEventListener('click', () => {
            (new History().history(this.dataMiami.data.humidity, this.dataOhio.data.humidity, this.dataNewYork.data.humidity));
        });
    }
}
(new Consumer()).consumer();