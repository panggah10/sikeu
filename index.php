<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Backup Data</title>
    <!-- Memasukkan Bootstrap dari CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-pzjw8f+ua7Kw1TIq0RIq3QkHq5RPlnxK9GGaBTrpxk8s9aNaogYfKTkHk1j2q9f6" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Fitur Backup Data</h1>
        <form action="backup.php" method="POST">
            <div class="form-group">
                <label for="folder_sumber">Folder Sumber:</label>
                <input type="text" class="form-control" id="folder_sumber" name="folder_sumber" placeholder="Masukkan path folder sumber" required>
            </div>
            <div class="form-group">
                <label for="folder_tujuan">Folder Tujuan:</label>
                <input type="text" class="form-control" id="folder_tujuan" name="folder_tujuan" placeholder="Masukkan path folder tujuan" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Mulai Backup</button>
        </form>
    </div>

    <!-- Memasukkan Bootstrap JS dan dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zyz5rY2htPewA7J6L2p/4T7tkd0KnXOfz8ETPpoR" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js" integrity="sha384-6gY2zprn11e8Rp9JTp7lF0PCN04gwdy8Tt0Qm2+/w5rAobS40eBOdHCEoHzOY5n5" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0RIq3QkHq5RPlnxK9GGaBTrpxk8s9aNaogYfKTkHk1j2q9f6" crossorigin="anonymous"></script>
</body>
</html>
