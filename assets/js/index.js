hljs.initHighlightingOnLoad();
(function() {
  const userInfoDrop = document.querySelector(".user-info-drop");
  const userInfoTitle = document.querySelector(".user-info_username");
  userInfoTitle && userInfoTitle.addEventListener("mouseover", function() {
    userInfoDrop.style.display = "block";
  });
  userInfoTitle && document.body.addEventListener('click', function(evet) {
    if(!userInfoDrop.contains(evet.target)) {
      userInfoDrop.style.display = "none";
    }
  })
})();
