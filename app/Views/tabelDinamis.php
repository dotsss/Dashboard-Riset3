<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="tabelDinamis.css">
  <script src="https://kit.fontawesome.com/bc6bf428b6.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
  <title>Tabel Dinamis</title>
</head>

<body>
  <nav id="bg2" class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">VISUALISASI<br>SIMISCA BPS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ml-auto">
          <a class="nav-item nav-link " href="#">Peta Tematik <span class="sr-only">(current)</span></a>
          <a class="nav-item nav-link" href="visual.html">Visualisasi</a>
          <a class="nav-item nav-link active" href="#">Tabel Dinamis</a>
        </div>
      </div>
    </div>
  </nav>
  <i class="fas fa-home home"></i><i class="fas fa-long-arrow-alt-right panah">
    <div class="head">Tabel Dinamis</div>
  </i>

  <div class="formulir">
    <h3>Tabel Dinamis</h3>
    <form class="col-md-11">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="subjek">Subjek</label>
          <select class="form-control" onchange="ubahFilter()" id="subjek">
            <option id="opsi-satker">Satuan Kerja</option>
            <option id="opsi-pegawai">Pegawai</option>
          </select>
        </div>
      </div>
      <div class="filter form-row" id="filter-satker">
        <div class="form-group col-md-12">
          <label for="wilayah">Wilayah</label>
          <select class="form-control" id="wilayah">
            <option>Semua Wilayah</option>
            <option>Pusat</option>
            <option>Provinsi</option>
            <option>Kabupaten/Kota</option>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label for="indeks">Indeks</label><br>
          <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="sampleDropdownMenu" data-toggle="dropdown">
              Indeks
            </button>
            <div class="dropdown-menu">
              <button class="dropdown-item" type="button">
                <input type="checkbox">Pilih Semua
              </button>
              <button class="dropdown-item" type="button">
                <input type="checkbox">Keseluruhan
              </button>
              <button class="dropdown-item" type="button">
                <input type="checkbox">Bencana Alam
              </button>
              <button class="dropdown-item" type="button">
                <input type="checkbox">Kebakaran
              </button>
              <button class="dropdown-item" type="button">
                <input type="checkbox">Pandemi Covid-19
              </button>
            </div>
          </div>
        </div>

        <div class="form-group col-md-12">
          <label for="tahun">Tahun</label>
          <select class="form-control" id="tahun">
            <option>2021</option>
          </select>
        </div>
      </div>

      <div class="form-row filter" id="filter-pegawai">
        <div class="form-group col-md-6">
          <label for="indeks">Indeks</label>
          <select class="form-control" id="indeks">
            <option>Indeks Kesiapan Pegawai</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="wilayah">Wilayah</label>
          <select class="form-control" id="wilayah">
            <option>Semua Wilayah</option>
            <option>Pusat</option>
            <option>Provinsi</option>
            <option>Kabupaten/Kota</option>
          </select>
        </div>
      </div>

      <button onclick="filtering()" type="button" id="tombol" class="btn btn-primary ">Submit</button>
    </form>
  </div>

  <div class="container tabel mt-3" id="tabel-satker">
    <div class="judul-tabel">Indeks Mitigasi dan Kesiapan Bencana - Satuan Kerja</div>
    <table id="tabel-skr" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th rowspan="2">Nama Satuan Kerja</th>
          <th colspan="4">Indeks</th>
          <th rowspan="2">IMKB</th>
        </tr>
        <tr>
          <th>Dimensi Sumber Daya Pendukung</th>
          <th>Dimensi Rencana Tanggap Darurat</th>
          <th>Dimensi Pemulihan dan Penanggulangan Darurat</th>
          <th>Dimensi Perlindungan Aset</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "surpen");
        $data = mysqli_query($koneksi, "select * from satker");
        while ($row = mysqli_fetch_array($data)) {
          echo "<tr>
                  <td>" . $row['nama'] . "</td>
                  <td>" . $row['dim1'] . "</td>
                  <td>" . $row['dim2'] . "</td>
                  <td>" . $row['dim3'] . "</td>
                  <td>" . $row['dim4'] . "</td>
                  <td>" . $row['imkb'] . "</td>
                </tr>";
        }
        ?>
      </tbody>
    </table>
    <script>
      $(document).ready(function() {
        $('#tabel-skr').DataTable();
      });

      $(document).ready(function() {
        $('#tabel-pgw').DataTable();
      });
    </script>
  </div>

  <div class="container tabel mt-3" id="tabel-pegawai">
    <div class="judul-tabel">Indeks Mitigasi dan Kesiapan Bencana - Pegawai BPS</div>
    <table id="tabel-pgw" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th rowspan="2">Nama Satuan Kerja</th>
          <th rowspan="2">id</th>
          <th rowspan="2">Nama Pegawai</th>
          <th colspan="3">Indeks</th>
          <th rowspan="2">IMKB</th>
        </tr>
        <tr>
          <th>Dimensi Pengetahuan dan Pengalaman</th>
          <th>Dimensi Sumber Daya Pendukung</th>
          <th>Dimensi Rencana Tanggap Darurat</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $koneksi = mysqli_connect("localhost", "root", "", "surpen");
        $data = mysqli_query($koneksi, "select * from pegawai");
        while ($row = mysqli_fetch_array($data)) {
          echo "<tr>
                    <td>" . $row['namasatker'] . "</td>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['dim1'] . "</td>
                    <td>" . $row['dim2'] . "</td>
                    <td>" . $row['dim3'] . "</td>
                    <td>" . $row['imkb'] . "</td>
                  </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <div class="foot">
    <footer>©2021 Praktik Kerja Lapangan Politeknik Statistika STIS T.A. 2020/2021</footer>
  </div>

  <script>
    var ftrSatker = document.getElementById("filter-satker");
    var ftrPgw = document.getElementById("filter-pegawai");
    var button = document.getElementById("tombol");
    var tabel_satker = document.getElementById("tabel-satker");
    var tabel_pegawai = document.getElementById("tabel-pegawai");
    var subjek = document.getElementById("subjek");

    function filtering() {
      if (subjek.value == "Satuan Kerja") {
        ftrSatker.style.display = "block";
        tabel_satker.style.display = "block";
      } else if (subjek.value == "Pegawai") {
        ftrPgw.style.display = "flex";
        tabel_pegawai.style.display = "block";
      }
      console.log(subjek.value);
      button.style.display = "none";

    }

    function ubahFilter() {
      if (ftrSatker.style.display == "block") {
        ftrSatker.style.display = "none";
        tabel_satker.style.display = "none";
        ftrPgw.style.display = "flex";
        tabel_pegawai.style.display = "block";
      } else if (ftrPgw.style.display == "flex") {
        ftrPgw.style.display = "none";
        tabel_pegawai.style.display = "none";
        ftrSatker.style.display = "block";
        tabel_satker.style.display = "block";
      }

    }
  </script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>