<div class="content">
<h1>INSERTAR POST</h1>
<form action="?controller=posts&action=insert" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Autor</td>
            <td><input type='text' name='autor'></td>
        </tr>
        <tr>
            <td>Categoria</td>
            <td>
                <select name='categoria'>
               
                <?php 
                 $categories = Categoria::all();
                 foreach ($categories as $categoria){
                    echo "<option value =\"". strtolower($categoria->nom)."\">".$categoria->nom."</option>";
                        }
                    
                ?>
                </select>
          
            </td>
        </tr>
        <tr>
            <td>Titol</td>
            <td><input type='text' name='titol'/></td>
        </tr>
        <tr>
            <td>Missatge</td>
            <td><input type='text' name='missatge'/></td>
        </tr>
         <tr>
            <td>Imatge</td>
            <td><input type="file" name="imatge" /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Crear</button>
            </td>
        </tr>
        
    </table>
    
</div>