<?= $this->extend('train/template'); ?>

<?= $this->section('content'); ?>

<section class="sample-page">
    <div class="container" data-aos="fade-up">
        <h2>Daftar Keberangkatan dan Tujuan Kereta</h2>
        <button type="button" class="btn btn-outline-primary my-3" disabled>
            <i class="bi bi-plus-square me-1"></i>Tambah data kereta</button>
        <!-- table schedule -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Gerbong</th>
                    <th scope="col">Stasiun Keberangkatan</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Stasiun Tujuan</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kapasitas</th>
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">361</th>
                    <td>Surabaya</td>
                    <td>18:15</td>
                    <td>Jakarta</td>
                    <td>8:30</td>
                    <td>575000</td>
                    <td>60</td>
                    <td>
                        <button type="button" class="btn btn-warning" disabled>
                            <i class="bi bi-pencil-square me-1"></i>Edit</button>
                        <button type="button" class="btn btn-danger" disabled>
                            <i class="bi bi-trash me-1"></i>Delete</button>
                    </td>
                </tr>

            </tbody>
        </table>
        <!-- End of Table -->
        <?php
        $url = base_url()."/scheduler";

        $client = curl_init();
        curl_setopt($client, CURLOPT_URL, $url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);

        $result = json_decode($response);
        var_dump($response);
        curl_close($client);
        ?>
    </div>
</section>

</main>
<!-- End #main -->


<?= $this->endSection(); ?>