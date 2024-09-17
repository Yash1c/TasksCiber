document.addEventListener("DOMContentLoaded", function () {
  const cadastrarBtn = document.getElementById("cadastrarBtn");
  const listarBtn = document.getElementById("listarBtn");
  const resultadosDiv = document.getElementById("resultados");

  cadastrarBtn.addEventListener("click", function () {
    const nome = document.getElementById("nome").value;
    const email = document.getElementById("email").value;
    const senha = document.getElementById("senha").value;

    // Armazenar valores no localStorage
    localStorage.setItem("nome", nome);
    localStorage.setItem("email", email);
    localStorage.setItem("senha", senha);

    // Limpar o formulário
    document.getElementById("cadastroForm").reset();
  });

  listarBtn.addEventListener("click", function () {
    // Limpar resultados anteriores
    resultadosDiv.innerHTML = "";

    // Listar itens do localStorage
    for (let i = 0; i < localStorage.length; i++) {
      const key = localStorage.key(i);
      const value = localStorage.getItem(key);
      resultadosDiv.innerHTML += `<p><strong>${key}:</strong> ${value}</p>`;
    }
  });
});
