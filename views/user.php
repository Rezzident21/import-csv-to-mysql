
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $pageData['title'] ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</head>
<body>
<div class="row">
    <div class="col-lg-12">


        <div class="row">
            <div class="col-md-12 text-center block">
                <h2>Upload CSV file with users</h2>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="file" name="csv" class="input">
                    <button class="btn btn-success">Upload</button>
                </form>
            </div>
        </div>
        <div class="bnt-info md-8 text-center">


        <?php

        if (isset($pageData['errors'])) {
            echo '<span class="alert-warning">' . $pageData['errors'] . '</span>';
        }elseif (isset ($pageData['countLoaded'])) {

            echo '<span class="alert-success">Loaded ' . $pageData['countLoaded'] . 'Updated ' . $pageData['countUpdated'] . ' Delete ' . $pageData['countDeleted'] . '</span>';
        }
        ?>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12">
                <div data-ng-view></div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>ID USER</th>
                            <th>First name</th>

                            <th>Last name</th>
                            <th>Birthday</th>
                            <th>Date change</th>
                            <th>Description</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        foreach ($pageData['users'] as $key => $value) { ?>
                            <tr>
                                <td><?php echo $value['uid']; ?></td>
                                <td><?php echo $value['firstName']; ?></a></td>
                                <td><?php echo $value['lastName']; ?></td>
                                <td><?php echo $value['birthDay']; ?></td>
                                <td><?php echo $value['dateChange']; ?></td>
                                <td><?php echo $value['description']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

</div>

</html>
</body>