// Quando uma imagem é clicada
$('img[data-toggle="modal"]').on('click', function() {
    // Obtenha o ID do usuário dos atributos de dados
    var userId = $(this).data('user-id');

    // Aqui você deve recuperar os dados do usuário com base no ID, por exemplo, com AJAX
    // Vamos simular isso com dados de exemplo
    var userData = {
      name: "Tiger Nixon",
      cpf: "123.456.789-00",
      rg: "9876543",
      telefone: "61",
      selfie: "./assets/img-user/avatar.png",
      documento: "./assets/img-user/rg.png"
    };

    // Preencha os detalhes do usuário no modal
    $('#user-details').html(`
      <p><strong>Nome:</strong> ${userData.name}</p>
      <p><strong>CPF:</strong> ${userData.cpf}</p>
      <p><strong>RG:</strong> ${userData.rg}</p>
      <p><strong>Telefone:</strong> ${userData.telefone}</p>
      <img src="${userData.selfie}" alt="Selfie" style="width: 50%; margin-left: 25%;">
      <img src="${userData.documento}" alt="Documento" style="width: 50%; margin-left: 25%;">
    `);
  });