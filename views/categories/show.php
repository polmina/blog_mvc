<table>
    <tr>
        <td>Post </td>
        <td>  #<?php echo $post->id; ?></td>
    </tr>
    <tr>
        <td>Autor:</td>
        <td><?php echo $post->autor; ?></td>
    </tr>
    <tr>
        <td>Post:</td>
        <td><?php echo $post->missatge; ?></td>
    </tr>
    <tr>
        <td>Imatge: </td>
        <td> <img src="data:image/png;base64,<?php echo base64_encode($post->imatge); ?>"/></td>
    </tr>
    <tr>
        <td>Ultima actualitzacio: </td>
        <td><?php echo $post->data_modificacio; ?></p></td>
    </tr>

</table>