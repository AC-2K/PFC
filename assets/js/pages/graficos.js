let listaCliente = new Array();

let nomeClientes = new Array();
let numeroClientes = new Array();

function definirArray( obejctoArray ){

    for (let index = 0; index < obejctoArray.length; index++) {
        let element = obejctoArray[index];
        listaCliente.push(element);      
    }
}

function adicionarDados( obejctoArray ){

    for (let index = 0; index < obejctoArray.length; index++) {
        let element = obejctoArray[index];
        nomeClientes.push(element.cliente_nome);      
    }

    for (let index = 0; index < obejctoArray.length; index++) {
        let element = obejctoArray[index];
        numeroClientes.push(element.cliente_numServico);      
    }
}

fetch('Ajax-Calls.php')
.then(response => response.json())
.then(data => {    
    definirArray(data);
    adicionarDados(listaCliente);

    const barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
        ];

        new Chart("myChart", {
        type: "doughnut",
        data: {
            labels: nomeClientes,
            datasets: [{
            backgroundColor: barColors,
            data: numeroClientes
            }]
        },
        });
})
.catch(error => {
    console.error('Error:', error);
})
