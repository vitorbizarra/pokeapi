var limit = 9;

var types = [
  "normal",
  "fighting",
  "flying",
  "poison",
  "ground",
  "rock",
  "bug",
  "ghost",
  "steel",
  "fire",
  "water",
  "grass",
  "electric",
  "psychic",
  "ice",
  "dragon",
  "dark",
  "fairy",
];

$(function () {
  $("#btn-load").text("Loading...");
  $("#btn-load").show();
  $.ajax({
    url: "./requests/get-cards.php",
    data: {
      limit: limit,
      offset: 0,
    },
    cache: false,
    type: "POST",
    success: function (res) {
      var holdClass = $(".cards-holder");
      if (res) {
        $("#loading_wrap").fadeOut();
        $("#btn-load").text("Load more");
        holdClass.html(res);
      }
    },
  });

  $.ajax({
    url: "./requests/get-types.php",
    data: {
      type: "",
    },
    cache: false,
    type: "POST",
    success: function (res) {
      var holdClass = $(".ul-pokemon-types");
      if (res) {
        holdClass.append(res);
      }
    },
  });

  $.ajax({
    url: "./requests/get-select-types.php",
    data: {
      type: "",
    },
    cache: false,
    type: "POST",
    success: function (res) {
      var holdClass = $(".select-pokemon-types")
        .parent()
        .children(".dropdown-menu");
      if (res) {
        holdClass.append(res);
      }
    },
  });
});

$(document).on("click", "#btn-load", function (e) {
  e.preventDefault();
  var offset = $(this)
    .parent()
    .parent()
    .find(".cards-holder")
    .children(".col").length;
  var _t = $(this);
  _t.text("Loading...");
  $.ajax({
    url: "./requests/get-cards.php",
    data: {
      limit: limit,
      offset: offset,
    },
    cache: false,
    type: "POST",
    success: function (res) {
      var holdClass = $(".cards-holder");
      if (res) {
        _t.text("Load more");

        holdClass.append(res);
      }
    },
  });
});

$(document).on("click", ".button-types", function () {
  $("#loading_wrap").fadeIn();

  var _t = $(this);
  if (_t.hasClass("active")) {
    return;
  } else {
    _t.closest(".ul-pokemon-types").find("button.active").removeClass("active");
    _t.addClass("active");

    var type = $(this).data("id");
    $.ajax({
      url: "./requests/get-pokemon-type.php",
      data: {
        type: type,
      },
      cache: false,
      type: "POST",
      success: function (res) {
        var holdClass = $(".cards-holder");
        var elementClasses = $(".select-pokemon-types")
          .attr("class")
          .split(" ");
        for (var i = 0; i < elementClasses.length; i++) {
          if ($.inArray(elementClasses[i], types)) {
            $(".select-pokemon-types").removeClass(types);
            break;
          }
        }
        $(".select-pokemon-types")
          .addClass("tag")
          .addClass(type)
          .text(type.charAt(0).toUpperCase() + type.slice(1));
        $("#loading_wrap").fadeOut();
        $(".type-title").text(type);
        $("#btn-load").hide();
        if (res) {
          holdClass.html(res);
        }
      },
    });
  }
});

$(document).on("click", ".button-all", function () {
  $("#btn-load").text("Loading...");
  $("#btn-load").show();
  $("#loading_wrap").fadeIn();
  var _t = $(this);
  _t.closest(".ul-pokemon-types").find("button.active").removeClass("active");
  $.ajax({
    url: "./requests/get-cards.php",
    data: {
      limit: limit,
      offset: 0,
    },
    cache: false,
    type: "POST",
    success: function (res) {
      var holdClass = $(".cards-holder");
      $(".select-pokemon-types").removeClass("tag").text("All");

      var _t = $(this);
      _t.closest(".ul-pokemon-types").find(".active").removeClass("active");

      $(".type-title").text("All");
      if (res) {
        $("#loading_wrap").fadeOut();
        $("#btn-load").text("Load more");
        holdClass.html(res);
      }
    },
  });
});
