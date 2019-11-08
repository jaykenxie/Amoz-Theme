hljs.initHighlightingOnLoad();
(function() {
  const userInfoDrop = document.querySelector(".user-info-drop");
  const userInfoTitle = document.querySelector(".user-info_username");
  userInfoTitle &&
    userInfoTitle.addEventListener("mouseover", function() {
      userInfoDrop.style.display = "block";
    });
  userInfoTitle &&
    document.body.addEventListener("click", function(evet) {
      if (!userInfoDrop.contains(evet.target)) {
        userInfoDrop.style.display = "none";
      }
    });
  // 实现图片预览
  const modal = document.querySelector(".modal");
  const modalImg = document.querySelector(".modal-box img");
  const postContent = document.querySelector(".post-content");
  postContent &&
    postContent.addEventListener("click", function(evet) {
      if (evet.target.tagName === "IMG") {
        modalImg.src = evet.target.src;
        modal.style.display = "block";
        modalImg.parentElement.style.width = modalImg.clientWidth + "px";
      }
    });
  modal.addEventListener("click", function(event) {
    if (event.target.tagName === "IMG") return;
    modal.style.display = "none";
  });
})();
