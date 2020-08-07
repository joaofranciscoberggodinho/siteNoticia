<main>

<h1> Insira a senha nova </h1>

<form action="<?php echo HOME_URI;?>usuario/alterar_senha" method="POST">
        <fieldset>
            <legend>Alterar senha</legend>
            <input type="hidden" name="id" value=<?php echo $id->id ?>/>
            <div class="row">
                <input type="text" name="senha" placeholder="Senha Nova"/>
            </div>
            <input type="submit" name="enviar" value="Enviar" />
        </fieldset>
</form>

</main>