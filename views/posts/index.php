<p><strong>Listado de los posts:</strong></p>
<a href='?controller=posts&action=insertForm'>Insert Post</a>
<?php foreach ($posts as $post) { ?>
    <p>
        <?php echo $post->autor; ?>
        <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Ver contenido</a>
        <a href='?controller=posts&action=updateForm&id=<?php echo $post->id; ?>'>Editar</a>
        <a href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Eliminar</a>
    </p>
<?php } 