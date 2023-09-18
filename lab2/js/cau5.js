document.getElementById('formTNN').addEventListener("submit", (event) => {
    const inputValue = document.getElementById("nam").value;
    if(inputValue.trim() === "") {
        alert("Bạn chưa nhập gì!");
        event.preventDefault(); // Ngăn chặn việc gửi biểu mẫu nếu ô input trống
    }
})