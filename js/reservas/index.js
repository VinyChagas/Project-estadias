const reservas = async (id) => {
  await api.get(`orders_for_user/${id}`).then((dataImg) => {
    data = dataImg.data;
    data.forEach(async (element) => {
      let img = await img_Stay(element.id_stay);
      let motivo = false;
      let finalizado = false;
      var status = "";
      switch (element.status) {
        case 0:
          status = await "Aguardando pagamento ...";
          break;
        case 1:
          status = await "Aprovado, aguardando dia/checkin";
          break;
        case 4:
          status = await "Cancelado";
          motivo = true;
          break;
        case 6:
          status = await "Finalizado";
          finalizado = true;
          break;
        default:
          console.log(`Sorry, we are out of ${expr}.`);
      }
      // Criando um novo objeto Date a partir da string '2023-06-29'
      let dataEntrada = new Date(element.date_entrada);

      // Obtendo dia, mês e ano
      let diaEntrada = dataEntrada.getDate().toString().padStart(2, "0");
      let mesEntrada = (dataEntrada.getMonth() + 1).toString().padStart(2, "0"); // os meses são indexados a partir do zero, então precisamos adicionar 1
      let anoEntrada = dataEntrada.getFullYear();

      // Formatando para o padrão brasileiro
      let dataFormatadaEntrada = `${diaEntrada}/${mesEntrada}/${anoEntrada}`;

      // Criando um novo objeto Date a partir da string '2023-06-29'
      let dataSaida = new Date(element.date_saida);

      // Obtendo dia, mês e ano
      let diaSaida = dataSaida.getDate().toString().padStart(2, "0");
      let mesSaida = (dataSaida.getMonth() + 1).toString().padStart(2, "0"); // os meses são indexados a partir do zero, então precisamos adicionar 1
      let anoSaida = dataSaida.getFullYear();

      // Formatando para o padrão brasileiro
      let dataFormatadaSaida = `${diaSaida}/${mesSaida}/${anoSaida}`;
      $("#reservas").append(`
        <div class="col-lg-4 col-md-6">
        <div class="room-item">
            <img src=${img} alt="">
            <div class="ri-text">
                <h4>${element.name_stay}</h4>
                <h3>R$ ${element.price_total}<span>/Valor Pago</span></h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="r-o">Capacidade:</td>
                            <td>${element.qntPessoas} pessoas</td>
                        </tr>
                        <tr>
                            <td class="r-o">Data de entrada:</td>
                            <td>${dataFormatadaEntrada}</td>
                        </tr>
                        <tr>
                            <td class="r-o">Data de saida:</td>
                            <td>${dataFormatadaSaida}</td>
                        </tr>
                        <tr>
                            <td class="r-o">Status:</td>
                            <td> ${status}<td>
                        </tr>
                    </tbody>
                </table>
                <P style="font-size: 10px; text-transform: uppercase;"> ${
                  motivo
                    ? "Motivo do cancelamento:" + element.motivo_cancelamento
                    : ""
                }</P>
                ${
                  finalizado == false
                    ? ` <a href="#" style="display:${
                        motivo ? "none" : "block"
                      } " class="primary-btn">Cancelar reserva</a><br>`
                    : `  <a href="#" class="primary-btn">Finalizado</a><br>`
                }
              

            </div>
        </div>
    </div>
        `);
    });
  });
};
