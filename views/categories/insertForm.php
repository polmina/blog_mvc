<div class="content">
    <h1>INSERTAR CATEGORIA</h1>
    <form action="?controller=categories&action=insert" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Nom</td>
                <td><input type='text' name='nom'></td>
            </tr>
            <tr>
                <td>Descripció</td>
                <td><input type='text' name='descripcio'></td>
            </tr>
            <tr>
                <td>Public</td>
                <td>
                    <select name='public'>
                        <option value="tot">Tot</option>
                        <option value="adults">Adults</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </td>
            </tr>

        </table>

</div>