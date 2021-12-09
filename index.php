<?php

include('database.php');
include('header.php');


?>

<div class="row">

    <div class="col-md-4">

        <div class="card card-body">
            <form action="save.php" method="post">
                <div class="form-group">
                    
                    <input type="float" name="tittle" class="form-control" placeholder="Valor medido">
                </div>
                <div class="form-group">
                    
                    <input type="date" name="description" class="form-control">
                </div>
                <input type="submit" class="btn btn-dark" name="submit" value="Guardar registro">
            </form>
        </div>

    </div>
    <div class="col-md-8">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Valor Medido</th>
                <th>Fecha de Medicion</th>
                <th>Opcciones</th>           
            </tr>
        </thead>
        <tbody>
            <?php
                    
                $query = "SELECT * FROM measures";
                $result = mysqli_query($conn, $query);

                while($row = mysqli_fetch_array($result)){?>
                    <tr>
                        <td>
                            <?php                                
                                echo $row['value_measured'];                                
                            ?>
                        </td>
                        <td>
                            <?php                                
                                echo $row['date_measured'];                             
                            ?>
                        </td>
                        <td>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
    </table>

    </div>

</div>

<div class="row">
    <div class="col-md-12">

    <div id="columnchart_material" class="p-2 border border-primary" style="width: 100%; height: 500px;"></div>

    </div>
</div>





<?php

include('footer.php');

?>