$(document).ready(function() {
    chartPelaku();
    chartLuas();
    chartNilai();


    function chartPelaku() {
        $.ajax({
            url: site_url + 'api/pengolahan_data/Api_budidaya/pelaku_pengolahan',
            method: "POST",
            data: { action: 'fetch' },
            dataType: "JSON",
            success: function(data) {
                var kecamatan = [];
                var jumlah_pelaku = [];
                var color = [];

                for (var count = 0; count < data.length; count++) {
                    kecamatan.push(data[count].kecamatan);
                    jumlah_pelaku.push(data[count].jumlah_pelaku);
                    // color.push('#'+Math.floor(Math.random()*16777215).toString(16));
                }

                var chart_data = {
                    labels: kecamatan,
                    datasets: [{
                        label: 'Pelaku Usaha',
                        backgroundColor: '#19aa8d',
                        color: '#fff',
                        data: jumlah_pelaku
                    }]
                };

                var options = {
                    responsive: true
                };

                var group_chart1 = $('#chartJumlah');

                var graph1 = new Chart(group_chart1, {
                    type: 'bar',
                    data: chart_data,
                    options: options
                });

            }
        })
    }


    function chartLuas() {
        $.ajax({
            url: site_url + 'api/pengolahan_data/Api_budidaya/luas_pengolahan',
            method: "POST",
            data: { action: 'fetch' },
            dataType: "JSON",
            success: function(data) {
                var kecamatan = [];
                var luas_lahan = [];
                var color = [];

                for (var count = 0; count < data.length; count++) {
                    kecamatan.push(data[count].kecamatan);
                    luas_lahan.push(data[count].luas_lahan);
                    color.push(random_rgba());
                }

                var chart_data = {
                    labels: kecamatan,
                    datasets: [{
                        label: 'Luas Lahan',
                        backgroundColor: color,
                        color: '#fff',
                        data: luas_lahan
                    }]
                };



                var options = {
                    responsive: true
                };
                var group_chart2 = $('#chartLuas');

                var graph2 = new Chart(group_chart2, {
                    type: 'line',
                    data: chart_data,
                    options: options

                });

            }
        })
    }

    function chartNilai() {
        $.ajax({
            url: site_url + 'api/pengolahan_data/Api_budidaya/nilai_pengolahan',
            method: "POST",
            data: { action: 'fetch' },
            dataType: "JSON",
            success: function(data) {
                var kecamatan = [];
                var nilai = [];
                var color = [];

                for (var count = 0; count < data.length; count++) {
                    kecamatan.push(data[count].kecamatan);
                    nilai.push(data[count].nilai_produksi);
                    color.push(random_rgba());
                }

                var chart_data = {
                    labels: kecamatan,
                    datasets: [{
                        label: 'Nilai Produksi',
                        backgroundColor: color,
                        fill: false,
                        color: '#fff',
                        data: nilai
                    }]
                };




                var group_chart3 = $('#chartNilai');

                var graph3 = new Chart(group_chart3, {
                    type: 'bar',
                    data: chart_data,
                    options: {
                        indexAxis: 'y',
                    }

                });

            }
        })
    }

    function random_rgba() {
        var o = Math.round,
            r = Math.random,
            s = 255;
        return 'rgba(' + o(r() * s) + ',' + o(r() * s) + ',' + o(r() * s) + ', 0.4' + ')';
    }

});