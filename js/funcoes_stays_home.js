function getCategory() {
  api.get("/category").then((doc) => {
    doc.data.forEach((dados) => {
      document.getElementById("categoria_container_inner").innerHTML += `
            <div class="categoria" onclick="getDados(${dados.id})">
                <div><img src="mansões.png" style="width: 20%;" alt=""></div>
                <span>${dados.nome}</span>
            </div>
            `;
      document.getElementById("opcoes-pesquisa").innerHTML += `
            <option value="${dados.nome}">
        `;
    });
  });
}
function buscardados() {
  api.get("/category").then((doc) => {
    let nomePesquisa = document.getElementById("date-in").value;
    doc.data.forEach((dados) => {
      if (dados.nome == nomePesquisa) {
        // Calcula a posição central vertical da tela
        var centroY = window.innerHeight / 2;
        console.log(centroY);

        // Rola a página para a posição central com animação
        rolarTela(centroY, 1000);
        getDados(dados.id);
      }
    });
  });
}

function rolarTela(destinoY, duracao) {
  var inicio = window.pageYOffset;
  var tempoInicio = null;

  function animacaoScroll(tempoAtual) {
    if (tempoInicio === null) tempoInicio = tempoAtual;
    var tempoDecorrido = tempoAtual - tempoInicio;
    var progresso = Math.min(tempoDecorrido / duracao, 1);
    window.scrollTo(0, inicio + (destinoY - inicio) * progresso);

    if (progresso < 1) {
      requestAnimationFrame(animacaoScroll);
    }
  }

  requestAnimationFrame(animacaoScroll);
}
getCategory();
function getDados(id) {
  document.getElementById("estadias").innerHTML = ``;
  if (id > 0) {
    api.get("/stays_get").then((doc) => {
      doc.data.forEach(async (element) => {
        let image = "";
        api.get(`/imagem_stay/${element.id}`).then((elementImg) => {
          //Até Aqui ve uma logica de ligação de endpoints
          if (element.id == 4) {
          } else if (element.id == id) {
            document.getElementById("estadias").innerHTML += `
                            <div class="col-lg-4 col-md-6">
                                <div class="room-item">
                                    <img src="${
                                      elementImg.data[0].url_imagem
                                    }" alt="">
                                    <div class="ri-text">
                                        <h4>${element.name_stay}</h4>
                                        <h3>R$${parseFloat(
                                          element.preco_dia_letivo
                                        ).toFixed(
                                          2
                                        )}<span>/Preço medio</span></h3>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="r-o">Capacidade:</td>
                                                    <td>${
                                                      element.capacidade
                                                    } Pessoas</td>
                                                </tr>
                                                <tr>
                                                    <td class="r-o">Serviços:</td>
                                                    <td>${element.servicos}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <a href="home.php?stay=${
                                          element.id
                                        }" class="primary-btn">Mais detalhes</a>
                                    </div>
                                </div>
                            </div>
                    
                    `;
          }
        });
      });
    });
  } else {
    api.get("/stays_get").then((doc) => {
      doc.data.forEach(async (element) => {
        let image = "";
        api.get(`/imagem_stay/${element.id}`).then((elementImg) => {
          console.log();
          //
          //Até Aqui ve uma logica de ligação de endpoints
          if (element.id == 4) {
          } else {
            document.getElementById("estadias").innerHTML += `
                    <div class="col-lg-4 col-md-6">
                        <div class="room-item">
                            <img src="${elementImg.data[0].url_imagem}" alt="">
                            <div class="ri-text">
                                <h4>${element.name_stay}</h4>
                                <h3>R$${parseFloat(
                                  element.preco_dia_letivo
                                ).toFixed(2)}<span>/Preço medio</span></h3>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="r-o">Capacidade:</td>
                                            <td>${
                                              element.capacidade
                                            } Pessoas</td>
                                        </tr>
                                        <tr>
                                            <td class="r-o">Serviços:</td>
                                            <td>${element.servicos}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="home.php?stay=${
                                  element.id
                                }" class="primary-btn">Mais detalhes</a>
                            </div>
                        </div>
                    </div>                            
                    `;
          }
        });
      });
    });
  }
}
getDados(0);
