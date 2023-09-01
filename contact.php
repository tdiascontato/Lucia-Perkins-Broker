<?php include 'partials/header.php'; ?>

<!--Section-->
<section class="landing_page">

<div class="vantagens">
    <div class="white" id="backblack">Consultas</div>
    <div class="black" id="backwhite">Simulação de financiamentos</div>
    <div class="white" id="backblack">Visitas</div>
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
<div class="title">Trabalhamos com imóveis:</div>
<div class="imoveis">
    <div class="imoveis_opcoes black" id="backwhite">PRONTOS</div>
    <div class="imoveis_opcoes white" id="backblack">LANÇAMENTOS</div>
</div>
<!-- Imóveis -->

<!-- Imóveis Casa Apart Rural-->
<div class="imoveis_condicao">
    <div class="imoveis_cond black" id="backwhite">CASAS</div>
    <div class="imoveis_cond white" id="backblack">APARTAMENTOS</div>
    <div class="imoveis_cond black" id="backwhite">RURAL</div>
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