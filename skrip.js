document.getElementById("MyForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah tindakan pengiriman formulir bawaan
    // Nonaktifkan tombol "Submit"
    
    // Membuat objek FormData untuk mengumpulkan data formulir
    var formData = new FormData(this);
    // var submitButton = document.getElementById("submitBtn");
    // submitButton.disabled = true;
    // submitButton.value = "Mengirim...";

    // Mengirim data ke server menggunakan AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "act.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                // Respon berhasil diterima
                console.log(xhr.responseText);
                alert("Data berhasil disubmit!");
                // Atur tindakan apa pun yang perlu dilakukan setelah pengiriman berhasil
            } else {
                // Terjadi kesalahan dalam permintaan
                console.error("Error:", xhr.status);
                alert("Terjadi kesalahan saat mengirim data.");
                // Atur tindakan apa pun yang perlu dilakukan jika terjadi kesalahan
            }
        }
    };
    xhr.send(formData);
});
