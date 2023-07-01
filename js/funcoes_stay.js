var valor_Seman = 0;
var valor_fds = 0;
var stayIDGLOBAL = 0;
var coordenadasMapa = "";

var id_stay = 0;
var id_stadia = 0;
var id_usuario = 0;
var id_dono = 0;
var data = "";
var data = false;
var senter = 0;

async function converterCoordenadas(coordenadasStr) {
  console.log(coordenadasStr);
  var coordenadasArray = coordenadasStr.split(",").map(function (coordenada) {
    return parseFloat(coordenada.trim());
  });

  if (
    coordenadasArray.length === 2 &&
    !isNaN(coordenadasArray[0]) &&
    !isNaN(coordenadasArray[1])
  ) {
    return {
      latitude: coordenadasArray[0],
      longitude: coordenadasArray[1],
    };
  } else {
    return {
      latitude: null,
      longitude: null,
    };
  }
}

async function buscarParametroStay() {
  const urlParams = new URLSearchParams(window.location.search);
  const stay = urlParams.get("stay");
  stayIDGLOBAL = urlParams.get("stay");
  if (stay) {
    await api.get(`/stays/${stay}`).then(async (doc) => {
      console.log(doc.data);
      dados = doc.data;
      anfitriaoget(dados.id_user_dono);

      id_dono = dados.id_user_dono;
      id_stay = stay;
      id_stadia = stay;
      id_usuario = localStorage.getItem("id");
      senter = localStorage.getItem("id");

      document.getElementById("locateName").innerText = dados.name_stay;
      document.getElementById(
        "capacidade"
      ).innerText = `${dados.capacidade} Pessoas`;
      document.getElementById("servicos").innerText = `${dados.servicos}`;
      document.getElementById("descricao").innerText = `${dados.descricao}`;
      coordenadasMapa = await converterCoordenadas(dados.frame_mapa);
      getCoordenadas();
      let quant = Number(dados.capacidade);
      // Limpa o conteúdo do elemento 'select' antes de adicionar as opções
      // Limpa o conteúdo do elemento 'select' antes de adicionar as opções

      valor_Seman = parseFloat(dados.preco_dia_letivo).toFixed(2);
      valor_fds = parseFloat(dados.preco_final_semana).toFixed(2);

      api.get(`imagem_stay/${stay}`).then((dataImg) => {
        document.getElementById("imgs_locate").innerHTML += `
              
            `;
        dataImg.data.forEach((dado) => {
          document.getElementById("imgs_locate").innerHTML += `
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <img src="${dado.url_imagem}"
                        class="w-100 shadow-1-strong rounded mb-4" alt="Boat on Calm Water" />
                </div>                                
                `;
        });
        document.getElementById("imgDados").innerHTML = `
        <img src="${dataImg.data[0].url_imagem}" alt=" this image contains user-image">
        `;
      });
    });
  } else {
    console.log("Parâmetro 'stay' não encontrado.");
  }
}

buscarParametroStay();

function toDateInputFormat(date) {
  const day = date.getDate().toString().padStart(2, "0");
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const year = date.getFullYear();
  return `${year}-${month}-${day}`;
}

function toDateInputFormatSalve(date) {
  const day = (date.getDate() + 1).toString().padStart(2, "0");
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const year = date.getFullYear();
  return `${year}-${month}-${day}`;
}

document.addEventListener("DOMContentLoaded", function () {
  const dateIn = document.getElementById("date-in");
  const dateOut = document.getElementById("date-out");

  const today = new Date();
  const tomorrow = new Date(today);
  tomorrow.setDate(tomorrow.getDate() + 1);

  dateIn.min = toDateInputFormat(today);
  dateIn.value = toDateInputFormat(today);

  // Desabilita o campo de checkout inicialmente

  dateIn.addEventListener("change", function () {
    const checkInDate = new Date(dateIn.value);
    const checkInDateAlterado = new Date(dateIn.value);

    if (checkInDate) {
      // Habilita o campo de checkout quando uma data de check-in é selecionada
      dateOut.disabled = false;
      checkInDate.setDate(checkInDate.getDate() + 1); // Adiciona 3 dias em vez de 1
      dateOut.min = toDateInputFormat(checkInDate);
      dateOut.value = toDateInputFormat(checkInDate);
    } else {
      // Desabilita o campo de checkout se nenhuma data de check-in for selecionada
      dateOut.disabled = true;
    }
  });

  dateOut.addEventListener("change", function () {
    event.preventDefault();

    const checkIn = new Date(dateIn.value);
    const checkOut = new Date(dateOut.value);

    const days = [];
    const currentDate = new Date(checkIn);

    while (currentDate <= checkOut) {
      var isWeekend = true;

      if (currentDate.getDay() == 6 || currentDate.getDay() == 5) {
        isWeekend = false;
      }
      days.push({
        date: toDateInputFormatSalve(currentDate),
        type: isWeekend ? "Fim de semana" : "Dia útil",
        value: isWeekend ? valor_fds : valor_Seman,
      });

      currentDate.setDate(currentDate.getDate() + 1);
    }
    var valorAlterado;
    var arrayValoresGlobal;
    async function FinalityANDverifySpecialDays() {
      await api.get(`special_days_value/${stayIDGLOBAL}`).then((data) => {
        days.map((doc, index) => {
          data.data.forEach((docSpecialDay) => {
            if (docSpecialDay.day == doc.date) {
              alert(
                `o dia ${docSpecialDay.day} existe na tabela special days.`
              );
              days[index].value = docSpecialDay.price_diference;
              console.log(days);
            }
          });
        });
      });
      await api.post(`/calcular/${stayIDGLOBAL}`, days).then((doc) => {
        document.getElementById("prices").innerHTML = `
                <div style="display: flex; justify-content:space-between">
                    <div >
                       <p> ${doc.data.quantidade}xR$${parseFloat(
          doc.data.totalDividido
        ).toFixed(2)}Noite </p>
                    </div>          
                    <div>
                       <p> R$${parseFloat(doc.data.totalsemTaxa).toFixed(
                         2
                       )} </p>
                    </div>                                              
                </div>
                <div style="display: flex; justify-content:space-between">                                
                    <div >
                       Taxa de serviço
                     </div>          
                     <div>
                        <p> R$${doc.data.taxa} </p>
                     </div>                 
                </div>
            `;
        arrayValoresGlobal = doc.data.array;
        document.getElementById(
          "precoComum"
        ).innerText = `TOTAL: R$ ${doc.data.total}`;
        quantidade_dias = doc.data.array.legth;
        document.getElementById("preco_sem_taxa").value = parseFloat(
          doc.data.totalsemTaxa
        ).toFixed(2);
        document.getElementById("id_stay").value = stayIDGLOBAL;
        document.getElementById("valorFInal").value = doc.data.total;
        document.getElementById("taxa").value = doc.data.taxa;
        document.getElementById("taxaLimpeza").value = 0;
        document.getElementById("quantidade_dias").value = quantidade_dias;
        document.getElementById("price_day").value = doc.data.totalDividido;
        document.getElementById("rezerva").value = 0;
      });
    }
    FinalityANDverifySpecialDays();
  });

  dateIn.addEventListener("change", function () {
    event.preventDefault();

    const checkIn = new Date(dateIn.value);
    const checkOut = new Date(dateOut.value);

    const days = [];
    const currentDate = new Date(checkIn);

    while (currentDate <= checkOut) {
      var isWeekend = true;

      if (currentDate.getDay() == 6 || currentDate.getDay() == 5) {
        isWeekend = false;
      }

      days.push({
        date: toDateInputFormatSalve(currentDate),
        type: isWeekend ? "Fim de semana" : "Dia útil",
        value: isWeekend ? valor_fds : valor_Seman,
      });

      currentDate.setDate(currentDate.getDate() + 1);
    }
    var valorAlterado;
    var arrayValoresGlobal;
    async function FinalityANDverifySpecialDays() {
      await api.get(`special_days_value/${stayIDGLOBAL}`).then((data) => {
        days.map((doc, index) => {
          data.data.forEach((docSpecialDay) => {
            if (docSpecialDay.day == doc.date) {
              alert(
                `o dia ${docSpecialDay.day} existe na tabela special days.`
              );
              days[index].value = docSpecialDay.price_diference;
              console.log(days);
            }
          });
        });
      });
      await api.post(`/calcular/${stayIDGLOBAL}`, days).then((doc) => {
        document.getElementById("prices").innerHTML = `
                <div style="display: flex; justify-content:space-between">
                    <div >
                       <p> ${doc.data.quantidade}xR$${parseFloat(
          doc.data.totalDividido
        ).toFixed(2)}
                        Noite </p>
                    </div>          
                    <div>
                       <p>R$${parseFloat(doc.data.totalsemTaxa).toFixed(2)} </p>
                    </div>                                              
                </div>
                <div style="display: flex; justify-content:space-between">                                
                    <div >
                       Taxa de serviço
                     </div>          
                     <div>
                        <p> R$${doc.data.taxa} </p>
                     </div>                 
                </div>
            `;

        arrayValoresGlobal = doc.data.array;
        document.getElementById(
          "precoComum"
        ).innerText = `TOTAL: R$ ${doc.data.total}`;
        quantidade_dias = doc.data.array.legth;

        document.getElementById("preco_sem_taxa").value = parseFloat(
          doc.data.totalsemTaxa
        ).toFixed(2);
        document.getElementById("id_stay").value = stayIDGLOBAL;
        document.getElementById("valorFInal").value = doc.data.total;
        document.getElementById("taxa").value = doc.data.taxa;
        document.getElementById("taxaLimpeza").value = 0;
        document.getElementById("quantidade_dias").value = quantidade_dias;
        document.getElementById("price_day").value = doc.data.totalDividido;
        document.getElementById("rezerva").value = 0;
      });
      document.getElementById("calcular").disabled = false;
    }
    FinalityANDverifySpecialDays();
  });
});

function getCoordenadas() {
  // Inicialize o mapa
  var map = L.map("map").setView([-23.55052, -46.633308], 18);

  // Adicione um mapa baseado em OpenStreetMap
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  }).addTo(map);

  var coordenadas = L.latLng(
    coordenadasMapa.latitude,
    coordenadasMapa.longitude
  );
  // Desenhe um círculo de 30 metros
  var circle = L.circle(coordenadas, {
    radius: 20,
    color: "red",
    fillColor: "red",
    fillOpacity: 0.35,
  }).addTo(map);
}

async function anfitriaoget(parm) {
  await api.get(`users/${parm}`).then((data) => {
    console.log(data);
    document.getElementById("nomeDono").innerText = data.data.name;
  });
}

async function setMensage() {
  document.getElementById("msg");
  var dataAtual = new Date();
  let dados = {
    mensagem: document.getElementById("msg").value,
    id_stadia: parseInt(id_stay),
    id_usuario: parseInt(id_usuario),
    id_dono: parseInt(id_dono),
    data: dataAtual,
    view: false,
    senter: parseInt(id_usuario),
  };
  await api.post(`/createmsg`, dados).then((doc) => {
    getMensagem();
    document.getElementById("msg").value = "";
  });
}

async function getMensagem() {
  await api
    .get(`http://127.0.0.1:8000/getMsg/${id_usuario}/${id_stadia}/${id_dono}`)
    .then((data) => {
      document.getElementById("mensagem").innerHTML = "";
      data.data.forEach((doc) => {
        if (doc.senter == localStorage.getItem("id")) {
          document.getElementById("mensagem").innerHTML += `
                                              
          <div class="msg-btn-holder" 
          style="display: flex!important;
          justify-content: end!important; margin: 4px!important;" id="${doc.id}">
            <div class="sender-msg msg-btn">
                <p style="color: white;">${doc.mensagem}</p>
            </div><br> 
          </div>
            
          `;
        } else {
          document.getElementById("mensagem").innerHTML += `
          <div class="msg-btn-holder" id=">${doc.id}"> 
            <div class="receiver-msg msg-btn">
                <p style="color: white;">${doc.mensagem}</p>
            </div><br><br><br>
          </div>
          `;
        }
      });
    });
}
