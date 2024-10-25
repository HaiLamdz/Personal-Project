const express = require('express');
const app = express();
const port = 3000;

app.get('/api/birthday', (req, res) => {
    // Tạo mảng ngày
    const days = Array.from({ length: 31 }, (v, k) => k + 1);
    
    // Tạo mảng tháng
    const months = {
        1: "Tháng 1",
        2: "Tháng 2",
        3: "Tháng 3",
        4: "Tháng 4",
        5: "Tháng 5",
        6: "Tháng 6",
        7: "Tháng 7",
        8: "Tháng 8",
        9: "Tháng 9",
        10: "Tháng 10",
        11: "Tháng 11",
        12: "Tháng 12"
    };

    // Tạo mảng năm (từ 1900 đến năm hiện tại)
    const currentYear = new Date().getFullYear();
    const years = Array.from({ length: currentYear - 1900 + 1 }, (v, k) => k + 1900);

    // Trả về JSON
    res.json({
        days: days,
        months: months,
        years: years
    });
});

app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});
