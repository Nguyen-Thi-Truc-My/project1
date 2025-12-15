function loadData() {
    fetch("https://TEN-BACKEND.onrender.com/api/students")
        .then(res => res.json())
        .then(data => {
            document.getElementById("result").innerText =
                JSON.stringify(data);
        })
        .catch(err => {
            document.getElementById("result").innerText = "Lỗi gọi backend";
        });
}