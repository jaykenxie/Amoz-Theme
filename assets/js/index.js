hljs.initHighlightingOnLoad();
(function() {
  const userInfoDrop = document.querySelector(".user-info-drop");
  const userInfoTitle = document.querySelector(".user-info h4");
  let timer = null;
  userInfoTitle.addEventListener("mouse-over", function() {
    console.log("onMouseOver");
    userInfoDrop.style.display = "block";
    timer = setTimeout(() => {
      userInfoDrop.style.display = "none";
    }, 1000);
  });
  userInfoDrop.addEventListener("mouseOver", function() {
    clearTimeout(timer);
  });
})();
