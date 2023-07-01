const daysInInterval = async (startDate, endDate) => {
  let dateArray = [];
  let currentDate = new Date(startDate);

  while (currentDate <= endDate) {
    dateArray.push(new Date(currentDate));
    currentDate.setDate(currentDate.getDate() + 1);
  }

  return dateArray;
};

// let startDate = new Date("2023-06-29");
// let endDate = new Date("2023-07-10");
// let dates = getDates(startDate, endDate);

// // Formatar cada data para o padrão brasileiro e exibir
// for (let i = 0; i < dates.length; i++) {
//   let dia = dates[i].getDate().toString().padStart(2, "0");
//   let mes = (dates[i].getMonth() + 1).toString().padStart(2, "0");
//   let ano = dates[i].getFullYear();
//   console.log(`${dia}/${mes}/${ano}`);
// }
