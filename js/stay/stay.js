const img_Stay = async (id) => {
  var data;
  await api.get(`imagem_stay/${id}`).then((dataImg) => {
    data = dataImg.data;
  });
  return data[0].url_imagem;
};