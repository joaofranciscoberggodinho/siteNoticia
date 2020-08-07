<main>
    <form action="<?php echo HOME_URI;?>usuario/salvar" method="POST">
        <fieldset>
            <legend>Cadastro de usuários</legend>
            <input type="hidden" name="id" />
            <div class="row">
                <input type="text" name="nome" placeholder="Nome do usuário" required/>
            </div>
            <div class="row">
                <input type="text" name="email" placeholder="Email" required/>
            </div>
            <div class="row">
                <input type="submit" name="enviar" value="Enviar" required/>
            </div>
        </fieldset>
    </form>

</main>