document.addEventListener('DOMContentLoaded', () => {
    const asalSelect = document.getElementById('asal');
    const tujuanSelect = document.getElementById('tujuan');
    const hargaInput = document.getElementById('harga');
    const preview = document.getElementById('preview');

    const pajakAsal = {
        "Soekarno Hatta": 65000,
        "Husein Sastranegara": 50000,
        "Abdul Rachman Saleh": 40000,
        "Juanda": 30000
    };

    const pajakTujuan = {
        "Ngurah Rai": 85000,
        "Hasanuddin": 70000,
        "Inanwatan": 90000,
        "Sultan Iskandar Muda": 60000
    };

    function updatePreview() {
        const asal = asalSelect.value;
        const tujuan = tujuanSelect.value;
        const harga = parseInt(hargaInput.value) || 0;

        const pajak = (pajakAsal[asal] || 0) + (pajakTujuan[tujuan] || 0);
        const total = harga + pajak;

        if (asal && tujuan && harga > 0) {
            preview.textContent = `Pajak: Rp ${pajak.toLocaleString()} | Total: Rp ${total.toLocaleString()}`;
        } else {
            preview.textContent = "";
        }
    }

    asalSelect.addEventListener('change', updatePreview);
    tujuanSelect.addEventListener('change', updatePreview);
    hargaInput.addEventListener('input', updatePreview);
});
