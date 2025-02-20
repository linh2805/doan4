
document.querySelector('a[href="#about-us"]').addEventListener('click', function(e) {
    e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
    const target = document.querySelector('#about-us');
    
    // Cuộn mượt mà với thời gian 1.5 giây
    const scrollTo = target.getBoundingClientRect().top + window.scrollY;
    window.scrollTo({
        top: scrollTo,
        behavior: 'smooth' // Cuộn mượt mà
    });

    // Điều chỉnh thời gian cuộn
    setTimeout(() => {
        window.scrollTo({
            top: scrollTo,
            behavior: 'auto' // Đảm bảo không có cuộn mượt sau khi hoàn thành
        });
    }, 3000); // Thời gian 1.5 giây
});