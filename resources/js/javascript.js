document.addEventListener("DOMContentLoaded", function () {
    // Buat peta Leaflet
    var map = L.map('map').setView([-8.009560, 112.950670], 13);

    // Tambahkan layer peta OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // Fetch data laporan dari backend
    fetch('http://localhost/get_locations.php')
        .then(response => response.json())
        .then(data => {
            // Tampilkan data laporan sebagai marker pada peta
            data.forEach(location => {
                var lintang = parseFloat(location.lintang);
                var bujur = parseFloat(location.bujur);
                var jenis_bencana = location.jenis_bencana;
                var deskripsi = location.deskripsi;

                // Memastikan lintang dan bujur tidak null sebelum menambahkan marker
                if (!isNaN(lintang) && !isNaN(bujur)) {
                    L.marker([lintang, bujur])
                        .addTo(map)
                        .bindPopup(`<b>${jenis_bencana}</b><br>${deskripsi}`)
                        .openPopup();
                }
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});