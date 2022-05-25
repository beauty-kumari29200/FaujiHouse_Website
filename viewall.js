const readMoreBtn = document.querySelector(".read-more-btn");
const text = document.querySelector(".all-products");

readMoreBtn.addEventListener("click", (e) => {
    text.classList.toggle("show-more");
  if (readMoreBtn.innerText === "View all") {
    readMoreBtn.innerText = "View  Less";
  } else {
    readMoreBtn.innerText = "View all";
  }
});












