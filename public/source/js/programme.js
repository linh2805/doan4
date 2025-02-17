let currentIndex = 1;
showTestimonial(currentIndex);

function currentTestimonial(n) {
  showTestimonial((currentIndex = n));
}

function showTestimonial(n) {
  const items = document.querySelectorAll(".testimonial-item");
  const dots = document.querySelectorAll(".dot");

  if (n > items.length) {
    currentIndex = 1;
  }
  if (n < 1) {
    currentIndex = items.length;
  }

  items.forEach((item, index) => {
    item.classList.remove("active");
    if (index === currentIndex - 1) {
      item.classList.add("active");
    }
  });

  dots.forEach((dot, index) => {
    dot.classList.remove("active");
    if (index === currentIndex - 1) {
      dot.classList.add("active");
    }
  });
}
