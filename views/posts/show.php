<p><strong>Post #<?php echo $post->id; ?></strong></p>
<p><strong>Autor: </strong><?php echo $post->autor; ?></p>
<p><strong>Post: </strong><?php echo $post->missatge; ?></p>
<p><strong>Imatge: </strong><img src="data:image/png;base64,<?php echo base64_encode($post->imatge); ?>"/></p>
<p><strong>Ultima actualitzacio: </strong><?php echo $post->data_modificacio; ?></p>
