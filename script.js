// Função para enviar o formulário de contato
document.getElementById('contact-form').addEventListener('submit', function (e) {
    e.preventDefault(); // Impede o envio do formulário

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (name && email && message) {
        alert('Mensagem enviada com sucesso! Entraremos em contato em breve.');
        // Limpar os campos após envio
        document.getElementById('contact-form').reset();
    } else {
        alert('Por favor, preencha todos os campos!');
    }
});
