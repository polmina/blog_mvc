<h1>EDITAR POST</h1>
<form action="?controller=posts&action=update" method="post">
    <table>
        <tr>
            <td>ID</td>
            <td><input type='text' name='id' value="<?php echo $post->id;?>"/></td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><input type='text' name='autor' value="<?php echo $post->autor;?>"/></td>
        </tr>
        <tr>
            <td>Titol</td>
            <td><input type='text' name='titol' value="<?php echo $post->titol;?>"/></td>
        </tr>
        <tr>
            <td>Missatge</td>
            <td><input type='text' name='missatge' value="<?php echo $post->missatge;?>"/></td>
        </tr>
        <tr>
            <td>Imatge</td>
            <td><input type='text' name='imatge' value="<?php echo $post->imatge;?>"/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Editar</button>
            </td>
        </tr>
        
    </table>
    
</form>
      