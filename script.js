// function pindahHalaman() {
//     // Mendapatkan nilai input data
//     var data = document.getElementById("dataInput").value;
  
//     // Mengirim data ke halaman selanjutnya melalui URL
//     window.location.href = "hal2.html?data=" + encodeURIComponent(data);
//   }
function pindahHalaman() {
    var data = document.getElementById("dataInput").value;
    window.location.href = "hal2.html?data=" + encodeURIComponent(data);
  }
    