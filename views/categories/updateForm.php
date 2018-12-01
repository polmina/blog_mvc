<h1>EDITAR CATEGORIA</h1>
<form action="?controller=categories&action=update" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>ID</td>
            <td><input type='text' name='id' value="<?php echo $categoria->id;?>"readonly/></td>
        </tr>
        
        <tr>
            <td>Nom</td>
            <td><input type='text' name='nom' value="<?php echo $categoria->nom;?>"/></td>
        </tr>
        <tr>
            <td>Descripció</td>
            <td><input type='text' name='descripcio' value="<?php echo $categoria->descripcio;?>"/></td>
        </tr>
        <tr>
            <td>Public</td>
            <td>
                <select name='public'>
                    
                    <?php
                    $publics = ['Tot', 'Adults'];
                    $categories = Categoria::all();
                    foreach ($publics as $public) {
                        echo "<option value =\"" . strtolower($public)."\"";
                        if($categoria->public==strtolower($public)){echo "\" selected ";}
                        
                        echo">" . $public . "</option>";
                    }
                    ?>
                </select>

            </td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Editar</button>
            </td>
        </tr>
        
    </table>
    
</form>
      