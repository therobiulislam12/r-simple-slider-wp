jQuery(document).ready(function () {
  let autoplay;
  let control;

  if (simpleSlider?.autoplay === "false") {
    autoplay = false;
  } else {
    autoplay = true;
  }

  if (simpleSlider?.control === "false") {
    control = "";
  } else {
    control = "control";
  }


  var carouselCustomeTemplateProps = {
    width: parseInt(simpleSlider?.width) /* largest allowed width */,
    height: parseInt(simpleSlider?.height) /* largest allowed height */,
    slideLayout:
      "fill" /* "contain" (fit according to aspect ratio), "fill" (stretches object to fill) and "cover" (overflows box but maintains ratio) */,
    animation:
      simpleSlider?.animation_style /* slide | scroll | fade | zoomInSlide | zoomInScroll */,
    animationCurve: "ease",
    animationDuration: parseInt(simpleSlider?.duration),
    animationInterval: parseInt(simpleSlider?.interval),
    slideClass: "jR3DCarouselCustomSlide",
    autoplay: autoplay,
    controls: control /* control buttons */,
    navigation: simpleSlider?.navigation_style /* circles | squares | '' */,
    perspective: 2200,
    rotationDirection: "ltr",
    onSlideShow: slideShownCallback,
  };
  function slideShownCallback(jQueryslide) {
    // console.log("Slide shown: ", jQueryslide.find("img").attr("src"));
  }

  jR3DCarouselCustomeTemplate = jQuery(
    ".jR3DCarouselGalleryCustomeTemplate"
  ).jR3DCarousel(carouselCustomeTemplateProps);
});
