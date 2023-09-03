<?php include 'partials/header.php'; ?>

<!--Section-->
<section class="landing_page">

<div class="vantagens">
    <div class="card_vantagens">
        <h2>Consultas e Aconselhamentos</h2>
        <img src="<?= ROOT_URL ?>img/consulta.jpeg" alt="Consultas">
    </div>
    <div class="card_vantagens">
        <h2>Simulações de Financiamentos e Mentoria</h2>
        <img src="<?= ROOT_URL ?>img/financiamento.jpeg" alt="Simulacao de Financiamento">
    </div>
    <div class="card_vantagens">
        <h2>Visitas</h2>
        <img src="<?= ROOT_URL ?>img/visita.jpeg" alt="Visitas">
    </div>
</div>

<!--Contact_section-->
<div class="section_contact">
    <label for="email_send">Digite abaixo seu email ou telefone que eu te retorno!</label>
    <form action="<?=ROOT_URL?>send_email.php" method="POST">
        <div class="contact_contacts">
            <input type="text" name="email_send" id="email_send">
            <button type="submit" name="submit" class="btn_send">SEND!</button>
        </div>
        <a href="https://wa.me/5521990032507?text=Gostaria+de+informa%C3%A7%C3%B5es+de+um+im%C3%B3vel%21" class="message_whatsapp" target="_blank">
        Clique e me chame no whatsapp!
        </a>
    </form>
</div>
<!--Contact_Section-->

<!-- Imóveis Novo Usado -->
<div class="novo_usado">
    <div class="card_novo_usado">
        <h2>Imóveis Prontos</h2>
        <img src="<?= ROOT_URL ?>img/pronto.jpeg" alt="Consultas">
    </div>
    <div class="card_novo_usado">
        <h2>Imóveis Lançamentos</h2>
        <img src="<?= ROOT_URL ?>img/lancamento.png" alt="Simulacao de Financiamento">
    </div>
</div>
<!-- Imóveis -->

<!-- Imóveis Casa Apart Rural-->
<div class="imoveis_condicao">
    <div class="card_imoveis_condicao">
        <h2>Casas</h2>
        <img src="<?= ROOT_URL ?>img/casa.jpeg" alt="Consultas">
    </div>
    <div class="card_imoveis_condicao">
        <h2>Apartamento</h2>
        <img src="<?= ROOT_URL ?>img/apartamento.jpeg" alt="Simulacao de Financiamento">
    </div>
    <div class="card_imoveis_condicao">
        <h2>Rural</h2>
        <img src="<?= ROOT_URL ?>img/rural.jpeg" alt="Simulacao de Financiamento">
    </div>
</div>
<!-- Imóveis -->

<!--Contact_section-->
<div class="section_contact">
    <label for="email_send">Digite abaixo seu email ou telefone que eu te retorno!</label>
    <form action="<?=ROOT_URL?>send_email.php" method="POST">
        <div class="contact_contacts">
            <input type="text" name="email_send" id="email_send">
            <button type="submit" name="submit" class="btn_send">SEND!</button>
        </div>
        <a href="https://wa.me/5521990032507?text=Gostaria+de+informa%C3%A7%C3%B5es+de+um+im%C3%B3vel%21" class="message_whatsapp" target="_blank">
        Clique e me chame no whatsapp!
        </a>
    </form>
</div>
<!--Contact_Section-->

<div class="contact_icons">
    <div class="contact_icons_socials">
        <img src="./img/whatsapp.png" alt="socials media" class="img_contacts">
        <a href="" target="_blank" class="contact_links whats">Meu whatsapp!</a>
        <img src="./img/facebook.png" alt="socials media" class="img_contacts">
        <a href="" target="_blank" class="contact_links face">Facebook Corretor!</a>
        <img src="./img/ig.png" alt="socials media" class="img_contacts">
        <a href="" target="_blank" class="contact_links ig">Instagram Corretor!</a>
        <img src="./img/email.png" alt="socials media" class="img_contacts">
        <a href="" target="_blank" class="contact_links email_icon">Email Corretor!</a>
    </div>
    <img src="./img/creci.png" alt="Creci" class="img_contacts_double">
</div>

</section>
<!--Section-->

<?php include 'partials/footer.php'; ?>