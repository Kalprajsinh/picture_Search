
    var canvas = document.getElementById("c");
    var ctx = canvas.getContext("2d");
    var img = new Image();
    img.addEventListener(
      "load",
      function () {
        const aspectRatio = img.width / img.height;
        const maxWidth = 400;
        const maxHeight = 400;

        if (aspectRatio > 1) {
          // Landscape image
          canvas.width = maxWidth;
          canvas.height = maxWidth / aspectRatio;
        } else {
          // Portrait or square image
          canvas.width = maxHeight * aspectRatio;
          canvas.height = maxHeight;
        }
        ctx.filter = "none";
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
        window.URL.revokeObjectURL(this.src);
      },
      false
    );

    function applyFilters() {
      ctx.clearRect(0, 0, canvas.width, canvas.height);

      var blur = document.getElementById("blurRange").value;
      var brightness = document.getElementById("brightnessRange").value;
      var contrast = document.getElementById("contrastRange").value;
      var grayscale = document.getElementById("grayscaleRange").value;
      var sepia = document.getElementById("sepiaRange").value;
      var posterizeOpacity = document.getElementById("posterizeOpacityRange").value;
      var invert = document.getElementById("invertRange").value;
      var hueRotate = document.getElementById("hueRotateRange").value;
      var saturation = document.getElementById("saturationRange").value;

       ctx.filter = `blur(${blur}px) brightness(${brightness}%) contrast(${contrast}%) grayscale(${grayscale}%) sepia(${sepia}%)  opacity(${posterizeOpacity}) invert(${invert}%) hue-rotate(${hueRotate}deg) saturate(${saturation}%)`;
  ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
}

    function handleFiles(files) {
      if (files.length) {
        img.src = window.URL.createObjectURL(files[0]);
      }
    }

    var downloadBtn = document.getElementById("doBtn");
    downloadBtn.addEventListener(
      "click",
      function (ev) {
        downloadBtn.href = canvas.toDataURL();
        downloadBtn.download = "img.png";
      },
      false
    );

    function resetFilters() {
      document.getElementById("blurRange").value = 0;
      document.getElementById("brightnessRange").value = 100;
      document.getElementById("contrastRange").value = 100;
      document.getElementById("grayscaleRange").value = 0;
      document.getElementById("sepiaRange").value = 0;
      document.getElementById("posterizeOpacityRange").value = 1;
      document.getElementById("invertRange").value = 0;
      document.getElementById("hueRotateRange").value = 0;
      document.getElementById("saturationRange").value = 100;

      applyFilters();
    }

    var filterButtons = document.getElementsByClassName("b");
    for (var i = 0; i < filterButtons.length; i++) {
      filterButtons[i].addEventListener("click", function () {
        var filter = this.getAttribute("data-filter");
        ctx.filter = filter;
        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
      });
    }
