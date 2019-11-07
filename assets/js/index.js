hljs.initHighlightingOnLoad();
(function() {
  const userInfoDrop = document.querySelector(".user-info-drop");
  const userInfoTitle = document.querySelector(".user-info_username");
  let timer = null;
  userInfoTitle && userInfoTitle.addEventListener("mouseover", function() {
    userInfoDrop.style.display = "block";
    timer = setTimeout(() => {
      userInfoDrop.style.display = "none";
    }, 3000);
  });
  // userInfoDrop.addEventListener("mouseover", function() {
  //   clearTimeout(timer);
  // });
  // userInfoDrop.addEventListener("mouseout", function(evet) {
  //   userInfoDrop.style.display = "none";
  // });
})();
