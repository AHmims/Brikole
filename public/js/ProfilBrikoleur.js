//-------------------------------------------------------
//FILL PORTFOLIO WITH PHOTOS
let portfolioPicsTable = [
  "../img/portfolio1.png",
  "../img/portfolio2.png",
  "../img/portfolio3.png",
  "../img/portfolio4.png",
  "../img/portfolio5.png",
  "../img/portfolio6.png",
];
function fillPortfolioPics(elmnt, table) {
  let content = "";
  for (let i = 0; i < table.length; i++) {
    content += `<img src="${table[i]}" alt="" data-toggle="modal" data-target="#myModal" />`;
  }

  elmnt.html(content);
}
fillPortfolioPics($(".portfolioPics"), portfolioPicsTable);
fillPortfolioPics($(".portfolioPicsMobile"), portfolioPicsTable);

//-----------------------------------------------------
//SCROLL PORTFOLIO MOBILE

$("#portfolioArrowsMobile_right").click(() => {
  $(".portfolioPicsMobile")[0].scrollBy(240, 0);
});
$("#portfolioArrowsMobile_left").click(() => {
  $(".portfolioPicsMobile")[0].scrollBy(-240, 0);
});

//NO BTN ON SCROLL END

function scrollPosition() {
  $(".portfolioPicsMobile").scroll(() => {
    let scrollLeft = $(".portfolioPicsMobile").scrollLeft();
    // console.log("scrollLeft ", scrollLeft);

    let lastImg = $(".portfolioPicsMobile").children("img").last();
    let lastImgOffset = lastImg.offset().left;
    let lastImgWidth = lastImg.width();
    let lastImgLastPoint = lastImgOffset + lastImgWidth;

    let divWidth = $(".portfolioPicsMobile").width();

    // console.log("lastImgLastPoint", lastImgLastPoint);
    // console.log("divWidth", divWidth);

    if (scrollLeft == 0) {
      $("#portfolioArrowsMobile_left").css("visibility", "hidden");
    } else $("#portfolioArrowsMobile_left").css("visibility", "visible");
    if (lastImgLastPoint - divWidth == 20) {
      $("#portfolioArrowsMobile_right").css("visibility", "hidden");
    } else $("#portfolioArrowsMobile_right").css("visibility", "visible");
  });
}
scrollPosition();


// function showPreview(ele) {
//   $("#imgPortfolio").attr("src", ele.value); // for IE
//   if (ele.files && ele.files[0]) {

//     var reader = new FileReader();

//     reader.onload = function (e) {
//       $("#imgPortfolio").attr("src", e.target.result);
//     }

//     reader.readAsDataURL(ele.files[0]);
//   }
// }