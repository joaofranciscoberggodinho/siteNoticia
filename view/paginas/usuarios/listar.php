<main>
<a href="<?php echo HOME_URI;?>usuario/criar" class="btn">ADD</a>
<table class="table">
<thead>
    <tr><td><b>#</b></td><td><b>Nome</b></td><td><b>Email</b></td></tr>
    <?php
        if(isset($usuarios)){
            foreach ($usuarios as $usuario){
                echo("<tr><td>$usuario->id</td><td>$usuario->nome</td><td>$usuario->email</td>
                      <td><a href='".HOME_URI."usuario/excluir/".$usuario->id."'".">Excluir</a></td>
                      <td><a href='".HOME_URI."usuario/editar/".$usuario->id."'".">Editar</a></td></tr>");

            }
        }
    ?>
</thead>

</table>
</main>