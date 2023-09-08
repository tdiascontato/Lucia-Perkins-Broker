<?php 
    session_start();
    include 'partials/header.php'; 
?>

<!--Section-->
<section class="landing_page">
<div class="hello_contact">
    <img src="<?=ROOT_URL?>img/creci.png" alt"Image">
    <div class="beliche">
        <h1>Venha ser assessorado!</h1>
        <div class="section_contact">
        <label for="email_send">Digite abaixo seu email ou telefone que te retornamos!</label>
            <form action="<?=ROOT_URL?>send_email.php" method="POST">
                <div class="contact_contacts">
                    <input type="text" name="email_send" id="email_send">
                    <button type="submit" name="submit" class="btn_send">SEND!</button>
                </div>
                <a href="https://wa.me/5521990032507?text=Gostaria+de+informa%C3%A7%C3%B5es+de+um+im%C3%B3vel%21" class="message_whatsapp" target="_blank">
                    Me chame no whatsapp!
                </a>
            </form>
        </div>
    </div>
</div>
<div class="vantagens">
    <div class="card_vantagens wine top">
        <h2>Consultas</h2>
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

<!--feedbacks-->

<div class="feedbacks">
    <div class="feed">
            <h2 class="feed-title">Ótima Experiência</h2>
            <p class="feed-description">Fez toda a diferença na busca pela nossa casinha. Teve muita paciência e dedicação. Recomendamos!</p>
        </div>
        <div class="feed none">
            <h2 class="feed-title">Muito Dedicados</h2>
            <p class="feed-description">Confiamos na equipe e deu tudo certo. Eles foram pacientes e fomos vendo com calma exatamente o que queríamos. Serviço de alta qualidade.</p>
        </div>
        <div class="feed">
            <h2 class="feed-title">Atenciosos e Experientes</h2>
            <p class="feed-description">Foi uma experiência muito boa com a equipe. Sempre acompanhando cada passo e com interações das etapas.</p>
        </div>
</div>

<!--feedbacks-->

<!-- Imóveis Novo Usado -->
<h1 class="title">Atendemos todas as categorias!</h1>
<div class="novo_usado">
    <div class="card_vantagens">
        <h2>Imóveis Prontos</h2>
        <img src="<?= ROOT_URL ?>img/pronto.jpeg" alt="Consultas">
    </div>
    <div class="card_vantagens meio">
        <h2>Imóveis Lançamentos</h2>
        <img src="<?= ROOT_URL ?>img/lancamento.png" alt="Simulacao de Financiamento">
    </div>
</div>

<!--Contact_section-->
<div class="section_contact">
    <label for="email_send">Digite abaixo seu email ou telefone que te retornamos!</label>
    <form action="<?=ROOT_URL?>send_email.php" method="POST">
        <div class="contact_contacts">
            <input type="text" name="email_send" id="email_send">
            <button type="submit" name="submit" class="btn_send">SEND!</button>
        </div>
        <a href="https://wa.me/5521990032507?text=Gostaria+de+informa%C3%A7%C3%B5es+de+um+im%C3%B3vel%21" class="message_whatsapp" target="_blank">
        Me chame no whatsapp!
        </a>
    </form>
</div>
<!--Contact_Section-->

<div class="hello_contact_two">
    <div class="beliche">
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
