<h1>EDITAR POST</h1>
<form action="?controller=posts&action=update" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>ID</td>
            <td><input type='text' name='id' value="<?php echo $post->id; ?>" readonly/></td>
        </tr>
        <tr>
            <td>Categoria</td>
            <td>
                <select name='categoria'>

                    <?php
                    $categories = Categoria::all();
                    foreach ($categories as $categoria) {
                        echo "<option value =\"" . strtolower($categoria->nom)."\"";
                        if($post->categoria==$categoria->id){echo "\" selected ";}
                        
                        echo">" . $categoria->nom . "</option>";
                    }
                    ?>
                </select>

            </td>
        </tr>
        <tr>
            <td>Autor</td>
            <td><input type='text' name='autor' value="<?php echo $post->autor; ?>"/></td>
        </tr>
        <tr>
            <td>Titol</td>
            <td><input type='text' name='titol' value="<?php echo $post->titol; ?>"/></td>
        </tr>
        <tr>
            <td>Missatge</td>
            <td><input type='text' name='missatge' value="<?php echo $post->missatge; ?>"/></td>
        </tr>
        <tr>
            <td>Imatge</td>
            <td><img src="data:image/png;base64,<?php echo base64_encode($post->imatge); ?>"/></td>
            <td><input type='file' name='imatge'/></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Editar</button>
            </td>
        </tr>

    </table>

</form>
