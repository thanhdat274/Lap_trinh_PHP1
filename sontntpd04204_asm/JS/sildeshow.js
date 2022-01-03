var kichThuoc = document.getElementsByClassName("slide")[0].clientWidth;
var ChuyenSlide = document.getElementsByClassName("chuyen-slide")[0];
var Img = ChuyenSlide.getElementsByTagName("img");
var Max = kichThuoc * Img.length;
Max -= kichThuoc;
var Chuyen = 0;
function Next() {
  if (Chuyen < Max) {
    Chuyen += kichThuoc;
  } else {
    Chuyen = 0;
  }
  ChuyenSlide.style.marginLeft = "-" + Chuyen + "px";
}
function Back() {
  if (Chuyen == 0) {
    Chuyen = Max;
  } else {
    Chuyen -= kichThuoc;
  }
  ChuyenSlide.style.marginLeft = "-" + Chuyen + "px";
}
setInterval(function () {
  Next();
}, 4000);
