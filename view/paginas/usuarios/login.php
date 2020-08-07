<main>
    <form action="<?php echo HOME_URI;?>usuario/autenticar" method="POST">
        <fieldset>
            <legend>Login de usuários</legend>
            <input type="hidden" name="id" />
            <div class="row">
                <input type="text" name="email" placeholder="E-Mail" required/>
            </div>
            <div class="row">
                <input type="text" name="senha" placeholder="Senha" required/>
            </div>
            <div class="row">
                <input type="submit" name="enviar" value="Enviar" required/>
            </div>
        </fieldset>
    </form>

</main>