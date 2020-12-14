/**
 * @author Cristian Camilo Vasquez Osorio - 05-12-2020
 */
class History
{

    constructor()
    {
        this.route    = '/App/Controllers/HistoryController.php';
        this.typePost = 'POST';
        this.typeGet  = 'GET';
    }

    history(miamiHumidity, ohioHumidity, newYorkHumidity)
    {
        const data = {
            'miami'   : miamiHumidity,
            'ohio'    : ohioHumidity,
            'newYork' : newYorkHumidity
        };
        fetch(this.route,{
            'method'  : this.typePost,
            'headers' : {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
			'body'    :JSON.stringify(data)
		}).then(response => {
            return response.json();
        }).then(consumible => {
            if (!consumible.error) {
                alert("Se ha registrado al historial correctamente")
            } else {
                alert("Ha ocurrido un error")
            }
        }).catch(error => {
			console.log(error);
		});
    }

    histories()
    {
        const tableBody = document.getElementById('bodyHistorial');

        if (tableBody != null) {
            fetch(this.route, {
                'method' : this.typeGet
            }).then(response => {
                return response.json();
            }).then(consumible => {
                let html = '';
                for (let index = 0; index < consumible.data.length; index++) {
                    html = html += `<tr><td>${consumible.data[index].id}</td><td>${consumible.data[index].miami}</td><td>${consumible.data[index].ohio}</td><td>${consumible.data[index].newYork}</td><td>${consumible.data[index].fecha}</td></tr>`;
                }
                tableBody.innerHTML = html;
            });
        } 
    }

}
(new History()).histories();