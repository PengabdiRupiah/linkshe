const rows = document.querySelectorAll("table tbody tr")

rows.forEach((row) => {
  const dokumen = row.querySelector("[data-label='dokumen']").textContent
  const kondisi = row.querySelector("[data-label='kondisi']").textContent
  const p2tl = row.querySelector("[data-label='p2tl']").textContent
  const tunggakan = row.querySelector("[data-label='tunggakan']").textContent
  const nextBtn = row.querySelector(".next")
  const keterangan = row.querySelector("[data-label='keterangan']")
  const id = document.querySelector(".id")
  id.style.display = "none"

  if (dokumen === "tidak aman" || kondisi === "tidak aman" || p2tl === "tidak aman" || tunggakan === "tidak aman") {
    nextBtn.style.background = "red"
    nextBtn.disabled = true
    nextBtn.addEventListener("click", (event) => {
      event.preventDefault()
      alert("Belum dapat melanjutkan karena belum memenuhi syarat")
    })
    keterangan.textContent = "Data tidak aman"
  } else {
    nextBtn.style.background = "blue"
    nextBtn.disabled = false
    keterangan.textContent = "Data aman"
  }
})