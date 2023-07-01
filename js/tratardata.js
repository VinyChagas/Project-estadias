// Espera o documento ser carregado para executar o script
document.addEventListener("DOMContentLoaded", function () {
  // Configura os campos de data com o jQuery UI Datepicker
  $("#date-in").datepicker({
    minDate: 0, // Não permite selecionar datas no passado
    dateFormat: "dd/mm/yy", // Formato da data
    onClose: function (selectedDate) {
      // Atualiza a data mínima do campo 'date-out' de acordo com a data selecionada em 'date-in'
      $("#date-out").datepicker("option", "minDate", selectedDate);
    },
  });

  $("#date-out").datepicker({
    minDate: 1, // A data mínima deve ser pelo menos 1 dia após a data atual
    dateFormat: "dd/mm/yy", // Formato da data
    onClose: function (selectedDate) {
      // Atualiza a data máxima do campo 'date-in' de acordo com a data selecionada em 'date-out'
      $("#date-in").datepicker("option", "maxDate", selectedDate);
    },
  });

  // Quando o botão 'Reservar' é clicado
  $("form").on("submit", function (event) {
    event.preventDefault();

    // Recupera as datas de entrada e saída
    const checkIn = $("#date-in").datepicker("getDate");
    const checkOut = $("#date-out").datepicker("getDate");

    // Verifica se ambas as datas foram selecionadas
    if (checkIn && checkOut) {
      const dias = [];
      const dataAtual = new Date(checkIn);

      while (dataAtual <= checkOut) {
        const isFimDeSemana =
          dataAtual.getDay() === 0 || dataAtual.getDay() === 6;
        dias.push({
          data: new Date(dataAtual),
          tipo: isFimDeSemana ? "Fim de semana" : "Dia útil",
        });

        // Avança para o próximo dia
        dataAtual.setDate(dataAtual.getDate() + 1);
      }

      // Exibe o resultado no console
      console.log(dias);
    } else {
      alert("Selecione as datas de check-in e check-out.");
    }
  });
});
