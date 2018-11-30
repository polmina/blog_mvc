<div class="content">    
<div class="insertPost"><a href='?controller=posts&action=insertForm'>Insert Post</a></div>

<table>
    <tr>
        <th colspan="2">Listado de los Posts:</th>
    </tr>
<?php foreach ($posts as $post) { ?>
    <tr>
        <td><?php echo $post->autor; ?></td>
        <td>
            <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Ver contenido</a>
            <a href='?controller=posts&action=updateForm&id=<?php echo $post->id; ?>'>Editar</a>
            <a href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Eliminar</a>
        </td>
    </tr>
<?php }?>

</table>
    </div>