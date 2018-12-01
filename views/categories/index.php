<div class="content">    
<div class="insertPost"><a href='?controller=categories&action=insertForm'>Insert Categoria</a></div>

<table>
    <tr>
        <th colspan="2">Listado de las categorias:</th>
    </tr>
<?php foreach ($categories as $categoria) { ?>
    <tr>
        <td><?php echo $categoria->nom; ?></td>
        <td><?php echo $categoria->descripcio; ?></td>
        <td><?php echo $categoria->data; ?></td>
        <td>
            <a href='?controller=categories&action=show&id=<?php echo $categoria->id; ?>'>Ver contenido</a>
            <a href='?controller=categories&action=updateForm&id=<?php echo $categoria->id; ?>'>Editar</a>
            <a href='?controller=categories&action=delete&id=<?php echo $categoria->id; ?>'>Eliminar</a>
        </td>
    </tr>
<?php }?>

</table>
    </div>